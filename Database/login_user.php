<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php include('dbconn.php');

    if(isset($_POST["submit"])) 
    {
        $email = $_POST["email"];
        $password = $_POST["passwd"];
        
        $res=mysqli_query($conn,"SELECT * FROM users where u_email='$email' AND u_passwd='$password'");
        $row = mysqli_fetch_assoc($res);
            if(($row && $row['u_email'] == 'admin@gmail.com') && ($row['u_passwd'] == 'admin'))
            {
                header("location:/Aurora_Editare/admin.php");
            }
            else
            {
                if(($row && $row['u_email'] ===  $email) && ($row['u_passwd'] === $password)) 
                {
                    header("location:../mainpg.php");
                }
                if(($row && $row['u_email']!==$email)&&($row['u_passwd']!==$password))
                {
                    echo 'denied';
                    echo '<script>
                    Swal.fire({
                        title: "<strong>Invalid Email</strong>",
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
                    // header("location:../Reg.php");
                }
            }        
            // if(($email == '') && ($password == '')) {
            //     echo "<script language='javascript'>";
            //     echo "alert('Invalid Inputs')";
            //     die();
            //     echo "</script>";
            // }
            // else
            // {
            //     echo "<script language='javascript'>";
            //     echo "alert('WRONG INFORMATION')";
            //     echo "</script>";
            //     header("location:../login.php");
            // }
        }
    ?>
    
