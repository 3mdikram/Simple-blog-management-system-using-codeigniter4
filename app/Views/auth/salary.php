<?= $this->extend('auth/component/layouts'); ?>
<?= $this->section('title'); ?>
Show Salary
<?= $this->endSection(); ?>
<?= $this->section('home_title'); ?>
Show All Users Salary
<?= $this->endSection(); ?>
<?= $this->section('home_bread'); ?>
Show Salary<?= $this->endSection(); ?>
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
                        <h3 class="card-title"><button class="btn btn-success"><a class="text-white" href="<?php echo base_url('Auth/Salary/Add_Salary');?>">Add Salary</a></button></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
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
                                            <td><?php echo $result['phone']; ?></td>
                                            <td><img class='img-thumbiles img-circle' src='<?php echo base_url().$result['img_path']; ?>' width="50px" height="50px"></td>
                                            <td class="text-center">
                                                <buttion class='btn btn-primary'>
                                                    <a class="text-white" href="<?php echo base_url('Auth/Salary/').$result['id'];?>"><i class='fas fa-eye fs-4'></i></a>
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
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<?= $this->endSection(); ?>
<?= $this->section("script"); ?>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url();?>/asset/auth/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>/asset/auth/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
        $(".salaryactive").addClass("active");
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
    $(document).on('click', ".delete-btn", function(e) {
            e.preventDefault();
            var id=$(this).data("delete");
            var element=this;
            var conf = confirm("Are you sure you want to delete?");
            if (conf) {
                $.ajax({
                    url: '<?php echo base_url('Auth/Delete_Users'); ?>',
                    type: 'POST',
                    data:{id:id},
                    success: function(response) {
                        $(element).closest("tr").fadeOut();
                    },
                    error: function() {
                        alert('Error updating profile');
                    }
                });
            }
        });
</script>
<?= $this->endSection(); ?>