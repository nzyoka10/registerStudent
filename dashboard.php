<?php

require_once './logic/config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch up to 7 records
$sql = "SELECT * FROM students LIMIT 7";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Student Listing</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add your custom styles here */
        body {
            background: #333;
            color: wheat;
        }

        div.container {
            align-items: center;
            margin: 10px;
            padding: 20px;
        }

        .btn1{
            text-align: start;
            margin: 12px;
            background: #444;
            border: none;
            color: lightgray;


            font-size: large;
            line-height: normal;
        }

        .table-centered {
            color: wheat;
            margin: auto;
            width: 100%;
        }

      
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center">Dashboard - Student Listing</h1>
    <br/>
    <a href="index.php" class="btn btn-success btn1">New student</a>
    <br/>

    <table class="table table-bordered table-centered">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Course</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["dob"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["telephone"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["course"] . "</td>";
                    echo "<td><a href='edit.php?id=" . $row["id"] . "' class='btn btn-primary btn-sm'>Edit</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8' class='text-center'>No students found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
