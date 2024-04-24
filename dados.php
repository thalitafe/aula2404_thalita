<?php
require_once 'config.php';
//Pegando os dados do formulário
$nome = $_POST["nome"];
$email = $_POST["email"];
$data_atual = date("d/m/Y");
$hora_atual = date("H:i:s");

//PREPARAR COMANDO PARA TABELA
$smtp = $conn->prepare("INSERT INTO mydados (nome, email, data, hora) VALUES (?,?,?,?)");
$smtp->bind_param("ssss", $nome, $email, $data_atual, $hora_atual);

//SE EXECUTAR CORRETAMENTE
if ($smtp->execute()) {
    echo "<h2>Mensagem enviada com sucessor</h2>";
}
else {
    echo "Erro no envio da mensagem".$smtp->error;
}
$smtp->close();
$conn->close();


?>