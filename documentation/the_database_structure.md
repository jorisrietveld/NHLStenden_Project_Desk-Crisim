<!--
  - Author: Joris Rietveld <jorisrietveld@gmail.com>
  - Date: 08-12-2018 01:59
  - Licence: Creative Commons - Attribution-ShareAlike 4.0 International
-->
# The Database #

[TOC]: # "Table of contents"

## Table of contents
- [The Entity Relation Diagram](#the-entity-relation-diagram)


## The Entity Relation Diagram ##
![ERD_Desk_Crisim_version_v0.3.svg](resources/erd/ERD_Desk_Crisim_version_v0.2%2C0.svg)

## Where are the queries ##
Writing complex `SQL` statements in your code is awesome! It also helps secure your job because there are lots of things
that go wrong while it will it keeps other developers fare away, that's a win win for sure. _(Disclaimer: might not work
on every employer, and while I prefer not to there are valid reasons to write SQL in your code)_

## What is Doctrine ##


## How to add a new table to the database ##
### Installing the database ###
```bash
$ php bin/console doctrine:database:create
```
### How to create a Entity ###
```bash
$ php bin/console make:entity
```
### How to update a Entity ###
```bash
$ php bin/console make:entity
$ php bin/console make:migration
$ php bin/console doctrine:migrations:migrate
```
```bash
$ php bin/console make:entity --regenerate
$ php bin/console make:entity --regenerate --overwrite
```
### How migrate the entity to the database ###
```bash
$ php bin/console make:migration
```
```bash
$ php bin/console doctrine:migrations:migrate


$ php bin/console doctrine:migrations:version --add --all
```

### How to create fixtures (dummy data) ###


### How to load fixtures (dummy data) ###
```bash
$ php bin/console doctrine:fixtures:load
```

<hr>

[![Author Joris Rietveld](https://img.shields.io/badge/Author-Joris%20Rietveld-blue.svg)](https://github.com/jorisrietveld)
[![License: CC BY-SA 4.0](https://img.shields.io/badge/License-CC%20BY--SA%204.0-lightgrey.svg)](https://creativecommons.org/licenses/by-sa/4.0/)

This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.