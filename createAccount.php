<html>
<head>
<title>CSC155 001DR Survey Thing</title>
<?php

function databaseConnection(){

  $user = "nchewning1";
  $conn = mysqli_connect("localhost",$user,$user,$user);
  if (mysqli_connect_errno()) {
      die("<b>Failed to connect to MySQL: " . mysqli_connect_error() . "</b>");
        }

        return $conn;

if (isset($_POST['submit'])) // form loaded itself
        {
   if ($_POST['submit'] == "Create Account") // insert new record chosen
        {
         $stmt = $conn -> prepare("INSERT INTO users (usrname,encrypted_password,usergroup,email,firstName,lastName) VALUES (?,?,?,?,?,?)");
         $stmt -> bind_param("ssss",$usrname,$encrypted_password, $usergroup,$email,$firstName,$lastName);
         $username= $_POST['username'];
         $encrypted_password="none set";
         $usergroup="user";
         $email="none set";
         $firstName=$_POST['firstName'];
         $lastName=$_POST['lastName'];
         $stmt -> execute();

        header("Location: welcome.php");
        }
if ($_POST['submit'] == "Cancel") // insert new record chosen
        {
         header("Location: welcome.php");
        }
}
}

?>

<style>
table, td, th {
  border: 0px solid black;
}

table {
  border-width: 2px;
  margin-left: auto;
  margin-right: auto;
  padding: 3;

}

td {
  vertical-align: bottom;
  text-align: right;
  padding: 4;
  background-color: antiquewhite;
}
</style>

</head>
<body>

<form method='POST'>
<div style='border-width: 2px'>
<table>
<tr>
  <td>Username</td>
  <td><input type='text' name='username' /></td>
</tr>
<tr>
  <td>Password</td>
  <td><input type='password' name='password' /> </td>
</tr>
<tr>
  <td>Confirm Password</td>
  <td> <input type='password' name='confirm' /></td>
</tr>
<tr>
  <td>Email</td>
  <td> <input type='text' name='email' /> </td>
</tr>
<tr>
  <td colspan='2' style='text-align: center; background-color: white;'>
    <input type='submit' name='selection' value='Create Account' />
    &nbsp;
    <input type='submit' name='selection' value='Cancel' />
</body>
</html>


