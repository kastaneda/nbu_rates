#!/usr/bin/env php
<?php

$currencies = ['USD', 'EUR', 'GBP', 'PLN', 'CZK'];

// CSV header
echo 'Date,' . join(',', $currencies) . PHP_EOL;

$dir = __DIR__ . '/data/';
$files = array_filter(
    scandir($dir, SCANDIR_SORT_ASCENDING),
    function ($filename) {
        return preg_match('/^\d{8}.json$/', $filename);
    }
);

foreach ($files as $filename) {
    $dataset = json_decode(file_get_contents($dir . $filename), true);

    // Date
    $date_y = substr($filename, 0, 4);
    $date_m = substr($filename, 4, 2);
    $date_d = substr($filename, 6, 2);
    echo sprintf('%s-%s-%s', $date_y, $date_m, $date_d);

    // Rates for all required currencies
    foreach ($currencies as $currency) {
        echo ',';

        // Search
        foreach ($dataset as $row) {
            if ($row['cc'] == $currency) {
                echo sprintf('%.7f', $row['rate']);
            }
        }
    }

    echo PHP_EOL;
}
