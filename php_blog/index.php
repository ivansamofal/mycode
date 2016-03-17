<? 
include 'model.php';
$connect = connect();
include 'header.php';

$articles = articles_all($connect);
include 'footer.php';