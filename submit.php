<?php
// Start or resume a session
session_start();
require_once 'db.php'; // Include database connection



// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

     // Validate form data
     if (empty($name)) {
        $errors[] = "Name is required";
    }

    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($address)) {
        $errors[] = "Address is required";
    }

    // If there are errors, send validation errors in JSON format
    if (!empty($errors)) {
        http_response_code(400);
        echo json_encode(array("statusCode" => 400, "message" => "Validation errors", "errors" => $errors));
        exit();
    }


    try {
        // Prepare INSERT statement
        $stmt = $conn->prepare("INSERT INTO company (name, email, address) VALUES (:name, :email, :address)");
        
        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        
        // Execute the statement
        $stmt->execute();

        $_SESSION['message'] = "Data added successfully";
        // Send success response in JSON format
        echo json_encode(array("statusCode" => 200 , "message"=>"succeddsl done hclarelhlh"));
        exit();
    } catch(PDOException $e) {
        // Send error response in JSON format
        http_response_code(500);
        echo json_encode(array("statusCode" => 500 , "message"=>"succeddsl done hclarelhlh"));
        exit();
    }
}

?>
