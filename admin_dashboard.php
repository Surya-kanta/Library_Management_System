<?php
	require("functions.php");
	session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard - Surya City Library</title>
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
    </nav><br>
    <div class="row">
        <div class="col-md-3" style="margin: 0px">
            <div class="card bg-light" style="width: 300px">
                <div class="card-header">Registered Users</div>
                <div class="card-body">
                    <p class="card-text">No of total Users: <?php echo get_user_count();?></p>
                    <a class="btn-success" href="admin_register_users.php">View Registered Users</a>
                </div>
            </div>
        </div>
        <div class="col-md-3" style="margin: 0px">
            <div class="card" style="width: 300px">
                <div class="card-header">Available Books</div>
                <div class="card-body">
                    <p class="card-text">No of available books: <?php echo get_book_count();?></p>
                    <a class="btn-success" href="admin_register_books.php">View Available Books</a>
                </div>
            </div>
        </div>
        <div class="col-md-3" style="margin: 0px">
            <div class="card" style="width: 300px">
                <div class="card-header">Book Categories</div>
                <div class="card-body">
                    <p class="card-text">No of Book's Categories: <?php echo get_category_count();?></p>
                    <a class="btn-success" href="admin_register_cat.php">View Categories</a>
                </div>
            </div>
        </div>
        <div class="col-md-3" style="margin: 0px">
            <div class="card" style="width: 300px">
                <div class="card-header">Authors</div>
                <div class="card-body">
                    <p class="card-text">No of Authors: <?php echo get_author_count();?></p>
                    <a class="btn-success" href="admin_register_author.php">View Authors</a>
                </div>
            </div>
        </div>
    </div><br><br>
    <div class="row">
        <div class="col-md-3" style="margin: 0px">
            <div class="card" style="width: 300px">
                <div class="card-header">Issued Books</div>
                <div class="card-body">
                    <p class="card-text">No of issued books: <?php echo get_issue_book_count();?></p>
                    <a class="btn-success" href="admin_view_issued_book.php">View Issued Books</a>
                </div>
            </div>
        </div>
    </div>
    <br><br>

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