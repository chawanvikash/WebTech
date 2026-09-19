<?php

function displayGrade($marks) {

    if ($marks >= 90) {
        $grade = "A+";
    }
    elseif ($marks >= 80) {
        $grade = "A";
    }
    elseif ($marks >= 70) {
        $grade = "B";
    }
    elseif ($marks >= 60) {
        $grade = "C";
    }
    elseif ($marks >= 50) {
        $grade = "D";
    }
    else {
        $grade = "F";
    }

    echo "<h2>Marks: $marks</h2>";
    echo "<h2>Grade: $grade</h2>";
}


function calculateResult($math, $physics, $cs, $english) {

    // Store subject-wise marks in PHP array
    $marks = [
        "Mathematics" => $math,
        "Physics" => $physics,
        "Computer Science" => $cs,
        "English" => $english
    ];

    // Calculate total
    $total = array_sum($marks);

    // Calculate average
    $average = $total / count($marks);

    echo "<h2>Subject-wise Marks</h2>";

    echo "<table border='1' cellpadding='8'>";

    echo "<tr>";
    echo "<th>Subject</th>";
    echo "<th>Marks</th>";
    echo "</tr>";

    foreach ($marks as $subject => $mark) {

        echo "<tr>";
        echo "<td>$subject</td>";
        echo "<td>$mark</td>";
        echo "</tr>";
    }

    echo "</table>";

    echo "<h3>Total Marks: $total</h3>";

    echo "<h3>Average Marks: " .
         number_format($average, 2) .
         "</h3>";

    // Grade based on average
    echo "<h3>Grade: ";

    if ($average >= 90) {
        echo "A+";
    }
    elseif ($average >= 80) {
        echo "A";
    }
    elseif ($average >= 70) {
        echo "B";
    }
    elseif ($average >= 60) {
        echo "C";
    }
    elseif ($average >= 50) {
        echo "D";
    }
    else {
        echo "F";
    }

    echo "</h3>";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["task"] == "grade") {

        $marks = $_POST["marks"];

        displayGrade($marks);
    }

    elseif ($_POST["task"] == "marks") {

        calculateResult(
            $_POST["math"],
            $_POST["physics"],
            $_POST["cs"],
            $_POST["english"]
        );
    }
}

?>