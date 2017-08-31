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
   
    echo "Witaj ".$_SESSION['user']."!";
    
   ?>
</body>
</html>