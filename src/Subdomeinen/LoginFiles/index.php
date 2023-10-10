<!DOCTYPE html>
<html>
    <?php
        if(isset($_COOKIE["UserNameTechSite"])){
            header( "Location: ../../../index.html" );
        }
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>TechCode.com</title>
        <link rel="icon" href="../../Images/TechCode_Icon.png">
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <form method="POST">
                <div class="LoginGUI">
                    <h1>Login</h1>
                    <p>
                        Hey, om deze software te kunnen gebruiken moet je inloggen op je TechAccount!<br><br>
                        Gebruikersnaam: <input type="text" name="GebruikersnaamValue" id="GebruikersnaamValue"><br>
                        Wachtwoord: <input type="password" name="PasswordValue" id="PasswordValue"><br><br>
                        Klik <a href="http://192.168.160.6/src/Subdomeinen/CreateTechAccount/index.php">hier</a> om een TechAccount te creëeren.
                    </p>
                    <input type="submit" name="LoginButton" value="Login!"></input>
                </div>
        </form>
    </body>
    
    <?php
        ini_set("display_errors", "On");

        $SERVERNAAM = "192.168.160.7";
        $Username = "TechCode_Systems";
        $Pass = "System123";
        $DataBase = "techcode_database";

        exec('ssh -f -L 3306:127.0.0.1:3306 student@192.168.160.7 -p fontys123 -N>>logfile');

        $Conn = mysqli_connect("127.0.0.1:3306", $Username, $Pass, $DataBase);

        if(!$Conn){
            echo("Connection failed: " . mysqli_connect_error());
        }

        if(isset($_POST['LoginButton'])) {
            $UsernameInput = $_REQUEST["GebruikersnaamValue"];
            $WachtwoordInput = $_REQUEST["PasswordValue"];

            $sql = "SELECT `id`, `Tech_Naam`, `Password` FROM `techaccounts` WHERE `Tech_Naam`='$UsernameInput'";
            $ID;
            $Username;
            $Password;
            $result = $Conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $ID = $row["id"];
                    $Username = $row["Tech_Naam"];
                    $Password = $row["Password"];
                }
            }

            if($result){
                if($UsernameInput == $Username && $WachtwoordInput == $Password){
                    setcookie("UserNameTechSite", $Username, time()+86400, "/");
                    setcookie("PasswordTechSite", $Password, time()+86400, "/");
                    setcookie("IDTechSite", $ID, time()+86400, "/");
                    header( "Location: ../../../index.html" );
                } else {
                    echo '<script type="text/javascript">
                            window.onload = function () { alert("Your username and/or password are not found in the database!"); } 
                    </script>';
                }
            } else {
                echo '<script type="text/javascript">
                        window.onload = function () { alert("Your account is not found in the database!"); } 
                </script>';
            }   
        }
    ?>
</html>