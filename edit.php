<?php

require_once './logic/config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID parameter is set
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch student record by ID
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $dob = $row['dob'];
        $gender = $row['gender'];
        $address = $row['address'];
        $telephone = $row['telephone'];
        $email = $row['email'];
        $course = $row['course'];
    } else {
        echo "Student not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}

// Handle form submission
if(isset($_POST['submit'])) {
    // Retrieve updated data from form
    $updatedName = $_POST['name'];
    $updatedDob = $_POST['dob'];
    $updatedGender = $_POST['gender'];
    $updatedAddress = $_POST['address'];
    $updatedTelephone = $_POST['telephone'];
    $updatedEmail = $_POST['email'];
    $updatedCourse = $_POST['course'];

    // Update the student record in the database
    $updateSql = "UPDATE students SET name='$updatedName', dob='$updatedDob', gender='$updatedGender', address='$updatedAddress', telephone='$updatedTelephone', email='$updatedEmail', course='$updatedCourse' WHERE id=$id";

    if ($conn->query($updateSql) === TRUE) {
        echo "Record updated successfully!";
        // Redirect to dashboard after update
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1 class="text-center">Edit Student</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
        </div>
        <div class="form-group">
            <label>Date of Birth:</label>
            <input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>" required>
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <select class="form-control" name="gender" required>
                <option value="male" <?php if($gender == 'male') echo 'selected'; ?>>Male</option>
                <option value="female" <?php if($gender == 'female') echo 'selected'; ?>>Female</option>
                <option value="other" <?php if($gender == 'other') echo 'selected'; ?>>Other</option>
            </select>
        </div>
        <div class="form-group">
            <label>Address:</label>
            <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" required>
        </div>
        <div class="form-group">
            <label>Telephone:</label>
            <input type="tel" class="form-control" name="telephone" value="<?php echo $telephone; ?>" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
        </div>
        <div class="form-group">
            <label>Course:</label>
            <select class="form-control" name="course" required>
                <option value="Math" <?php if($course == 'Math') echo 'selected'; ?>>Math</option>
                <option value="Science" <?php if($course == 'Science') echo 'selected'; ?>>Science</option>
                <option value="History" <?php if($course == 'History') echo 'selected'; ?>>History</option>
                <option value="Literature" <?php if($course == 'Literature') echo 'selected'; ?>>Literature</option>
                <option value="Art" <?php if($course == 'Art') echo 'selected'; ?>>Art</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

