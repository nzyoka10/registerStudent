<?php

class StudentRegistration {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->conn = $this->connect();
    }

    private function connect() {
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    public function sanitizeInput($data) {
        // Remove whitespace and sanitize input
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function insertStudent($name, $dob, $gender, $address, $telephone, $email, $course) {
        // Sanitize inputs
        $name = $this->sanitizeInput($name);
        $dob = $this->sanitizeInput($dob);
        $gender = $this->sanitizeInput($gender);
        $address = $this->sanitizeInput($address);
        $telephone = $this->sanitizeInput($telephone);
        $email = $this->sanitizeInput($email);
        $course = $this->sanitizeInput($course);

        // Prepare SQL statement
        $stmt = $this->conn->prepare("INSERT INTO students (name, dob, gender, address, telephone, email, course) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $name, $dob, $gender, $address, $telephone, $email, $course);

        // Execute the statement
        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error: " . $stmt->error);
        }
    }

    public function closeConnection() {
        // Close connection
        $this->conn->close();
    }
}

// Example usage:
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "student_registration";

try {
    $registration = new StudentRegistration($servername, $username, $password, $dbname);

    // Example usage to insert data
    $registration->insertStudent("John Doe", "2000-01-01", "male", "123 Main St", "1234567890", "john@example.com", "Math");

    // Close connection
    $registration->closeConnection();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
