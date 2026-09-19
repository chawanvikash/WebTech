<?php

function sortNumbers($input) {

    $numbers = explode(" ", trim($input));

    sort($numbers);

    echo "<h2>Sorted Numbers</h2>";

    foreach ($numbers as $number) {
        echo $number . " ";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["task"] == "sort") {

        sortNumbers($_POST["numbers"]);
    }
}

?>