<?php
	session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Issued Bookes</title>
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="login_library.css">
</head>

<body>
    <header>
        <div class="logo">
            <a href="student_dashboard.php">
                <img class="logo" src="favicon.png" alt="Library Logo">
            </a>
        </div>
        <nav>
            <ul class="nav-links">
                <li>Email: <?php echo $_SESSION['email']; ?></li>
                <li class="dropdown">
                    <button class="dropbtn">My Profile</button>
                    <div class="dropdown-content">
                        <a href="student_view_profile.php">View Profile</a>
                        <a href="student_edit_profile.php">Edit Profile</a>
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
    <center>
        <h3>Issued Bookes</h3>
    </center>
    <form>
        <table class="table-bordered" width="900px" style="text-align: center">
            <tr>
                <th>Name</th>
                <th>Author</th>
                <th>Book No</th>
                <th>Issue Date</th>
                <th>Return Date</th>
            </tr>

            <?php
                $connection = mysqli_connect("localhost", "root", "tiger", "lms");
                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $query = "select book_name,author_name,book_no,issue_date,return_date from issued_books where student_id = $_SESSION[id]";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)){
			?>
            <tr>
                <td><?php echo $row['book_name'];?></td>
                <td><?php echo $row['author_name'];?></td>
                <td><?php echo $row['book_no'];?></td>
                <td><?php echo $row['issue_date'];?></td>
                <td><?php echo $row['return_date'];?></td>
            </tr>

            <?php
					}
			?>
        </table>
    </form>
    <marquee behavior="alternate" style="color: green; font-weight: bold; font-size: 20px;">
    Book return in 30 days... Hurry up!
    </marquee>

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