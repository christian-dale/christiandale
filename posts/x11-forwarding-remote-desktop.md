When using ssh to access servers remotely, have you ever thought, wouldn't it be nice to view GUI programs on my server?
In this guide I will show you how to do exactly this.
This guide assumes you are using Ubuntu, but I would assume the packages used are available on most GNU / Linux distros.

There are two ways in which we can do this. The first method is using microsoft's remote desktop technology,
and the second method is using X11 forwarding. If one of the methods don't work, you may try the other.
But before that we have to:

## Setup a desktop environment.

Before we do anything we have to have a graphical desktop environment installed.
We can install this using a convenient tool called **tasksel**, which can be found on most
linux distros. On Ubuntu for example this can be installed using "sudo apt install tasksel".

Once, installed you can run "sudo tasksel" and choose which desktop environment you want to install
using the arrow keys. Then you can use tab to move to the finish button, and press enter.
The default option will work fine in this case.

![Tasksel installation](/assets/img/blog/tasksel.jpg)

## Method 1 - Remote desktop (RDP)

Firstly we need to install a tool called "xrdp", using your package manager of choice.
In ubuntu we would do "sudo apt install xrdp".

Then we need to allow for ssl using this command, "sudo adduser xrdp ssl-cert",
and then restart the xrdp server using "sudo systemctl restart xrdp".

Make sure the RDP port (3389) is allowed in you firewall.
In ufw we would use this command, "sudo ufw allow from 3389".

You can connect to the server using remote desktop on windows
by searching for the program called **mstsc.exe** in windows search.
Here, you can enter the server ip, and press connect.
You can also set other settings here, like screen resolution.

## Method 2 - X11 forwardning

This method required you to install both putty and vcxsrv on your client machine.

[Putty link](https://www.putty.org/)

[VcXsrv link](https://sourceforge.net/projects/vcxsrv/)

Once you have done this, you may open VcXsrv Xlaunch. The default settings are fine.

Then open putty, and enter your server ip. There is one more step to be done here before we connect though.
Go to SSH -> X11 and enable X11 forwarding. Once this is done you may connect.
The graphical software you execute in your terminal will be shown in a window on your desktop.

![Tasksel installation](/assets/img/blog/putty.jpg)
