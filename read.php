<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$connect = mysqli_connect("localhost", "root", "", "employees");
 
// Check connection
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$mysqli = "SELECT * FROM details";

if($result = mysqli_query($connect, $mysqli)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                
                echo "<th>ID</th>";
                echo "<th>DoB</th>";
                echo "<th>Email</th>";
                echo "<th>FirstName</th>";
                echo "<th>LastName</th>";
                echo "<th>Gender</th>";
                echo "<th>Education</th>";
                
            echo "</tr>";
           
        while($row = mysqli_fetch_array($result)){
           //var_dump ($row);
            echo "<tr>"; 
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['DoB'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['FirstName'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "<td>" . $row['Gender'] . "</td>";
                echo "<td>" . $row['Education'] . "</td>";
                echo "<td> 
                <a href='formupdate.php?ID='". $row['ID'].">Update</a>
                 <a href='formdelete.php?ID='". $row['ID']."'>Delete</a>
                 </td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not execute $mysqli. " . mysqli_error($connect);
}
 
// Close connection
mysqli_close($connect);
?>