<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// To update is similar to insert. Except in rest api update request is done throough PUT method

// $data = json_decode(file_get_contents("php://input"), true);

$user_id = $_POST['uid'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];

include 'db.php';

$sql = "update admin_user set firstname = '$fname', lastname = '$lname', email = '$email' where user_id = '$user_id'";

if (mysqli_query($con, $sql)) {
  echo json_encode(['msg' => 'User Updated Successfully!', 'status' => true]);
} else {
  echo json_encode(['msg' => 'User Failed to be Updated!', 'status' => false]);
}

?>