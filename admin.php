<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<title>Загрузка тестов</title> 
</head> 
<body> 
	<h2>Загрузка тестов</h2> 
	<form enctype="multipart/form-data" method="post"> 
		<p>Добрый день, загрузите, пожалуйста, пару тестов и перейдите на "Выбор тестов"</p> 
		<p><input type="file" name="uploadFile"></p> 
		<p><input type="hidden" name="MAX_FILE_SIZE" value="50000"></p> 
		<p><input type="submit" value="Отправить"></p> 
	</form>
	<a href="list.php">Выбор тестов</a> 
</body>
</html>
<?php
$uploaddir = 'Tests/';
if (!is_dir($uploaddir)){
    echo "Папки не существует. Создайте, пожалуйста, папку Tests в текущей директории";
    exit();
}
if(isset($_FILES["uploadFile"]["name"]) && !empty($_FILES["uploadFile"]["name"])){
	if($_FILES["uploadFile"]["error"] == UPLOAD_ERR_OK && move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $uploaddir . $_FILES['uploadFile']['name'])){
		echo 'Уже загружен(о) ' . (count(scandir($uploaddir))-2) . ' файл(ов)';
	} else{
	echo "Ошибка";
	}
}
?>