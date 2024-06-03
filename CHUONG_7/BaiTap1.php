<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML and PHP Example</title>
</head>
<body>

<h1>Hello, <?php echo "World!"; ?></h1>

<?php
// Lấy thời gian hiện tại và hiển thị nó
$current_time = date('Y-m-d H:i:s');
echo "<p>Current time is: $current_time</p>";
?>

</body>
</html>