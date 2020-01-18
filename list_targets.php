#!/usr/bin/env php
<?php

// Script to list all days of national currency history

$one_day = new DateInterval('P1D');
$kiev_tz = new DateTimeZone('Europe/Kiev');

// Starting from the very first day
$date_start = new DateTime('1996-09-02', $kiev_tz);

// Untill today
$date_end = new DateTime(null, $kiev_tz);
if ((int) date('H') >= 16) {
    // On 16:00, rates for the next day will be published
    $date_end = $date_end->add($one_day);
}

// Loop over all those days
$period = new DatePeriod($date_start, $one_day, $date_end);
foreach ($period as $day) {
    // Target file name, like 'data/19960902.json'
    echo 'data/' . $day->format('Ymd') . '.json' . PHP_EOL;
}

