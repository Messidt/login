<?PHP

    session_start();

    if(!isset($_SESSION['login']) || !isset($_SESSION['password'])) 
    {
        header('Location: index.php');
        exit();
    }

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
            if ($num_users > 0) 
            {
                $_SESSION['logged_in'] = true;
                
                $row = $result->fetch_assoc();
                $_SESSION['id'] = $row['id']; 
                $_SESSION['user'] = $row['user'];
                $_SESSION['wood'] = $row['wood'];
                $_SESSION['cows'] = $row['cows'];
                $_SESSION['crops'] = $row['crops'];
                $_SESSION['email'] = $row['email'];
                
                unset($_SESSION['error']);
                
                $result->free();
                
                header('Location: game.php');
            }
            else
            {
               $_SESSION['error'] = '<p style="color:red;">Incorrect username or password</p>';
               header('Location: index.php');
            }
        }
        
        $connection->close();
    

    }

    
    
?>