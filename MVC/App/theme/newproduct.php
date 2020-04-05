<?php $v->layout("_theme") ; ?>

<div style="margin-top: 120px;">
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3>Novo Produto</h3>
        </div>
    </div>
    <form action="<?=url("addnewproduct"); ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="formGroupExampleInput">Nome do Produto</label>
            <input type="text" name="nome"class="form-control" id="formGroupExampleInput" placeholder="Nome do Produto">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Preço</label>
            <input type="text" name="preco" class="form-control col-2" id="formGroupExampleInput2" placeholder="Preço Ex. 12.66">
        </div>
        <div class="form-group">
            <label for="">Quantidade no Estoque</label>
            <input type="text" name="qtd" class="form-control col-2" placeholder="Ex.10">
        </div>
        <div class="form-group">
            <label for="">Categoria</label>
            <select name="categoria" id="" class="form-control col-2" required >
                <?php  foreach($categorias as $categoria): ?>
                <option value="<?=$categoria->ID; ?>"><?=$categoria->nome_cat; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">insira sua Imagem</label>
            <input type="file" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-success">Salvar <i class="fas fa-paper-plane"></i> </button>
        </div>
    </form>
</div>