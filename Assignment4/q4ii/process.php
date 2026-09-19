<?php

function displayAnimals($n) {

    $animals = [
        "Dog",
        "Cat",
        "Lion",
        "Tiger",
        "Elephant",
        "Horse",
        "Rabbit",
        "Monkey",
        "Deer",
        "Bear"
    ];

    echo "<h2>Animal Names</h2>";

    for ($i = 0; $i < $n && $i < count($animals); $i++) {

        echo ($i + 1) . ". " . $animals[$i] . "<br>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["task"] == "animals") {

        $n = $_POST["n"];

        displayAnimals($n);
    }
}

?>