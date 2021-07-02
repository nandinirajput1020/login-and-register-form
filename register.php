<html>
<head>
<link rel="stylesheet" href="css\css.css">
<?php
$err="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $password1=md5($_POST['password']);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="login";

    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    else
    {
        $query="select * from users where email='$email'";
        $result = $conn->query($query);

        if ($result->num_rows > 0)
        {
            $err="USER ALREADY EXIST!!";
        }
        else
        {
            $query="insert into users values('$name' , '$contact' , '$email' , '$password1')";
            if ($conn->query($query) === TRUE) 
            {
               $err="Registered Successfully!!";
            } 
            else 
            {
                echo "Error: " . $query . "<br>" . $conn->error;
            }
        }
    }
}
?>
</head>
<body>
	<div class="container">
		<h4 id="center"><?php echo $err; ?><br>
        Click The Below Link To Login!!<br>
        <a href="login.html">LOGIN</a></h4>
	</div>
</body>
</html>