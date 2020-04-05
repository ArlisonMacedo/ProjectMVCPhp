<?php 

    if(!isset($_SESSION['EMAIL'])):
        header("location: http://localhost/MVC/login/admin");
    endif;

?>
<?php $v->layout("_theme");?>

<div style="margin-top:150px;"></div>

<div class="container">
    <div class="row">
        <div class="col-12">
        <h1>Seu perfil</h1>
            <?php 
                foreach($models as $model):
                    ?>
                    <div class="card text-center">
                        <div class="card-header">
                            <b><?=$model->nome ?></b>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Email: <?=$model->email ?></h5>
                            <p class="card-text">CPF: <?=$model->cpf ?></p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                        <div class="card-footer text-muted">
                            2 days ago
                        </div>
                    </div>
                    <?php
                endforeach;
            ?>
        
        </div>
    </div>
</div>