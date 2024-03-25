<?php

require_once './logic/config.php';
require_once './logic/StudentRegistration.php';

try {
    $registration = new StudentRegistration($servername, $username, $password, $dbname);

    if(isset($_POST['register'])) {
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $course = $_POST['course'];

        $registration->insertStudent($name, $dob, $gender, $address, $telephone, $email, $course);

        // Display sweet message after successful registration
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
        echo "<script>";

        echo "Swal.fire({";
            echo     "title: 'Success!',";
            // echo " title: 'The Internet?'',";
            echo " text: 'That thing is still around?', ";
            echo " icon: 'success',";
            // icon: "question"
          echo "});";



        // echo "Swal.fire({";
        // echo "  title: 'Registration Successful!',";
        // echo "  text: 'Redirecting to dashboard...',";
        // echo "  icon: 'success',";
        // echo "  showConfirmButton: false,";
        // echo "  timer: 2000";
        // echo "}).then(function() {";
        // echo "  window.location.href = 'dashboard.php';";
        // echo "});";
        echo "</script>";
    }

    $registration->closeConnection();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>

<div class="container">
    <h1>Student Registration Form</h1>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <div class="radio-group">
                <label for="male"><input type="radio" id="male" name="gender" value="male" required> Male</label>
                <label for="female"><input type="radio" id="female" name="gender" value="female"> Female</label>
                <label for="other"><input type="radio" id="other" name="gender" value="other"> Other</label>
            </div>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="telephone">Telephone:</label>
            <input type="tel" id="telephone" name="telephone" required>
        </div>
        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="course">Course:</label>
            <select id="course" name="course" required>
                <option value="">Select Course</option>
                <option value="Math">Math</option>
                <option value="Science">Science</option>
                <option value="History">History</option>
                <option value="Literature">Literature</option>
                <option value="Art">Art</option>
            </select>
        </div>
        <button type="submit" name="register">Register</button>
        <button type="button" class="cancel">Cancel</button>
    </form>
</div>


<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
</body>
</html>
