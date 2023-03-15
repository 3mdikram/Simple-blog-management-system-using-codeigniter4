<?= $this->extend('component/layouts'); ?>
<?= $this->section('title'); ?>
Sign Up
<?= $this->endSection(); ?>
<?= $this->section('styles'); ?>
<link rel="stylesheet" href="<?php echo base_url();?>/asset/website/jquery-ui/jquery-ui.min.css" />
<style>
    .card-header:first-child {
        background-image: linear-gradient(45deg, #084298, #dc3545);
    }.flshdata{margin-top: 4.2rem; margin-left: 18rem;color: green; font-weight: bold;}
</style>
<script src="<?php echo base_url(); ?>/asset/website/js/jquery.min.js"></script>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="col-md-8 offset-2 mt-lg-5">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title text-center text-white">Registation Form</h5>
        </div>
        <p class="text-center flshdata position-absolute"><?php 
        $session = \Config\Services::session();
        echo $session->getFlashdata('success'); ?></p>
        <div class="card-body">
            <form class="form-submit" action="<?php echo base_url('signup/register');?>" method="POST">
            <?= csrf_field() ?>
            <?php $validation = \Config\Services::validation(); ?>
            <div class="form-group">
                    <label>First Name</label>
                    <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name">
                    <span class="fnamerror text-danger"><?php if($validation->getError('fname')){?>
                        <?= $error = $validation->getError('fname'); ?>
                        <?php }?></span>
                </div>
                <div class="form-group mt-2">
                    <label>Last Name</label>
                    <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name">
                    <span class="lnamerror text-danger"><?php if($validation->hasError('lname')){
                        echo $validation->showError('lname');
                    }?></span>
                </div>
                <div class="form-group mt-2">
                    <label>Gender</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="">Select Gender</option>
                        <option value="1">Male</option>
                        <option value="0">Female</option>
                    </select>
                    <span class="gendererror text-danger"><?php if($validation->hasError('gender')){
                        echo $validation->showError('gender');
                    }?></span>
                </div>
                <div class="form-group mt-2">
                    <label>DoB</label>
                    <input type="text" id="dob" name="dob" class="form-control" placeholder="DoB eg(01/01/2000)">
                    <span class="doberror text-danger"><?php if($validation->hasError('dob')){
                        echo $validation->showError('dob');
                    }?></span>
                </div>
                <div class="form-group mt-2">
                    <label>Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                    <span class="emailerror text-danger"><?php if($validation->hasError('email')){
                        echo $validation->showError('email');
                    }?></span>
                </div>
                <div class="form-group mt-2">
                    <label>Phone</label>
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone">
                    <span class="phonerror text-danger"><?php if($validation->hasError('phone')){
                        echo $validation->showError('phone');
                    }?></span>
                </div>
                <div class="form-group mt-2">
                    <label>Designation</label>
                    <select class="form-control" id="designation" name="designation">
                        <option value="">Select Designation</option>
                        <option value="PHP">PHP</option>
                        <option value="CodeIgniter">CodeIgniter</option>
                        <option value="Laravel">Laravel</option>
                        <option value="Android">Android</option>
                        <option value="Dart">Dart</option>
                    </select>
                    <span class="desierror text-danger"><?php if($validation->hasError('designation')){
                        echo $validation->showError('designation');
                    }?></span>
                </div>
                <div class="form-group mt-2">
                    <label>Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    <span class="passworderror text-danger"><?php if($validation->hasError('password')){
                        echo $validation->showError('password');
                    }?></span>
                </div>
                <div class="form-group mt-2">
                    <label>Confirm Password</label>
                    <input type="password" id="conpassword" name="conpassword" class="form-control" placeholder="Confirm Password">
                    <span class="conpassworderror text-danger"><?php if($validation->hasError('conpassword')){
                        echo $validation->showError('conpassword');
                    }?></span>
                </div>
                <div class="card-footer mt-3 border-0">
                    <button type="submit" id="signup" class="btn btn-success w-100 text-white">Sign up</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="mt-5"></div>
<script>
    $(document).ready(function() {
        $("#dob").datepicker();
        //Phone Input Validation
        $("#phone").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/\D/g, ""));
            if ((evt.which < 48 || evt.which > 57)) {
                evt.preventDefault();
            }
        });
        // Form All Filed Validation
        $("#signup").on("click", function(e) {
            e.preventDefault();
            var first_name = $("#fname").val();
            var last_name = $("#lname").val();
            var user_gender = $("#gender").val();
            var user_dob = $("#dob").val();
            var user_email = $("#email").val();
            var user_phone = $("#phone").val();
            var designation = $("#designation").val();
            var password = $("#password").val();
            var conpassword = $("#conpassword").val();
            var emailexpr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if (first_name == "") {
                $(".fnamerror").html("First Name Required!");
            } else if (last_name == "") {
                $(".lnamerror").html("Last Name Required!");
            } else if (user_gender == "") {
                $(".gendererror").html("Gender Required!");
            } else if (user_dob == "") {
                $(".doberror").html("DoB Required!");
            } else if (user_email == "") {
                $(".emailerror").html("Email Required!");
            } else if (!emailexpr.test(user_email)) {
                $(".emailerror").html("Enter valid email!");
            } else if (user_phone == "") {
                $(".phonerror").html("Phone Required!");
            } else if (designation == "") {
                $(".desierror").html("Designation Required!");
            } else if (password == "") {
                $(".passworderror").html("Password Required!");
            } else if (conpassword == "") {
                $(".conpassworderror").html("Confirm Password Required!");
            } else {
                $(".form-submit").submit();
            }
        });
        //Remove required error
        $("#fname").on("input", function() {
            $(".fnamerror").html("");
        })
        //Last Name
        $("#lname").on("input", function() {
            $(".lnamerror").html("");
        })
        //Gender
        $("#gender").change("input", function() {
            $(".gendererror").html("");
        })
        //Date of Birth
        $("#dob").change("input", function() {
            $(".doberror").html("");
        })
        //Email
        $("#email").on("input", function() {
            $(".emailerror").html("");
        })
        //Phone
        $("#phone").on("input", function() {
            $(".phonerror").html("");
        })
        //designation
        $("#designation").on("input", function() {
            $(".desierror").html("");
        })
        //password
        $("#password").on("input", function() {
            $(".passworderror").html("");
        })
        //confirm password
        $("#conpassword").on("input", function() {
            $(".conpassworderror").html("");
        })

        //Password Matching Validation
        $("#conpassword").on("input", function() {
            var password = $("#password").val();
            var conpassword = $("#conpassword").val();
            if (password != conpassword) {
                $(".conpassworderror").html("Passwords do not match!");
                $("#signup").prop('disabled', true);
            } else {
                $(".conpassworderror").html("");
                $("#signup").prop('disabled', false);
            }
        });
    });
</script>
</body>

</html>
<?= $this->endSection(); ?>
<?= $this->section('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="<?php echo base_url();?>/asset/website/jquery-ui/jquery-ui.min.js"></script>
<?= $this->endSection(); ?>