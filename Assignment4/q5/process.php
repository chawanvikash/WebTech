<?php

function displayFeedback() {

    echo "<h1>Server Feedback</h1>";

    echo "<p><b>Name:</b> "
        . htmlspecialchars($_POST["name"])
        . "</p>";

    echo "<p><b>Password:</b> "
        . htmlspecialchars($_POST["password"])
        . "</p>";

    echo "<p><b>Gender:</b> "
        . htmlspecialchars($_POST["gender"])
        . "</p>";

    echo "<p><b>Department:</b> "
        . htmlspecialchars($_POST["department"])
        . "</p>";

    echo "<p><b>Student ID:</b> "
        . htmlspecialchars($_POST["student_id"])
        . "</p>";

    if (isset($_FILES["photo"]) &&
        $_FILES["photo"]["error"] == 0) {

        echo "<p><b>Uploaded File:</b> "
            . htmlspecialchars($_FILES["photo"]["name"])
            . "</p>";

    } else {

        echo "<p><b>Uploaded File:</b> No file uploaded</p>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    displayFeedback();

}

?>