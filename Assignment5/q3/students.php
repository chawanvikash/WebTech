<?php

require_once __DIR__ . "/db.php";

function getStudents($conn)
{
    $sql = "SELECT * FROM `2024CSB086`";

    $result = mysqli_query($conn, $sql);

    $students = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }

    return $students;
}

$students = getStudents($conn);

echo json_encode($students);

mysqli_close($conn);

?>