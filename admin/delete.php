<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// To delete in rest api, we use DELETE method
//$data = json_decode(file_get_contents("php://input"), true);

$user_id = $_GET['get_id'];

include 'db.php';
$sql = "delete from admin_user where user_id = '$user_id'";

if (mysqli_query($con, $sql)) {
  echo json_encode(['msg' => 'User Deleted Successfully!', 'status' => true]);
} else {
  echo json_encode(['msg' => 'User Failed to be Deleted!', 'status' => false]);
}

?>