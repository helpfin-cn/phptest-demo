<?php

require 'vendor/autoload.php';

use Tightenco\Collect\Support\Collection;

$json = file_get_contents(__DIR__ . '/products.json');
$data = json_decode($json, true);
$collection = new Collection($data);

// Total sum of prices in pounds GBP
$total_sum_prices = $collection->sum('price_in_pence');

// Total sum of prices in pounds GBP for phones and laptops
$total_phone_laptop = $collection->whereIn('category', ['Phone','Laptop'])->sum('price_in_pence');

// Total count of graphics cards
$count_graphics_cards = $collection->whereIn('category', 'Graphics Card')->count();

// Comma separated list of the names of phones
$comma_separated_list = $collection->whereIn('category', 'Phone')->implode('name', ', ');


// Display Output
echo "<p><b>Total sum of prices in pounds GBP:</b></br> £$total_sum_prices</p>";

echo "<p><b>Total sum of prices in pounds GBP for phones and laptops:</b></br> £$total_phone_laptop</p>";

echo "<p><b>Total count of graphics cards:</b></br> $count_graphics_cards</p>";

echo "<p><b>Comma separated list of the names of phones:</b></br> $comma_separated_list</p>";