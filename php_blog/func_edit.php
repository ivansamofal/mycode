<?
function edit_article ($connect)
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['id']) and is_numeric($_GET['id']) === true) 
         {
             $id = $_GET['id'];
             $result = mysqli_query($connect, "SELECT `title`, `text`, `date` FROM `blog` WHERE `id` = '$id'");
             while ($row = mysqli_fetch_assoc($result)) {
                 foreach ($row as $item)
                     echo $row['title'];
                  }
          }
elseif ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['submit']) and !empty(S_POST['title']) and !empty($_POST['text']) and !empty($_POST['date']) )
        {
    $title = trim(htmlspecialchars(mysqli_real_escape_string($connect, $_POST['title'])));
    $text = trim(htmlspecialchars(mysqli_real_escape_string($connect, $_POST['text'])));
    $date = trim(htmlspecialchars(mysqli_real_escape_string($connect, $_POST['date'])));
    $result = mysqli_query($connect, "UPDATE `blog` SET `title` = '$title', `text` = '$text', `date` = '$date'");
        }
      return true
}