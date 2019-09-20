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
$male = $_POST['Gender'];
$female = $_POST['Gender2'];
$dateofbirth = $_POST['DoB'];
$id = $_POST['ID'];
$education = $_POST['Education'];

//update query
/*if(isset($_POST['update'])){

    $mysqli = "UPDATE 'details' SET  'FirstName=". $firstname." ' , 'LastName=". $lastname." ',  WHERE  'id' = .$ID";
    $result = mysqli_query($connect,$mysqli);
     
    if($result)
{
    echo 'Data Updated';
}
else{
    echo 'Data not Updated';
}
  */}
 //$mysqli = "UPDATE details SET FirstName='Ian' WHERE id=444";

require_once("formupdate.php");
if(count($_POST)>0) {
	$mysqli = "UPDATE details set FirstName='" . $_POST["FirstName"] . "', LastName='" . $_POST["LastName"] . "' 
    WHERE ID='" . $_POST["ID"] . "'";
	mysqli_query($connect,$mysqli);   
}

$select_query = "SELECT * FROM details WHERE Id='" . $_POST["ID"] . "'";
$result = mysqli_query($connect,$select_query);
$row = mysqli_fetch_array($result);



if(mysqli_query($connect, $mysqli)){ //check records edited succesfully
    echo "Records updated successfully.";
} else{
    echo "ERROR: Could not update $mysqli. " . mysqli_error($connect);
}
     
 mysqli_close($connect); //close connection
?>