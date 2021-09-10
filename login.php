<?php
    if (count ($_POST)> 0){

  
// 1. prgar os valores do formulário 41 minutos
$email = $_POST['email'];
$senha = $_POST['senha']
// 2. conexão com banco de dados
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=restaurante_bd", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Conexão realizada com sucesso";
  $stmt = $conn->prepare("SELECT codigo FROM usuario WHERE email=:email AND senha= md5:senha");
  $stmt->bindParam(':email', $email,PDO::FETCH_ASSOC);
  $stmt->bindParam(':senha', $senha);
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->fetchAll();
  $qtd_usuario = count($result);
  if ($qtd_usuario == 1){
      $_resultado ['msg'] = "Usuário encontrado!"
      $_resultado[cod] 1;
      else if ($qtd_usuario == 0){
        $_resultado ['msg'] ="E-mail e senha não conferem..."
          $_resultado[cod] 0;
      }
  }

} catch(PDOException $e) {
  echo "Falha na conexão: " . $e->getMessage();
}
$conn = null;
// 3. verificar se email e senha estão no BD.
}
include("index.html");
?>