# Xkcd style password generator

## Live URL
<http://p2.ankitis.me>

## Description
A xkcd style password generator. Refer <http://xkcd.com/936/>.

## Demo
I have recorded a screencast - <http://screencast.com/t/IXs3s8Tu37tZ>

## Features
* Supports various configs like:
 * Defining the number of words.
 * Defining the number of symbols to use.
 * Defining the number of numbers to use.
 * Defining the formatting to use.
* There are placeholders with default values for all inputs.
* All input is properly validated.
* Form remembers user inputted values.
* A script scrapes paulnoll.com to generate massive word list every hour using cron.
* Since cron is used there is no added cost on users' end to generate the list.
* OOP is being used.

## Information for the teaching team
* The core logic of password generation is present in class 'passgen'.
* The scrapping logic is present in class 'scrapper'.
* The cron script is located at cron.php
* The code for the html form is in form.php

## Third party code used
* Bootstrap(<http://getbootstrap.com>) - used to make site look better.
* paulnoll.com - used to generate word list.

## Browser support
* Tested with Firefox 32 and chromium 37 on ubuntu 14.04
* Other browsers on other platforms should work but are not tested.

## Further notes
* The code of this project is in a private github repository.
* Search engine indexing of the live site has been disabled using robots.txt.
