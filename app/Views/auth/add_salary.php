<?= $this->extend('auth/component/layouts'); ?>
<?= $this->section('title'); ?>
Add User Salary
<?= $this->endSection(); ?>
<?= $this->section('home_title'); ?>
Add User Salary
<?= $this->endSection(); ?>
<?= $this->section('home_bread'); ?>
<a href="javascript:void(0)" onclick="window.history.back()">Back</a>
<?= $this->endSection(); ?>
<?= $this->section('styles'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/asset/auth/jquery-ui/jquery-ui.min.css" />
<script src="<?php echo base_url(); ?>/asset/auth/plugins/jquery/jquery.min.js"></script>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 offset-2">
                <div class="card">
                    <div class="card-header p-1">
                        <ul class="nav nav-pills ">
                            <button class="btn w-100 text-left nav-item btn-primary disabled">Add Salary</button>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <form class="form-horizontal users-salary-added" method="POST">
                                    <?php
                                    $validation = \Config\Services::validation();
                                    helper('form')
                                    ?>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">User Email Id</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="umail" id="umail" class="form-control" value="<?php echo set_value('umail'); ?>" placeholder="User Email Id">
                                            <span class="umailerror text-danger">
                                                <?php if ($validation->hasError('umail')) {
                                                    echo $validation->showError('umail');
                                                } ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Bank Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="bankname" id="bankname" class="form-control" value="<?php echo set_value('bankname'); ?>" placeholder="Bank Name">
                                            <span class="banknamerror text-danger">
                                                <?php if ($validation->hasError('bankname')) {
                                                    echo $validation->showError('bankname');
                                                } ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Account No.</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="accountno" id="accountno" value="<?php echo set_value('accountno'); ?>" class="form-control" placeholder="Account No.">
                                            <span class="accountnoerror text-danger">
                                                <?php if ($validation->hasError('accountno')) {
                                                    echo $validation->showError('accountno');
                                                } ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">IFSC Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="ifscode" value="<?php echo set_value('ifscode'); ?>" id="ifscode" class="form-control" placeholder="IFSC Code">
                                            <span class="ifscoderror text-danger">
                                                <?php if ($validation->hasError('ifscode')) {
                                                    echo $validation->showError('ifscode');
                                                } ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Amount</label>
                                        <div class="col-sm-10">
                                            <input type="amount" name="amount" value="<?php echo set_value('amount'); ?>" id="amount" class="form-control" placeholder="Amount">
                                            <span class="amounterror text-danger">
                                                <?php if ($validation->hasError('amount')) {
                                                    echo $validation->showError('amount');
                                                } ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Paid Mode</label>
                                        <div class="col-sm-10">
                                            <select name="paidmode" id="paidmode" class="form-control text-muted">
                                                <option value="">Select Paid Mode</option>
                                                <option value="Php">Bank</option>
                                                <option value="Python">UPI</option>
                                            </select>
                                            <span class="paidmoderror text-danger">
                                                <?php if ($validation->hasError('paidmode')) {
                                                    echo $validation->showError('paidmode');
                                                } ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" id="adds-user-salary" class="btn btn-success w-100">Add Now</button>
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
        $(".salaryactive").addClass("active");
        // Remove Error
        //Remove required error
        $("#umail").on("input", function() {
            $(".umailerror").html("");
        })
        $("#bankname").on("input", function() {
            $(".banknamerror").html("");
        })
        //Account No
        $("#accountno").on("input", function() {
            $(".accountnoerror").html("");
        })
        //IFSC Code
        $("#ifscode").change("input", function() {
            $(".ifscoderror").html("");
        })
        //Amount
        $("#amount").change("input", function() {
            $(".amounterror").html("");
        })
        //Paid Mode
        $("#paidmode").on("input", function() {
            $(".paidmoderror").html("");
        })
        //Amount Input Validation
        $("#amount").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/[^0-9\.]/g, ''));
            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) {
                evt.preventDefault();
            }
        });
        //Account No Input Validation
        $("#accountno").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/\D/g, ""));
            if ((evt.which < 48 || evt.which > 57)) {
                evt.preventDefault();
            }
        });
        //Add Salary Using Ajax
        $(document).on('click', "#adds-user-salary", function(e) {
            e.preventDefault();
            var umail = $("#umail").val();
            var bankname = $("#bankname").val();
            var accountno = $("#accountno").val();
            var ifscode = $("#ifscode").val();
            var amount = $("#amount").val();
            var paidmode = $("#paidmode").val();
            if (umail == "") {
                $(".umailerror").html("Email Id Required");
            } else if (bankname == "") {
                $(".banknamerror").html("Bank Name Required");
            } else if (accountno == "") {
                $(".accountnoerror").html("Account No Required");
            } else if (ifscode == "") {
                $(".ifscoderror").html("IFSC Code Required");
            } else if (amount == "") {
                $(".amounterror").html("Amount Required");
            } else if (paidmode == "") {
                $(".paidmoderror").html("Paid Mode Required");
            } else {
                $.ajax({
                    url: '<?php echo base_url('Auth/Salary/Users_New_Salary'); ?>',
                    type: 'POST',
                    data: $(".users-salary-added").serialize(),
                    success: function(response) {
                        if (response == 1) {
                            alert("Salary Successfully Added!");
                            $(".users-salary-added").trigger('reset');
                        } else if (response == 2) {
                            $(".umailerror").html("Invalid Email Id");
                        } else {
                            alert('Something went to worng!');
                        }

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