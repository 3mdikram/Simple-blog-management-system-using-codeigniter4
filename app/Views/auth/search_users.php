<?= $this->extend('auth/component/layouts'); ?>
<?= $this->section('title'); ?>
Search User
<?= $this->endSection(); ?>
<?= $this->section('home_title'); ?>
Search User
<?= $this->endSection(); ?>
<?= $this->section('home_bread'); ?>
SU
<?= $this->endSection(); ?>
<?= $this->section('styles'); ?>
<style>.hide{display:none;}</style>
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
                        <ul class="nav nav-pills">
                            <button class="btn text-left w-100 nav-item btn-primary disabled">Search User</button>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <form class="form-horizontal user-data-added" method="POST">
                                    <?php $validation = \Config\Services::validation(); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                                            <span class="emailerror text-danger"></span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="loadData"></div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $(".searchactive").addClass("active");
        $(document).on('input', "#email", function(e) {
            e.preventDefault();
            var email = $("#email").val();
            if(email==""){
                $(".loadData").addClass('hide');
        }else{
            $.ajax({
                url: '<?php echo base_url('Auth/Search/User_Details'); ?>',
                type: 'POST',
                data: { email: email },
                success: function(response) {
                    $(".loadData").removeClass('hide');
                    $(".loadData").html(response);
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