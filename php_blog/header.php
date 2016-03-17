<? 
error_reporting(-1);
mb_internal_encoding("utf-8");
mysqli_query($connect, "set names utf8"); 
mysqli_prepare($connect, "set names utf8");
?>


<!DOCTYPE html>
<html>
<head>
  <link href="style.css" rel="stylesheet">
</head>
<body>
    <a href="index.php"><img src="img/logo.png" alt="" width="1080px" height="150px" aligh="center"></a>
    <nav>
        <ul>
            <li><a href="index.php">Главная</a></li>
            <li><a href="add.php">Добавить новую статью</a></li>
            </ul>
    </nav>
</body>
</html>