<?php
require (__DIR__ . '/vendor/autoload.php');
require ('dbAccess.php');

$connection = dbAccess::getInstance('localhost', 'root', 'password', 'exampleDatabase', 3306);

$query = $connection->createEntry(1, 'Revision', 'Coding');

//This is how you get access to an sql database with php