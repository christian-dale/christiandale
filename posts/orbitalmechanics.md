---
{
    "title": "Orbital Mechanics",
    "description": "This article is about coding orbital mechanics in javascript and learning the equations needed for creating a demo.",
    "date": "2020-11-07",
    "dateUpdate": "2020-11-07",
    "permalink": "orbitalmechanics",
    "lang": "en",
    "draft": false,
    "categories": ["programming", "games"],
    "image": "https://source.unsplash.com/z3o1SQjm1Lk",
    "attrib": ""
}
---

This article is about coding orbital mechanics in javascript and learning the
equations needed for creating a demo. This article assumes you already have some experience with coding in javascript.

Listen, I like getting right to writing code as much as the next person,
but there are a few things we need to learn before that. We will learn about
computing the distance between points, calculating the amount of force acting upon an object
using Newtons gravity equation, and computing the direction of a vector.

### The distance between points

Computing the distance between two points is easy. This is the equation for doing so.

<pre class="code code-block prettyprint"><code>d = sqrt((x1 - x0)^2 + (y1 - y0)^2)</code></pre>

### Newton's law of gravity

This is probably the most complicated part of this article, but once you understand it
everything else will be simple in comparison. In this equation, F is equal to the amount of force
in newtons (N) acting upon an object.

G is the gravitational constant. M and m is the mass of the two objects we are calculating,
and d is the distance between the two objects.

<pre class="code code-block prettyprint"><code>F = (G * m * M) / d^2</code></pre>

### The direction of a vector

<pre class="code code-block prettyprint">o = atan2(x1 - x0, y1 - y0)
Fx = cos(o) * F
Fy = sin(o) * F</code></pre>

### Astronomical units

Astronomical units are a way of measuring distances in space and is what works best for large distances
like between planets and moons. An astronomical unit is the distance between the center of the sun to
the center of the earth and is defined as AU = 149.6e9, or about 150 million kilometers.

### A demo

This is not to scale.

<div class="game">
  <canvas style="max-width: 100%" width="400" height="400"></canvas>
</div>

### This is the code

<pre class="code code-block prettyprint"><code>const width = 400;
const height = 400;
const G = 6.67428e-11;
const AU = (149.6e6 * 1000)
var scalevalue = 50;
var speedvalue = 5;
var SCALE = scalevalue / AU
var timestep = 24*3600 / speedvalue

const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

function gameCenter() {
	return {x: 0.5 * width, y: 0.5 * height};
}

class Scene {
	constructor() {
  	this.objects = [];
  }
  
  addObject(obj) {
  	this.objects.push(obj);
  }
  
  attraction(self, other) {
  	// compute distance between bodies
  	const dx = other.x - self.x;
  	const dy = other.y - self.y;
  	const distance = Math.sqrt(Math.pow(dx, 2) + Math.pow(dy, 2));

  	// compute force
  	const F = G * self.mass * other.mass / Math.pow(distance, 2);

  	// compute direction
  	const o = Math.atan2(dy, dx);
  	const Fx = Math.cos(o) * F;
  	const Fy = Math.sin(o) * F;

  	//console.log(sx, sy, ox, oy, dx, dy, d, F, o, Fx, Fy);
  	return [Fx, Fy]
  }
  
  render() {
  	ctx.fillStyle = "#000";
  	ctx.fillRect(0, 0, width, height);
    
    const changes = [];
    
    this.objects.forEach(o => {
      let total = [0,0];
      
      this.objects.forEach(o2 => {
        if (o !== o2) {
          const attr = this.attraction(o, o2);
          total[0] += attr[0];
          total[1] += attr[1];
        }
      });
      
      changes.push(total);
    });
    
    changes.forEach((change, index) => 
    	this.objects[index].updateV(change[0], change[1]));
    this.objects.forEach(o => o.draw(this.context));
  }
}

class Particle {
	constructor(opts) {
  	this.x = opts.x;
    this.y = opts.y;
    this.vx = opts.vx;
    this.vy = opts.vy;
    this.radius = opts.radius;
    this.mass = opts.mass;
    this.linewidth = opts.linewidth;
    this.strokestyle = opts.strokestyle;
  }

	update() {
  	
  }
  
  updateV(vx, vy) {
   	this.vx += vx / this.mass * timestep;
  	this.vy += vy / this.mass * timestep;
    
    this.updateP();
  }
  
  updateP() {
   	this.x += this.vx * timestep;
  	this.y += this.vy * timestep;
  }

	translateCoords(x, y) {
  	return [0.5 * width + x * SCALE, 0.5 * height + y * SCALE];
  }

