<?= $this->extend('auth/component/layouts'); ?>
<?= $this->section('title'); ?>
Profile
<?= $this->endSection(); ?>
<?= $this->section('home_title'); ?>
Profile
<?= $this->endSection(); ?>
<?= $this->section('home_bread'); ?>
Profile
<?= $this->endSection(); ?>
<?= $this->section('styles'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/asset/auth/jquery-ui/jquery-ui.min.css" />
<script src="<?php echo base_url(); ?>/asset/auth/plugins/jquery/jquery.min.js"></script>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(). $img_path; ?>">
            </div>
            <h3 class="profile-username text-center"><?php echo $first_name . " " . $last_name; ?></h3>
            <p class="text-muted text-center"><?php echo $designation; ?></p>
            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Gender</b> <a class="float-right"><?php if ($gender == 1) {
                                                        echo "Male";
                                                      } else {
                                                        echo "Female";
                                                      } ?></a>
              </li>
              <li class="list-group-item">
                <b>Email</b> <a class="float-right"><?php echo $email; ?></a>
              </li>
              <li class="list-group-item">
                <b>Phone</b> <a class="float-right"><?php echo $phone; ?></a>
              </li>
            </ul>

            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
          </div>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
              <li class="nav-item"><span class="nav-link ml-5 text-success">
                  <?php $session = \Config\Services::session();
                  echo $session->getFlashdata('profile_upd'); ?></span></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <form class="form-horizontal" action="<?php echo base_url(); ?>Update" method="POST">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10" id="editfname">
                      <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $first_name; ?>" id="fname" placeholder="First Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10" id="editlfname">
                      <input type="text" name="lname" id="lname" value="<?php echo $last_name; ?>" class="form-control" id="lname" placeholder="Last Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-10">
                      <select name="gender" id="gender" class="form-control text-muted">
                        <?php if ($gender == 1) { ?>
                          <option value="1">Male</option>
                          <option value="0">Female</option>
                        <?php } else { ?>
                          <option value="0">Female</option>
                          <option value="1">Male</option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">DoB</label>
                    <div class="col-sm-10">
                      <input type="text" name="dob" id="dob" value="<?php echo date("d/m/Y", strtotime($dob)); ?>" class="form-control" id="dob" placeholder="DoB">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                      <input type="text" name="phone" id="phone" value="<?php echo $phone; ?>" class="form-control" id="phone" placeholder="Phone">
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
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" id="unpdate-profile" class="btn btn-danger w-100">Update</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane" id="settings">
                <form class="form-horizontal passchange" method="POST" action="<?php base_url(); ?>Profile/PassUpdate">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Current Password</label>
                    <div class="col-sm-10">
                      <input type="text" name="currentpass" class="form-control" id="currentpass" placeholder="Current Password">
                      <span class="currentpasserror text-danger"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="text" name="password" class="form-control" id="password" placeholder="Password">
                      <span class="passworderror text-danger"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                      <input type="text" name="conpass" class="form-control" id="conpassword" placeholder="Confirm Password">
                      <span class="conpasserror text-danger"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn pass-update btn-success w-100">Update</button>
                    </div>
                  </div>
                </form>
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <p class="card-title">Profile Image Change</p>
                    </div>
                  </div>
                  <form class="form-horizontal profileimg" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Image</label>
                      <div class="col-sm-10">
                        <input type="file" name="file_img" class="form-control" style="padding: 0.2rem 0.75rem;" accept="image/*">
                        <span class="file_imgerror text-danger"></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn updat-profile btn-info w-100">Update</button>
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
  </div>
</section>
<script>
  $(document).ready(function() {
    $(".homeactive").addClass("active");
    $("#dob").datepicker();
    //Phone Input Validation
    $("#phone").on("input", function(evt) {
      var self = $(this);
      self.val(self.val().replace(/\D/g, ""));
      if ((evt.which < 48 || evt.which > 57)) {
        evt.preventDefault();
      }
    });
    $(".pass-update").on("click", function(e) {
      e.preventDefault();
      var currentpass = $("#currentpass").val();
      var password = $("#password").val();
      var conpassword = $("#conpassword").val();
      if (currentpass == "") {
        $(".currentpasserror").html("Current Password Required!");
      } else if (password == "") {
        $(".passworderror").html("Password Required!");
      } else if (conpassword == "") {
        $(".conpasserror").html("Confirm Password Required!");
      } else {
        $(".passchange").submit();
      }
    })
    //Password Matching Validation
    $("#conpassword").on("input", function() {
      var password = $("#password").val();
      var conpassword = $("#conpassword").val();
      if (password != conpassword) {
        $(".conpasserror").html("Passwords do not match!");
        $(".pass-update").prop('disabled', true);
      } else {
        $(".conpasserror").html("");
        $(".pass-update").prop('disabled', false);
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
      $(document).on('click', ".updat-profile", function(e) {
      e.preventDefault();
      var formdata = new FormData($(".profileimg")[0]);
      var conf = confirm("Are you sure you want to update?");
      if(conf){
      $.ajax({
        url: '<?php echo base_url('Auth/Profile/Proupdate'); ?>',
        type: 'POST',
        data:formdata,
        contentType:false,
        processData:false,
        cache:false,
        success: function(response) {
        alert("Successfully Updated!");
        location.reload();
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/asset/website/jquery-ui/jquery-ui.min.js"></script>
<?= $this->endSection(); ?>