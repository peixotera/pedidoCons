<?php
if(isset($_POST['enviar'])){
    $nome =  $_POST['nome'];
    echo "nome: ",  $nome;
}

$host = 'localhost';
$dbname = 'oca';
$user = 'postgres';
$password = 'postgres';
$port = '5432'; 

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO PEDIDO (NOME) VALUES (:nome)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    
    $stmt->execute();
    
    echo "Dados inseridos com sucesso!";
} catch (PDOException $e) {
    echo "Erro na query: " . $e->getMessage();
}
?>
