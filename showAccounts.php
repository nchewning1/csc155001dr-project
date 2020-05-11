<html>
<head>
<?php
require ('library/functions.php');

// depending on the zone, call one of
//checkAccount("none");
//checkAccount("user");
checkAccount("admin");

$conn = getDBConnection();
?>
</head>
<body>
<?php printUserTable($conn); ?>
</body>
