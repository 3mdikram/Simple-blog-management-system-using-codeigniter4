<?= $this->extend('auth/component/layouts'); ?>
<?= $this->section('title'); ?>
User Profile Update
<?= $this->endSection(); ?>
<?= $this->section('home_title'); ?>
<?php echo $results['first_name']." ".$results['last_name'];?>
<?= $this->endSection(); ?>
<?= $this->section('home_bread'); ?>
<a href="<?php echo base_url('Auth/Show_Users');?>">Back</a>
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
                            <button class="btn w-100 nav-item btn-primary disabled">Update Profile</button>
                           
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <form class="form-horizontal user-data-updated" method="POST">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-10" id="editfname">
                                            <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $results['first_name'];?>" id="fname" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-10" id="editlfname">
                                            <input type="text" name="lname" id="lname" value="<?php echo $results['last_name'];?>" class="form-control" id="lname" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Gender</label>
                                        <div class="col-sm-10">
                                            <select name="gender" id="gender" class="form-control text-muted">
                                                <?php if($results['gender']==1){
                                                    echo "
                                                    <option value='1'>Male</option>
                                                    <option value='0'>Female</option>
                                                    ";
                                                }else{
                                                    echo "
                                                    <option value='0'>Female</option>
                                                    <option value='1'>Male</option>
                                                    ";
                                                };?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">DoB</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="dob" id="dob" value="<?php echo date("d/m/Y",strtotime($results['dob']));?>" class="form-control" id="dob" placeholder="DoB">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" id="email" value="<?php echo $results['email'];?>" class="form-control" id="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="phone" id="phone" value="<?php echo $results['phone'];?>" class="form-control" id="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Designation</label>
                                        <div class="col-sm-10">
                                            <select name="designation" id="designation" class="form-control text-muted">
                                                <option value="Php">Php</option>
                                                <option value="Python">Python</option>
                                                <option value="Java">Java</option>
                                                <option value="KBC">KBC</option>
                                                <option value="NodeJs">NodeJs</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row" hidden>
                                        <div class="col-sm-10">
                                            <input type="text" name="id" value="<?php echo $results['id'];?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" id="unpdate-profile" class="btn btn-danger w-100">Update</button>
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
        $("#dob").datepicker();
        //Phone Input Validation
        $("#phone").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/\D/g, ""));
            if ((evt.which < 48 || evt.which > 57)) {
                evt.preventDefault();
            }
        });
        //Remove Error
        $("#currentpass").on("input", function() {
            $(".currentpasserror").html("");
        })
        //password
        $("#password").on("input", function() {
            $(".passworderror").html("");
        })
        //Update Profile Picture
        $(document).on('click', "#unpdate-profile", function(e) {
            e.preventDefault();
            var conf = confirm("Are you sure you want to update?");
            if (conf) {
                $.ajax({
                    url: '<?php echo base_url('Auth/Update_User_Profile'); ?>',
                    type: 'POST',
                    data: $(".user-data-updated").serialize(),
                    success: function(response) {
                        alert("Successfully Updated!");
                    },
                    error: function() {
                        alert('Error updating profile');
                    }
                });
            }
        });
    });
</script>
<?= $this->endSection(); ?>
<?= $this->section('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>
<?= $this->endSection(); ?>