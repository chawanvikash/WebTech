<?php

require_once __DIR__ . "/db.php";

function addStudent($conn)
{
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $department = $_POST["department"];
    $marks = $_POST["marks"];

    $sql = "INSERT INTO `2024CSB086`
            (name, gender, department, marks)
            VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "sssi",
        $name,
        $gender,
        $department,
        $marks
    );

    if (mysqli_stmt_execute($stmt)) {
        return "Student added successfully!";
    } else {
        return "Failed to add student.";
    }
}

echo addStudent($conn);

mysqli_close($conn);

?>