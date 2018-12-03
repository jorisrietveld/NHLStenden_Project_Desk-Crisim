<!--
  - Author: Joris Rietveld <jorisrietveld@gmail.com>
  - Date: 03-12-2018 12:56
  - Licence: Creative Commons - Attribution-ShareAlike 4.0 International
-->
# Application structure/architecture #

[TOC]: # "Table of contents"

## Table of contents
- [Where is index.php?](#where-is-indexphp)
    - [Front Controller and url rewriting](#front-controller-and-url-rewriting)
    - [Public assets](#public-assets)
        - [Webpack, webpack encore and babel](#webpack-webpack-encore-and-babel)
        - [Images](#images)
        - [CSS prepossessing and scss](#css-prepossessing-and-scss)
- [Security](#security)
    - [Webserver rules](#webserver-rules)
    - [Symfony Firewall & environment variables](#symfony-firewall--environment-variables)
    - [Securing the database](#securing-the-database)
- [Testing](#testing)
    - [Travis CI](#travis-ci)
    - [PHP Unit](#php-unit)
    - [Code Climate](#code-climate)


## Where is index.php? ##
Why have 1 accessible script instead of a script per page?

### Front Controller and url rewriting ###
Wat is MVC?
 Why make it so complicated?
 wat is a front controller?
 What does a webserver do?
 When do you need PHP to run a php script?


### Public assets ###
Why store public images, fonts, javascript and stylesheeds non public and then write code to copy it to public?

#### Webpack, webpack encore and babel ####
Why download javascript source code when there is a minifined CDN?
Why shouldn't I use JQuery?
What is wrong with javascript and why write EMC6 and compiling it back with babel?

#### Images ####

#### CSS prepossessing and scss ####

## Security ##

### Webserver rules ###

### Symfony Firewall & environment variables ###

### Securing the database ###

## Testing ##

### Travis CI ###
### PHP Unit ###
### Code Climate ###



<hr>

[![Author Joris Rietveld](https://img.shields.io/badge/Author-Joris%20Rietveld-blue.svg)](https://github.com/jorisrietveld)
[![License: CC BY-SA 4.0](https://img.shields.io/badge/License-CC%20BY--SA%204.0-lightgrey.svg)](https://creativecommons.org/licenses/by-sa/4.0/)

This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.