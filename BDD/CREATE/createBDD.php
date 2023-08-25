<?php

            $servername = 'localhost';
            $username = 'root';
            $password = '';

            
            //On établit la connexion
            $connexion = new PDO("mysql:host=$servername;", $username, $password);

            //On essaie de se connecter
            try{
                $connexion = new PDO("mysql:host=$servername;", $username, $password);

                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "CREATE DATABASE IF NOT EXISTS myDoc";
                $connexion->exec($sql);
                echo 'Création Database réussie';
            }

                catch(PDOException $e){
                    throw new PDOException($e->getMessage(), (int)$e->getCode());
                    echo 'La connexion a échoué';
                  }
            
            //On ferme la connexion
            $connexion =  null;

?>