<?php 
require_once 'config.php';

$senhasecreta = "123";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $senhadigitada = $_POST["senha"];

//DIGITOU A SENHA CERTA
if($senhadigitada === $senhasecreta){
$sql = "SELECT * FROM mydados";
$result = $conn-> query($sql);
}else{
    echo "<h1>Senha incorreta!<h1>";
}
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div>
        <form  method="post">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" placeholder="Digite sua senha" required/>
            <br/>
            <button type="submit">Enviar</button>
        </form>
    </div class = "mensagens">
    <?php if (isset($result) && $result->num_rows > 0) : ?>
        <h2>Dados Cadastrados</h2> 
        <ul>
            <?php while($row = $result ->fetch_assoc()) : ?>
                <li>
                    <strong>Nome: </strong> <?php echo $row["nome"];?><br>
                    <strong>E-mail: </strong> <?php echo $row["email"];?><br>
                    <strong>Data e Hora: </strong> <?php echo $row["data"]."ás". $row["hora"];?><br><br/>

                </li>
                <?php endwhile;?>
        </ul>
        <?php else : ?>
            <p>Não há nenhuma Mensagem.</p>
            <?php endif?>   
</body>
</html>