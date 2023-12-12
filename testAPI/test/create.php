<?php
    header("Access-Control-Allow-Methods: POST");
    require_once"../classes/Auth.php";
    $user = new User();
   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the POST request
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $upload = isset($_POST['upload']) ? $_POST['upload'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Call the register method with the retrieved data
    $user->register($name, $phone, $email, $dob, $address, $upload, $password);
}else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}

?>