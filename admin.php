<?php include('./Database/dbconn.php')?>
<?php 
    // $res=mysqli_query($conn, "SELECT * FROM users");
    
    // Update record
    if (isset($_POST['update'])) {
        echo "<script>alert('sdf')</script>";
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['passwd'];

        $sql = "UPDATE users SET u_name='$name', u_email='$email', u_passwd='$password' WHERE u_email='$email'";
        $conn->query($sql);

        if($conn->query($sql)==true)
        {
            echo '<script>alert("done");</script>';
        }
        else{
            echo '<script>alert("not done");</script>';
        }
    }

    // Delete record
    if (isset($_POST['delete'])) {
        
        $email = $_POST['email'];

        $sql = "DELETE FROM users WHERE u_email='$email'";
        $conn->query($sql);
    }
    // Fetch records from database
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aurora</title>
    <link rel="icon" type="image/x-icon" href="images/weblogo.png">
    <link rel="stylesheet" href="css/adminpg.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap');
    </style> 
</head>
<body>
    <a href="home.php">
    <button class="Btn" >
        <div class="sign">
            <svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
        <div class="text">Home</div>
    </button>
    </a>
    <div class="admin-section">
    <h1>Admin Panel</h1>
    <h2>All Users</h2>
    <table class="rec_table">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php while ($user = $result->fetch_assoc()): ?>
        <form method="POST" action="">
        <tr>
        <td>
            <input type="text" name="name" value="<?php echo $user['u_name']; ?>">
        </td>
        <td>
            <input type="text" name="email" value="<?php echo $user['u_email']; ?>">
        </td>
        <td>
            <input type="text" name="passwd" value="<?php echo $user['u_passwd']; ?>">
        </td>
        <td>
            <button type="submit"  class="cssbuttons-io" name="update" >
            <a style="color: white;" ><span>Update</span> </a>
            </button> 
        </td>
        <td>
            <button type="submit" class="cssbuttons-io" name="delete" onclick="return confirm('Are you sure you want to delete this record?');">
            <a style="color: white;" ><span>Delete</span> </a>
        </button> 
        </td>
        </tr>
        </form>
        <?php endwhile; ?>
    </table>    

    </div>
   
</body>
</html>
