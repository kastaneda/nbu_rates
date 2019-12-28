<?php

$kiev_tz = new DateTimeZone('Europe/Kiev');
$date_start = new DateTime('2007-01-01', $kiev_tz);
$date_end = new DateTime(null, $kiev_tz);

$everyday = new DateInterval('P1D');
$period = new DatePeriod($date_start, $everyday, $date_end);
foreach ($period as $day) {
    echo $day->format('Ymd') . '.json' . PHP_EOL;
}

