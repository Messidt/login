<?PHP
    session_start();

    // If user is logged in we automatically redirect him to game.php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) 
    {
        header('Location: game.php');
        exit();
    }

?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title>The Farmers</title>
</head>
<body>
   <div class='container'>
       <h1>Please Log In</h1>
       <form action="login.php" method='post'>
           <label for="login">User name:</label>
           <input type="text" id='login' name='login' placeholder='Username'>
           <label for="password">Password:</label>
           <input type="password" id='password' name='password' placeholder='Password'>
           <input type="submit" value='Enter'>
       </form>
       <?PHP
    
        // If login or password is incorrect, warning message is shown
        if(isset($_SESSION['error'])) {
            echo "<p id='log-error'>".$_SESSION['error']."</p>";
        }
    
       ?>
   </div>
   
   
    
</body>
</html>