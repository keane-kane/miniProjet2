
        <?php
            session_start();
            $servername = 'localhost';
            $username = 'root';
            $password = 'Samsuge__';
            $bdnam = 'bdQUIZZ';
            $bd ='mysql:host=$servername';
            
            try {
              $conn = new PDO("mysql:host=$servername;dbname=$bdnam", $username);
              // set the PDO error mode to exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $retour = "Connection success";
            } catch(PDOException $e) {
              $retour = "Connection failed: " . $e->getMessage();
            }
            //requete sql
           
            
               $requete="SELECT * FROM `donneesuser` WHERE login = '$login' LIMIT 1";
               $ligne = bdRequete($conn,$requete);
               var_dump($ligne);
            
              
             
            
           
          
          /*  $mysqli = new mysqli($servername,$username,$password)
       
           
Samsuge__ ,keaner_quizz2 ,Hôte MySQL : mysql-keaner.alwaysdata.net
Gestionnaire MySQL : phpMyAdmin

Version : 10.4 (mariadb)
//oriente objet mysqli_connect() ,(!$conn) die('Erreur : ' .mysqli_connect_error()

//procedural    new mysqli()  ($conn->connect_error),die('Erreur : ' .$conn->connect_error)


//PDO              

*/
        ?>