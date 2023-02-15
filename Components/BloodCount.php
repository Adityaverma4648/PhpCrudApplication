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
        <span class="text-light me-2">
            Filter to find what you want!
        </span>
    </div>
    <div class="bg-secondary text-light px-2">
        <i class="fa-fa-tint fa-3x text-dark"></i>
        <div class="col-sm-3">
            No Of Available Blood Groups
        </div>

    </div>
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        Top contributing banks
                    </th>
                    <th>
                        <select name="state" id="state">
                        </select>
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
                        echo '<tr id="' . $row["id"] . '"><td>' . $row["userNameReg"] . '</td><td>' . $row["state"] . '</td><td>' . $row["emailReg"] . '</td><td>' . $row['category'] . '</td><td>' . $row["phoneNumber"] . '</td>
                        <td class="button-group"><button type="button" class="btn btn-primary"><small>Req Sample</small></button><button type="button"class="btn btn-warning"></button><button type="button" class="btn btn-danger">Cancel Req</button></td></tr><br>';
                    }
                }
                ?>
                <?php
                $sql1 = "SELECT Name,State,phoneNumber,Email,Category FROM `blood_banks` LIMIT 20";
                $res1 = mysqli_query($conn, $sql1);
                if ($res1) {
                    while ($row = $res1->fetch_assoc()) {
                        echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["State"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Category"] . "</td><td>" . $row["phoneNumber"] . "</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>