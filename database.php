<!-- <?php

// $host = 'localhost';
// $dbname = 'todolist';
// $user = 'root';
// $pass = 'root';

// try {
//     $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connexion réussie !";
// } catch (PDOException $e) {
//     die("Erreur de connexion : " . $e->getMessage());
// }
?> -->




<?php

$host = 'localhost';
$dbname = 'todolist';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4'; // Définition du charset pour éviter les problèmes d'encodage

// DSN (Data Source Name) avec l'ajout du charset
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

try {
    // Création de l'objet PDO
    $pdo = new PDO($dsn, $user, $pass);
    
    // Définition de l'option d'erreur pour les exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optionnel : définir le mode de traitement des données (par exemple, récupération sous forme de tableau associatif)
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Connexion réussie
    echo "Connexion réussie !";
} catch (PDOException $e) {
    // En cas d'erreur, on affiche un message générique (évite de divulguer des informations sensibles)
    echo "Erreur de connexion à la base de données.";
    
    // On peut loguer l'erreur détaillée dans un fichier de log pour une analyse ultérieure
    error_log($e->getMessage(), 3, 'errors.log');
}
?>