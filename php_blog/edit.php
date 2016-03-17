<?
session_start();
include 'model.php';
$connect = connect();
include 'header.php';
$edit = edit_article($connect);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$title = $_POST['title'];
$text = $_POST['text'];
$date = $_POST['date'];
} else {
    
        
    $title = $_SESSION['title'];
    $text = $_SESSION['text'];
    $date = $_SESSION['date'];
        
    
}


    ?>
    <form method="post">
    <input type="text" name="title" value="<?=$title?>"><br/>
    <textarea name="text"><?=$text?></textarea><br/>
    <input type="date" name="date" value="<?=$date?>"><br/>
    <input type="submit" name="submit" value="Добавить"><br/>
</form>
    
    
    <?
    include 'footer.php';