<?php

function displayAnimalImages($n) {

    $images = [
        "animals/dog.png",
        "animals/cat.jpg",
        "animals/lion.jpg",
        "animals/tiger.jpeg",
        "animals/elephant.jpeg"
    ];

    echo "<h1>Animal Image Gallery</h1>";

    echo "<div style='display:flex;
                     flex-wrap:wrap;
                     gap:20px;'>";

    for ($i = 0;
         $i < $n && $i < count($images);
         $i++) {

        echo "<img src='" . $images[$i] . "'
                   width='200'
                   height='150'
                   style='object-fit:cover;
                          border-radius:12px;'>";
    }

    echo "</div>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["task"] == "images") {

        $n = $_POST["n"];

        displayAnimalImages($n);
    }
}

?>