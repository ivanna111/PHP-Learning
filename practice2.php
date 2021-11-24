<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice 6. PHP</title>
    <style>
        body{
            margin:10%;
        }
</head>
<body>
    <h1>Practice 6. PHP</h1>
    <p>Автор: Honey Badger. Варіант 0</p>
    <h2>Task1</h2>
    <p>
Число А повинно бути цілим числом від 1 до 100000.
        Масив повинен заповнюватися рандомними цілими значеннями
        в межах від 1 до 10 до тих пір, доки добуток усіх елементів
        масиву не становитиме більше А.
Масив необхідно відсортувати у порядку зростання.
Статистичні дані, що необхідно отримати: добуток усіх значень,
        максимальне значення, мінімальне значення,
        різницю максимального і мінімального значень.

    </p>
      <form method="get">
                        <label for="A"></label><br><br>
        <input type="number" min="1" max="100000" step="1" id="A" name="A">
        <input type="submit" value="Увести"><br>
        </form>
                                                                                                                                                                                                      <?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!empty($_GET['nabe'])){
        $A = $_GET['A'];
        $arr = [];
        while(array_product($arr) <= $A){
            $arr[] = rand(1, 10);


        }
        echo "Число А = $A. <br>";
        echo "Добуток елементів масиву становить ".array_product($arr) ."<br>";

      sort($arr);
        $stats = array(
                'product' => array_product($arr),
                'max' => max($arr),
                'min' => min($arr),
                'max_min_diff' => max($arr)-min($arr)
        );
         //var_dump($stats);
         echo "Елементи масиву мають наступні значення: <br>";
         echo "arr = [";
         for ($i=0; $i < count($arr); $i++) {
             echo $arr[$i];
             if($i < count($arr)-1) echo ", ";
         }
         echo "]. <br>";
         echo "Статистика по масиву: <br>";
         foreach ($stats as $key => $value) {
             echo "$key = $value <br>";
         }
    }
}
 ?>

    <h2>Task2</h2>
    <p>
Виведіть на сторінку скіьки днів залишилось до дня народження Тараса Шевченка.
    </p>
    <p>
Тарас Шевченко народився <time datetime="1814-03-09">9 березня 1814 року</time>.
    </p>
        <p>
      До дня народження Тараса Шевченка
      <?php
      $birthday = date('Y')."-03-09";
     // var_dump($birthday);
      $now = date('Y-m-d');
     // var_dump($now);
     $days_to_birthday = diff($$birthday, $now);
    // &$days_to_birthday = 18;
     echo diff($birthday, $now);
        $lastchar = substr($days_to_birthday, -1, 1);
     if(strlen($days_to_birthday) > 1){
        $pre_lastchar = substr($days_to_birthday, -2, 1);
        if($pre_lastchar == 1){
            $day_form = 'днів';
         } else {
            if($lastchar == 1){
                $day_form = 'день';

            }
            if($lastchar == 2 or $lastchar == 3 or $lastchar == 4){
                $day_form = 'дні';
            } else{
                $day_form = 'днів';
            }

         }
     } else {

     }

        //echo $days_to_birthday." ". $day_form. "
      function diff($date1, $date2){
          $date1 = strtotime($date1);
          $date2 = strtotime($date2);
          $difference = $date2 - $date1;
          $difference /=(60*60*60*24);
          $difference = round($difference);
          if($difference < 0) $difference+=365;
          return $difference;
         // var_dump($difference);

      }
      ?>
      </p>

    <h2>Task3</h2>
    <p>
Конвертер одиниць валюти.
Доступні для конвертування одиниці: UAH, USD, EUR.
Точність виведення результату – 0,01.
</p>
<?php
$to = ''; $from = ''; $amount = '';
$toErr = ''; $fromErr = ''; $amountErr="";
$print_or_not = true;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(!empty($_POST['to'])){
        if (currency_check($_POST['to']) == false){
            $toErr = "Значення поля введення не коректне.";
        } else {
            $to = $_POST['to'];//все ок
        }
        }
        else {
            $toErr = "Дане поле обов'язкове для введення";
            $print_or_not = false;
        }
        if(!empty($_POST['from'])){
        if (currency_check($_POST['from']) == false){
            $fromErr = "Значення поля введення не коректне.";
        } else {
            $fromErr = "Дане поле обов'язкове для введення";
            $print_or_not = false;
        }
        if(!empty($_POST['amount'])){
        if (currency_check($_POST['amount']) == false){
            $amountErr = "Значення поля введення не коректне.";
        }
        else {
            $amountErr = "Дане поле обов'язкове для введення";
            $print_or_not = false;
        }

    }
    function currency_check($input){
        $cur = array('UAH', 'USD', 'EUR');
        $input = htmlspecialchars($input);
        for ($i=0; $i < count($cur) ; $i++) {
            if($cur[$i] === $input)
            return true;
        }
        return false;
    }
 ?>
<form method="post" novalidate>

<input type="number" name="amount"><br>
        <label for="form">Перевести у:</label>
        <select name="to" id="to">
        <option value="UAH">UAH</option>
         <option value="USD">USD</option>
         <option value="EUR">EUR</option>
        </select>
        <br>
        <input type="submit" value="Конвертувати"
        <br><br>
</form>

</body>
</html>