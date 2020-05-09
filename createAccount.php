if (isset($_POST['selection'])) // form loaded itself
{

    if ($_POST['selection'] == "Create Account") // insert new record chosen
    {
        // store the record (next slide)
        header("Location: welcome.php");
    }
    if ($_POST['selection'] == "Cancel") // insert new record chosen
    {
        header("Location: welcome.php");
    }
}
$stmt = $conn->prepare("INSERT INTO users
                       (username, encrypted_password, usergroup, email)
                       VALUES (?, ?, ?, ?)" );
        $stmt->bind_param("ssss", $username, $encrypted_password,
                                  $usergroup, $email);
        $username=$_POST['username'];
        $encrypted_password="none set";
        $usergroup="user";
        $email="none set";
        $stmt->execute();

<form method='POST'>
Username: <input type='text' name='username' /> <br />
<input type='submit' name='selection' value='Create Account' />
<input type='submit' name='selection' value='Cancel' />
</form>

