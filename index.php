<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="form-validation.js"></script>
</head>

<body>
    <form id="myForm">
        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="mobileNumber">Mobile Number:</label>
        <input type="text" id="mobileNumber" name="mobileNumber" required>
        <br><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>
        <br><br>

        <label for="age">Age:</label>
        <input type="text" id="age" name="age" readonly>
        <br><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <br><br>

        <button type="submit">Submit</button>
    </form>
</body>

</html>


<table border="1" style="margin-top:20px;">
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Mobile</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Connect to the database
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "users";

        $conn = mysqli_connect($host, $user, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Retrieve the form data from the database
        $sql = "SELECT full_name, email, mobile_number FROM user_info";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["full_name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["mobile_number"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </tbody>
</table>