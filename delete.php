<?php 
include "conn.php";

$enrollment_id = $_GET['enrollment_id'];

/* Fetch student_id and subject_id
   to delete */
$sql = "SELECT student_id, subject_id 
        FROM enrollment 
        WHERE enrollment_id = $enrollment_id";

$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $student_id = $row['student_id'];
    $subject_id = $row['subject_id'];

    // Delete queries
    $sql1 = "DELETE FROM enrollment 
            WHERE enrollment_id = $enrollment_id";
    mysqli_query($conn, $sql1);

    $sql2 = "DELETE FROM students 
            WHERE student_id = $student_id";
    mysqli_query($conn, $sql2);

    $sql3 = "DELETE FROM subjects 
            WHERE subject_id = $subject_id";
    mysqli_query($conn, $sql3);

    echo "Data deleted successfully!";

} else {
    echo "Enrollment record not found!";
}

?>