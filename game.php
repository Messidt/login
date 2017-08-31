<?PHP 
    session_start();
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Farmers</title>
</head>
<body>
   <?PHP
   
    echo "<h2>Witaj ".$_SESSION['user']."!</h2>";
    echo "<p>Drewno: ".$_SESSION['wood']."</p>";
    echo "<p>Liczba krów: ".$_SESSION['cows']."</p>";
    echo "<p>Plony: ".$_SESSION['crops']."</p>";
    echo "<p>Email: ".$_SESSION['email']."</p>";
    
   ?>
</body>
</html>