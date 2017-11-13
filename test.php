<?php
$dir ='Tests/';
if (!is_dir($dir)){
    echo 'Папки не существует';
    exit();
}
$file = file_get_contents($dir. $_GET['Test']);
$data = json_decode($file, true);
/*echo '<pre>';
print_r($data);*/
?>
<html>
<head> 
    <meta charset="utf-8"> 
    <title>Процесс</title> 
</head>
<body>
<h2>Тест</h2> 
<form action="" method="POST">
            <fieldset name="question1">
                <legend><?= $data[0]['question']; ?></legend>
                <?php $i = 1; 
                foreach ($data[0] as $key) { 
                    if (array_key_exists('answer'.$i, $data[0])) { ?>
                        <label><input type="radio" name="question1" value='<?php echo $data[0]['answer'.$i]; ?>'><?php echo $data[0]['answer'.$i]; ?></label>
                        <?php $i++; ?>
                    <?php } ?>
                <?php } ?>
            </fieldset>
            <fieldset name="question2">
                <legend><?= $data[1]['question']; ?></legend>
                <?php $y = 1; 
                foreach ($data[1] as $key) { 
                    if (array_key_exists('answer'.$y, $data[1])) { ?>
                        <label><input type="radio" name="question2" value='<?php echo $data[1]['answer'.$y]; ?>'><?php echo $data[1]['answer'.$y]; ?></label>
                        <?php $y++; ?>
                    <?php } ?>
                <?php } ?>
            </fieldset>
            <p><input type="submit" name="submit" value='Отправить'></p>
<a href="list.php">Выбор тестов</a> 
</form>
<?php
if (isset($_POST['question1'])) {
    if ($_POST['question1'] == $data[0]['correct_answer']){
    echo 'На первый вы ответили правильно <br/>';
    } else echo "Неверно ответили на первый вопрос <br/>";
}
if (isset($_POST['question2'])) {
    if ($_POST['question2'] == $data[1]['correct_answer']){
    echo 'На второй вы ответили правильно';
    } else echo "Неверно ответили на второй вопрос";
}
?>
</body>
</html>