<?
session_start();
include 'model.php';
$connect = connect();
include 'header.php';

$article = article_add($connect);

$title = $_SESSION['title'];
$text = $_SESSION['text'];
$date = $_SESSION['date'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $title = trim(htmlspecialchars(mysqli_real_escape_string($connect, $_POST['title'])));
 $text = trim(htmlspecialchars(mysqli_real_escape_string($connect, $_POST['text'])));
 $date = trim(htmlspecialchars(mysqli_real_escape_string($connect, $_POST['date'])));
} else {
    $title = '';
    $text = '';
    $date = '';
}

?>
<form method="post">
    <input type="text" name="title" value="<?=$title?>" placeholder="Введите заголовок статьи"><br/>
    <textarea name="text" placeholder="Введите текст статьи"><?=$text?></textarea><br/>
    <input type="date" name="date" value="<?=$date?>"><br/>
    <input type="submit" name="submit" value="Добавить"><br/>
</form>


<?
include 'footer.php';