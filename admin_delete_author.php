<?php
	$connection = mysqli_connect("localhost","root","tiger","lms");
	$query = "delete from authors where author_id = $_GET[aid]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Author Deleted successfully...");
	window.location.href = "admin_manage_auth.php";
</script>