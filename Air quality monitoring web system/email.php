<?php
// Include your database connection file
include 'db.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email (basic validation for demonstration)
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    
    if ($email === false) {
        // Invalid email format
        $response = array("status" => 0, "message" => "Invalid email format.");
    } else {
        // Process the subscription and insert into database
        $sql = "INSERT INTO subscribers (email) VALUES (?)";
        
        // Prepare statement
        $stmt = $conn->prepare($sql);
        
        // Bind parameters
        $stmt->bind_param("s", $email);
        
        // Execute statement
        if ($stmt->execute()) {
            // Subscription successful
            $response = array("status" => 1, "message" => "Subscription successful. Thank you!");
        } else {
            // Error inserting email
            $response = array("status" => 0, "message" => "Failed to subscribe. Please try again later.");
        }
        
        // Close statement
        $stmt->close();
    }
} else {
    // Invalid request method
    $response = array("status" => 0, "message" => "Invalid request method.");
}

// Close database connection
$conn->close();

// Return JSON response
header("Content-Type: application/json");
echo json_encode($response);
?>
