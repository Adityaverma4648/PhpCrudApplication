<?php
include "./config/conn.php";
include "./config/session.php";
include "./Components/Header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Info</title>
    <!--  bootstrap 5 -->
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ---------------------------------------------------------- -->
    <!--  google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Poppins:wght@500;600&family=Raleway&family=Roboto&display=swap" rel="stylesheet">
    <!--  fonts imports ends here -->
    <!-- fontawesome icons -->
    <script src="https://kit.fontawesome.com/8dc03a4776.js" crossorigin="anonymous"></script>
    <!-- fontawesome icons -->
    <link rel="stylesheet" href="./styles/style.css">

</head>

<body>
    <section class="container bg-light d-flex flex-column justify-content-center align-items-center">
        <form class="d-flex flex-column justify-content-center align-items-center">
            <label for="phoneNumber">
                <span class="px-1">
                    +91
                </span>
                <input type="number" placeholder="Enter your phone Number" name="phoneNumber">
            </label>
            <label for="address">
                <textarea type="text" placeholder="Enter your address" name="address"></textarea>
            </label>
            <label for="">
                <input type="text" placeholder="Enter your phone Number">
            </label>
            <small>
                Available Blood groups
            </small>
            <label for="A+">
                <input type="checkbox" value="A+"> A+ </input>
            </label>
            <label for="A-">
                <input type="checkbox" value="A+"> A+ </input>
            </label>
            <label for="A+">
                <input type="checkbox" value="A+"> A+ </input>
            </label>
            <label for="A+">
                <input type="checkbox" value="A+"> A+ </input>
            </label>
            <label for="A+">
                <input type="checkbox" value="A+"> A+ </input>
            </label>
            <label for="A+">
                <input type="checkbox" value="A+"> A+ </input>
            </label>
            <label for="A+">
                <input type="checkbox" value="A+"> A+ </input>
            </label>
            <input type="checkbox" value="A+"> A- </input>
            <input type="checkbox" value="A+"> B+ </input>
            <input type="checkbox" value="A+"> B- </input>
            <input type="checkbox" value="A+">A B+ </input>
            <input type="checkbox" value="A+">A B- </input>
            <input type="checkbox" value="A+"> O+ </input>
            <input type="checkbox" value="A+"> O- </input>

        </form>
    </section>
</body>

</html>