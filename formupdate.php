<?php 
$connect =  mysqli_connect("localhost", "root", "", "employees");  //open connection
// Check connection
if ($connect->connect_error) {
    die("Connection failed : " . $connect->connect_error);
}

if(isset($_GET['ID'])){ 
    echo $ID=$_GET['ID'];
    $mysqli = "SELECT id, firstname, lastname FROM details where ID=".$ID;
    $result = mysqli_query($connect, $mysqli);
    $row = mysqli_fetch_array($result);
     var_dump($row);exit;
}


?>


<!DOCTYPE html>
<html>
    <head>
<title>Update Employee Form</title>
</head>

<body>
<form action="update.php" method="POST">
   <table>

          <tr>
       <td> First Name </td>
             <td><input type="text" name="FirstName"></td>
     </tr>

<tr>
 <td>  Last Name </td>
 <td><input type="text" name="LastName" > </td>
     </tr>
       
        <tr>
            <td>Email  </td>
                <td><input type="text" name="Email" > </td>
             </tr>
   
             <tr>
             <td>Gender </td>
                             <?php 
                                 
                                 $gender =  $row['Gender'];

                                if($gender == 'f'){
                                  
                                    echo "<input type='radio' name='Gender2' value='$gender' checked >Female";
                                  
                                }elseif($gender == 'm'){
                                    
                                    echo "<input type='radio' name='Gender2' value='$gender' checked>Male";

                                }
                                
                                
                            ?>

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
