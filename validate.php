<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\css.css">
    <title>Document</title>
    <?php
    $err="";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $user=$_POST["user"];
        $pass=md5($_POST["password"]);

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
            $query="Select * from users where (email='$user' or contact='$user') and password='$pass'";
            $result=$conn->query($query);
            if ($result->num_rows > 0)
            {
                $err="YOU ARE A VALID USER!!";
            }
            else
            {
                $err="IVALID USER OR PASSWORD!!";
            }
        }
    }
?>
</head>
<body>
    <div class="container">
		<div id="center">
            <?php echo $err; ?><br>
            <a href="index.html">Register Now</a><br>
            Or<br>
            <a href="login.html">Go Back To Login Page!!</a>
        </div>
    </div>
</body>
</html>