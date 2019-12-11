<div id="container_usuario" class="center">
    <div id="cadastro_usuario" class="form-crud center txt-center">
        
        <h1>CADASTRAR SUB-CATEGORIA</h1>
        
        <form 
            name="frm_sub_categoria" 
            method="post" 
            action="router.php?controller=sub_categoria&modo=novo">

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
                require_once "controller/SubCategoriaController.php";

                $subCategorias = new SubCategoriaController();
                $listaSubCategorias = $subCategorias->listarSubCategorias();

                for($i = 0 ; $i < count($listaSubCategorias); $i++){
            ?>
            <tr>
                <td class="negrito"><?=$listaSubCategorias[$i]->getName()?></td>
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