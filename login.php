<?PHP

    require_once 'connect.php';

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    if ($connection->connect_errno != 0) 
    {
        echo "Error: ".$connection->connect_errno.". Description: ".$connection->connect_error;
    }
    else
    {
        $user = $_POST['user'];
        $password = $_POST['password'];
    
        echo $user.' '.$password;
    }

    
    
?>