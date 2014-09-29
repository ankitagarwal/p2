<?php

/**
 * This file contains default configurations for the project.
 *
 * @copyright  2014 onwards Ankit Agarwal
 */

require_once('config.php'); // Include various configs.
require_once('passgen.class.php');
require_once('lib.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name='keywords' content='xkcd, passowrd, xkcd password'>
    <meta name='description' content='This page is a simple application to generate xkcd stlyes password'>
    <title>xkcd password generator</title>
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
        <?php
            if ($_POST) {
                // If form has been submitted process the form and generate the password if needed.
                $passgen = new passgen();
                if ($errors = $passgen->get_errors()) {
                    $html = $passgen->get_errors_html();
                    echo '<div id=feedback class="bg-errors text-danger text-large"> ' .  $html . '</div>';
                } else {
                    // Everything good.
                    $password = $passgen->generate_password();
                    echo '<div id=feedback class="bg-password text-password"> ' .  $password . '</div>';
                }
            }
            require('form.php')
        ?>
    </div>
</body>
</html>