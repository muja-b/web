<?php
$mysqli = new mysqli("localhost","root","","webproject");
$username = $_POST['username'];
$password = $_POST['password'];

session_start();
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

$sql = "select * from users where id = '$username' and password = '$password'";


if ($result = $mysqli -> query($sql)) {
    if ($result->num_rows > 0) {
        while ($row = $row = $result->fetch_assoc()) {
            $_SESSION['username'] = $row['name'];
            $_SESSION['Userid']=$row['id'];
            if($username =="1111")
            header("location:admin.php");
            else
                header("location:dashboard.php");
        }
        $result->free_result();

    } else{
        $GLOBALS ["wrong_password"]="incorrect password or email";
        header("location:signIn.php?isWrong=true");

    }

}
$mysqli -> close();
?>

