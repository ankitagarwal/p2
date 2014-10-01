<?php
require_once('/var/www/html/p2/scrapper.php');

$words = scrapper::scrape_words();

if (!empty($words)) {
    // Scrapping success.
    file_put_contents('wordlist', json_encode($words));
}