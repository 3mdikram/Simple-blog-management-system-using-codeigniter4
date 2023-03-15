<?= $this->extend('component/layouts'); ?>
<?= $this->section('title'); ?>
Login
<?= $this->endSection(); ?>
<?= $this->section('styles'); ?>
<style>
    .card-header:first-child {
        background-image: linear-gradient(45deg, #084298, #dc3545);
    }
</style>
<script src="<?php echo base_url(); ?>/asset/website/js/jquery.min.js"></script>
<?= $this->endSection(); ?>
<?php $validation = \Config\Services::validation();
$session = \Config\Services::session();?>
<?= $this->section('content'); ?>
<div class="col-md-5 offset-4" style="margin-top:5rem;">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title text-white text-center">Login</h5>
        </div>
        <div class="card-body">
        <span class="passerror offset-5 text-danger">
                    <?php  echo $session->getFlashdata('invalid'); ?>
                    </span>
            <form class="form-login" action="<?php echo base_url('login');?>" method="POST">
            <?php helper('form');?>
                <div class="form-group mt-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope-fill fs-5"></i></span>
                        <input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email">
                    </div>
                    <span class="emailerror text-danger"><?php 
                    $session = \Config\Services::session();
                    echo $session->getFlashdata('emailerror');
                    if($validation->getError('email')){?>
                        <?= $error = $validation->getError('email'); ?>
                        <?php }?></span>
                </div>
                <div class="form-group mt-4">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-key-fill fs-5"></i></span>
                        <input type="text" id="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <span class="passerror text-danger">
                    <?php  echo $session->getFlashdata('passerror');
                    if($validation->getError('password')){?>
                        <?= $error = $validation->getError('password'); ?>
                        <?php }?>
                    </span>
                </div>
                <div class="card-footer mt-3 border-0">
                    <button type="submit" id="loginbtn" class="btn btn-success w-100 text-white">Login</button>
                </div>
            </form>
            <div class="mt-2 fs-6">
                <a href="#">Forget password?</a> or <a href="<?php echo base_url('signup'); ?>">Sign up</a>
            </div>
        </div>
    </div>
</div>
<div class="mt-5"></div>
<script>
    $(document).ready(function() {
        $("#loginbtn").on("click", function(e) {
            e.preventDefault();
            var email = $("#email").val();
            var password = $("#password").val();
            if (email == "") {
                $(".emailerror").html("Email Required!");
            } else if (password == "") {
                $(".passerror").html("Password Required!")
            }else{
                $(".form-login").submit();
            }
        });
        //Error Remove
        $("#email").on("input", function() {
            $(".emailerror").html("");
        })
        $("#password").on("input", function() {
            $(".passerror").html("");
        })
    });
</script>
<?= $this->endSection(); ?>