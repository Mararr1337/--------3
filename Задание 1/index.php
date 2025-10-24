<?php
// Выведите слова, которые встречаются в каждой из двух заданных строк.
// Напишите функцию функцию countEqualWord($str1,$str2),
// принимающую параметрами две строки слов с пробелами между ними
// и возвращающую массив слов(правильно индексированный), которые есть в обеих строках.
// Задайте две строки  в форме и выведите на экран обе эти строки и результирующий массив  
?>
<?php
function countEqualWord($str1,$str2){
$word1=explode(' ', $str1 );
$word2=explode(' ', $str2 );
$common=array_intersect( $word1, $word2 );
return array_values( $common );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="$_GET">
        <input type="text" name="str1" value="<?php if (isset($_GET['str1'])) {echo $_GET['str1'];}?>">
        <input type="text" name="str2" value="<?php if (isset($_GET['str2'])) {echo $_GET['str2'];}?>">
        <input type="submit" value="Найти">
    </form>
</body>
</html>
<?php
 if (isset($_GET['str1']) and (isset($_GET['str2']))){
    $str1=$_GET['str1'];
    $str2=$_GET['str2'];
    $result=countEqualWord($str1,$str2);
echo"Строка 1:,", $str1,'<br>';
echo"Строка 2:,", $str2,'<br>';
echo"Общие слова:", implode(', ', $result);
}
?>