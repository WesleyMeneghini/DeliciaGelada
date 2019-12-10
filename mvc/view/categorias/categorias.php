
<div id="container_usuario" class="center">
    <div id="cadastro_usuario" class="form-crud center txt-center">
        
        <h1>CADASTRAR CATEGORIA</h1>
        
        <form 
            name="frm_categoria" 
            method="post" 
            action="router.php?controller=categoria&modo=novo">

            <p>
                Nome: 
                <input
                    class="input-txt"
                    type="text"
                    name="txt_nome"
                    max-length="45"
                    required/>
            </p>

            <input class="button" type="submit" value="Salvar"></input>

        </form>
    </div>
    <div id="container_consulta_usuarios" class="center">
        <table class="tbl-crud center">
            <tr class="bkg-primary">
                <td class="negrito">Nome</td>
                <td class="negrito">Editar</td>
                <td class="negrito">Ativar/Desativar</td>
                <td class="negrito">Excluir</td>
            </tr>
            <?php
                require_once "controller/CategoriaController.php";

                $categorias = new CategoriaController();
                $listaCategorias = $categorias->listarCategorias();

                for($i = 0 ; $i < count($listaCategorias); $i++){
            ?>
            <tr>
                <td class="negrito"><?=$listaCategorias[$i]->getName()?></td>
                <td class="negrito">Editar</td>
                <td class="negrito">Ativar/Desativar</td>
                <td class="negrito">Excluir</td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
</div>