# _FFB Draft Tool PHP_

#### _Week 5 Project of PHP - 3.11.2016_

### By _**Jon Sweeney**_

## Description

_The objective of this week's code review is to build a simple web application with php, Silex, and mySQL._

_This web app is designed to act as a tool for a fantasy football player.  Upon further development, a user can create a list of players they want to draft.  That data is stored in a database and can be created, read, updated and deleted_

## Setup/Installation Requirements

1. _Fork and clone this repository from_ [gitHub](https://github.com/jsween/ffb_php.git).
2. Navigate to the root directory of the project in the CLI shell you are using and run the command: __composer install__ .
3. Create a local server in the /web directory within the project folder using the command: __php -S localhost:8000__ .
4. Open the directory http://localhost:8000 in any standard web browser.
5. Launch MAMP and access mySQL by entering __/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot__ .

### SQL Commands ###
> CREATE DATABASE ffb_tool_db;

> USE ffb_tool_db;

>CREATE TABLE players (id serial PRIMARY KEY, name VARCHAR(255), avg_fifteen DECIMAL(3,1), consistency INT, position_id INT, team_id INT, photo_url VARCHAR(255));

> CREATE TABLE positions (id serial PRIMARY KEY, position_name VARCHAR(55));

> CREATE TABLE teams (id serial PRIMARY KEY, team_name VARCHAR(55), logo VARCHAR(55), abbreviation VARCHAR(6));

> CREATE TABLE wish_list (id serial PRIMARY KEY, name VARCHAR(55));

> CREATE TABLE wishlist_players (id serial PRIMARY KEY, wish_list_id INT, player_id INT);

## Known Bugs

_Have not set up the Wish List class yet._

## Support and contact details

_Contact the author through_ [gitHub](https://github.com/jsween/https://github.com/jsween/ffb_php.git).

## Technologies Used

_This web application was created using the_  [Silex micro-framework](http://silex.sensiolabs.org/)_, as well _[Twig](http://twig.sensiolabs.org/), a template engine for php.

### License

MIT License.

Copyright (c) 2016 **_Jon Sweeney_**
