<?php
if (isset($_POST["username"]) && isset($_POST["userage"])) {
      
    $conn = new mysqli("localhost", "root", "root", "testdb3");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $name = $conn->real_escape_string($_POST["username"]);
    $age = $conn->real_escape_string($_POST["userage"]);
    $sql = "INSERT INTO Users (name, age) VALUES ('$name', $age)";
    if($conn->query($sql)){
        echo "Данные успешно добавлены";
        echo '<script>location.href="index.php";</script>';

    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>