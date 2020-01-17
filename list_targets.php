#!/usr/bin/env php
<?php

$one_day = new DateInterval('P1D');
$kiev_tz = new DateTimeZone('Europe/Kiev');
$date_start = new DateTime('2007-01-01', $kiev_tz);
$date_end = new DateTime(null, $kiev_tz);

$hour = (int) date('H');
if ($hour >= 16) {
    $date_end = $date_end->add($one_day);
}

$period = new DatePeriod($date_start, $one_day, $date_end);
foreach ($period as $day) {
    echo 'data/' . $day->format('Ymd') . '.json' . PHP_EOL;
}

