<?php
	require("functions.php");
	session_start();
	$connection = mysqli_connect("localhost","root","tiger","lms");
    if (!$connection) {
        die("Database Connection Failed: " . mysqli_connect_error());
    }
	if(isset($_POST['add_cat']))
	{
		$query = "insert into category(cat_name) values('$_POST[cat_name]')";
		$query_run = mysqli_query($connection,$query);
        if ($query_run) {
            echo "<script>alert('Category added successfully!'); window.location.href='admin_manage_cate.php';</script>";
        } else {
            echo "<script>alert('Error adding category');</script>";
        }
	}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Category - Surya City Library</title>
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
                <h4>Enter Book Category Name</h4><br>
            </center>
            <label for="name">Category Name:</label>
            <input type="text" name="cat_name" placeholder="Enter Category Name" required>
            <button type="submit" name="add_cat" class="btn-primary">Add Catogry</button>
        </div>
    </form>

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
