<?php
    session_start();
    ini_set('display_errors', 1);
    error_reporting(E_ALL);


    require '../config/config.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // echo "Données reçues :<br>";
        // print_r($_POST); // Affiche les données reçues

        // Récupération et validation des champs
        $nom = htmlspecialchars($_POST["nom"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $password = $_POST["password"];
        $abonnement_id = intval($_POST["abonnement_id"]);
        $date_inscription = $_POST["date_inscription"];

        // Vérification stricte de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("<br>Email invalide !");
        }

        // Vérification du mot de passe
        if (strlen($password) < 4) {
            die("<br>Le mot de passe doit comporter au moins 4 caractères !");
        }
        // Hachage du mot de passe avant insertion
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Vérifier si l'abonnement existe
        $stmt = $pdo->prepare("SELECT id FROM abonnement WHERE id = :id");
        $stmt->execute([":id" => $abonnement_id]);
        if ($stmt->rowCount() === 0) {
            die("<br>ID d'abonnement invalide !");
        }

        // Vérification si tous les champs sont remplis
        if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($password) && !empty($abonnement_id) && !empty($date_inscription)) {
            try {
                $stmt = $pdo->prepare("INSERT INTO users (nom, prenom, email, password, abonnement_id, date_inscription) 
                                    VALUES (:nom, :prenom, :email, :password, :abonnement_id, :date_inscription)");
                $stmt->execute([
                    ":nom" => $nom,
                    ":prenom" => $prenom,
                    ":email" => $email,
                    ":password" => $hashed_password,
                    ":abonnement_id" => $abonnement_id,
                    ":date_inscription" => $date_inscription
                ]);

                // Message flash de succès
                $_SESSION['flash_message'] = 'Inscription réussie ! Veuillez vous connecter.';

                // Redirection vers la page de connexion
                header("Location: /TestJeanne/auth/login.php");
            } catch (PDOException $e) {
                echo "<br>❌ Erreur SQL : " . $e->getMessage();
            }
        } else {
            echo "<br>❌ Tous les champs doivent être remplis !";
        }
    } else {
        echo "❌ Méthode non autorisée.";
    }
?>
