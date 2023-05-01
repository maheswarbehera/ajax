<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// Since we are inserting data we pass two extra headers.
// 1st allow us to set the method of insert. i.e. POST in rest api
// 2nd determines which type of headers can be sent. It's a secuirty header.
// 'Authorization' is set for authorizing insert data. While 'X-Requested-With' is set for passing data as json
$data = json_decode(file_get_contents("php://input"), true);

$fname = $data['firstname'];
$lname = $data['lastname'];
$email = $data['email'];

// Ajax Form
// $fname = $_POST['firstname'];
// $lname = $_POST['lastname'];
// $email = $_POST['email'];

include 'config.php';

$sql = "INSERT INTO admin (firstname, lastname, email) VALUES ('$fname', '$lname', '$email')";

if (mysqli_query($conn, $sql)) {
  echo json_encode(['message' => 'User Inserted Successfully!', 'status' => true]);
} else {
  echo json_encode(['message' => 'User Failed to be Inserted!', 'status' => false]);
}
?>