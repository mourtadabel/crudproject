<?php
include 'db.php';


// si une des chaines n'est pas définie ,elle sera une chaine de caractere vide 
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Valeur par défaut de la réponse
$response = "Erreur d'inscription"; 

if (!empty($name) && !empty($email) && !empty($password)) {
// je hash mon password pour des raisons de confidentialité 
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
// je fais rentrer les informations 
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
// eviter les injections SQL pour des raisons de sécurité 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $passwordHashed);


// je modifie  la réponse en cas de succès
    if ($stmt->execute()) {
        $response = "Nouveau utilisateur"; 
    }
    $stmt->close();
}
// je ferme la connexion 
$conn->close();
// j'envoie la réponse  
echo $response; 


?>
