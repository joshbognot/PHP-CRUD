<?php 
    include 'conn.php';

    // GETTING VALUES from form
    $enrollment_id = $_POST['enrollment_id'];
    $student_id = $_POST['student_id'];
    $subject_id = $_POST['subject_id'];
    $date_of_enrollment = $_POST['date_of_enrollment'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $section = $_POST['section'];
    $subject_title = $_POST['subject_title'];
    $subject_desc = $_POST['subject_desc'];
    $instructor = $_POST['instructor'];

    // QUERIES

    // Update student
    $student = "UPDATE students 
            SET first_name='$first_name', last_name='$last_name', 
            date_of_birth='$date_of_birth', section='$section' 
            WHERE student_id = $student_id";

    mysqli_query($conn, $student);

    // Update subjects
    $subject = "UPDATE subjects 
            SET subject_title='$subject_title', subject_desc='$subject_desc', 
                instructor='$instructor' 
            WHERE subject_id = $subject_id";

    mysqli_query($conn, $subject);

    // Update enrollment
    $enrollment = "UPDATE enrollment 
                SET date_of_enrollment = '$date_of_enrollment' 
                WHERE enrollment_id = $enrollment_id";

    mysqli_query($conn, $enrollment);

    echo 'Data Updated successfully! <br>';
    echo '<a href="index.php">RETURN TO DISPLAY</a>';
?>
