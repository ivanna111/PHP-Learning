<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>L2. Form test</title>
</head>
<body>
<form method="post">
<label for="name">Enter name:</label>
<input type="text" id="name" name="name"><br><br>

<label for="email">Enter email:</label>
<input type="email" id="email" name="email"><br><br>

<label for="age">Enter age:</label>
<input type="number" id="age" name="age"><br><br>
<input type="submit" value="Submit form">
     <?php
        //var_dump($_SERVER);
        if($_SERVER['REQUEST_METHOD']) == "POST"){
        echo "I got something";
        }


      ?>
</body>
</html>