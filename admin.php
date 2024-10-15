<?php include('./Database/dbconn.php')?>
<?php 
    $res=mysqli_query($conn, "SELECT * FROM users");
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
<body id="adminpage">
    <h1>Admin Panel</h1>
    <h2>All Users</h2>
    <table class="rec_table">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php while ($user = $res->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['u_name']); ?></td>
            <td><?php echo htmlspecialchars($user['u_email']); ?></td>
            <td><?php echo htmlspecialchars($user['u_passwd']); ?></td>
            <td><button class="cssbuttons-io">
                  <a style="color: white;" href="update_user.php"><span>Delete</span> </a>
                </button> </td></td>
                <td><button class="cssbuttons-io">
                  <a style="color: white;" href="update_user.php"><span>Update</span> </a>
                </button> </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
