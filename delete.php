<?php
require_once 'db.php'; // Include database connection

// Check if ID parameter is set and is numeric
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Prepare DELETE statement
        $stmt = $conn->prepare("DELETE FROM company WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Redirect back to the previous page after deletion
        header("Location: index.php"); // Replace 'index.php' with the appropriate page URL
        exit();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid ID.";
}

$conn = null; // Close connection
?>
