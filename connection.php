<?php
$connect =  mysqli_connect("localhost", "root", "", "employees");  //open connection
// Check connection
if ($connect->connect_error) {
    die("Connection failed : " . $connect->connect_error);
}

//check if we submitted the form
if(isset($_POST['submit'])){ 
   
$firstname = $_POST['FirstName'];
$lastname = $_POST['LastName'];
$email = $_POST['Email'];
$gender = $_POST['Gender'];
$dateofbirth = $_POST['DoB'];
$id = $_POST['ID'];
$education = $_POST['Education'];

insert info
$mysqli = "INSERT INTO details(ID,DoB,Email,FirstName,LastName,Gender,Education)
VALUES('$id', '$dateofbirth', '$email', '$firstname', '$lastname', '$gender', '$education')";

//update
if(isset($_POST['update'])){

    $mysqli = "UPDATE 'details' SET  'FirstName=". $firstname."', 'LastName' = ". $lastname. "' WHERE  'id' = $id";

    $result = mysqli_query($connect,$mysqli);
     
    if($result)
{
    echo 'Data Updated';
}
else{
    echo 'Data not Updated';
}


}

if(mysqli_query($connect, $mysqli)){ //check records inserted succesfully
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not execute $mysqli. " . mysqli_error($connect);
}
   }  
 mysqli_close($connect); //close connection
?>