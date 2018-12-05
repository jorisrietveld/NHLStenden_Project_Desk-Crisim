<!--
  - Author: Joris Rietveld <jorisrietveld@gmail.com>
  - Date: 04-12-2018 22:06
  - Licence: Creative Commons - Attribution-ShareAlike 4.0 International
-->
# Development inside a Docker container #

![desk_crisim_plus_docker.png](resources/desk_crisim_plus_docker.png)

[TOC]: # "Table of contents"

## Table of contents
- [The problem with every other developer](#the-problem-with-every-other-developer)
    - [So... hire a separate team that builds build scripts?](#so-hire-a-separate-team-that-builds-build-scripts)
- [Installing Docker](#installing-docker)
    - [Installing Docker on Linux :penguin:](#installing-docker-on-linux)
        - [Adding apt over HTTPS (required to talk to there repo)](#adding-apt-over-https-required-to-talk-to-there-repo)
        - [Add and verify the official GBG key](#add-and-verify-the-official-gbg-key)
        - [Add the repository and install Docker CE](#add-the-repository-and-install-docker-ce)
        - [Verify our hard work](#verify-our-hard-work)
        - [_(Optionally)_ Post-installation steps for Linux](#optionally-post-installation-steps-for-linux)
        - [_(Optionally)_ Configure Docker to start on boot](#optionally-configure-docker-to-start-on-boot)
    - [Installing Docker on MacOS](#installing-docker-on-macos)
        - [Running on MacOS](#running-on-macos)
    - [Installing Docker on Windows](#installing-docker-on-windows)
        - [Running the desktop app](#running-the-desktop-app)
    - [Installing Docker Compose](#installing-docker-compose)
- [Getting a develop environment](#getting-a-develop-environment)



## The problem with every other developer ##
When you are developing software it usually `runs on my machine` so `ship it!`.
For some reason, when developing with other people it breaks on there machine
and if you lucky it breaks with a multitude of distinct, seemingly unrelated,
hard to debug error messages. So... it is because they are :black_large_square::black_large_square::black_large_square::black_large_square::black_large_square:(removed by admin)

Okey, that's not fair its very difficult to create a shared development environment even
while using the same operating system and tools on the exact same version number,
things will break. This becomes extra `Fun!` doing it cross-platform using slightly
different tools and default configuration files that all have nice tweaks you
din't even know existed.

### So... hire a separate team that builds build scripts? ###
To overcome the painful process of creating development scrips for building, running
and testing that detect the differences, and then tweak it for every system, there
is Docker. Docker is visualization software that can run an application in a
`container` completely separated from the host system.

Distributing the
development environment inside a container ensures that every developer has the
exact same software installed and environment variables set. It could be sort of
compared with installing a platform specific JVM on your system and then running
platform independent [java-byte code](https://en.wikipedia.org/wiki/Java_bytecode) in it.

## Installing Docker ##
The installation of docker is a little bit different on each host operating system
so I will split the operating system specific parts in its own paragraph.

### Installing Docker on Linux :penguin: ###
For simplicity I assume that you are running ubuntu, [otherwise refere to the
official documentation](https://docs.docker.com/install/#supported-platforms)
and follow the instructions that match your distro. Make sure that there are no
previous installations active, just run:
```bash
$ sudo apt remove docker docker-engine docker.io
```
This will remove it if present, or tell you that no packages are installed. Now
we are ready to install docker by adding the official repository to your machine
_(If you don't like adding third-party repositories [see installing it manually](https://docs.docker.com/install/linux/docker-ce/ubuntu/#install-from-a-package))_.

#### Adding apt over HTTPS (required to talk to there repo) ####
Fetch the latest data from the software repositories and install the required
packages with the following command:
```bash
$ sudo apt update && apt install apt-transport-https ca-certificates curl software-properties-common
```
#### Add and verify the official GBG key ####
Now add Dockers official GPG key to your trusted repositories and verify its
integrity with its finger print, run:
```bash
# Fetch there public key
$ curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -

# Verify the downloaded fingerprint:
$ sudo apt-key fingerprint 0EBFCD88
# And check the output to catch sneaky NSA attacks.
```

#### Add the repository and install Docker CE ####
Finally ready to prepare to install docker, add dockers [official repository](https://download.docker.com/linux/ubuntu/)
with the add-apt-repository utility like this:
```bash
$ sudo add-apt-repository \
     "deb [arch=amd64] https://download.docker.com/linux/ubuntu \
     $(lsb_release -cs) \
     stable"

# Update your cache again with the newly added repository and install the packages
$ sudo apt update && sudo apt install docker-ce
```

#### Verify our hard work ####
If all went well we should be able to run containers, lets try running there
`hello-world` image:
```bash
# This command will fetch the hello-world image and execute it in a container.
$ sudo docker run hello-world
```
Be patient, it could take some time to download the image, so go grab your self
 some :coffee: and stare at the terminal pretending to investigate complicated
 terminal stuff. When docker says hello you are done investigating and can move
 on with the project.

#### _(Optionally)_ Post-installation steps for Linux ####
If your "oke" by running `sudo` before the `docker` command, then there isn't
much to do. If you want to "run it properly" and with more convenience, you should
tweak the permissions and add a new user and group: `docker:docker`.
```bash
# First lets create the docker group
$ sudo groupadd docker

# And add the docker user to that group
$ sudo usermod -aG docker $USER
```
Your new membership should be re-evaluated, the easiest way to do this is by 
logging out and back in again, or restarting the system.
```bash
# Re-Authenticate
$ exit
# Login with you user account and test the command:
$ docker run helo-world

# If if fails, or if you just want to restart type:
$ reboot
# and wait for the system to start-up again. Login to your user account and try
# to run the docker run command:
$ docker run hello-world
```
#### _(Optionally)_ Configure Docker to start on boot ####
When you want the docker daemon to start with the system, enable the systemD 
module by typing:
```bash
$ sudo systemctl enable docker
```

### Installing Docker on MacOS ###
First we need to install `Docker for Mac` which is the free Community Edition
of `Docker for MacOS`, if you own a licence you can also use the non CE
edition. [Download](https://store.docker.com/editions/community/docker-ce-desktop-mac) and install docker
by double clicking on the installer package `Docker.dmg`, then drag the docker logo
to the applications folder. Double-click Docker.app in the Applications folder to start
docker. Docker will ask you to authenticate yourself because it needs privileged access to
install the networking components. The whale icon in the top status bar indicates
that docker is running an ready to go! there are [more detailed instructions on
there site](https://docs.docker.com/docker-for-mac/install/) if you get stuck.

#### Running on MacOS ####
After the installation finishes, a pop-up will show up that asks you to login
into your docker account. If you don't have one, [create a docker account](https://store.docker.com/signup?next=%2Feditions%2Fcommunity%2Fdocker-ce-desktop-windows%3Fref%3Dlogin)
and enter the credentials in the pop-up or by pressing on the docker icon in the
status bar. Once logged in you can start using it from the terminal try
running hello-world to check if everything works:
```bash
$ docker run helo-world
```
If you get an greeting from docker, your ready to start developing Desk CriSim in
it. If not [check there official documentation](https://docs.docker.com/docker-for-mac/)
to solve the problem.

### Installing Docker on Windows ###
First we need to install `Docker for windows` which is the free Community Edition
of `Docker for Microsoft Windows`, if you own a licence you can also use the non CE
edition. [Download](https://store.docker.com/editions/community/docker-ce-desktop-windows) and install docker,
there are [more detailed instructions on there site](https://docs.docker.com/docker-for-windows/install/) if you get stuck.
Optionally you can also install [the desktop app](https://download.docker.com/win/stable/Docker%20for%20Windows%20Installer.exe)
which will make managing containers and therefore your live easier.

#### Running the desktop app ####
If docker didn't start automatically after the installation _(Look inside the system tray)_, open the start menu
and search for `Docker for Windows` and start it. To validate that it worked check the system tray again, there
should be a swimming wale shouting steady when hovering over it, its normal and you are good to go. If you haven't
already login with your docker id to start using it from the commandline/powershell.

### Installing Docker Compose ###
If you are running Docker on Mac or Windows you are lucky because, Docker compose
comes bundled with the previously installed applications. When you run into trouble
[visit the official documentsion, on there website](https://docs.docker.com/compose/install/#install-compose)

## Getting a develop environment ##

<hr>

[![Author Joris Rietveld](https://img.shields.io/badge/Author-Joris%20Rietveld-blue.svg)](https://github.com/jorisrietveld)
[![License: CC BY-SA 4.0](https://img.shields.io/badge/License-CC%20BY--SA%204.0-lightgrey.svg)](https://creativecommons.org/licenses/by-sa/4.0/)

This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.