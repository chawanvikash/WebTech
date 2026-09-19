<?php

function displayOddNumbers($n) {

    echo "<h2>Odd Numbers from 1 to $n</h2>";

    for ($i = 1; $i <= $n; $i++) {

        if ($i % 2 != 0) {
            echo $i . " ";
        }
        

    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["task"] == "odd") {

        $n = $_POST["n"];

        displayOddNumbers($n);
    }
}

?>