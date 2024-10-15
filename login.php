<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aurora</title>
    <link rel="icon" type="image/x-icon" href="images/weblogo.png">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login_pg.css">
</head>
<body>
    <div id="d1">
        <div class="container2">
        <form method="POST" action="Database/login_user.php">
            <div class="card_box">
                <span class="loginSpan"></span>
                <!-- <br/>  <br/> -->
                <div class="form_container">
                    <div class="form__group field">
                        <input type="input" name="email" class="form__field" placeholder="Email" required="">
                        <label for="name" class="form__label">Email</label>
                    </div>
                    <div class="form__group field">
                        <input type="password" name="passwd" class="form__field" placeholder="Password" required="">
                        <label for="name" class="form__label">Password</label>
                    </div>
                    <p class="loginMessage"> Don't have an Account? <a href="Reg.php"> Sign Up </a> </p>
                    <div class="submitContainer loginContainer">
                        <button name="submit">
                            <span id="sp" class="text">Sign In</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</body>
</html>