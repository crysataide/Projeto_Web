<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Detalhes do Produto</title>
    <?php
        require('top_admin.php');
        require('../conexao.php');
        
        if (isset($_GET['CodPro'])) {

            $codigo_produto = $_GET['CodPro'];
            
            $select_produto = mysqli_query($conexao, "SELECT * FROM produtos WHERE CodPro='$codigo_produto'");
        
            if (mysqli_num_rows($select_produto) > 0) {
                $dados_produto = mysqli_fetch_assoc($select_produto);
            }
            else {
                echo "<script> alert ('PRODUTO INVÁLIDO OU EXCLUÍDO');</script>";
                echo "<script> window.location.href='$url/admin/list_produtos.php';</script>";
            }
        }
    ?>
    </head>
    <body>
        <div class="prod_border">
            <div class="area_titulo--prod">
                <h2>Detalhes do Produto</h2>
                <a onclick="history.back();"">
                    <button class="btn_voltar">
                        <img src="../Imagens/tabela/voltar.png">
                        <div class="text_tabela_prod">Voltar</div>
                    </button>
                </a>
            </div>
            <div class="detalhes_prod">
                <div class="perfil_produto">
                <?php if ($dados_produto['ImgPro'] != 's/img') {?>
                    <img class="img_perfil--prod" src="<?=$_SESSION['url'].$dados_produto['ImgPro']?>">
                <?php } else {?>
                    <img class="img_perfil--prod" src="../Imagens/produtos/sem_img.webp">
                <?php }?>
                    <p><?=$_GET['CodPro'];?></p>
                </div>
                <div class="desc_prod">
                    <ul>
                        <li>Código de barras: <?=$dados_produto['CodBar']?></li>
                        <li>Descrição: <?=$dados_produto['DescPro']?></li>
                        <li>Categoria: <?=$dados_produto['CategPro']?></li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
    <?php require('bottom_admin.php')?>
</html>