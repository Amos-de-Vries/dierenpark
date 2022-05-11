<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="view/assets/style.css">
</head>
<body>

<!-- messageBox -->
<div class="messageBox">
<?php 
    if (isset($msg)) {
        echo "<h3>$msg </h3>";
    } else {
        echo "<h3>No recent Notifications</h3>";
    }    
?>


</div>