<?php

require 'vendor/autoload.php';

use Tightenco\Collect\Support\Collection;

$json = file_get_contents(__DIR__ . '/products.json');
$data = json_decode($json, true);
$collection = new Collection($data);

echo "<p><b>Total sum of prices in pounds GBP:</b></br>";
echo $total_price = '£'.$collection->sum('price_in_pence');
echo "</p>";


echo "<p><b>Total sum of prices in pounds GBP for phones and laptops:</b></br>";
echo $filtered = '£'.$collection->whereIn('category', ['Phone','Laptop'])->sum('price_in_pence');
echo "</p>";


echo "<p><b>Total count of graphics cards:</b></br>";
echo $count_graphics_cards = $collection->whereIn('category', 'Graphics Card')->count();
echo "</p>";


echo "<p><b>Comma separated list of the names of phones:</b></br>";
echo $filtered_phones = $collection->whereIn('category', 'Phone')->implode('name', ', ');
echo "</p>";