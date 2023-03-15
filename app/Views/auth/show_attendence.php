<?= $this->extend('auth/component/layouts'); ?>
<?= $this->section('title'); ?>
Show Attendence
<?= $this->endSection(); ?>
<?= $this->section('home_title'); ?>
Show All Users Attendence
<?= $this->endSection(); ?>
<?= $this->section('home_bread'); ?>
Attendence<?= $this->endSection(); ?>
<?= $this->section("styles"); ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>/asset/auth/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/asset/auth/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/asset/auth/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add Work Start-End Attendence</button></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Profile</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($results)) {
                                    foreach ($results as $result) {
                                        $fname = $result['first_name'];
                                        $lname = $result['last_name'];
                                        $fullName = $fname . " " . $lname;
                                ?>
                                        <tr>
                                            <td><?php echo $fullName; ?></td>
                                            <td><?php echo $result['email']; ?></td>
                                            <td><img class='img-thumbiles img-circle' src='<?php echo base_url() . $result['img_path']; ?>' width="50px" height="50px"></td>
                                            <td class="text-center">
                                                <buttion class='btn btn-primary'>
                                                    <a class="text-white" href="<?php echo base_url('Auth/User_Attendence/Details/') . $result['id']; ?>"><i class='fas fa-eye fs-4'></i></a>
                                                </buttion>
                                            </td>
                                        </tr>
                                <?php }
                                } else {
                                    echo "Data Not Found";
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title offset-3">Add Work Start-End Attendence</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center error-success"></p>
                            <form class="attendence-form" method="POST">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                                    <span id="emailaterror" class="text-danger"></span>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="attendence-btn btn btn-primary w-100">Add Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
<?= $this->section("script"); ?>
<script src="<?php echo base_url();?>/asset/auth/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>/asset/auth/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>/asset/auth/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/asset/auth/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/asset/auth/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>/asset/auth/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/asset/auth/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>/asset/auth/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/asset/auth/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>/asset/auth/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>/asset/auth/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>/asset/auth/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>/asset/auth/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>/asset/auth/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function() {
        $(".attendActive").addClass("active");
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $(document).on('click', ".attendence-btn", function(e) {
        e.preventDefault();
        //Remove Error
        $("#email").on("input",function(){
            $("#emailaterror").html("");
        });
        var email = $("#email").val();
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if(email==""){
            $("#emailaterror").html("Email Id Required!");
        }else if(!expr.test(email)){
            $("#emailaterror").html("Enter Valid Email Id!");
        }else{
            $.ajax({
                url: '<?php echo base_url('Auth/User_Attendence/Add_attendence'); ?>',
                type: 'POST',
                data:$(".attendence-form").serialize(),
                success: function(data) {
                    if(data==1){
                        $(".error-success").addClass("text-success");
                        $(".error-success").html("Attendence Successfully Added!").fadeIn();
                        $(".error-success").fadeOut(8000);
                        $(".attendence-form").trigger('reset');
                    }else if(data==2){
                        $(".error-success").addClass("text-danger");
                        $(".error-success").html("Invalid Email Id!").fadeIn();
                        $(".error-success").fadeOut(8000);
                    }else if(data==31){
                        $(".error-success").addClass("text-danger");
                        $(".error-success").html("Already Attendence Done!").fadeIn();
                        $(".error-success").fadeOut(8000);
                    }else{
                        $(".error-success").addClass("text-danger");
                        $(".error-success").html("Attendence Adding Failed!").fadeIn();
                        $(".error-success").fadeOut(8000);
                    }
                }
            });
        }
    });
</script>
<?= $this->endSection(); ?>