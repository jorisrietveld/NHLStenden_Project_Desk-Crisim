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
If you are unfamiliar with using Symfony, Composer, Object Oriented PHP or
any [MVC]() _(or MVC-like)_ system architecture, the project can look like a
complicated labyrinth. When I first started using Symfony I didn't get why you
would want to create 1 php script that includes some cryptic stuff about
autoloading and starting a kernel? Then you have these `controller` things that
do you php stuff but where do I place the HTML in it? Now I know how to connect
to a database but the symfony book talks about ORM mapping with doctrine that
sounds way more complicated than `mysqli_connect()` and just write SQL... I just
need to include a `Javascript`/`Css` library so I place it in a css directory
and push it to git so everybody has it, but now I have to install it with
`yarn add <some-library>` and place an `import 'some-library'` in the
`assets/js/app.js' file, even for CSS, wait why is there a folder scss?

I didn't see the use of all of this, I thought it was way more complicated to
do stuff this way instead of just writing these things my self. So I watched
a lot of talks security, web design and php development. And most of
them used some kind of framework and everything looked a bit overdone, so I
thought lets just role my own framework that is easier and will do more of the
hard work that I thought was needed, in the other frameworks and tools, like
Symfony, Laravel, Doctrine, Twig. After 8 complete rewrites of my own `MVC`
framework, including a database mapper (complete with SQL generation), template
engine, Dependency injection service container, session manager, debug toolbar
and some (terribly overcomplicated & buggy) CMS creation features. I learned
that using object oriented programming, strict separation of the storage, user
interface and actions is a absolute must if your project grows any bigger than
10 web pages and needs to be maintained longer than the week it takes to write
your beautiful php scripts that open a database connection on each page.

Wow it was not my intention to write so much about my personal `OOP` and
`Architecture` learning process but you might feel the same, and tho I always
recommend writing you (small) MVC framework for learning purposes. But its much
easier to use a good framework like symfony and learn why they do stuff like this.
If something breaks in symfony, instead of using stackoverflow, browse the source
code of symfony and try to find out what goes wrong, often you will find that you
just misunderstood a concept and are trying to do something (I know its hard for
programmers) `Stupid!`, I have this moment several time a day :trollface:

### Front Controller and url rewriting ###
Wat is MVC?
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