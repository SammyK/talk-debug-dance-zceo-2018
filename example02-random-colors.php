<?php

function randomColor(): string {
    $bytes = random_bytes(3);
    return '#' . bin2hex($bytes);
}

function makeColorfulHeading(): string {
    $color = randomColor();
    return sprintf(
            '<h1 style="color: %1$s">This is %1$s</h1>',
            $color
    );
}
?>
<html>
<body>
<?php
foreach (range(0, 4) as $x) {
    echo makeColorfulHeading() . "\n";
}
?>
</body>
</html>
