<?php
$servername = "localhost";
$port = 3306;
$username = "smartle6_smartle6";
$password = "Islam2020.1";
$database = "smartle6_personalweb";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['fullName'];
$email = $_POST['email'];
$comment = $_POST['comment'];

// SQL query to insert data into the "message" table
$sql = "INSERT INTO message (fullName, email, comment)
        VALUES ('$name', '$email', '$comment')";

if ($conn->query($sql) === TRUE) {
    $to = "admin@devabdul.com.ng,iamabdullahitijani@gmail.com";
    $subject = "Website Message Received";
    $message = "Newsletter Details\n\n";
    $message .= "Name: $fullName\n";
    $message .= "Email: $email\n";
    $message .= "Message: $comment\n";
    $headers = "From: admin@devabdul.com.ng\r\n";
    $headers .= "Reply-To: iamabdullahitijani@gmail.com, admin@devabdul.com.ng\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    mail($to, $subject, $message, $headers);

    // Redirect to the current page
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
