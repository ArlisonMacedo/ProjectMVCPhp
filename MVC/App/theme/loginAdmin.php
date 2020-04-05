<?php 
    
    if(isset($_SESSION['EMAIL'])):
        header("location: http://localhost/MVC/dashboard");
    endif;
?>

<?php $v->layout("_theme") ; ?>


<div class="container" style="margin-top: 190px;">
    <div class="row">
        
        <div class="col-12">
            <form action="<?=url("loginAdminRealase")?>" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="staticEmail" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    
                    <button type="submit" class="btn mt-4" 
                        style="background-color: #3e2d49; color:#fff; "><b>Entrar</b></button>
                    
                </div>
            </form>
        
        </div>
    </div>
</div>