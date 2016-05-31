<?
function connect () 
{
    $connect = mysqli_connect ('host', 'login', 'password', 'db');
  
    return $connect;
}



function articles_all ($connect) 
{
    $result = mysqli_query($connect, "SELECT `id`, `title`, `text`, `date` FROM `blog` ORDER BY `id` DESC");
while ($row = mysqli_fetch_assoc($result)) 
{
 foreach ($row as $item) 
 {
     /* echo $item. "<br/><hr/><br/>";  */
     $a = $row['id'];
     $b = "<a href='article.php?id=$a'>{$row['title']}</a>";
     echo '<h3>'. $b.'</h3>'. '<p>'. $row['text'].'</p>'.'<span>'."Дата публикации ".$row['date'].'</span>';
     
      
     ?>
     <a href="article.php?id=<?=$a?>">Читать полностью...</a>
     <a href="edit.php?id=<?=$a?>">Редактировать статью</a>
     <a href="delete.php?id=<?=$a?>">Удалить статью</a>
     <?
     echo '<hr/>';
     break;
 }
}
//return '<h3>'. $row['title'].'</h3>'. '<p>'. $row['text'].'</p>'.'<span>'."Дата публикации ".$row['date'].'</span>'.'<hr/>';
}

function articles_get ($connect, $id) 
{
    $result = mysqli_query($connect, "SELECT `id`, `title`, `text`, `date` FROM `blog` WHERE `id` = 'id'")/*or die (mysqli_error($connect))*/;
   /* $article = mysqli_fetch_assoc($result);*/
  /*  while ($row = mysqli_fetch_assoc($result)) {
     foreach ($row as $item) 
      echo $item . "<br><hr><br>";    
}    */
    
    var_dump($result);
    
    
    return $item;
    
}



function article_add($connect) 
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['submit']) and (!empty($_POST['title'])) and (!empty($_POST['text'])) and (!empty($_POST['date']))) 
    {
     $_SESSION['title'] = trim(htmlspecialchars(mysqli_real_escape_string($connect, $_POST['title'])));
     $_SESSION['text'] = trim(htmlspecialchars(mysqli_real_escape_string($connect, $_POST['text']))); 
     $_SESSION['date'] = trim(htmlspecialchars(mysqli_real_escape_string($connect, $_POST['date'])));
     $result = mysqli_query ($connect, "INSERT INTO `blog` (`title`, `text`, `date`) values ('{$_SESSION['title']}', '{$_SESSION['text']}', '{$_SESSION['date']}')")  or die (mysqli_error($connect));
     /* header('Location: index.php');
        exit(); */
        echo 'Статья успешно добавлена!';
    } else {
      
    }

}

function article_delete($connect) 
{
    if (isset($_GET['id']) and is_numeric($_GET['id']) === true) {
        $id = $_GET['id'];
        $result = mysqli_query($connect, "DELETE FROM `blog` WHERE `id` = '$id'");
        echo 'Статья успешно удалена!';
       // header( 'Refresh: 5; url=index.php' );
        
    }
    return true;
    
}

function edit_article($connect)
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['id']) and is_numeric($_GET['id']) === true) {
             $id = $_GET['id'];
             $result = mysqli_query($connect, "SELECT `title`, `text`, `date` FROM `blog` WHERE `id` = '$id'");
             while ($row = mysqli_fetch_assoc($result)) {
                 foreach ($row as $item)
                  $_SESSION['title'] = $row['title'];
                  $_SESSION['text'] = $row['text'];
                  $_SESSION['date'] = $row['date'];
                
                  }
          }
elseif (($_SERVER['REQUEST_METHOD'] == 'POST') and isset($_GET['id']) and (is_numeric($_GET['id']) === true) and isset($_POST['submit']) and (!empty($_POST['title'])) and (!empty($_POST['text'])) and (!empty($_POST['date']))) {
    $id = $_GET['id'];
    $title = trim(htmlspecialchars(mysqli_real_escape_string($connect, $_POST['title'])));
    $text = trim(htmlspecialchars(mysqli_real_escape_string($connect, $_POST['text'])));
    $date = trim(htmlspecialchars(mysqli_real_escape_string($connect, $_POST['date'])));
    $result = mysqli_query($connect, "UPDATE `blog` SET `title` = '$title', `text` = '$text', `date` = '$date' WHERE `id` = '$id'");
    
        }
     // return true
}

function template ($fileName, $vars = array()) 
{
    foreach ($vars as $key => $value)
    {
     $$key = $value;   
    }
    ob_start();
    include $fileName;
    return ob_get_clean();
        
}
