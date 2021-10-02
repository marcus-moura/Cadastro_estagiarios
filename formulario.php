<?php
include('conexao_banco.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">  
    <?php 
    $titulo = '';
    $action = 'cadastrar';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
        
    }
    if($action == 'cadastrar' or $action == 'insert'){$titulo = "Formulário de Cadastro";}
    elseif($action == 'editar'){$titulo = "Editar Dados";}
    elseif($action == 'listar' or $action == 'update' or $action == 'delete'  ){$titulo = "Listagem de Dados";}
    ?>
    <title><?php echo $titulo;?></title>
</head>
<body>
    <?php
    $pagina = 'index';
    if(!empty($_GET['pagina'])){
        $pagina = $_GET['pagina'];
    }
    if(file_exists("$pagina.php")){
        include("$pagina.php");
    }
    else{
        echo"<h4 class='contagem'>ERRO 404 <br> Página não encontrado!</h4>";
    }
        ?>   


</body>
</html>