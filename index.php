<?php

require 'vendor/autoload.php';

use Tightenco\Collect\Support\Collection;

$json = file_get_contents(__DIR__ . '/products.json');
$data = json_decode($json, true);
$collection = new Collection($data);

echo "<p><b>Total sum of prices in pounds GBP:</b></br> £".$collection->sum('price_in_pence')."</p>";

echo "<p><b>Total sum of prices in pounds GBP for phones and laptops:</b></br> £".$collection->whereIn('category', ['Phone','Laptop'])->sum('price_in_pence')."</p>";

echo "<p><b>Total count of graphics cards:</b></br>". $collection->whereIn('category', 'Graphics Card')->count(). "</p>";

echo "<p><b>Comma separated list of the names of phones:</b></br>". $collection->whereIn('category', 'Phone')->implode('name', ', '). "</p>";