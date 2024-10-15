<html>
    <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
</html>
<?php
    include "dbconn.php";

    if (isset($_POST["submit"])) {
       
        $email = $_POST['email'];

        // Check if user exists
        $result = $conn->query("SELECT * FROM users WHERE u_email = '$email'");

        if ($result->num_rows > 0) {
            // Show SweetAlert
            echo 'denied';
            echo '<script>
            Swal.fire({
                title: "<strong>This Email is already Registered</strong>",
                icon: "info",
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                cancelButtonAriaLabel: "Thumbs down"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "../Reg.php"; // JavaScript redirect
                }
            });
        </script>';
        } 
        else 
        {
            // Register new user
            if ($conn->query("INSERT INTO users(u_name,u_email,u_passwd) VALUES ('$_POST[name]', '$_POST[email]','$_POST[passwd]')"))
            {
                echo "Registration successful!";
                header("location:\Aurora_Editare\mainpg.php");
            } 
            else {
                echo "Error: " . $conn->error;
            }
        }
    }



?>