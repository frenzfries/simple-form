<?php

// Server-side validation

if (empty($_POST["fullName"]) || empty($_POST["email"]) || empty($_POST["mobileNumber"]) || empty($_POST["dob"]) || empty($_POST["gender"]) || empty($_POST["age"])) {
    echo "All fields are required.";
    exit;
}

$fullName = $_POST["fullName"];
$email = $_POST["email"];
$mobileNumber = $_POST["mobileNumber"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$age = $_POST["age"];

// Connect to the database

$host = "localhost";
$dbname = "users";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $stmt = $conn->prepare("INSERT INTO user_info (full_name, email, mobile_number, dob, gender, age) VALUES (:fullName, :email, :mobileNumber, :dob, :gender, :age)");
    $stmt->bindParam(":fullName", $fullName);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":mobileNumber", $mobileNumber);
    $stmt->bindParam(":dob", $dob);
    $stmt->bindParam(":gender", $gender);
    $stmt->bindParam(":age", $age);

    $stmt->execute();
    echo "Form submitted successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
