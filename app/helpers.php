<?php

use Carbon\Carbon;

function presentPrice($price)
{
    //return money_format('$%i', $price / 100);
    return '$'.number_format($price / 100, 2, ',', '.');
}

function presentDate($date)
{
    return Carbon::parse($date)->format('M d, Y');
}

function getImage($path)
{
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.jpg');
}

