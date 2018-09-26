<?php 
echo $_SERVER['REMOTE_ADDR'];
include 'db.php';
if (isset($_POST['url'])) {

$url = $_POST['url'];
$rand = mt_rand (1000000,10000000);
$new_url = "http://localhost/" . $rand;

//insert into database
$sql = "INSERT INTO url (url, rand) VALUES ('$url', $rand);";
if (!mysqli_query($conn, $sql)) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shrink</title>
</head>
<body>
	<form action="index.php" method="POST">
		<label>Enter URL</label>
		<input type="text" name="url">
		<input type="submit" value="Shrink">
	</form>
	<h3><?php if (isset($new_url)) {
		echo $new_url;
	} ?></h3>
</body>
</html>