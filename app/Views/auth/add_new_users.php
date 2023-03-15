<?= $this->extend('auth/component/layouts'); ?>
<?= $this->section('title'); ?>
Add User
<?= $this->endSection(); ?>
<?= $this->section('home_title'); ?>
Add New User
<?= $this->endSection(); ?>
<?= $this->section('home_bread'); ?>
<a href="<?php echo base_url('Auth/Show_Users'); ?>">Back</a>
<?= $this->endSection(); ?>
<?= $this->section('styles'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/asset/auth/jquery-ui/jquery-ui.min.css" />
<script src="<?php echo base_url(); ?>/asset/auth/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/asset/website/jquery-ui/jquery-ui.min.js"></script>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 offset-2">
                <div class="card">
                    <div class="card-header p-1">
                        <ul class="nav nav-pills">
                            <button class="btn w-100 text-left nav-item btn-primary disabled">Add New User</button>

                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <form class="form-horizontal user-data-added" method="POST">
                                <?php $validation = \Config\Services::validation(); ?>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-10" id="editfname">
                                            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
                                            <span class="fnamerror text-danger"><?php if($validation->hasError('fname')){
                                                echo $validation->showError('fname'); }?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-10" id="editlfname">
                                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name">
                                            <span class="lnamerror text-danger"><?php if($validation->hasError('lname')){
                                                echo $validation->showError('lname'); } ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Gender</label>
                                        <div class="col-sm-10">
                                            <select name="gender" id="gender" class="form-control text-muted">
                                                <option value=>Select Gender</option>
                                                <option value='1'>Male</option>
                                                <option value='0'>Female</option>
                                            </select>
                                            <span class="gendererror text-danger"><?php if($validation->hasError('gender')){
                                                echo $validation->showError('gender');} ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">DoB</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="dob" id="dob" class="form-control" placeholder="DoB">
                                            <span class="doberror text-danger"><?php if($validation->hasError('dob')){
                                                echo $validation->showError('dob');} ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                            <span class="emailerror text-danger"><?php if($validation->hasError('email')){
                                                echo $validation->showError('email'); } ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="phone" id="phone" class="form-control" id="phone" placeholder="Phone">
                                            <span class="phonerror text-danger"><?php if($validation->hasError('phone')){
                                                echo $validation->showError('phone'); } ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Designation</label>
                                        <div class="col-sm-10">
                                            <select name="designation" id="designation" class="form-control text-muted">
                                                <option value="">Select Designation</option>
                                                <option value="Php">Php</option>
                                                <option value="Python">Python</option>
                                                <option value="Java">Java</option>
                                                <option value="KBC">KBC</option>
                                                <option value="NodeJs">NodeJs</option>
                                            </select>
                                            <span class="designationerror text-danger"><?php if($validation->hasError('designation')){
                                                echo $validation->showError('designation'); } ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="password" id="password" class="form-control" id="Password" placeholder="Password">
                                            <span class="passworderror text-danger"><?php if($validation->hasError('password')){
                                                echo $validation->showError('password'); } ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Confirm Password</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="conpassword" id="conpassword" class="form-control" placeholder="Confirm Password">
                                            <span class="conpassworderror text-danger"><?php if($validation->hasError('conpassword')){
                                                echo $validation->showError('conpassword'); } ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" id="adds-new-user" class="btn btn-success w-100">Add New User</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $(".stusers").addClass("active");
        // Remove Error
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
            $(".designationerror").html("");
        })
        //password
        $("#password").on("input", function() {
            $(".passworderror").html("");
        })
        //confirm password
        $("#conpassword").on("input", function() {
            $(".conpassworderror").html("");
        })
        $("#dob").datepicker();
        //Phone Input Validation
        $("#phone").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/\D/g, ""));
            if ((evt.which < 48 || evt.which > 57)) {
                evt.preventDefault();
            }
        });
        //Update Profile Picture
        $(document).on('click', "#adds-new-user", function(e) {
            e.preventDefault();
            var fname=$("#fname").val();
            var lname=$("#lname").val();
            var gender=$("#gender").val();
            var dob=$("#dob").val();
            var email=$("#email").val();
            var phone=$("#phone").val();
            var designation=$("#designation").val();
            var password=$("#password").val();
            var conpassword=$("#conpassword").val();
            if(fname==""){
                $(".fnamerror").html("First Name Required");
            }else if(lname==""){
                $(".lnamerror").html("Last Name Required");
            }else if(gender==""){
                $(".gendererror").html("Gender Required");
            }else if(dob==""){
                $(".doberror").html("DoB Required");
            }else if(email==""){
                $(".emailerror").html("Email Required");
            }else if(phone==""){
                $(".phonerror").html("Phone Required");
            }else if(designation==""){
                $(".designation").html("Designation Required");
            }else if(password==""){
                $(".passworderror").html("Password Required");
            }else if(conpassword==""){
                $(".conpassworderror").html("Confirm Required");
            }else{
                $.ajax({
                    url: '<?php echo base_url('Auth/Add_User/New_User');?>',
                    type: 'POST',
                    data: $(".user-data-added").serialize(),
                    success: function(response) {
                        alert("Successfully Added New User!");
                        $(".user-data-added").trigger('reset');
                    },
                    error: function() {
                        alert('Error updating profile');
                    }
                });
            }
        });
        //Password Matching Validation
        $("#conpassword").on("input", function() {
            var password = $("#password").val();
            var conpassword = $("#conpassword").val();
            if (password != conpassword) {
                $(".conpassworderror").html("Passwords do not match!");
                $("#adds-new-user").prop('disabled', true);
            } else {
                $(".conpassworderror").html("");
                $("#adds-new-user").prop('disabled', false);
            }
        });
    });
</script>
<?= $this->endSection(); ?>
<?= $this->section('scripts'); ?>
<script src="<?php echo base_url(); ?>/asset/website/jquery-ui/jquery-ui.min.js"></script>
<?= $this->endSection(); ?>