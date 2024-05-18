<!DOCTYPE html> 
<html lang="en"> 
    <head>     
        <meta charset="UTF-8">     
        <meta name="viewport" content="width=device-width, initial-scale=1.0">     
        <title>login</title>     
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
             <style>         
             body {    background-color: #E4E9F7;        
}
.form-container {
    background-color: #FFFFFF;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    border-radius: 5px;
}

.btn-primary {
    border-radius: 5px;
}
.message {
    margin-top: 10px;
    padding: 10px;
    border-radius: 5px;
}

.error {
    background-color: #FFCCCC;
    color: #CC0000;
}

.success {
    background-color: #CCFFCC;
    color: #006600;
}
.bibliotech {
    padding: 10px;
    text-align: center; 
    font-size: 32px; 
}

.card-header, .form-group label {
    text-align: center;
}
.form-group {
    margin-bottom: 20px;
}
.container {
    text-align: center;
    margin-top: 10%;
}

    .cont {
        border-radius: 25px;
    }
    .form-control{
        border-radius: 25px;
    }
    .btn{
        border-radius: 25px;
    }
    .card-header{
        color: #8f00ff;
    }

             </style> 
             </head> 
             <body>    
             <div class="bibliotech">
                <img src="bibliotech_logo.png" alt="logo" width=100px><h1>Bibliotech</h1></div>   
                <div class="container">
                    <div class="row justify-content-center">             
                        <div class="col-md-6">                 
                            <div class="card cont">                     
                                <div class="card-header">Accedi:</div>                     
                                <div class="card-body">                         
                                    <form action="login.php" method="POST">                             
                                        <div class="form-group">                                 
                                            <label for="username">Email</label>                                 
                                            <input type="text" name="username" id="username" class="form-control">                             
                                        </div>                             
                                        <div class="form-group">                                 
                                            <label for="password">Password</label>                                 
                                            <input type="password" name="password" id="password" class="form-control">                             
                                        </div>                             
                                        <button type="submit" class="btn btn-primary">Login</button>                         
                                    </form>                     
                                </div>                 
                            </div>             
                        </div>         
                    </div>     
                </div> 
                <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["username"]) && isset($_POST["password"])) {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bibliotech";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            echo "login avvenuto con successo!, benvenuto (;";
        } else {

            echo "Credenziali errate. Riprova.";
        }


        $conn->close();
    } else {

        echo "Si prega di compilare tutti i campi.";
    }
}
?>
     </body> 
</html>
