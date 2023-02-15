<?php
include "./config/conn.php";
include "./config/session.php";
include "./Components/Header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $licenseNumber = mysqli_real_escape_string($conn, $_POST['licenseNumber']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $availableBloodGroup = $_POST['availableBloodGroup'];
    $xyz = implode(",", $availableBloodGroup);
    echo $xyz;

    $sql = "INSERT INTO `additionalInfo` (licenseNumber,phoneNumber,category,availableBloodGroup) VALUES ('$licenseNumber','$phoneNumber','$category','$availableBloodGroup')";

    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "Data Updated :)";
    } else {
        echo "Couldn't Update Data :(";
    }
}

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
    <style>
        .AddInfo {
            height: 93vh;
            width: 100vw;
            background-color: #17695b;
        }

        .AddInfo form {
            height: 60vh;
            width: 45vw;
            padding: 1rem;
            background-color: grey;
            box-shadow: 5px 8px 15px rgba(0, 0, 0, 0.4);
        }
    </style>
</head>

<body>
    <section class="AddInfo container bg-light d-flex flex-column justify-content-center align-items-center">
        <h5 class="container text-center">
            Add Additional Information
        </h5>
        <form class="d-flex flex-column justify-content-center align-items-center">
            <label for="licenseNumber" class="container-fluid d-flex flex-column justify-content-center align-items-center">
                <small>
                    Enter license Number
                </small>
                <input type="text" name="liceneNumber" placeholder="Enter your License Number" class="container">
            </label>


            <small>
                Available Blood groups
            </small>
            <div class="col-sm-8">
                <label for="availableBLoodGroup" class="container-fluid d-flex flex-column justify-content-center align-items-center">
                    <table class="table table-striped container">
                        <tbody>
                            <tr>
                                <td>A+</td>
                                <td>
                                    <input type="checkbox" name="availableBloodGroup" value="A+" class="container"></input>
                                </td>
                            </tr>
                            <tr>
                                <td>A-</td>
                                <td><input type="checkbox" name="availableBloodGroup" value="A-" class="container"></input></td>
                            </tr>
                            <tr>
                                <td>O+</td>
                                <td><input type="checkbox" name="availableBloodGroup" value="O+" class="container"></input></td>
                            </tr>
                            <tr>
                                <td>O-</td>
                                <td><input type="checkbox" name="availableBloodGroup" value="O-" class="container"></input></td>
                            </tr>
                            <tr>
                                <td>AB+</td>
                                <td><input type="checkbox" name="availableBloodGroup" value="AB+" class="container"></input></td>
                            </tr>
                            <tr>
                                <td>AB-</td>
                                <td><input type="checkbox" name="availableBloodGroup" value="AB-" class="container"></input></td>
                            </tr>
                            <tr>
                                <td>B+</td>
                                <td><input type="checkbox" name="availableBloodGroup" value="B+" class="container"></input></td>
                            </tr>
                            <tr>
                                <td>B-</td>
                                <td><input type="checkbox" name="availableBloodGroup" value="B-" class="container"></input></td>
                            </tr>
                        </tbody>
                    </table>
                </label>
            </div>
            <input type="submit" value="Save Changes" name="submitAddInfo" id="submitAddInfo">
        </form>
    </section>
</body>

</html>