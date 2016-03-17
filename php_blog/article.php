<?
include 'model.php';
$connect = connect();
include 'header.php';



if (isset($_GET['id'])) {
    $id = $_GET['id'];
}


$result = mysqli_query($connect, "SELECT `title`, `text`, `date` FROM `blog` WHERE `id` = '$id'");
while ($row = mysqli_fetch_assoc($result)) {
 foreach ($row as $item) {
     /* echo $item. "<br/><hr/><br/>";  */
     echo $row['title']. "<br/><hr/><br/>". $row['text']."<br/><hr/><br/>"."Дата публикации ".$row['date'].'<br/>';
     break;
 }
}
?>
<a href="index.php">На главную</a>
<a href="edit.php?id=<?=$a?>">Редактировать статью</a>
<a href="delete.php?id=<?=$id?>">Удалить статью</a>
<?
    include 'footer.php';