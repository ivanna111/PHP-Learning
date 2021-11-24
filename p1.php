<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Honey Badger">
    <title>Practice 5. PHP</title>
    <style>
    #product, #product th, #product td{
    border: solid 1px black;}
    .even{
    color:green;
    font-weight:bold;}
    #chess td{
    border: 1px solid black;
    width: 25px;
    height: 25px;}
    #chess {
    border-collapse: collapse;}
    .dark{
    background-color:grey;}
    </style>
</head>
<body>
    <h1>Practice 5. PHP</h1>
    <p>Автор: Honey Badger. Варіант 0</p>
    <h2>Task1</h2>
    <p>
        Номер квитка складається із 4 цифр, а у «щасливому квитку» сума
        двох перших чисел номера дорівнює сумі двох інших.
    </p>
    <?php
    $luckies = 0;
    for($i=0; $i<=9999; $i++){
    $i=str_pad($i, 4, 0, STR_PAD_LEFT);
    $sum_left = intval(substr($i, 0, 1)) + intval(substr($i, 1, 1));
    $sum_right = intval(substr($i, 2, 1)) + intval(substr($i, 3, 1));
    if($sum_left==$sum_right){
    //echo $i, "<br>";
    $luckies++;}
    }
    $luckies/=10000;
    echo "Імовірність отримати щасливий квиток = $luckies"

    ?>
    <h2>Task2</h2>
    <p>
        Виведіть на сторінку таблицю множення для чисел від 1 до 9 усіх крім 4. 
        У кожному із стовпців повинен бути пропущений рядок множення на 7.
        Усі парні числа у таблиці множення повинні бути виділені жирним стилем шрифту та зеленим кольором.
    </p>
    <table id="product">
        <thead>
            <tr>
            <?php
                for($i=1; $i<=9; $i++){
                    if($i == 4) continue;
                    echo "<th ";
                    if($i%2==0){
                    echo 'class="even"';
                    }
                    echo ">";
                    echo $i;
                    echo "</th>";
                }
            ?>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
             for($i=1; $i<=9; $i++){
                 if($i == 4) continue;
                 echo "<td>";
                                     for($j=1; $j<=9; $j++){
                                     if($j==7) continue;
                                     if($i%2==0) echo '<span class="even">';
                                     echo $i;
                                     if($i%2==0) echo '</span>';
                                     echo " x ";
                                     if($j%2==0) echo '<span class="even">';
                                     echo $j;
                                     if($j%2==0) echo '</span>';
                                     echo ' = ';
                                     if(($i*$j)%2==0) echo '<span class="even">';
                                     echo $i*$j;
                                     if(($i*$j)%2==0) echo '</span>';
                                     echo "<br>";
                                     }
                                  echo "</td>";
             }
             ?>
            </tr>
        </tbody>

    </table>
    <h2>Task3</h2>
    <p>
       Хід королеви. 
    </p>
    <p>
    <?php
        $cols = 'abcdefgh';
        $col = substr($cols, rand(0, strlen($cols)-1), 1);
        $row = rand(1, 8);
        $des_col = substr($cols, rand(0, strlen($cols)-1), 1);
        $des_row = rand(1, 8);
        /*$col = 'b'; $des_col='b';
        */


        echo 'Теперішня позиція королеви '.$col.$row.'<br>';
        echo 'Бажана позиція королеви '.$des_col.$des_row.'<br>';

        $result = false;
        if(($col===$des_col && $row!=$des_row) ||
        ($col!==$des_col && $row==$des_row)
        ){
        $result=true;
        } elseif(abs($row-$des_row) == abs(strpos($cols, $col)-strpos($cols, $des_col))){
            if ($col!==$des_col && $row!=$des_row){
                $result=true;
            }


        }
        if($result == true){
        echo "Запропонований хід можливий";
        }
        else {
         echo "Запропонований хід не можливий";
        }




    ?>
    <table id="chess">
    <tbody>
    <?php
    for($i=8; $i>=1; $i--){
    echo "<tr><th>";
       echo $i;
    echo "</th>";
    for($j=0; $j<8; $j++){
    echo "<td";
    if(($i+$j+1)%2==0){
    echo ' class="dark"';
    }
    echo ">";
    if($row == $i && strpos($cols, $col)==$j){
    echo 'Q';
    }
    if($des_row == $i && strpos($cols, $des_col)==$j){
        echo 't';
        }
    echo "</td>";
    }
    echo "</tr>";
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
    <th></th>
    <?php
    for($j=0; $j<8; $j++){
    echo "<th>";
    echo substr($cols, $j, 1);
    echo "</th>";

    }
    ?>
    </tr>
    </tfoot>
    </table>
    </p>
</body>