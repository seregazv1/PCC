<?php
// если команда не задана - выходим сразу
header('Content-Type: text/html; charset=UTF-8');
if (empty($_POST['command'])) exit;
require_once dirname(__FILE__) . '/connection.php';
// инициализация выходного массива данных
$data = array();
// обработка команд 
switch ($_POST['command']) {
case 'load-table':
	$id = empty($_POST['tableID'])? 'menu' : $_POST['tableID'];
	$res = mysqli_query($link, "SELECT * FROM ".$id);
	if ($res->num_rows)
		while ($r = $res->fetch_object())
			$data[] = $r;
		break;
case 'delete':
	$tableID = $_POST['tableID'];
	$id = empty($_POST['deleteID'])? 0 : $_POST['deleteID'];
	mysqli_query($link, "DELETE FROM ".$tableID." WHERE id = ".$id);
case 'edit':
	$tableID = $_POST['tableID'];
	$id = $_POST['iID'];
	$title = $_POST['titleID'];
	$text = $_POST['textID'];
	echo ($title + $text);
	mysqli_query($link, "UPDATE ".$tableID." SET title = ".$title." WHERE id = ".$id);
	//mysqli_query($link, "UPDATE ".$tableID." SET text = ".$text." WHERE id = ".$id);
case 'add':
	$tableID = $_POST['tableID'];
	$id = $_POST['id'];
	$alias = $_POST['alias'];
	$title = $_POST['title'];
	$text = $_POST['text'];
	mysqli_query($link, "UPDATE ".$tableID." SET alias_menu = ".$alias.", title = ".$title.", text = ".$text." WHERE id = ".$id);
}
echo json_encode($data, true);
?>
