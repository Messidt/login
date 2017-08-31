<?PHP

    session_start();

    // If user isn't logged in he won't have access to game.php using url adress;
    if((!isset($_POST['login'])) || (!isset($_POST['password']))) 
    {
        header('Location: index.php');
        exit();
    }

    require_once 'connect.php';

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    // If we cannot connect to database
    if ($connection->connect_errno != 0) 
    {
        // Show error
        echo "Error: ".$connection->connect_errno.". Description: ".$connection->connect_error;
    }
    else
    {
        // Otherwise get login and password from index.php form
        $login = $_POST['login'];
        $password = $_POST['password'];
        
        // prevent from MySQL injection
        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        $password = htmlentities($password, ENT_QUOTES, "UTF-8");
        
        // We select all data matching to user and his password (unsafe)
        //$query = "SELECT * FROM users WHERE user = '%s' AND pass = '%s'";
        
        //We use instead mysqli_escape_string() function - also prevents MySQL injection
        
        if($result = @$connection->query(
            sprintf("SELECT * FROM users WHERE user = '%s' AND pass = '%s'",
            mysqli_escape_string($connection, $login),
            mysqli_escape_string($connection, $password))))
        {
            // How many users we've found (It always should be 1 or 0)
            $num_users = $result->num_rows;
            // If there's a match
            if ($num_users > 0) 
            {
                // this variable helps us with denying access to game.php using direct url address
                $_SESSION['logged_in'] = true;
                // We put the data in associacion table
                $row = $result->fetch_assoc();
                // and we set user data as session variables so we have acces to them in other files
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