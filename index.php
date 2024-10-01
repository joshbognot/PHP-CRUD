<?php
include "conn.php";

/* JOIN lang pala dapat fuck shit
   tapos CASCADING FK 
   (okay lang 5 points sa lab exam ><)*/
$sql = "SELECT students.student_id, students.first_name, students.last_name, students.date_of_birth, students.section, 
               subjects.subject_title, subjects.subject_desc, subjects.instructor, 
               enrollment.enrollment_id, enrollment.date_of_enrollment
        FROM enrollment
        JOIN students ON enrollment.student_id = students.student_id
        JOIN subjects ON enrollment.subject_id = subjects.subject_id";

$result = mysqli_query($conn, $sql);

    echo "<table border='1'>
            <tr>
                <th>Student ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Section</th>
                <th>Subject Title</th>
                <th>Subject Description</th>
                <th>Instructor</th>
                <th>Date of Enrollment</th>
                <th>ACTIONS</th>
                
            </tr>";

    // Output data of each row
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
                <td>" . $row['student_id'] . "</td>
                <td>" . $row['first_name'] . "</td>
                <td>" . $row['last_name'] . "</td>
                <td>" . $row['date_of_birth'] . "</td>
                <td>" . $row['section'] . "</td>
                <td>" . $row['subject_title'] . "</td>
                <td>" . $row['subject_desc'] . "</td>
                <td>" . $row['instructor'] . "</td>
                <td>" . $row['date_of_enrollment'] . "</td>
                <td>
                    <a href='delete.php?enrollment_id=" . $row["enrollment_id"] . ">DELETE |</a>
                    <a href='updatedisplay.php?enrollment_id=" . $row["enrollment_id"] . "> UPDATE</a>
                </td>
              </tr>";
              
              
              
    }

    echo "<a href='insertdisplay.php?enrollment_id=" . $row["enrollment_id"] . "> INSERT DATA</a>";
    echo "</table>";

?>