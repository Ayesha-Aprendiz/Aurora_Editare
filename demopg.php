<?php
// Database connection
$host = 'localhost'; // Replace with your database host
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$dbname = 'Aurora_Editare'; // Replace with your database name

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
    <title>Admin Page</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        input {
            padding: 5px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <h1>Admin Page</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <form method="POST" action="">
                        
                        <td>
                            <input type="text" name="name" value="<?php echo $row['u_name']; ?>">
                        </td>
                        <td>
                            <input type="text" name="email" value="<?php echo $row['u_email']; ?>">
                        </td>
                        <td>
                            <input type="text" name="passwd" value="<?php echo $row['u_passwd']; ?>">
                        </td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $row['u_email']; ?>">
                            <button type="submit" name="update">Update</button>
                        </td>
                        <td>
                            <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>
                        </td>
                    </form>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Close connection
$conn->close();
?>