<?php

require_once __DIR__ . "/db.php";

function calculateStatistics($conn)
{
    $sql = "SELECT * FROM `2024CSB086`";

    $result = mysqli_query($conn, $sql);

    $students = [];
    $marksArray = [];

    while ($row = mysqli_fetch_assoc($result)) {

        $marks = (int)$row["marks"];

        // Store marks in array
        $marksArray[] = $marks;

        // Determine grade
        if ($marks > 80) {
            $grade = "A";
        } elseif ($marks > 60) {
            $grade = "B";
        } else {
            $grade = "C";
        }

        $row["grade"] = $grade;

        $students[] = $row;
    }

    // Calculate total
    $total = array_sum($marksArray);

    // Calculate average
    $average = count($marksArray) > 0
        ? $total / count($marksArray)
        : 0;

    return [
        "students" => $students,
        "total" => $total,
        "average" => round($average, 2)
    ];
}

$data = calculateStatistics($conn);

echo json_encode($data);

mysqli_close($conn);

?>