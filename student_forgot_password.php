<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Forgot Password - Surya City Library</title>
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
        <h1><b>Student Forgot Password</b></h1>
    </div>
    <form action="" method="post">
        <div class="container">
            <label for="email"><b>Email ID:</b></label>
            <input type="email" placeholder="Enter email ID" name="email" required
                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" maxlength="50"
                title="Enter a valid email address (e.g., example@domain.com)">
            <label for="password"><b>New Password:</b></label>
            <input type="password" placeholder="Enter New Password" id="password" name="password" required
                pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}"
                title="Password must contain at least 8 characters, including uppercase, lowercase, number and special character.">

            <button type="submit" name="submit">Submit</button>
        </div>
    </form>
    <?php
if (isset($_POST['submit'])) {
    $connection = mysqli_connect("localhost", "root", "tiger", "lms");

    if (!$connection) {
        die("Database Connection Failed: " . mysqli_connect_error());
    }

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Check if the user exists
    $query = "SELECT email FROM users WHERE email = '$email'";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($query_run) > 0) {
        // Update password for the user
        $query = "UPDATE users SET password = '$password' WHERE email = '$email'";
        if (mysqli_query($connection, $query)) {
            echo "<script>alert('Password reset successfully! Please log in.'); window.location.href='Student_Login.php';</script>";
        } else {
            echo "<script>alert('Error updating password.');</script>";
        }
    } else {
        echo "<script>alert('User not found! Please check your email.');</script>";
    }

    mysqli_close($connection);
}
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