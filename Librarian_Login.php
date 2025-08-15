<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarian Login - Surya City Library</title>
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
        <h1><b>Librarian Login</b></h1>
    </div>
    <form action="" method="post">
        <div class="container">
            <label for="email"><b>Email ID :</label>
            <input type="email" placeholder="Enter email ID" name="email" required>
            <label for="password">Password :</label>
            <input placeholder="Enter Password" type="password" id="password" name="password" required
                pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}"
                title="Password must contain at least 8 characters, including uppercase, lowercase, number and special character.">
            <button type="submit" name="submit">Login</button>
        </div>
    </form>
    <?php 
		if (isset($_POST['submit'])) {
            $connection = mysqli_connect("localhost", "root", "tiger", "lms");
            if (!$connection) {
                die("Database Connection Failed: " . mysqli_connect_error());
            }
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = "SELECT * FROM admins WHERE email = ?";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                if ($row['password'] === $password) {
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['id'] = $row['id'];
                    ob_clean();
                    header("Location: admin_dashboard.php");
                    exit();
                } else {
                    echo "<script>alert('Wrong Password !!!');</script>";
                }
            } else {
                echo "<script>alert('User not found !!!');</script>";
            }
            mysqli_stmt_close($stmt);
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