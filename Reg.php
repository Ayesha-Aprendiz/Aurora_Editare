<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="logo.jpeg">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/reg_pg.css">
    <title>Aurora</title>
    <link rel="icon" type="image/x-icon" href="images/weblogo.png">


</head>
<style>

</style>

<body>
    <div id="d1">
        <div class="container2">
        <form method="POST" action="Database/reg_user.php">
            <div class="card_box">
                <span class="ribbonSpan"></span>
                <!-- <br/>  <br/> -->
                
                <div class="form_container">
                    <div class="form__group field">
                        <input type="input" name="name" class="form__field" placeholder="Name" required="">
                        <label for="name" class="form__label">Name</label>
                    </div>
                    <div class="form__group field">
                        <input type="input" name="email" class="form__field" placeholder="Email" required="">
                        <label for="name" class="form__label">Email</label>
                    </div>
                    <div class="form__group field">
                        <input type="password" name="passwd" class="form__field" placeholder="Password" required="">
                        <label for="name" class="form__label">Password</label>
                    </div>
                    <div class="form__group field">
                        <input type="password" class="form__field" placeholder="Confirm Password" required="">
                        <label for="name" class="form__label">Confirm Password</label>
                        <!-- <br/> <br/> -->
                        <p> Already registered? <a href="login.php"> Sign In </a> </p>
                        <div class="submitContainer">
                            <button name="submit">
                                <span id="sp" class="text">Sign Up</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
                
</body>

</html>