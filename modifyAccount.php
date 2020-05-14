<html>
<head>
<title>CSC155001dr-project</title>
<?php

require ('library/functions.php');

checkAccount("admin");

$conn = getDBConnection();

// get the record information from $id (testing)
$result = lookUpUserNameByID($conn, $_POST['id']);
$row = $result->fetch_assoc();
echo $row['username'];

// handle which button got us here
if ($_POST['selection'] == 'Edit')
{
    echo 'editing';
}
else if ($_POST['selection'] == 'Apply Changes')
{
    echo 'applying changes';
}
else if ($_POST['selection'] == 'Reset Changes')
{
    echo 'resetting changes';
}
else if ($_POST['selection'] == 'Cancel')
{
    echo 'cancelling';
}
else
{
   echo 'unknown selection';
}

if ($_POST['selection'] == 'Edit')
{
    $result = lookupuserNameByID($conn, $_POST['id']);
    if (!$result)
    {
        header('Location: showAccounts.php');
    }
    $row = $result->fetch_assoc();
}

else if ($_POST['selection'] == 'Apply Changes')
{
    $result = lookupuserNameByID($conn, $_POST['id']);
    if (!$result)
    {
        header('Location: showAccounts.php');
    }
    updateUserRecord($conn);
    header('Location: showAccounts.php');
}

else if ($_POST['selection'] == 'Cancel')
{
    header('Location: showAccounts.php');
}
else
{
    header('Location: showAccounts.php');
}


?>
</head>
<body>
You are editing record number <?php echo showPost('id'); ?>

<form method='POST'>
    <input type='hidden' name='id' value='<?php echo showPost('id'); ?>' />
<form method='POST'>
    <input type='hidden' name='id' value='<?php echo showPost('id'); ?>' />
<div style='border-width: 2px'>
<table id='userform'>
<tr>
  <td>Username</td>
  <td><?php echo $row["username"]; ?></td>
</tr>
<tr>
  <td>Email</td>
  <td> <input type='text' name='email' value='<?php echo $row["email"]; ?>'/></td>
</tr>
<tr>
  <td colspan='2' style='text-align: center; background-color: white;'>
    <input type='submit' name='selection' value='Apply Changes' />
    &nbsp;
    <input type='submit' name='selection' value='Reset Changes' />
    &nbsp;
    <input type='submit' name='selection' value='Cancel' />
  </td>

</body>
</html>
