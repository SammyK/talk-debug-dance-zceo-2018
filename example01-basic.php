<?php

if ('cli' !== PHP_SAPI) {
    header('Content-type: text/plain;');
}

function whoIs(string $a): string {
    if ('Derick Rethans' === $a) {
        return sprintf('%s is the creator of xdebug.', $a);
    }
    return sprintf('%s is an awesome internals contributor.', $a);
}

$phpeople = [
    'Sara Golemon',
    'Nikita Popov',
    'Andrea Faulds',
    'Derick Rethans‏',
];

foreach ($phpeople as $nerd) {
    $message = whoIs($nerd);
    echo $message . "\n";
}

echo "Done :)\n";
