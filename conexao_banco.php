<?php 
$servidor = 'localhost'; //nosso servior web localhost
$usuario = 'root'; //usuário do mysql
$senha = ''; //senha
$bancoDados = 'av1'; // nome do banco de dados

$conn = mysqli_connect ($servidor, $usuario, $senha, $bancoDados);

if($conn){
    ?>
    <!--<div class="alert alert-cor" role="alert">
            Cadastro Realizado com Sucesso!
    </div>-->
<?php    
}
else{
    ?>
    <div class="alert-erro alert-corR" role="alert">
            Erro na conexão com o Banco de Dados!
    </div>
<?php   
}

?>