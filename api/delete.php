<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// To delete in rest api, we use DELETE method
$data = json_decode(file_get_contents("php://input"), true);

$user_id = $data['uid'];

// Ajax Form
// $user_id = $_GET['delete_id'];

include 'config.php';
$sql = "DELETE FROM admin WHERE user_id = '$user_id'";

if (mysqli_query($conn, $sql)) {
  echo json_encode(['message' => 'User Deleted Successfully!', 'status' => true]);
} else {
  echo json_encode(['message' => 'User Failed to be Deleted!', 'status' => false]);
}

?>