<?php 
session_start();
require_once 'db.php';

if($_SERVER["REQUEST_METHOD"]== "POST"){
    // echo "sdhfklsdj";

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    try{

        $editdata = $conn->prepare("UPDATE company SET name = :name, email = :email ,address = :address WHERE id = :id");
        $editdata->bindParam(':id', $id);
        $editdata->bindParam(':name', $name);
        $editdata->bindParam(':email', $email);
        $editdata->bindParam(':address', $address);

        $editdata->execute();

        // header("Location:index.php");
        // exit();
        // echo "done";
        $_SESSION['message'] = "Data update successfully";
        // Send success response in JSON format
        echo json_encode(array("statusCode" => 200 , "message"=>"date update successfully"));
        exit();
    }
    catch(Exception $e){ 
        // echo "Error:". $e->getMessage();
        http_response_code(500);
        echo json_encode(array("statusCode" => 500 , "message"=>"succeddsl done hclarelhlh"));
        exit();
    }
    
}

$conn = null; // Close connection

?>
