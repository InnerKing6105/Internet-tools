<?php include "../includes/header.php"; ?>
<?php include "../config.php"; ?>



<?php
$sql = "SELECT * FROM string_info";
$result = $conn->query($sql);

 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["string_id"]. " - Message: " . $row["message"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
</head>
<body>
    <form action="delete.php" method="post">
        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required>
        <input type="submit" value="Delete">
    </form>
</body>
</html>



<a href="../index.php">Go back</a>
