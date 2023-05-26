<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Mercado Estácio - Usuários</title>
    <?php require('top_admin.php');

        require('../conexao.php');

        $select_users = mysqli_query($conexao, "SELECT * FROM login ORDER BY ID");
    
        if (mysqli_num_rows($select_users) > 0) {

            $data_users = mysqli_fetch_assoc($select_users);

        } else {
            echo "<script> alert ('NÃO EXISTEM USUÁRIOS CADASTRADOS!');</script>";
            echo "<script> window.location.href='$url_admin/view_users.php';</script>";
        }
    ?>
		<div class="tabela">
            <div class="area_titulo">
                <h2>PRODUTOS CADASTRADOS</h2>
                <a href="cad_user.php">
                    <img src="../Imagens/incluir.png">
                    <p>Incluir</p>
                </a>
            </div>
            <table>	
                <tr class="tabela_cabecalho">
                    <th>Nome</th>
                    <th>Usuários</th>
                    <th>Email</th>
                </tr>
            <?php do{?>
                <tr class="tabela_desc">
                    <td class="desc"><?php echo $data_users['name'];?></td>
                    <td class="desc"><?php echo $data_users['username'];?></td>
                    <td class="desc"><?php echo $data_users['email'];?></td>
                    <td class="acao">
                        <a href="edit.php?ID=<?php echo $data_users['ID'];?>">
                            <img src="../Imagens/lapis-produto.png" class="botao_editar" title="Editar">
                        </a>
                        <a href="javascript:func()" onclick="delete_user('<?php echo $data_users['ID'];?>')">
                            <img src="../Imagens/lixeira-produtos.png" class="botao_excluir" title="Excluir">
                        </a>
                    </td>
                </tr>
            <?php }while ($data_users = mysqli_fetch_assoc($select_users));?>
            </table>
		</div>
    </body>
</html>