<div class="menu">
    <h3 class="titulo-menu">Estagiário </h3>
    <a class="cadastro"href="?pagina=index&action=cadastrar">Cadastrar </a>
    <a class="listar" href="?pagina=index&action=listar">Registros </a>
    
    <div class="linha"></div>
    
</div>

<?php
$action= 'cadastrar';
if(!empty($_GET['action'])){
    $action = $_GET['action'];
}
if($action == 'insert'){
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $regiao = $_POST['regiao'];


    $insert = mysqli_query($conn,"insert into estagiario(Cod_Estagiario, Nome, Idade, Sexo, Email, Cod_Local) values('$codigo', '$nome', '$idade', '$sexo', '$email', $regiao)");
    $action = 'cadastrar';
    if($insert){
        ?>
        <div class="alert alert-cor" role="alert">
            Cadastro Realizado com Sucesso!
        </div>
        <?php
    }else{
        ?>
        <div class="alert-erro alert-corR" role="alert">
        Estagiário já Cadastrado! 
        </div>
        <?php
        
    }
    
}

if($action == 'cadastrar'){
    
    ?>
        <form action="?action=insert" method="post" name='form1'>
            <div class="total">
                <strong >Estagiário do Ano</strong>
                <div class="formulario">
                    <br>
                        <label>Código:</label>
                        <br>
                        <input name="codigo" type="number" required>
                        <br>
                        <label > Nome:</label>
                        <br>
                        <input name="nome" type="text"required>                        
                        <br>
                        <label > Idade:</label>
                        <br>
                        <input style="width: 98px" name="idade" type="number" maxlength="2" size="2px" required> 
                        <br>
                        <label > Sexo:</label>
                        <br>
                        <select style="width: 100px" name="sexo" id="sexo" required>
                            <option value=""></option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                        <br>
                        <label >E-mail:</label>
                        <br>
                        <input name="email" type="email">
                        <br>
                        <label>Região do Estágio:</label>
                        <br>
                        <select name="regiao" id="regiao" style="width: 505px">
                            <?php 
                    $select2 = mysqli_query($conn, "select * from local_estagio");
                    for($i = 0; $i < 5; $i++){
                        $dados = mysqli_fetch_assoc($select2)
                        ?>
                        <option value="<?php echo $dados['Cod_Local'];?>" name="regiao"><?php echo $dados['Nome_Local'];?></option>
                        
                        <?php
                        
                        
                    }?>    
                    </select>
                    <div > 
                        <input type="submit" class="add" name ="enviar "value="Enviar">
                        <input type="reset" class="reset" value="Apagar">
                    </div>
                </div>
                
            </form>
        </div> 
        <?PHP
    
}
if($action == 'update'){
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $cod_local = $_POST['regiao'];
    $update = mysqli_query($conn, "update estagiario set Nome='$nome', Idade='$idade', Sexo='$sexo', Email='$email', Cod_Local='$cod_local' where Cod_Estagiario='$codigo'");
    $action ='listar';
    if($update){
        ?>
        <div class="alert alert-cor" role="alert">
            Edições salvas com sucesso!
        </div>
        <?php
    }else{
        ?>
        <div class="alert-erro alert-corR" role="alert">
            Não foi possível atualizar!
        </div>
        <?php
        
    }
}
if($action == 'editar'){
    $value = '';
    $cod_estagiario = $_GET['cod_estagiario'];
    $select = mysqli_query($conn, "select * from estagiario e left join local_estagio l on e.Cod_Local = l.Cod_Local where Cod_Estagiario = $cod_estagiario")or die("Erro ao Listar os dados!");
    
    while($dados = mysqli_fetch_assoc($select)){
        if($dados['Sexo'] == "M"){
            $value = 'Masculino';
        }
        else{
            $value = 'Feminino';
        }
        ?>
         <div class="form_atualizar">
             
             <div class="formulario">
                 <form action="?action=update" method="POST" name="form1">
                     <h1 style="color: white;" >Dados do Estagiário</h1>
                     <br>
                     <label>Código:</label>
                     <br>
                     <input type="number" readonly name="codigo" id="codigo" placeholder="Código" value="<?php echo $dados['Cod_Estagiario'];?>" >
                     <br>
                     <label > Nome :</label>
                     <br>
                     <input type="text" name="nome" id="nome" placeholder="Nome" value="<?php echo $dados['Nome'];?>" >
                     <br>
                     <label > Idade :</label>
                     <br>
                     <input type="number" name="idade" id ="idade" placeholder="idade" value="<?php echo $dados['Idade'];?>">
                     <br>
                     <label > Sexo:</label>
                     <br>
                     <select style="margin-top: 1px; margin-bottom: 8px; width: 505px" name="sexo" id="sexo">
                        <option value="<?php echo $dados['Sexo']?>"><?php echo $value?></option> 
                        <?php
                        if($dados['Sexo'] == 'M'){
                            echo '<option value="F">Feminino</option>';
                        }
                        if($dados['Sexo'] == 'F'){
                            echo '<option value="M">Masculino</option>';                     

                        }
                            ?>
                    </select>
            
                    <br>
                    <label >E-mail:</label>
                    <br>
                    <input type="email" name="email" id ="email" placeholder="email" value="<?php echo $dados['Email'];?>">
                    <br>
                    <label>Região do Estágio:</label>
                    <br>
                    <select style="margin-top: 1px; margin-bottom: 8px; width: 505px" name="regiao" id="regiao">
                    <option value="<?php echo $dados['Cod_Local'];?>" name="regiao"><?php echo $dados['Nome_Local'];?></option>
                    <?php 
                    $select2 = mysqli_query($conn, "select * from local_estagio");
                    while($dados2 = mysqli_fetch_assoc($select2)){               
                        if($dados2['Cod_Local'] != $dados['Cod_Local']){   
                                    
                    ?>
                        <option value="<?php echo $dados2['Cod_Local'];?>" name="regiao"><?php echo $dados2['Nome_Local'];?></option>                       
                    <?php 
                        }   
                    }?>    
                    </select>
                    <div class="container-button">    
                        <input type="submit" class="atualizar" value="Atualizar">
                        <a href="?pagina=index&action=listar" class="return"> Voltar</a>
                    </div>
                </form>
            </div>
            </div>
                <?PHP
            }
        }
