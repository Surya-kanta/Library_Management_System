<?php
	require("functions.php");
	session_start();
	$connection = mysqli_connect("localhost","root","tiger","lms");
	$name = "";
	$email = "";
	$mobile = "";
	$query = "select * from admins where email = '$_SESSION[email]'";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)){
		$name = $row['name'];
		$email = $row['email'];
		$mobile = $row['mobile'];
        $password = $row['password'];
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin view profile - Surya City Library</title>
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="login_library.css">
</head>

<body>
    <header>
        <div class="logo">
            <a href="admin_dashboard.php">
                <img class="logo" src="favicon.png" alt="Library Logo">
            </a>
        </div>
        <nav>
            <ul class="nav-links">
                <li>Email: <?php echo $_SESSION['email']; ?></li>
                <li class="dropdown">
                    <button class="dropbtn">My Profile</button>
                    <div class="dropdown-content">
                        <a href="admin_view_profile.php">View Profile</a>
                        <a href="admin_edit_profile.php">Edit Profile</a>
                    </div>
                </li>
                <li>
                    <a href="logout.php" class="btn-primary">Logout</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="heading">
        <h1><b>Welcome <?php echo explode(' ', $_SESSION['name'])[0]; ?>'s Dashboard</b></h1>
    </div>

    <nav style="background-color: #e3f2fd">
        <ul class="nav-links">
            <li>
                <a href="admin_dashboard.php" class="btn-primary">Dashboard</a>
            </li>
            <li class="dropdown">
                <button class="dropbtn">Books</button>
                <div class="dropdown-content">
                    <a href="admin_add_new_book.php">Add New Book</a>
                    <a href="admin_manage_book.php">Manage Books</a>
                </div>
            </li>
            <li class="dropdown">
                <button class="dropbtn">Category</button>
                <div class="dropdown-content">
                    <a href="admin_add_new_cate.php">Add New Category</a>
                    <a href="admin_manage_cate.php">Manage Category</a>
                </div>
            </li>
            <li class="dropdown">
                <button class="dropbtn">Authors</button>
                <div class="dropdown-content">
                    <a href="admin_add_new_auth.php">Add New Author</a>
                    <a href="admin_manage_auth.php">Manage Author</a>
                </div>
            </li>
            <li>
                <a href="admin_issue_book.php" class="btn-primary">Issue Book</a>
            </li>
        </ul>
    </nav>

    <form action="" method="post">
        <div class="container">
            <center>
                <h4>Edit Profile</h4><br>
            </center>
            <label for="name">Full Name:</label>
            <input type="text" name="name" placeholder="Enter your name" value="<?php echo $name;?>" required>
            <label for="email">Email ID:</label>
            <input type="email" value="<?php echo $email;?>" disabled>
            <label for="password">Password:</label>
            <input placeholder="Enter Password" type="password" name="password" value="<?php echo $password;?>" required
                pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}"
                title="Password must contain at least 8 characters, including uppercase, lowercase, number and special character.">
            <label for="mobile">Mobile:</label>
            <input type="tel" name="mobile" placeholder="Enter your mobile no" value="<?php echo $mobile;?>"
                pattern="[6-9][0-9]{9}" required>
            <button type="submit" class="btn-primary">Update</button>
        </div>
    </form>

    <?php
    $connection = mysqli_connect("localhost", "root", "tiger", "lms");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (!isset($_SESSION['email'])) {
        echo "<script>alert('Error: No session found! Please log in.'); window.location.href='Librarian_Login.php';</script>";
        exit();
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $mobile = mysqli_real_escape_string($connection, $_POST['mobile']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        
        $update_query = "UPDATE admins SET name = '$name', mobile = '$mobile', password = '$password' WHERE email = '$_SESSION[email]'";
        
        if (mysqli_query($connection, $update_query)) {
            $_SESSION['email'] = $email;
            echo "<script>alert('Profile updated successfully!'); window.location.href='admin_view_profile.php';</script>";
        } else {
            echo "<script>alert('Error updating profile. Please try again!'); window.location.href='admin_edit_profile.php';</script>";
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