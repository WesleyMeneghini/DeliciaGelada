<?php

    require_once "controller/CategoriaController.php";
    require_once "controller/SubCategoriaController.php";
    require_once "controller/MenuSecundarioController.php";

    $categorias = new CategoriaController();
    $listaCategorias = $categorias->listarCategorias();

    $subCategorias = new SubCategoriaController();
    $listaSubCategorias = $subCategorias->listarSubCategorias();

    $menuSecundario = new MenuSecundarioController();
    $listarMenuSecundario = $menuSecundario->listarMenuSecundario();

?>
<div id="container_usuario" class="center">
    <div id="cadastro_usuario" class="form-crud center txt-center">
        
        <h1>CADASTRAR CATEGORIA</h1>
        
        <form 
            name="frm_categoria" 
            method="post" 
            action="router.php?controller=menu_secundario&modo=novo">

            <p>
                Selecione a Categoria: 
                <br>
                <select class="select" name="slt_categoria" id="">

                    <?php
                        for($i = 0 ; $i < count($listaCategorias); $i++){
                    ?>

                    <option value="<?=$listaCategorias[$i]->getId()?>">
                        <?=$listaCategorias[$i]->getName()?>
                    </option>

                    <?php
                        }
                    ?>
                </select>

            </p>
            <p>
                Selecione as Sub-categorias:
            </p>
            
            <?php
                for($i = 0 ; $i < count($listaSubCategorias); $i++){
            ?>
                <br>
                <input 
                    type="checkbox" 
                    name="item[]" 
                    value="<?=$listaSubCategorias[$i]->getId()?>">

                    <?=$listaSubCategorias[$i]->getName()?>
                    
                </input>
            <?php
                }
            ?>

            <br>
            <input class="button" type="submit" value="Salvar"></input>

        </form>
    </div>
    <div id="container_consulta_usuarios" class="center">
        <table class="tbl-crud center">
            <tr class="bkg-primary">
                <td class="negrito">Categoria</td>
                <td class="negrito">Sub-categoria</td>
                <td class="negrito">Editar</td>
                <td class="negrito">Ativar/Desativar</td>
                <td class="negrito">Excluir</td>
            </tr>
            <?php
                for($i = 0 ; $i < count($listarMenuSecundario); $i++){
            ?>
            <tr>
                <td class=""><?=$listarMenuSecundario[$i]->getNomeCat()?></td>
                <td class=""><?=$listarMenuSecundario[$i]->getNomeSub()?></td>
                <td class="">Editar</td>
                <td class="">Ativar/Desativar</td>
                <td class="">Excluir</td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
</div>