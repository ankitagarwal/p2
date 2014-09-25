<?php

/**
 * This file contains default configurations for the project.
 *
 * @copyright  2014 onwards Ankit Agarwal
 */

include_once('config.php'); // Include various configs.
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name='keywords' content='ankit agarwal, ankit, portfolio'>
    <meta name='description' content='This page is a simple portfolio about Ankit Agarwal'>
    <title>Ankit Agarwal's portfolio</title>
    <!-- Add bootsrap stuff -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>XKCD style password generator</h1>
            <p>This is an simple application that generates XKCD style passwords, based on various configurations.</p>
            <p><img src="http://imgs.xkcd.com/comics/password_strength.png" class="img-responsive img-rounded" alt="xkcd password generator image"></p>
        </div>
        <?php require('form.php') ?>
    </div>
</body>
</html>