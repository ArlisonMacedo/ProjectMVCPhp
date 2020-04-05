<?php $v->layout('_theme'); ?>
<div style="margin-top:130px;"></div>
<div class="container">
    <div class="row">
    
            <?php
                foreach($produto as $prod):
                    ?>
                    <div class="col-md-6">
                        <h3><?= $prod->nome_cat?></h3>
                        <div class="card mt-3" style="box-shadow: 0px 0px 4px">
                            <img class="card-img-top" src="../image/<?=$prod->image; ?>">        
                        </div>
                    </div>
                    <div class="col-md-6 mt-5">
                        <div class="card" style="box-shadow: 0px 0px 4px">
                            <div class="card-body">
                                <h5 class="card-title"><?=$prod->nome; ?></h5>
                                <p>Preço R$ <?=$prod->preco; ?></p>
                                <p>Quantidade Restante <?=$prod->qtd; ?></p>
                                <center>
                                <a href="<?=url("buy") ?>" class="btn btn-outline-primary">comprar <i class="fas fa-shopping-cart"></i></a>
                                </center>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            ?>
    
    </div>
</div>