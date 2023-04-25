<?php
$servername = "localhost";
                    $username = "root";
                    $passwrd = "";
                    $dbname = "sklep";

                    $conn = new mysqli($servername, $username, $passwrd, $dbname);


                    // Sprawdzenie połączenia
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
                    ?>