if($action == 'delete'){
    $cod_estagiario = $_GET['cod_estagiario'];
    $delete = mysqli_query($conn, "delete from estagiario where Cod_Estagiario = $cod_estagiario")or die("Erro ao Deletar, Forneça o código corretamente!");
    $action = 'listar';
}
if($action == 'listar'){
    $select = mysqli_query($conn, "select * from estagiario e left join local_estagio l on e.Cod_local = l.Cod_Local order by Cod_estagiario asc") or die("Erro ao Listar os Dados");
    //$selectLocal = mysqli_query($conn, "select l.Nome from estagiario e join local_estagio l on e.Cod_local = l.Cod_Local")
    $linhas = mysqli_num_rows($select);
    
    if($linhas == ''){
        echo"<h4 class='contagem'>Nenhum registro encontrado!</h4>";
        
    }
    else{
        echo"<h4 class='contagem'>Foram encontrados $linhas registros: </h4>";
        ?>
        <table style="width:80%">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th >Sexo</th>
                    <th>Email</th>
                    <th>Região Do Estágio</th>
                    <th align="center" colspan="2">Opções</th>
                    </tr>
                </thead>
                <tbody>
                <?PHP
            while($dados = mysqli_fetch_assoc($select)){
                ?>
                <tr class="color">
                    <td><?php echo $dados['Cod_Estagiario']; ?></td>
                    <td><?php echo $dados['Nome']; ?></td>
                    <td><?php echo $dados['Idade']; ?></td>
                    <td><?php echo $dados['Sexo']; ?></td>
                    <td><?php echo $dados['Email']; ?></td>
    
                    <td><?php echo $dados['Nome_Local']; ?></td>
                    
                    <td ><a class="editar" href="?action=editar&cod_estagiario=<?PHP echo $dados['Cod_Estagiario']; ?>">Editar</a></td>
                    <td><a class="excluir" href="?action=delete&cod_estagiario=<?PHP echo $dados['Cod_Estagiario']; ?>">Excluir</a></td>
                    
                </tr>
                <?PHP
            }
        ?>    
        </tbody>
        </table>
        <?PHP
    }
}

?>