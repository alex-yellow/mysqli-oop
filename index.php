<!DOCTYPE html>
<html>
<head>
<title>Справочник пользователей</title>
<meta charset="utf-8" />
</head>
<body>
<h2>Список пользователей</h2>
<h2><a href="form.php">Добавить пользователя</a></h2>
<?php
$conn = new mysqli("localhost", "root", "root", "testdb3");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT * FROM Users";
if($result = $conn->query($sql)){
    echo "<table><tr><th>Имя</th><th>Возраст</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td><a href='user.php?id=" . $row["id"] . "'>Подробнее</a></td>";
            echo "<td><a href='update.php?id=" . $row["id"] . "'>Изменить</a></td>";
            echo "<td><form action='delete.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input type='submit' value='Удалить'>
                </form></td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>
</body>
</html>