
<?php
header('Content-Type: application/json');

//parametres de la connexion 
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'myapp';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);

//j'initialise mon tableau
$data = [];

if ($result->num_rows > 0) {
// je recupère mon tableau 
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
// je convertis le tableau en json et je l'envoie 
    echo json_encode($data); 
} else {
    echo json_encode(["message" => "Aucun utilisateur trouvé"]);
}
// je ferme la connexion 
$conn->close();
?>
