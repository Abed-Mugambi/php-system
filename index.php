<?php 
$connect =  mysqli_connect("localhost", "root", "", "employees");  //open connection
// Check connection
if ($connect->connect_error) {
    die("Connection failed : " . $connect->connect_error);
}

if(isset($_GET['ID'])){ 
    $ID=$_GET['ID'];
    $mysqli = "SELECT * FROM details where ID=".$ID;
    $result = mysqli_query($connect, $mysqli);
    $row = mysqli_fetch_array($result);
}

/*if(!empty ($_POST['submit']) && $_POST['submit'] == "true"){
    if (empty($_POST['FirstName'])){
        echo 'Please fill in your first name';
    }
    else {
        $firstname= $_POST['FirstName'];
    }
}*/



?>


<!DOCTYPE html>
<html>
    <head>
<title>Employee Register Form</title>
</head>

<body>
<form action="connection.php" method="POST">
   <table>

          <tr>
       <td> First Name </td>
             <td><input type="text" name="FirstName" value="<?php print $row['FirstName']; ?>" ></td>
     </tr>

<tr>
 <td>  Last Name </td>
 <td><input type="text" name="LastName" value="<?php print $row['LastName']; ?>"> </td>
     </tr>
       
        <tr>
            <td>Email  </td>
                <td><input type="text" name="Email" value="<?php print $row['Email']; ?>"> </td>
             </tr>
            
             <tr>
             <td>Gender </td>
                                <td>
                 <input type="radio" name="Gender" value="Male" value="<?php print $row['Male']; ?>" >Male
                <input type="radio" name="Gender" value="Female" value="<?php print $row['Female']; ?>" >Female
                </td>
                          </tr>

                         <tr>
                          <td> Education </td>
                             <td><select name="Education" value="<?php print $row['Education']; ?>"> >
                                <option value = "Form 4" > Form 4</option>
                                    <option value = "Diploma"> Diploma</option>
                                     <option value = "Degree"> Degree</option>
                                     <option value = "Masters"> Masters</option>
                                     <option value = "PHD"> PHD</option>
                                    </select>  
                                    </td>
                                      </tr>

                            <tr>
                             <td>DoB </td>
                                <td><input type="date" name="DoB" value="<?php print $row['DoB']; ?>"> </td>
                             </tr>
                                                   
                         <tr>
                     <td>ID  </td>
                             <td><input type="number" name="ID"  > </td>
                     </tr>
</table>

<input type="submit" value="Submit" name="submit">

</form>
</body>
</html>
