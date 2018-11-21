# Desk CriSim
[![Build Status](https://travis-ci.com/jorisrietveld/DeskCrism-Backend.svg?token=8VeUSD3hMgXK4qZXKocS&branch=master)](https://travis-ci.com/jorisrietveld/DeskCrism-Backend)
[![Build Status](https://travis-ci.com/jorisrietveld/DeskCrism-Backend.svg?token=8VeUSD3hMgXK4qZXKocS&branch=dev-master)](https://travis-ci.com/jorisrietveld/DeskCrism-Backend)
![License: GPL v3](https://img.shields.io/badge/License-GPL%20v3-blue.svg)

This repository holds the source code of the Desk Crisim system.

## Installing
To install the project you should first install the required tools:
 - PHP 7.2 - A dynamic scripting language.
 - composer - A PHP package manager.
 - yarn - A faster node package manager.

### Step 1
First clone the repository from github:
```bash
$ git clone https://github.com/jorisrietveld/DeskCrism-Backend.git
```
### Step 2
After that change the directory to the project root:
```bash
$ cd DeskCrisim-Backend
```
### Step 3
Now install the required composer dependencies:
```bash
$ composer install
```
### Step 4
If you want to build the front-end packages, also run:
```bash
$ yarn install
```

## Running
### Yarn
I have created several yarn scripts to run webpack and php servers for
development.
To run webpack for asset compilation run `webpack-run` from PhpStorm or with
the commandline:
```bash
$ yarn run webpack-run
```
To watch files (watch for change) and automatic re compilation run `webpack-watch`
from PhpStorm or with the commandline:
```bash
$ yarn run webpack-watch
```
To stop watching the assets run `webpack-watch`
                            from PhpStorm or with the commandline:
```bash
$ webpack-unwatch
```
### Composer

## Requirements
 - \>= PHP 7.2
    - mb-string


## The Project Team

 - **Project lead** Lennart Pikijn [:email:](mailto:lennart.pikijn@student.stenden.com)
 - **secondary lead** Niek Luttikhof [:email:](mailto:niek.luttikhof@student.stenden.com)
 - **secretary** Soner Mulder [:email:](mailto:niek.luttikhof@student.stenden.com)
 - **Planner** Sander Paping [:email:](mailto:sander.paping@student.stenden.com)
 - **Repository Manger** Joris Rietveld [:email:](mailto:joris.rietveld@student.stenden.com)



## Licencing
Desk CriSim - A crisis simulation game.
Copyright (C) 2018 Members of the INF2H project group

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.