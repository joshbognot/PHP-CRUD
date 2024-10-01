<?php 
    include "conn.php";

    // GETTING VALUES from form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $section = $_POST['section'];

    $subject_title = $_POST['subject_title'];
    $subject_desc = $_POST['subject_desc'];
    $instructor = $_POST['instructor'];

    $date_of_enrollment = $_POST['date_of_enrollment'];

    // Insert into students table
    $sql = "INSERT INTO students (first_name, last_name, date_of_birth, section) 
            VALUES ('$first_name', '$last_name', '$date_of_birth', '$section')";
    mysqli_query($conn, $sql);

    // Get the last inserted student ID
    $student_id = mysqli_insert_id($conn);

    // Insert into subjects table
    $sql = "INSERT INTO subjects (subject_title, subject_desc, instructor) 
            VALUES ('$subject_title', '$subject_desc', '$instructor')";
    mysqli_query($conn, $sql);

    // Get the last inserted subject ID
    $subject_id = mysqli_insert_id($conn);

    // Insert into enrollment table
    $sql = "INSERT INTO enrollment (date_of_enrollment, student_id, subject_id) 
            VALUES ('$date_of_enrollment', $student_id, $subject_id)";
    mysqli_query($conn, $sql);

    echo 'Data Inserted successfully! <br>';
    echo '<a href="index.php">RETURN TO DISPLAY</a>';

?>