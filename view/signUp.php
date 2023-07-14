<?php
if (isset($_SESSION['User'])) {
    header('Location: /home');
}
?>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Sign Up Page</title>
    <!---->
    <style>
        .form-control{
            width: 20em;
        }
        body{
            background-color: #2b2b2b;
            display: grid;
            place-items: center;
        }
        .errMsg{
            color: #fff;
            background-color: #1e1e1e;
            padding: 10px;
            text-align: center;
            border-radius: 7px;
        }
        form{
            background-color: white;
            border: 3px solid deepskyblue;
            width: 25em;
            padding: 25px;
        }
        a.btn.btn-primary {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <!---->
</head>
<body>

<form action="/createUser" method="post">

    <?php
        if (isset($_SESSION['signUpError'])){
    ?>
    <h4 class="errMsg"><?php echo $_SESSION["signUpError"];?></h4>
    <?php
        unset($_SESSION["signUpError"]);
    }
    else{
        unset($_SESSION["signUpError"]);
    }
    ?>
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" placeholder="Enter Username..." required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter E-mail..." required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="pwd" class="form-control" placeholder="Enter Password..." required>
    </div>
    <button type="submit" class="btn btn-primary">Sign Up</button>
    <br><br>
    <a class="btn btn-primary" href="/login">Login</a>

</form>
</body>
</html>