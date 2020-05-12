<?php

function checkAccount($zone)
{
	// zone is either 'user' or 'admin' , anything else is considered
	// 'none' or publicly accessible

	/// we start the session in checkAccount to make sure its called.
	session_start();
}

function getDBConnection()
{
	$user = "nchewning1";
	$password = "nchewning1";
	$database = "nchewning1";

	$conn = mysqli_connect("localhost",$user,$password,$database);

	if (mysqli_connect_errno())
{
	    die("<b>Failed to connect to MySQL: " . mysqli_connect_error() . "</b>");
	}

	return $conn;
}

function printUserTable($conn)
{
    // build the SQL that pulls the data from the database
    $sql = "SELECT * FROM users;";
    $result = $conn->query($sql);

    echo "<table id='usershow'>";
    if ($result->num_rows > 0)
    {
	// column headers
	echo "<tr>";
	echo "<th>ID</th>"
	   . "<th>USERNAME</th>"
	   . "<th>ENCRYPTED PASSWORD</th>"
	   . "<th>FIRST NAME</th>"
	   . "<th>LAST NAME</th>"	;
	echo "</tr>";

	// loop through all the rows
	while( $row = $result->fetch_assoc() )
	{
	    echo "<tr>";
	    echo "<td>" . $row["id"] . "</td>"
	       . "<td>" . $row['username']. "</td>"
	       . "<td>" . $row["encrypted_password"] . "</td>"
	       . "<td>" . $row['first_Name']. "</td>"
	       . "<td>" . $row['last_Name']. "</td>";
	    echo "</tr>";
	}
    }
    else
    {
	//empty table
	echo "<tr><td>0 results</td></tr>";
    }
    echo "</table>";
}

?>
</head>

<body>
</body>
</html>
