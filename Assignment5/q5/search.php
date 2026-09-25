<?php

require_once __DIR__ . "/db.php";

function searchStudents($conn, $search, $sortColumn, $sortOrder)
{
    // Allowed columns
    $allowedColumns = [
        "id",
        "name",
        "gender",
        "department",
        "marks"
    ];

    // Prevent invalid column names
    if (!in_array($sortColumn, $allowedColumns)) {
        $sortColumn = "id";
    }

    // Allow only ASC or DESC
    $sortOrder = strtoupper($sortOrder);

    if ($sortOrder !== "ASC" && $sortOrder !== "DESC") {
        $sortOrder = "ASC";
    }

    $sql = "SELECT * FROM `2024CSB086`
            WHERE name LIKE ?
            OR gender LIKE ?
            OR department LIKE ?
            ORDER BY `$sortColumn` $sortOrder";

    $stmt = mysqli_prepare($conn, $sql);

    $searchValue = "%" . $search . "%";

    mysqli_stmt_bind_param(
        $stmt,
        "sss",
        $searchValue,
        $searchValue,
        $searchValue
    );

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $students = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }

    return $students;
}


$search = $_GET["search"] ?? "";
$sortColumn = $_GET["sort"] ?? "id";
$sortOrder = $_GET["order"] ?? "ASC";

$students = searchStudents(
    $conn,
    $search,
    $sortColumn,
    $sortOrder
);

echo json_encode($students);

mysqli_close($conn);

?>