<!-- <div class="container-fluid top-0 position-absolute d-flex justify-content-center align-items-center" style="height:100vh;z-index:98"> -->
<!-- <div class="bg-danger container d-flex justify-content-center align-items-center mt-2" id="myRequestFormContainer" style="height:30vh;width:30vw;">
</div> -->
<!-- </div> -->

<!--  formPopUpabove  -->
<div class="container bg-light d-flex flex-column">

    <div class="bg-dark py-1 d-flex justify-content-between align-items-center">
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <select name=" limitInp" id="limitSetter" class="px-2 ms-2">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="500">500</option>
            </select>
            <input type="submit" name="setLimitBtn" value="SetLimit">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET["setLimitBtn"])) {
                $myLimit = $_GET["limitInp"];
            }
        }
        ?>
        <div class="text-light me-2 d-flex">
            <div class="me-2 text-primary">
                <i class="fa fa-circle"></i>
                Member
            </div>

            <div class="ms-2 text-danger">
                <i class="fa fa-circle"></i>
                Not Registered
            </div>

        </div>
    </div>
    <div class="bg-secondary text-light px-2">
        <div class="col-sm-4 py-2">
            <span>
                Select State
            </span>
            <select name="state" id="state"></select>
        </div>
    </div>
    <div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        Available Blood Banks
                    </th>
                    <th>
                        State
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Category
                    </th>
                    <th>
                        Contacts
                    </th>
                    <th>
                        Request | Book urgent samples
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT id,uniqueId, userNameReg, state, emailReg,category,phoneNumber FROM `user`";

                $res = $conn->query($sql);
                if ($res) {
                    while ($row = $res->fetch_assoc()) {
                        echo '<tr class="table-primary" id="' . $row["id"] . '">
                                   <td>' . $row["userNameReg"] . '</td>
                                   <td>' . $row["state"] . '</td>
                                   <td>' . $row["emailReg"] . '</td>
                                   <td>' . $row['category'] . '</td>
                                   <td>' . $row["phoneNumber"] . '
                                   </td>
                                   ';
                        if ($row["userNameReg"] == $_SESSION['userName'] && $_SESSION['loggedInStatus']) {
                            echo '<td class="text-success text-center">Already Our Member And LoggedIn</td>';
                        } else {
                            echo '<td class="button-group">
                                   <form method="get">
                                       <a href="Requests.php?id=' . $row["id"] . '" class="text-decoration-none text-white py-1 px-1  border-0 bg-primary mx-1" style="cursor:pointer;" value="Request" >Request</a>
                                       <input type="button" class="py-1 px-1 border-0 bg-danger mx-1" style="cursor:pointer;" value="Cancel" ></input>
                                       <input type="submit"  class="btn btn-dark text-light rounded-0 mx-1" style="cursor:pointer;" name="messagesHandler"
                                       value="Message" ></input>
                                       </form>
                                    </td>
                                </tr>';
                        }
                    }
                }
                ?>
                <?php
                if (isset($myLimit)) {
                    $sql1 = "SELECT Name,State,phoneNumber,Email,Category FROM `blood_banks` LIMIT $myLimit ";
                    $res1 = mysqli_query($conn, $sql1);
                    if ($res1) {
                        while ($row = $res1->fetch_assoc()) {
                            echo "<tr class='table-danger'>
                        <td>" . $row["Name"] . "</td>
                        <td>" . $row["State"] . "</td>
                        <td>" . $row["Email"] . "</td>
                        <td>" . $row["Category"] . "</td>
                        <td>" . $row["phoneNumber"] . "</td>
                        <td class='button-group'>
                        <input type='button' class='py-1 px-1  border-0 bg-primary mx-1 disabled' style='cursor:pointer' value='Request'>
                        </input>
                        <input type='button' class='py-1 px-1 border-0 bg-danger mx-1 disabled' style='cursor:pointer' value='Cancel'>
                        </input><input type='button' class='btn btn-dark text-light rounded-0 mx-1 disabled' style='cursor:pointer' value='Message'>
                        </input>
                        </td>
                        </tr>";
                        }
                    }
                } else {
                    $sql1 = "SELECT Name,State,phoneNumber,Email,Category FROM `blood_banks` LIMIT 10 ";
                    $res1 = mysqli_query($conn, $sql1);
                    if ($res1) {
                        while ($row = $res1->fetch_assoc()) {
                            echo "<tr class='table-danger'>
                        <td>" . $row["Name"] . "</td>
                        <td>" . $row["State"] . "</td>
                        <td>" . $row["Email"] . "</td>
                        <td>" . $row["Category"] . "</td>
                        <td>" . $row["phoneNumber"] . "</td>
                        <td class='button-group'>
                        <input type='button' class='py-1 px-1  border-0 bg-primary mx-1 disabled' style='cursor:pointer' value='Request'>
                        </input>
                        <input type='button' class='py-1 px-1 border-0 bg-danger mx-1 disabled' style='cursor:pointer' value='Cancel'>
                        </input><input type='button' class='btn btn-dark text-light rounded-0 mx-1 disabled' style='cursor:pointer' value='Message'>
                        </input>
                        </td>
                        </tr>";
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['loggedInStatus'])) {
        $reqBlood = $_POST["reqBlood"];
        // $description = $_POST["description"];
        $user_from = $_SESSION["userName"];
        $user_to = "";

        if (isset($_POST['makeRequestBtn'])) {
            // $sql = "INSERT into `messages` (user_from,user_to,reqBlood,description) VALUES ($user_from,$user_to,$reqBlood,$description)";
            echo "entered Block";
            echo "<div class='text-primiary h1'>" . $user_to . "</div>";
        }
    }
}
?>