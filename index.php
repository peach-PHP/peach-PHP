<?php

/*
|===============================================
|   including requires here
|===============================================
*/
require_once 'connect.php';

$query = "SELECT * FROM files";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result)) {

?>

<form action="http://<?php echo $row['server_loc'] ?>/dwd/master.php" method="post">
	<p><?php echo $row['title']; ?> -- <?php echo $row['orig_name']; ?></p>
	<input type="hidden" name="file" value="<?php echo $row['file_hash'] ?>">
	<input type="submit" name="submit">
</form>
<hr>

<?php

}

?>