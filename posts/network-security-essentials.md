---
{
    "title": "Network Security Essentials",
    "description": "These are some general tips on network security I wrote for an assignement.",
    "date": "2022-04-10",
    "dateUpdate": "2023-03-04",
    "permalink": "network-security-essentials",
    "lang": "en",
    "draft": false,
    "categories": [
        "webdev",
        "networksecurity"
    ],
    "image": "/assets/img/blog/security.jpg",
    "attrib": ""
}
---

These are some general tips on network security I wrote for an assignement.
Most of the advice applies to Ubuntu GNU / Linux, but the methods would be just as important
in any other operating system.

## Perimeter security

### Firewall

In Ubuntu the firewall is handled with a program called "ufw". Ufw, lets you block certain ports or applications on the network from ever being handled by any networking software on your computer. This program is already included in most GNU / Linux distributions and can be used with the following commands.

- sudo ufw status – Check which ports are allowed in the network.
- sudo ufw allow … - Allow a port access on the network.

### IDS / IPS

IDS (Intrusion Detection System) and IPS (Intrusion Prevention System) are both important parts of a network. They work by checking the content of network packets with a central repository and checking if it matches already known exploits. The main difference between these is that IDS doesn't alter the packets in any way, while IPS prevents malicious packets from being delivered.

### Anti-virus

Anti-virus is something most people are familiar with, and know the importance of having it installed, especially on Windows machines. Although Unix based machines are more secure by design because of its authorization and security model, it can still get viruses.
An anti-virus works by scanning your filesystem for files that match the hash of know vulnerabilities and quarantining them if any match is found. It can also check current running programs for vulnerabilities, depending on the anti-virus used.

Popular free anti-virus solutions for GNU / Linux are Comodo Antivirus for Linux, ClamAV and ESET NOD32 Antivirus for Linux Desktop. These can be installed using your package manager of choice on GNU / Linux distributions.

### Authentication / Authorization controls

It is important to make sure that only the intended persons have access to a network, and that other unintended persons don't gain access. One such method of authentication on a server would be the use of SSH (secure shell), which allows remote access for user accounts. SSH also encrypts traffic using TLS much in the same way as with HTTPS.

Authorization is a method in which you give access to an already authenticated user to specific information. For example, one user would be a guest, and another would be an admin.

### Fail2ban

Fail2ban is designed to hinder brute-force attacks and many other possible attack vectors. It pairs well with popular web servers like Apache, and even with SSH. The software works by blocking the ip of the attacker when blocking criteria are met. Read more about fail2ban [here](https://fail2ban.org).

### How potential security threats would be handled

Of course, some data on a network is more important than other data, for example private user information. Therefore, it is important to secure this especially well, with methods like username and password and two factor authentication. This is what is referred to as preventative measures.

It is also important to take backups so that if data loss where to happen, either by hardware or software error, or by malicious attacks, the information would still be stored.

**A note on two factor authentication -** Two factor authentication works by generating a random link on the server, and then sending this link to the receiver by either message or email. Once the user presses this link, it is compared to the one generated one the server, and if a match is detected, the user is authenticated.

## On web server security

### How the methods from the last section would be important

The methods discussed earlier in the last section would be essential for proper web server security. Especially authentication controls and a firewall.

### TLS Security

TLS is a method for encrypting the packets sent to and from a web server. It uses a method called public / private key cryptography, where the server has a private key, and the client has a public key which it shares with the server. This method is referred to as https (hyper-text transfer protocol secure), as opposed to http (hyper-text transfer protocol).

### MYSQL Injections

MYSQL injections is a method of hacking an insecure server in which there is sent a request to the server that contains escape characters in its query string that will be queried to the database.
An example of this would be if you have a login form which takes the username field and stores it directly to the database.

Let's say we have the following query.

<pre class="ke-code ke-code-block prettyprint"><code>SELECT \* FROM users WHERE username = '?' AND password = '?'</code></pre>

Something like the following example could be used in that case to check if the server is vulnerable to MYSQL injections. We could set the password field to "' OR 1=1;" to achieve a bypass of the authentication system and gain access to the system. The database query would now look like this.

<pre class="ke-code ke-code-block prettyprint"><code>SELECT * FROM users WHERE username = ? AND password = '' OR 1=1;</code></pre>

This tells the database to either check if the username and passwords match, or if 1 = 1, which is always true, thus gaining login to the system.
If a system is vulnerable to such attacks, the result could be even worse, in this example the whole database table would be deleted.

<pre class="ke-code ke-code-block prettyprint"><code>SELECT * FROM users WHERE username = ? AND password = '' OR DROP TABLE users;</code></pre>

MYSQL injection attacks can be prevented by using correct sanitation of all information sent to the network by users.
