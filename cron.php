<?php
require_once('/var/www/html/p2/config.php');
require_once(ROOTPATH . 'scrapper.php');

$words = scrapper::scrape_words();

if (!empty($words)) {
    // Scrapping success.
    file_put_contents(ROOTPATH . 'wordlist', json_encode($words));
}