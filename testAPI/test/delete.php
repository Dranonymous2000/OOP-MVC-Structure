<?php
    header("Access-Control-Allow-Methods: GET");
    require_once"../classes/Auth.php";
    $user = new User();
   
   if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $user->delete($id);
    } else {
        http_response_code(405); // Method Not Allowed
        echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    }
}
 else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}

?>