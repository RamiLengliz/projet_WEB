<?php
require '../../Controller/connect.php'; // Adjust the path as necessary
$url = config::getCurrentUrl();
$result = isset($_GET['result']) ? $_GET['result'] : null;
$pdo = config::getConnexion();
?>
<main style="padding-top:20px;">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <?php
                switch ($result) {
                    case '1':
                        echo '<div class="alert alert-success" role="alert">User created successfully !</div>
                            <div class="card bg-success mb-3 " style="max-width: 100rem;">';
                        break;

                    case '2':
                        echo '<div class="alert alert-danger" role="alert">An error occurred !</div>
                            <div class="card border-danger mb-3 " style="max-width: 100rem;">';
                        break;
                    case '3':
                        echo '<div class="alert alert-danger" role="alert">Please submit the form.!</div>
                            <div class="card border-danger mb-3 " style="max-width: 100rem;">';
                        break;
                    case '4':
                        echo '<div class="alert alert-warning" role="alert">Email already exists.!</div>
                                    <div class="card border-warning mb-3 " style="max-width: 100rem;">';
                        break;
                    default:
                        echo '<div class="alert alert-primary" role="alert">Input the FORM !</div>';
                        break;
                }
                ?>
                <div class="settings-widget" bis_skin_checked="1">
                    <div class="settings-inner-blk p-0" bis_skin_checked="1">
                        <div class="sell-course-head comman-space" bis_skin_checked="1">
                            <h3>Student Accounts</h3>
                            <p>Search,update or delete Accounts.</p>
                        </div>
                        <div class="comman-space pb-0" bis_skin_checked="1">
                            <div class="settings-tickets-blk course-instruct-blk table-responsive" bis_skin_checked="1">

                                <div class="col-md-12" style="padding-top:20px;">
                                    <div>
                                        <input type="text" class="form-control" id="searchInput" onkeyup="searchTable()" placeholder="Search by First Name, Last Name, or Email..." style="margin-bottom: 20px; width: 100%; padding: 10px;">
                                    </div>

                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">First</th>
                                                <th scope="col">Last</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">status</th>
                                                <th scope="col">Age</th>
                                                <th scope="col">class</th>
                                                <th scope="col">EDIT</th>
                                                <th scope="col">DELETE</th>
                                                <th scope="col">Banner</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            try {
                                                $pdo = config::getConnexion();
                                                // Assuming 'etudiants' is a typo and the correct table name is 'student'
                                                // Adjust table and column names as necessary to fit your schema
                                                $query = "
                        SELECT 
                            u.id, u.name, u.lastname, u.email, u.tel, u.status, c.name AS class_name
                        FROM 
                            user u
                        LEFT JOIN 
                            etudiants s ON u.id = s.id_user
                        LEFT JOIN 
                            class c ON s.id_class = c.id
                        WHERE 
                            u.role = 3
                    ";
                                                $stmt = $pdo->query($query);

                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<tr>";
                                                    echo "<th scope='row'>" . htmlspecialchars($row['id']) . "</th>";
                                                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['lastname']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row['tel']) . "</td>";
                                                    // Directly use the joined class name
                                                    echo "<td>" . htmlspecialchars($row['class_name']) . "</td>";
                                                    echo '<td><a href="../../View/admin/index.php?id=' . $row['id'] . '&page=US" class="btn btn-primary">EDIT</a></td>';
                                                    echo '  <td>
                        <form action="../../model/gestion user/delete.php" method="POST" onsubmit="return confirm(\'Are you sure?\');">
                        <input type="hidden" name="url" value="' . htmlspecialchars($page) . '">   

                            <input type="hidden" name="type" value="user">
                            <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">
                            <input class="btn btn-danger" type="submit" value="DELETE">
                        </form>
                                </td>'; ?>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="banCheckbox_<?= htmlspecialchars($row['id']) ?>" <?= ($row['status'] == 1) ? '' : 'checked' ?>>
                                                            <label class="form-check-label" for="banCheckbox_<?= htmlspecialchars($row['id']) ?>">You can activate or disable an account</label>
                                                        </div>

                                                        <script>
                                                            // Add event listener to checkbox
                                                            document.getElementById('banCheckbox_<?= htmlspecialchars($row['id']) ?>').addEventListener('click', function() {
                                                                console.log(1);

                                                                var userId = <?= $row['id'] ?>;
                                                                var isChecked = this.checked ? 1 : 0; // Convert boolean to integer

                                                                // Send AJAX request
                                                                var xhr = new XMLHttpRequest();
                                                                xhr.open('POST', '../../model/gestion user/update_status.php');
                                                                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                                                xhr.onload = function() {
                                                                    if (xhr.status === 200) {
                                                                        // Success, do something if needed
                                                                    }
                                                                };
                                                                xhr.send('userId=' + userId + '&isChecked=' + isChecked);
                                                            });
                                                        </script>
                                                    </td>

                                            <?php
                                                    echo "</tr>";
                                                }
                                            } catch (PDOException $e) {
                                                die("Could not connect to the database :" . $e->getMessage());
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<script>
    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.querySelector(".table-hover");
        tr = table.getElementsByTagName("tr");

        for (i = 1; i < tr.length; i++) { // Start from 1 to skip the table header
            // Search in second (First Name), third (Last Name), and fourth (Email) columns
            tr[i].style.display = "none"; // Hide all rows initially
            for (var j = 1; j <= 3; j++) { // Check columns 1 to 3 (0-indexed, so 1, 2, 3)
                td = tr[i].getElementsByTagName("td")[j - 1]; // j-1 because td index is 0-based
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = ""; // Show row if match is found
                        break; // Stop loop if a matching value is found
                    }
                }
            }
        }
    }
</script>