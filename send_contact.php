<?php
// Include the database connection file
include('db_config.php');

// Check if the form is submitted
if (isset($_POST['submit'])) {

    // Sanitize input data to prevent SQL Injection
    $name    = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email   = mysqli_real_escape_string($conn, $_POST['email']);
    $sub     = mysqli_real_escape_string($conn, $_POST['subject']);
    $msg     = mysqli_real_escape_string($conn, $_POST['message']);

    // 1. Insert data into MySQL database (Required for Lab project)
    $query = "INSERT INTO contact_messages (full_name, email, subject, message) 
              VALUES ('$name', '$email', '$sub', '$msg')";

    if (mysqli_query($conn, $query)) {
        
        // 2. Define the recipient email address
        $to = "s.alsarhayd@gmail.com";
        
        // Prepare the message body for the mailto link
        $body = "Name: $name %0D%0A Email: $email %0D%0A Message: $msg";
        
        // 3. Client-side redirection to open the default mail application
        // This ensures the message is sent even without a local SMTP server configured
        echo "<script>
        // Notify the user to proceed with the email client
        alert('Success! Your message has been prepared.\\n\\nPlease switch to your email application to finalize and send the message.');
        
        // Trigger the system default email client using mailto protocol
        window.location.href = 'mailto:$to?subject=$sub&body=$body';
        
        // Redirect the user back to the dashboard/index after a 3-second delay
        // This provides enough time for the mailto protocol to launch
        setTimeout(function(){ 
            window.location.href='index.php'; 
        }, 3000);
      </script>";
    } else {
        // Display database error if the query fails
        echo "Database Error: " . mysqli_error($conn);
    }
} else {
    // Redirect to home if accessed directly without form submission
    header("Location: index.php");
}

// Close the database connection
mysqli_close($conn);
?>