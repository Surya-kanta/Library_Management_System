<?php
$connection = mysqli_connect("localhost", "root", "tiger", "lms");
if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
if (isset($_GET['bn'])) {
    $book_no = (int) $_GET['bn'];
    $query = "DELETE FROM issued_books WHERE book_no = $book_no";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $query_update = "UPDATE books SET status = 0 WHERE book_no = $book_no";
        $query_update_run = mysqli_query($connection, $query_update);
        if ($query_update_run) {
            ?>
            <script type="text/javascript">
                alert("Book Returned successfully...");
                window.location.href = "admin_view_issued_book.php";
            </script>
            <?php
        } else {
            echo "<script>alert('Error Updating Book Status!');</script>";
        }
    } else {
        echo "<script>alert('Error Returning Book!');</script>";
    }
} else {
    echo "<script>alert('Invalid Request!');</script>";
}
mysqli_close($connection);
?>