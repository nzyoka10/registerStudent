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
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    public function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function insertStudent($name, $dob, $gender, $address, $telephone, $email, $course) {
        $name = $this->sanitizeInput($name);
        $dob = $this->sanitizeInput($dob);
        $gender = $this->sanitizeInput($gender);
        $address = $this->sanitizeInput($address);
        $telephone = $this->sanitizeInput($telephone);
        $email = $this->sanitizeInput($email);
        $course = $this->sanitizeInput($course);

        $stmt = $this->conn->prepare("INSERT INTO students (name, dob, gender, address, telephone, email, course) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $name, $dob, $gender, $address, $telephone, $email, $course);

        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error: " . $stmt->error);
        }
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

?>
