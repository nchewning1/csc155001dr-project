// print a delete button form.
function printDeleteButton($id)
{
    echo "<form action='deleteAccount.php' method='POST'>";
    echo "<input type='hidden' name='id' value='$id' />";
    echo "<input type='submit' name='selection' value='Delete' />";
    echo "</form>";
}
// handle which button got us here
if ($_POST['selection'] == 'Delete')
{
}
else if ($_POST['selection'] == 'Delete This Record')
{
}
else if ($_POST['selection'] == 'Cancel')
{
    header('Location: showAccounts.php');
}
$result = lookupuserNameByID($conn, $_POST['id']);
    if (!$result)
    {
        header('Location: showAccounts.php');
    }
$result = lookupuserNameByID($conn, $_POST['id']);
    if (!$result)
    {
        header('Location: showAccounts.php');
    }
    $row = $result->fetch_assoc();
else if ($_POST['selection'] == 'Delete This Record')
{
    $result = lookupuserNameByID($conn, $_POST['id']);
    if (!$result)
    {
        header('Location: showAccounts.php');
    }
    deleteUserRecord($conn);
    header('Location: showAccounts.php');
}
function deleteUserRecord($conn)
{
    // we've already verified $_POST['id']
    $stmt = $conn->prepare("UPDATE users SET deleted_at=?                                           $
                                         WHERE id=?");
    $stmt->bind_param("si", $time, $id);
    $time  = date("Y-m-d H:i:s");
    $id    = $_POST['id'];
    $stmt->execute();
}
