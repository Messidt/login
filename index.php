<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game login</title>
</head>
<body>
   <h1>Please log in</h1>
   <form action="login.php" method='post'>
       <label for="user">User name:</label>
       <input type="text" id='user' name='user'>
       <label for="password">Password:</label>
       <input type="password" id='password' name='password'>
       <input type="submit" value='Log In'>
   </form>
    
</body>
</html>