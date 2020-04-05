<?php $v->layout("_theme"); ?>


<div class="container" style="margin-top: 75px;">
    <div class="row">
        <div class="col-12">
            <h1>Produtos</h1>
            
        </div>
    </div>
    <div class="row">
        
        <?php 

            foreach($models as $model):
                ?>
                <div class="col-md-4">
                <div class="card mt-3 bg-light">
                    <img class="card-img-top" src="./image/<?=$model->image; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?=$model->nome; ?></h5>
                        <p>Preço R$ <?=$model->preco; ?></p>
                        <p>Quantidade Restante <?=$model->qtd; ?></p>
                        <center>
                        <a href="<?=url("buy") ?>" class="btn btn-outline-primary btn-sm">comprar <i class="fas fa-shopping-cart"></i></a>
                        <a href="<?=url("seemore/")?><?=$model->ID; ?>" class="btn btn-outline-success btn-sm">ver mais <i class="fas fa-plus"></i></a>
                        </center>
                    </div>
                    </div>
                </div>
                <?php
            endforeach;
        ?>
    </div>
</div>