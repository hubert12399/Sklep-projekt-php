<?php

            // Połączenie z bazą danych
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "sklep";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Sprawdzenie połączenia
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            // Pobranie danych z formularza logowania
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Sprawdzenie, czy użytkownik istnieje w bazie danych
            $sql = "SELECT * FROM users WHERE email='$email' AND pass='$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // Zalogowanie użytkownika
            echo "Zalogowano pomyślnie!";
            } else {
            // Wyświetlenie komunikatu o błędzie logowania
            echo "Niepoprawny e-mail lub hasło.";
            }

            $conn->close();

         ?>