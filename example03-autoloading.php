<?php

use App\{Order, User};

require __DIR__.'/vendor/autoload.php';

$buyer = new User('Andrea Faulds');
$order = new Order('1337.42', $buyer);

echo $order . "\n";
