<?php
  include 'connect.php';// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$gname = mysqli_real_escape_string($conn, $_REQUEST['gname']);
$telephone = mysqli_real_escape_string($conn, $_REQUEST['telephone']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$cname = mysqli_real_escape_string($conn, $_REQUEST['cname']);
$cdob = mysqli_real_escape_string($conn, $_REQUEST['cdob']);
$gender = mysqli_real_escape_string($conn, $_REQUEST['gender']);
// attempt insert query execution
$sql = "INSERT INTO enrollment (Id, gname, telephone, email, cname, cdob, gender) VALUES (NULL ,'$gname', '$telephone', '$email','$cname','$cdob','$gender')";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
    echo "<br />";
    echo "You will be redirected to the Enrollment Page in 5 seconds.";
    header('refresh: 5; url=index.html');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    echo "<br />";
    echo "You will be redirected to the Enrollment Page in 5 seconds.";
    header('refresh: 5; url=index.html');
}
// close connection
mysqli_close($conn);
?>
