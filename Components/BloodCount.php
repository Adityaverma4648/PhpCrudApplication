<!-- <div class="container-fluid position-absolute top-0 d-flex justify-content-center align-items-center" style="height
:60vh;z-index:99">
    <div class="bg-danger container d-flex justify-content-center align-items-center mt-5 " id="myRequestFormContainer">
    </div>
</div> -->

<div class="container bg-light d-flex flex-column">
    <div class="bg-danger container d-flex justify-content-center align-items-center mt-2" id="myRequestFormContainer">
    </div>
    <div class="bg-dark py-1 d-flex justify-content-between align-items-center">
        <select name="limit" id="limit" class="px-2 ms-2" onchange="(event)=>{var limit = event.target.value;alert(limit)}">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="200">200</option>
            <option value="500">500</option>
        </select>
        <div class="text-light me-2 d-flex">
            <div>
                <span class="rounded-5 p-1 bg-primary text-primary">
                    AB,
                </span>
            </div>
            Set vision limit
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
                        Top contributing banks
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



                $sql = "SELECT id,uniqueId, userNameReg, state, emailReg,category,phoneNumber FROM user";

                $res = $conn->query($sql);
                if ($res) {
                    while ($row = $res->fetch_assoc()) {

                        echo '<tr class="table-primary" id="' . $row["id"] . '">
                                   <td>' . $row["userNameReg"] . '</td>
                                   <td>' . $row["state"] . '</td>
                                   <td>' . $row["emailReg"] . '</td>
                                   <td>' . $row['category'] . '</td>
                                   <td>' . $row["phoneNumber"] . '</td>
                                   <td class="button-group">
                                       <button type="button" class="py-1 px-1  border-0 bg-primary mx-1" onclick="requestBlood(' . $row['id'] . ')" style="cursor:pointer;">
                                       <small>
                                          Request
                                       </small>
                                       </button>
                                       <button type="button" class="py-1 px-1 border-0 bg-danger mx-1" style="cursor:pointer;">
                                       <small>
                                         Cancel
                                       </small>
                                       </button>
                                       <button type="button"  class="btn btn-dark text-light rounded-0 mx-1" style="cursor:pointer;">
                                       <small>
                                         Message
                                       </small>
                                       </button>
                                    </td>
                                </tr>';
                    }
                }

                ?>
                <?php
                $sql1 = "SELECT Name,State,phoneNumber,Email,Category FROM `blood_banks` LIMIT 20";
                $res1 = mysqli_query($conn, $sql1);
                if ($res1) {
                    while ($row = $res1->fetch_assoc()) {
                        echo "<tr>
                        <td>" . $row["Name"] . "</td>
                        <td>" . $row["State"] . "</td>
                        <td>" . $row["Email"] . "</td>
                        <td>" . $row["Category"] . "</td>
                        <td>" . $row["phoneNumber"] . "</td>
                        <td class='button-group'>
                        <button type='button' class='py-1 px-1  border-0 bg-primary mx-1 disabled' style='cursor:pointer'>
                        <small>
                         Request
                        </small>
                        </button>
                        <button type='button' class='py-1 px-1 border-0 bg-danger mx-1 disabled' style='cursor:pointer'>
                        <small>
                         Cancel
                        </small>
                        </button><button type='button' class='btn btn-dark text-light rounded-0 mx-1 disabled' style='cursor:pointer'>
                        <small>
                          Message
                        </small>
                        </button>
                        </td>
                        </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function requestBlood(id) {
        var user_id = id;
        var myRequestFormContainer = document.getElementById('myRequestFormContainer');
        myRequestFormContainer.innerHTML = "";
        var formElem = document.createElement("form");
        formElem.setAttribute("method", "POST")
        var content = `<label for="reqBlood">
                            <small class="text-danger">
                                Enter the Blood Group You Require
                            </small>
                            <select name="reqBlood">
                                <option value="A+">A+<option>
                                <option value="A+">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB+">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </section>
                        <label>
                         <label for="description">
                           <input class="border-0 py-2 px-1" name"description" placeholder="Enter your description"></input>
                         </label>
                          <input type="submit" value="Make Requests" name="makeRequestBtn"></input>
                         `;
        formElem.innerHTML = content;
        myRequestFormContainer.append(formElem);
    }
</script>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reqBlood = $_POST["reqBlood"];
    // $description = $_POST["description"];
    $user_from = $_SESSION["userName"];
    $user_to = "<script>document.writeln(user_id);</script>";

    if (isset($_POST['makeRequestBtn'])) {
        // $sql = "INSERT into `messages` (user_from,user_to,reqBlood,description) VALUES ($user_from,$user_to,$reqBlood,$description)";
        echo "<div class='text-danger h1'>" . $user_to . "</div>";
    }
}
?>