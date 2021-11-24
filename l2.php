<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP. Lesson 3</title>
</head>
<body>
<?php
$arr1 = array('a', 'c', 'cat');
echo $arr1[2], "<br>";
echo $arr1[1], "<br>";
var_dump($arr1);
for($i = 0;$i<count($arr1); $i++){
    echo $arr1[$i], "<br>";
    }
        $arr2 = array(
        "name" => "Valeriy",
         "fruit" => "tomato",
         "animal" => "cat");
         echo $arr2['name'], "<br>";
         echo $arr2['animal'], "<br>";
         $arr2['animal'] = 'dog';
         echo $arr2['animal'], "<br>";
        foreach ($arr2 as $key_arr2 => $value_arr2) {
            echo "Key = ", $key_arr2, " value = ", $value_arr2, "<br>";
}

        $arr3 = array(
        array(1, 2, 3),
        array(4, 5, 6),
        array(7, 8, 9)
        );
        echo $arr3[0][1];

        function f1($number1, $number2){
       /* echo "Hello $word world! $number", "<br>";*/
       $result = $number1+$number2;
       return $result;
        }

        echo "<br>",f1(3, 5), f1(10, 2), "<br>";
        echo date('d-m-Y'), "<br>";
        echo date('d-m-y'), "<br>";
        echo date('d/m/y'), "<br>";
        echo date('1'), "<br>";
        $our_date = mktime(0, 0, 0, 5, 20, 2013);
        var_dump($our_date);
        echo date('d/m/y', $our_date), "<br>";
        $our_date = strtotime('10/10/2013');
         var_dump($our_date);
                echo date('d/m/y', $our_date), "<br>";


?>



</body>
</html>