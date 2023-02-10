<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!--  google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Poppins:wght@500;600&family=Raleway&family=Roboto&display=swap" rel="stylesheet">
    <!--  fonts imports ends here -->
    <!-- fontawesome icons -->
    <script src="https://kit.fontawesome.com/8dc03a4776.js" crossorigin="anonymous"></script>
    <!-- fontawesome icons -->
    <link rel="stylesheet" href="./styles/style.css">

    <style>
        #formContLogin {
            height: 90vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #formContLogin form {
            padding: 10px 5px;
            height: 60vh;
            width: 35vw;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #012340;
        }

        #formContLogin input {
            width: 98%;
            margin: 3px 0px;
            padding: 0.5rem 8px;
            border-radius: 2px;
        }

        .text-white {
            color: #fff;
        }

        .bg-success {
            background-color: green;
        }
    </style>
</head>

<body>
    <?php include "./Components/Header.php" ?>
    <div id="formContLogin">
        <form method="POST" id="loginForm">
            <center>
                <h4 class="text-white">
                    LOGIN
                </h4>
            </center>
            <input type="text" name="userName" id="userName" placeholder="Enter userName" required>
            <input type="text" name="email" id="email" placeholder="Enter your email" required>
            <input type="password" name="password" id="password" placeholder="Enter password" required>
            <input type="checkbox" id="showPasswordCheckbox">
            <input type="submit" name="submit" value="Login" id="submit" class="bg-success border-0 text-white">
        </form>
    </div>
    <script src="./scripts/index.js"></script>
</body>

</html>