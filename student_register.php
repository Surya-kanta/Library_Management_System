<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New student register - Surya City Library</title>
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="library.css">
</head>

<body>
    <header>
        <div class="logo">
            <a href="index.php">
                <img class="logo" src="favicon.png" alt="Library Logo">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="Privacy.php" class="nav-link">Privacy</a></li>
                <li><a href="About.php" class="nav-link">About</a></li>
                <li><a href="Contact.php" class="nav-link">Contact</a></li>
                <li>
                    <button class="btn-primary">Login</button>
                    <div class="dropdown">
                        <a href="Student_Login.php">Student</a>
                        <a href="Librarian_Login.php">Librarian</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <div class="heading">
        <h1><b>Student Registration Form</b></h1>
    </div>

    <form action="" method="post">
        <div class="container">
            <label for="name">Full Name:</label>
            <input type="text" name="name" placeholder="Enter your name"required>
            <label for="email">Email ID:</label>
            <input type="email" 
                placeholder="Enter email ID" 
                name="email" 
                required 
                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" 
                maxlength="50"
                title="Enter a valid email address (e.g., example@domain.com)">
            <label for="password">Password:</label>
            <input placeholder="Enter Password" type="password" name="password" required
                pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}"
                title="Password must contain at least 8 characters, including uppercase, lowercase, number and special character.">
            <label for="mobile">Mobile:</label>
            <input type="tel" name="mobile" placeholder="Enter your mobile no" pattern="[6-9][0-9]{9}" required>
            <label for="address">Address:</label>
            <input type="address" name="address" placeholder="Enter your full address" required>
            <button type="submit" class="btn-primary">Register</button>
        </div>
    </form>

<?php
$connection = mysqli_connect("localhost", "root", "tiger", "lms");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? mysqli_real_escape_string($connection, $_POST['name']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($connection, $_POST['email']) : '';
    $password = isset($_POST['password']) ? mysqli_real_escape_string($connection, $_POST['password']) : '';
    $mobile = isset($_POST['mobile']) ? mysqli_real_escape_string($connection, $_POST['mobile']) : '';
    $address = isset($_POST['address']) ? mysqli_real_escape_string($connection, $_POST['address']) : '';
    if (empty($name) || empty($email) || empty($password) || empty($mobile) || empty($address)) {
        echo "<script>alert('Error: All fields are required!'); window.location.href='student_register.php';</script>";
        exit();
    }
    $email_check_query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $email_check_query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Error: Email already registered. Try another email!'); window.location.href='student_register.php';</script>";
    } else {
        $query = "INSERT INTO users (name, email, password, mobile, address) VALUES ('$name', '$email', '$password', '$mobile', '$address')";

        if (mysqli_query($connection, $query)) {
            echo "<script>alert('Registration successful! You may log in now.'); window.location.href='Student_Login.php';</script>";
        } else {
            echo "<script>alert('Error: Unable to register. Try again later.'); window.location.href='student_register.php';</script>";
        }
    }
}
mysqli_close($connection);
?>

    <footer>
        <p>Copyright &copy;2025 : <b>Surya City Library</b></p>
        <nav>
            <ul>
                <li><a href="https://www.facebook.com/suryacitylibrary" target="_blank">Facebook</a></li>
                <li><a href="https://www.instagram.com/suryacitylibrary" target="_blank">Instagram</a></li>
                <li><a href="https://wa.me/917788873416" target="_blank">Whatsapp</a></li>
                <li><a href="mailto:suryacitylibrary@gmail.com" target="_blank">Email</a></li>
                <li><a href="#top" class="btn-primary">Top</a></li>
            </ul>
        </nav>
    </footer>
</body>

</html>