	draw() {
    const coords = this.translateCoords(this.x, this.y);
    
    ctx.lineWidth = this.linewidth;
    ctx.fillStyle = this.strokestyle;
    ctx.beginPath();
    ctx.arc(coords[0], coords[1], this.radius, 0, 2 * Math.PI, false);
    ctx.fill();
	}
}

let sun = new Particle({
  name: "Sun",
  mass: 1.989e30,
  vx: 0,
  vy: 0,
  x: 0,
  y: 0,
  radius: 8,
  linewidth: 3,
  strokestyle: 'yellow'
});


let earth = new Particle({
  name: "Earth",
  mass: 5.972e24,
  vx: 0,
  vy: 30290,
  x: AU,
  y: 0,
  radius: 4,
  linewidth: 1,
  strokestyle: '#60a6d4'
});

const scene = new Scene();
scene.addObject(sun);
scene.addObject(earth);

function gameLoop() {
  scene.render();
	requestAnimationFrame(gameLoop);
}

gameLoop();
</code></pre>

<script>
const width = 400;
const height = 400;
const G = 6.67428e-11;
const AU = (149.6e6 * 1000)
var scalevalue = 50;
var speedvalue = 5;
var SCALE = scalevalue / AU
var timestep = 24*3600 / speedvalue

const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

function gameCenter() {
	return {x: 0.5 * width, y: 0.5 * height};
}

class Scene {
	constructor() {
  	this.objects = [];
  }
  
  addObject(obj) {
  	this.objects.push(obj);
  }
  
  attraction(self, other) {
  	// compute distance between bodies
  	const dx = other.x - self.x;
  	const dy = other.y - self.y;
  	const distance = Math.sqrt(Math.pow(dx, 2) + Math.pow(dy, 2));

  	// compute force
  	const F = G * self.mass * other.mass / Math.pow(distance, 2);

  	// compute direction
  	const o = Math.atan2(dy, dx);
  	const Fx = Math.cos(o) * F;
  	const Fy = Math.sin(o) * F;

  	//console.log(sx, sy, ox, oy, dx, dy, d, F, o, Fx, Fy);
  	return [Fx, Fy]
  }
  
  render() {
  	ctx.fillStyle = "#000";
  	ctx.fillRect(0, 0, width, height);
    
    const changes = [];
    
    this.objects.forEach(o => {
      let total = [0,0];
      
      this.objects.forEach(o2 => {
        if (o !== o2) {
          const attr = this.attraction(o, o2);
          total[0] += attr[0];
          total[1] += attr[1];
        }
      });
      
      changes.push(total);
    });
    
    changes.forEach((change, index) => 
    	this.objects[index].updateV(change[0], change[1]));
    this.objects.forEach(o => o.draw(this.context));
  }
}

class Particle {
	constructor(opts) {
  	this.x = opts.x;
    this.y = opts.y;
    this.vx = opts.vx;
    this.vy = opts.vy;
    this.radius = opts.radius;
    this.mass = opts.mass;
    this.linewidth = opts.linewidth;
    this.strokestyle = opts.strokestyle;
  }

	update() {
  	
  }
  
  updateV(vx, vy) {
   	this.vx += vx / this.mass * timestep;
  	this.vy += vy / this.mass * timestep;
    
    this.updateP();
  }
  
  updateP() {
   	this.x += this.vx * timestep;
  	this.y += this.vy * timestep;
  }

	translateCoords(x, y) {
  	return [0.5 * width + x * SCALE, 0.5 * height + y * SCALE];
  }

	draw() {
    const coords = this.translateCoords(this.x, this.y);
    
    ctx.lineWidth = this.linewidth;
    ctx.fillStyle = this.strokestyle;
    ctx.beginPath();
    ctx.arc(coords[0], coords[1], this.radius, 0, 2 * Math.PI, false);
    ctx.fill();
	}
}

let sun = new Particle({
  name: "Sun",
  mass: 1.989e30,
  vx: 0,
  vy: 0,
  x: 0,
  y: 0,
  radius: 8,
  linewidth: 3,
  strokestyle: 'yellow'
});


let earth = new Particle({
  name: "Earth",
  mass: 5.972e24,
  vx: 0,
  vy: 30290,
  x: AU,
  y: 0,
  radius: 4,
  linewidth: 1,
  strokestyle: '#60a6d4'
});

const scene = new Scene();
scene.addObject(sun);
scene.addObject(earth);

function gameLoop() {
  scene.render();
	requestAnimationFrame(gameLoop);
}

gameLoop();
</script>
