<?php include "includes/header.php"; ?>
<?php require "config.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Text into Database</title>
</head>
<body>
    <form action="php/insert.php" method="post">
        <label for="name">Enter Message:</label>
        <input type="text" id="name" name="name">
        <input type="submit" value="Submit">
    </form>
</body>
<a href="php/showall.php"> Click to See Reccords </a>
</html>
