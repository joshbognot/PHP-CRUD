<?php 
    include "conn.php";

        $enrollment_id = $_GET['enrollment_id'];

        // Fetch data from enrollment
        $sql = "SELECT * FROM enrollment WHERE enrollment_id = $enrollment_id";
        $result = mysqli_query($conn, $sql);
        $enrollment = mysqli_fetch_array($result);
    
        // Fetch student data
        $student_id = $enrollment['student_id'];
        $sql = "SELECT * FROM students WHERE student_id = $student_id";
        $student_result = mysqli_query($conn, $sql);
        $student = mysqli_fetch_array($student_result);
    
        // Fetch subject data
        $subject_id = $enrollment['subject_id'];
        $sql = "SELECT * FROM subjects WHERE subject_id = $subject_id";
        $subject_result = mysqli_query($conn, $sql);
        $subject = mysqli_fetch_array($subject_result);

        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Data</title>
</head>
<body>
    <h1>Insert Data</h1>
    <form method="POST" action="insert.php">
        <input type="hidden" name="enrollment_id" value="<?php echo $enrollment['enrollment_id']; ?>">
        
        <h2>Student Information</h2>
        <input type="hidden" name="student_id" >
        First Name: <input type="text" name="first_name"  required><br>
        Last Name: <input type="text" name="last_name"  required><br>
        Date of Birth: <input type="date" name="date_of_birth"  required><br>
        Section: <input type="text" name="section" required><br>

        <h2>Subject Information</h2>
        <input type="hidden" name="subject_id" value="<?php echo $subject['subject_id']; ?>">
        Subject Title: <input type="text" name="subject_title" required><br>
        Subject Description: <input type="text" name="subject_desc" required><br>
        Instructor: <input type="text" name="instructor" required><br>

        <h2>Enrollment Information</h2>
        Date of Enrollment: <input type="date" name="date_of_enrollment" required><br>
        
        <input type="submit" value="Insert Data">
    </form>
</body>
</html>