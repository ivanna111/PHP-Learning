<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Іванна Смородська">
    <title>Practice 5. PHP</title>
    <style>
        #product, #product th, #product td {
            border: solid 1px black;
        }

        .even {
            color: blue;
            font-weight: bold;
        }

        #chess td {
            border: 1px solid black;
            width: 25px;
            height: 25px;
        }

        #chess {
            border-collapse: collapse;
        }

        .dark {
            background-color: grey;
        }
    </style>
</head>
<body>
<h1>Practice 5. PHP</h1>
<p>Автор: Іванна Смородська. Варіант 9</p>
<h2>Task1</h2>
<p>
    Номер квитка складається із 6 цифр, а у «щасливому квитку» різниця чисел
    утворених трьома першими цифрами номера і трьома іншими іншими менша за
    суму усіх чисел.
</p>
<?php
$luckies = 0;
for ($i = 0; $i <= 999999; $i++) {
    $i = str_pad($i, 6, 0, STR_PAD_LEFT);
    $difference_left = intval(substr($i, 0, 3)) - intval(substr($i, 3, 3));
    $sum_right = intval(substr($i, 0, 1)) + intval(substr($i, 1, 1)) + intval(substr($i, 2, 1)) + intval(substr($i, 3, 1)) + intval(substr($i, 4, 1)) + intval(substr($i, 5, 1));
    if ($difference_left < $sum_right) {
        $luckies++;
    }
}
$luckies /= 1000000;
echo "Імовірність отримати щасливий квиток = $luckies"
?>

<h2>Task2</h2>
<p>
    Виведіть на сторінку таблицю множення.
    У таблиці повинні бути комірки із даними для результатів множення для чисел від 1 до 9 усіх крім
    6 та 8. У кожному із стовпців повинен бути пропущений рядок множення, де результатом
    множення є число, що лежить в межах від 13 до 18 включно. Усі числа у таблиці множення, які
    містять у собі цифру 4 <!--поиск по ряду strpos($cols, $col)--> повинні бути виділені жирним стилем шрифту та синім
    кольором.
</p>
<table id="product">
    <thead>
    <tr>
        <?php
        for ($i = 1; $i <= 9; $i++) {
            if ($i == 6 || $i == 8) continue;
            echo "<th ";
            if ($i == 4) {
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
        for ($i = 1; $i <= 9; $i++) {
            if ($i == 6 || $i == 8) continue;

            echo "<td>";
            for ($j = 1; $j <= 9; $j++) {
                if (($i * $j) >= 13 && ($i * $j) <= 18) continue;
                echo '<span';
                if ($i == 4) echo ' class="even"';
                echo '>';
                echo $i;
                echo "</span> x <span";
                if ($j == 4) echo ' class="even"';
                echo '>';
                echo $j;
                echo '</span> = <span ';
                if (!is_bool(strpos(strval($i * $j), "4"))) echo 'class="even"';
                echo '>';
                echo $i * $j;
                echo '</span>';

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
    $col_Kn = substr($cols, rand(0, strlen($cols) - 1), 1);
    $row_Kn = rand(1, 8);
    $des_col = substr($cols, rand(0, strlen($cols) - 1), 1);
    $des_row = rand(1, 8);


    echo 'Теперішня позиція коня ' . $col_Kn . $row_Kn . '<br>';
    echo 'Бажана позиція коня ' . $des_col . $des_row . '<br>';

    $dif_col = abs(strpos($cols, $col_Kn) - strpos($cols, $des_col));
    $dif_row = abs($row_Kn - $des_row);
    if (($dif_col === 1 && $dif_row === 2) || ($dif_col === 2 && $dif_row === 1)) {
        echo "Запропонований хiд можливий";
    } else {
        echo "Запропонований хiд не можливий";
    }
    ?>

<table id="chess">
    <tbody>
    <?php
    for ($i = 8; $i >= 1; $i--) {
        echo "<tr><th>";
        echo $i;
        echo "</th>";
        for ($j = 0; $j < 8; $j++) {
            echo "<td";
            if (($i + $j + 1) % 2 == 0) {
                echo ' class="dark"';
            }
            echo ">";
            if ($row_Kn == $i && strpos($cols, $col_Kn) == $j) {
                echo 'Kn';
            }
            if ($des_row == $i && strpos($cols, $des_col) == $j) {
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
        for ($j = 0; $j < 8; $j++) {
            echo "<th>";
            echo substr($cols, $j, 1);
            echo "</th>";

        }
        ?>
    </tr>
    </tfoot>
</table>

</body>