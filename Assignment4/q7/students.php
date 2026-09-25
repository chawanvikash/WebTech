<?php

require_once __DIR__ . "/db.php";


// ADD STUDENT
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $department = $_POST["department"];

    $sql = "INSERT INTO students (name, department)
            VALUES ('$name', '$department')";

    if (mysqli_query($conn, $sql)) {
        echo "Student added successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    exit;
}


// DELETE STUDENT
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["delete"])) {

    $id = $_GET["delete"];

    $sql = "DELETE FROM students WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Student deleted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    exit;
}


// DISPLAY STUDENTS
$sql = "SELECT * FROM students";

$result = mysqli_query($conn, $sql);

$students = [];

while ($row = mysqli_fetch_assoc($result)) {
    $students[] = $row;
}

echo json_encode($students);

mysqli_close($conn);

?>