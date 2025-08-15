<?php
	$connection = mysqli_connect("localhost","root","tiger","lms");
	$query = "delete from category where cat_id = $_GET[cid]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Category Deleted successfully...");
	window.location.href = "admin_manage_cate.php";
</script>