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

When you start out programming and manage to fetch some arrays from the database with a simple `foreach( bla_query(
$con, "SELECT * FROM RawUserInput")){ echo $resultSet["Thx for not posting XXS"] }`, your happy it works. When you
application start to grow and you get you fist <span style="background:black;color:green;">&nbsp;L33d
HaCKErs&nbsp;</span> visitors, you will notice that you should move this to a centralized location. You create central
query object, define some constants that holds all your SQL statements and some methods to return the data. After every
update in the database you `just` have to rewrite the SQL constants in that class and create a few extra methods, hmm It
seems like I have a lot of code duplication because large parts SQL statements are the same, maybe concat some parts
togehter? Or even better create generators that can write the SQL for you! This is great until you move you application
from a `dev` SQL database to your `prod` server that claims to know SQL. Wait what SQL Dialects? So I have to create new
generators for each database type...

This stage of development is called `clinical depression and anxiety`, why not steal some SQL generators from somebody
else?!

Doctrine is the tool we use for

<hr>

[![Author Joris Rietveld](https://img.shields.io/badge/Author-Joris%20Rietveld-blue.svg)](https://github.com/jorisrietveld)
[![License: CC BY-SA 4.0](https://img.shields.io/badge/License-CC%20BY--SA%204.0-lightgrey.svg)](https://creativecommons.org/licenses/by-sa/4.0/)

This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.