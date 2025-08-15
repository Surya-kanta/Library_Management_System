<?php
	$connection = mysqli_connect("localhost","root","tiger","lms");
	$query = "delete from books where book_no = $_GET[bn]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Book Deleted successfully...");
	window.location.href = "admin_manage_book.php";
</script>