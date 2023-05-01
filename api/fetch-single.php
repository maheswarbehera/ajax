<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// This is the data which is being sent to request a single data.
// Since we know this request will be in json format we must decode before passing it into our php logic
// file_get_contents is reading file into a string. 
// "php://input" is special key which insure that we can get any format of data. Even if its raw data.
// True argument of json decode makes sure that we get response in assoc array
$data = json_decode(file_get_contents("php://input"), true);

// we are getting our passed data in $data array. But to ensure securty we will change name of id to uid. Remember we are being requested data on basis of uid after all.
$user_id = $data['uid'];

// Ajax Form
// $user_id = $_GET['get_id'];

include 'config.php';

$sql = "SELECT * FROM admin WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  //mysqli_fetch_all gives us the data in 2D array format.
  // It's second parameter decide whether its assoc array or indexed. Or maybe both
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

  //echo json_encode($data);
  echo json_encode($data[0]);
} else {
  echo json_encode(['message' => 'No User Data Found!', 'status' => false]);
}
?>