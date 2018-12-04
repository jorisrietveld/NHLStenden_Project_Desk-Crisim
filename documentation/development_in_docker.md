<!--
  - Author: Joris Rietveld <jorisrietveld@gmail.com>
  - Date: 04-12-2018 22:06
  - Licence: Creative Commons - Attribution-ShareAlike 4.0 International
-->
# Development inside a Docker container #

![desk_crisim_plus_docker.png](resources/desk_crisim_plus_docker.png)
[TOC]: # "Table of contents"

## Table of contents
- [Why would you want to use docker](#why-would-you-want-to-use-docker)



## Why would you want to use docker ##
When you are developing software it usually `runs on my machine` so `ship it!`.
For some reason, when developing with other people it breaks on there machine
and if you lucky it breaks with a multitude of distinct, seemingly unrelated,
hard to debug error messages.
So... it is because they are :black_large_square::black_large_square::black_large_square::black_large_square::black_large_square:(removed by admin)
That's not fair its very difficult to create a shared development environment even
while using the same operating system and tools on the exact same version number,
things will break. This becomes extra `Fun!` doing it cross-platform using slightly
different tools and default configuration files that all have nice tweaks you
din't even know existed.

To overcome the painful process of creating development scrips for building, running
and testing that detect the differences, and then tweak it for every system, there
is Docker. Docker is visualization software that can run an application in a
`container` completely separated from the host system. Distributing the
development environment inside a container ensures that every developer has the
exact same software installed and environment variables set.


<hr>

[![Author Joris Rietveld](https://img.shields.io/badge/Author-Joris%20Rietveld-blue.svg)](https://github.com/jorisrietveld)
[![License: CC BY-SA 4.0](https://img.shields.io/badge/License-CC%20BY--SA%204.0-lightgrey.svg)](https://creativecommons.org/licenses/by-sa/4.0/)

This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.