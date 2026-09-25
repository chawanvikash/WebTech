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


function updateStudent($conn)
{
    $id = $_POST["id"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $department = $_POST["department"];
    $marks = $_POST["marks"];

    $sql = "UPDATE `2024CSB086`
            SET name = ?,
                gender = ?,
                department = ?,
                marks = ?
            WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "sssii",
        $name,
        $gender,
        $department,
        $marks,
        $id
    );

    if (mysqli_stmt_execute($stmt)) {
        return "Student updated successfully!";
    }

    return "Failed to update student.";
}


function deleteStudent($conn)
{
    $id = $_POST["id"];

    $sql = "DELETE FROM `2024CSB086`
            WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        return "Student deleted successfully!";
    }

    return "Failed to delete student.";
}


$action = $_GET["action"] ?? "fetch";


if ($action == "fetch") {

    echo json_encode(getStudents($conn));

}
elseif ($action == "update") {

    echo updateStudent($conn);

}
elseif ($action == "delete") {

    echo deleteStudent($conn);

}


mysqli_close($conn);

?>