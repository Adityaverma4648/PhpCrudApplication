<!--  formPopUpabove  -->
<div class="container bg-light d-flex flex-column py-4 ">

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
            <form method="get" class="d-flex">
                <select name="stateSelected" id="state">
                    <option value="Andaman And Nicobar Islands">
                        Andaman And Nicobar Islands
                    </option>
                    <option value="Andhra Pradesh">
                        Andhra Pradesh
                    </option>
                    <option value="Arunchal Pradesh">
                        Arunchal Pradesh
                    </option>
                    <option value="Assam">
                        Assam
                    </option>
                    <option value="Bihar">
                        Bihar
                    </option>
                    <option value="Chandigarh">
                        Chandigarh
                    </option>
                    <option value="Chhattisgarh">
                        Chhattisgarh
                    </option>
                    <option value="Dadra And Nagar Haveli">
                        Dadra And Nagar Haveli
                    </option>
                    <option value="Daman And Diu">
                        Daman And Diu
                    </option>
                    <option value="Delhi">
                        Delhi
                    </option>
                    <option value="Goa">
                        Goa
                    </option>
                    <option value="Gujarat">
                        Gujarat
                    </option>
                    <option value="Harayana">
                        Harayana
                    </option>
                    <option value="Himachal Pradesh">
                        Himachal Pradesh
                    </option>
                    <option value="Jammu And Kashmir">
                        Jammu And Kashmir
                    </option>
                    <option value="Jharkhand">
                        Jharkhand
                    </option>
                    <option value="Karnataka">
                        Karnataka
                    </option>
                    <option value="Kerala">
                        Kerala
                    </option>
                    <option value="Ladakh">
                        Ladakh
                    </option>
                    <option value="Lakshadweep">
                        Lakshadweep
                    </option>
                    <option value="Madhya pradesh">
                        Madhya pradesh
                    </option>
                    <option value="Maharashtra">
                        Maharashtra
                    </option>
                    <option value="Manipur">
                        Manipur
                    </option>
                    <option value="Meghalaya">
                        Meghalaya
                    </option>
                    <option value="Mizoram">
                        Mizoram
                    </option>
                    <option value="Nagaland">
                        Nagaland
                    </option>
                    <option value="Odisha">
                        Odisha
                    </option>
                    <option value="Puducherry">
                        Puducherry
                    </option>
                    <option value="Punjab">
                        Punjab
                    </option>
                    <option value="Rajasthan">
                        Rajasthan
                    </option>
                    <option value="Sikkim">
                        Sikkim
                    </option>
                    <option value="Tamil Nadu">
                        Tamil Nadu
                    </option>

                    <option value="Telangana">
                        Telangana
                    </option>
                    <option value="Tripura">
                        Tripura
                    </option>
                    <option value="Uttarakhand">
                        Uttarakhand
                    </option>
                    <option value="Uttar Pradesh">
                        Uttar Pradesh
                    </option>
                    <option value="West Bengal">
                        West Bengal
                    </option>
                </select>
                <input type="submit" name="searchState" value="Search">
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_GET['searchState'])) {
                    $stateSelected = $_GET['stateSelected'];
                    echo $stateSelected;
                }
            }
            ?>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped" style="max-height:100vh;overflow:scroll">
            <thead>
                <tr class="table-success">
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
                    if (isset($_SESSION['userName'])) {
                        while ($row = $res->fetch_assoc()) {
                            if ($row['userNameReg'] != $_SESSION['userName']) {
                                echo '<tr class="table-primary" id="' . $row["id"] . '">
                        
                                   <td>' . $row["userNameReg"] . '</td>
                                   <td>' . $row["state"] . '</td>
                                   <td>' . $row["emailReg"] . '</td>
                                   <td>' . $row['category'] . '</td>
                                   <td>' . $row["phoneNumber"] . '
                                   </td>
                                   ';


                                echo '<td class="button-group">
                                   <div class="button-group d-flex">
                                       <a href="Requests.php?id=' . $row["id"] . '" class="text-decoration-none text-white py-1 px-1  border-0 bg-primary mx-1" style="cursor:pointer;" value="Request" >Request</a>
                                       <a href="Messages.php?id=' . $row["id"] . '"  class="btn btn-dark text-light rounded-0 mx-1" style="cursor:pointer;" >Message</a>
                                       </div>
                                    </td>
                                </tr>';
                            }
                        }
                    } else {
                        echo "<div class='bg-info py-4 attentionGrabberClass text-center'>
                                      Please Login to use Features like messaging and requesting directly to the member organizations !! 
                                  </div>";
                    }
                }




                ?>
                <?php
                if (isset($myLimit)) {
                    if (isset($stateSelected)) {
                        $sql1 = "SELECT Name,State,phoneNumber,Email,Category FROM `blood_banks` WHERE State = $stateSelected LIMIT $myLimit ";
                        $res1 = mysqli_query($conn, $sql1);
                        if ($res1) {
                            while ($row = $res1->fetch_assoc()) {
                                echo "<tr class='table-danger'>
                        <td>" . $row["Name"] . "</td>
                        <td>" . $row["State"] . "</td>
                        <td>" . $row["Email"] . "</td>
                        <td>" . $row["Category"] . "</td>
                        <td>" . $row["phoneNumber"] . "</td>
                        <td>
                          <div class='button-group d-flex'>
                             <input type='button' class='py-1 px-1  border-0 bg-primary mx-1 disabled' style='cursor:pointer' value='Request'>
                        </input>
                        </input><input type='button' class='btn btn-dark text-light rounded-0 mx-1' style='cursor:pointer' value='Message' onclick='MessageFeatureDisabled()'>
                        </input>
                          </div>
                        </td>
                        </tr>";
                            }
                        }
                    } else {
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
                        <td>
                          <div class='button-group d-flex'>
                             <input type='button' class='py-1 px-1  border-0 bg-primary mx-1 disabled' style='cursor:pointer' value='Request' onclick='requestBtnClicked()'>
                        </input>
                        </input><input type='button' class='btn btn-dark text-light rounded-0 mx-1' style='cursor:pointer' value='Message' onclick='MessageFeatureDisabled()'>
                        </input>
                          </div>
                        </td>
                        </tr>";
                            }
                        }
                    }
                } else {
                    if (isset($_GET['stateSelected'])) {
                        $sql1 = "SELECT Name,State,phoneNumber,Email,Category FROM `blood_banks`";
                        $res1 = mysqli_query($conn, $sql1);
                        if ($res1) {
                            while ($row = $res1->fetch_assoc()) {
                                if ($row['State'] == $_GET['stateSelected']) {
                                    echo "<tr class='table-danger'>
                                             <td>" . $row["Name"] . "</td>
                                             <td>" . $row["State"] . "</td>
                                             <td>" . $row["Email"] . "</td>
                                             <td>" . $row["Category"] . "</td>
                                             <td>" . $row["phoneNumber"] . "</td>
                                              <td>
                          <div class='button-group d-flex'>
                             <input type='button' class='py-1 px-1  border-0 bg-primary mx-1 disabled' style='cursor:pointer' value='Request' onclick='requestBtnClicked()'>
                        </input>
                        </input><input type='button' class='btn btn-dark text-light rounded-0 mx-1' style='cursor:pointer' value='Message' onclick='MessageFeatureDisabled()'>
                        </input>
                          </div>
                        </td>
                                          </tr>";
                                }
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
                        <td>
                          <div class='button-group d-flex'>
                             <input type='button' class='py-1 px-1  border-0 bg-primary mx-1 disabled' style='cursor:pointer' value='Request' onclick='requestBtnClicked()'>
                        </input>
                       
                        </input><input type='button' class='btn btn-dark text-light rounded-0 mx-1' style='cursor:pointer' value='Message' onclick='MessageFeatureDisabled()'>
                        </input>
                          </div>
                        </td>
                        </tr>";
                            }
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function MessageFeatureDisabled() {
        alert("Message Featured Allowed Only for Member Organizations");
    }

    function requestBtnClicked() {
        alert("Request Featured Allowed Only for Member Organizations");

    }
</script>