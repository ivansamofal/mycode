<?
include 'model.php';
$connect = connect();
include 'header.php';

$delete = article_delete($connect);