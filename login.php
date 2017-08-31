<?PHP

    session_start();

    require_once 'connect.php';

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    if ($connection->connect_errno != 0) 
    {
        echo "Error: ".$connection->connect_errno.". Description: ".$connection->connect_error;
    }
    else
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        
        $query = "SELECT * FROM users WHERE user = '$login' AND pass = '$password'";
        
        if($result = @$connection->query($query))
        {
            $num_users = $result->num_rows;
            if ($num_users > 0) {
                
                $row = $result->fetch_assoc();
                $_SESSION['user'] = $row['user'];
                
                $result->free();
                
                header('Location: game.php');
            }
        }
        
        $connection->close();
    

    }

    
    
?>