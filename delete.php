<?php
if(isset($_POST["id"]))
{
    $conn = new mysqli("localhost", "root", "root", "testdb3");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $userid = $conn->real_escape_string($_POST["id"]);
    $sql = "DELETE FROM Users WHERE id = '$userid'";
    if($conn->query($sql)){
         
        echo '<script>location.href="index.php";</script>';
    }
    else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();  
}
?>