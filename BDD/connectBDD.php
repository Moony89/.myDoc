<?php


            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $database = "myDoc";

    

            $options =
                    [ 
                        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES   => false
                    ];
          
                    
            //On établit la connexion
            $connexion = new PDO("mysql:host=$servername;dbname=$database;", $username, $password, $options);

            //On essaie de se connecter
            try{
                $connexion = new PDO("mysql:host=$servername;dbname=$database;", $username, $password, $options);

                //$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Connexion réussie';
            }

                catch(PDOException $e){
                    throw new PDOException($e->getMessage(), (int)$e->getCode());
                    echo 'La connexion a échoué';
                  }
