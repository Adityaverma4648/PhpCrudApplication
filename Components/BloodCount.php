<div class="container bg-light d-flex flex-column">
    <div class="bg-dark py-1 d-flex justify-content-between align-items-center">
        <select name="bloodGroup" id="bloodGroup" class="px-2 ms-2">
            <option value="A+">A+</option>
            <option value="A+">A-</option>
            <option value="A+">B+</option>
            <option value="A+">B-</option>
            <option value="A+">AB+</option>
            <option value="A+">AB-</option>
            <option value="A+">O+</option>
            <option value="A+">O-</option>
        </select>
        <div class="text-light me-2 d-flex">
            <div>
                <span class="rounded-5 p-1 bg-primary text-primary">
                    AB,
                </span>
            </div>
            Filter to find what you want!
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


                $sql = "SELECT id, userNameReg, state, emailReg,category,phoneNumber FROM user";

                $res = $conn->query($sql);
                if ($res) {
                    while ($row = $res->fetch_assoc()) {
                        echo '<tr class="table-primary" id="' . $row["id"] . '"><td>' . $row["userNameReg"] . '</td><td>' . $row["state"] . '</td><td>' . $row["emailReg"] . '</td><td>' . $row['category'] . '</td><td>' . $row["phoneNumber"] . '</td>
                        <td class="button-group"><button type="button" class="py-1 px-1  border-0 bg-primary mx-1"><small>Request</small></button><button type="button" class="py-1 px-1 border-0 bg-danger mx-1"><small>Cancel</small></button><button type="button"  class="btn btn-dark text-light rounded-0 mx-1"><small>Message</small></button></td></tr><br>';
                    }
                }
                ?>
                <?php
                $sql1 = "SELECT Name,State,phoneNumber,Email,Category FROM `blood_banks` LIMIT 20";
                $res1 = mysqli_query($conn, $sql1);
                if ($res1) {
                    while ($row = $res1->fetch_assoc()) {
                        echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["State"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Category"] . "</td><td>" . $row["phoneNumber"] . "</td><td class='button-group'><button type='button' class='py-1 px-1  border-0 bg-primary mx-1'><small>Request</small></button><button type='button' class='py-1 px-1 border-0 bg-danger mx-1'><small>Cancel</small></button><button type='button' class='btn btn-dark text-light rounded-0 mx-1'><small>Message</small></button></td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>