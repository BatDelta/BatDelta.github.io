<?php
  include 'connect.php';// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$email = mysqli_real_escape_string($conn, $_REQUEST['email-box']);
// attempt insert query execution
$sql = "INSERT INTO mailList (SubId, email) VALUES (NULL ,'$email')";
if(mysqli_query($conn, $sql)){
    echo "Successfully subscribed to our mailing list.";
    echo "<br />";
    echo "You will be redirected to the Home Page in 5 seconds.";
    header('refresh: 5; url=index.html');
} else{
    echo "ERROR: Could not able to execute. " . mysqli_error($conn);
    echo "<br />";
    echo "You will be redirected to the Home Page in 15 seconds.";
    header('refresh: 15; url=index.html');
}
// close connection
mysqli_close($conn);
?>
