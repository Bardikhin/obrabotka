<?php
$dir ='Tests/';
if (!is_dir($dir)){
    echo 'Папки не существует';
    exit();
}
$list=scandir($dir);
array_shift($list);
array_shift($list);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Выбор тестов</title>
</head>
<body>
    <h2>Выберите тест</h2>
    <form enctype="multipart/form-data" action="test.php" method="GET">
        <?php if(isset($list)) {
                foreach ($list as $key => $values) { ?>
                <label><input type="radio" name="Test" value='<?php echo $list[$key] ?>'><?php echo $list[$key]; ?></label>
          <?php }
              } else echo 'Тесты не загружены'; ?>
    <p><input type="submit" value='Выбрать'></p>
    </form> 
    <a href="admin.php">Загрузить заново</a>
</body>
</html>