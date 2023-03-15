<?= $this->extend('auth/component/layouts'); ?>
<?= $this->section('title'); ?>
Show Users
<?= $this->endSection(); ?>
<?= $this->section('home_title'); ?>
Show All Users
<?= $this->endSection(); ?>
<?= $this->section('home_bread'); ?>
Show Users<?= $this->endSection(); ?>
<?= $this->section("styles"); ?>
<style>
  #btnsearch{
    padding: 0rem 0.75rem;
    border-top-left-radius: 0px;
    border-bottom-left-radius: 0px;
  }
  a { 
     padding-left: 5px; 
     padding-right: 5px; 
     margin-left: 5px; 
     margin-right: 5px; 
   } 
   .pagination li.active{
     background: deepskyblue;
     color: white;
   }
   .pagination li.active a{
     color: white;
     text-decoration: none;
   }
</style>
<script src="<?php echo base_url(); ?>/asset/auth/plugins/jquery/jquery.min.js"></script>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <button class="btn btn-success">
                <a class="text-white" href="<?php echo base_url("Auth/New_Add"); ?>">
                  Add New Users
                </a>
              </button>
              <span class="ml-1">
                <form action="New_Users" method="get" id="searchForm" action="loadRecord" id="searchForm" style="display: inline-table;">
                  <div class="input-group input-group-sm mb-3">
                    <input type='text' class="form-control" name='search' value='<?= $search ?>' placeholder="Search">
                    <input type='button' id='btnsearch' class="btn btn-success" value='Search' onclick='document.getElementById("searchForm").submit();'>
                  </div>
                </form>
              </span>
            </h3>
          </div>
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
                <?php if (count($users)) {
                  foreach ($users as $result) {
                    $fname = $result['first_name'];
                    $lname = $result['last_name'];
                    $fullName = $fname . " " . $lname;
                ?>
                    <tr>
                      <td><?php echo $fullName; ?></td>
                      <td><?php echo $result['email']; ?></td>
                      <td><?php echo $result['phone']; ?></td>
                      <td><img class='img-thumbiles img-circle' src='<?php echo base_url() . $result['img_path']; ?>' width="50px" height="50px"></td>
                      <td class="text-center">
                        <buttion class='btn btn-primary'>
                          <a class="text-white" href="<?php echo base_url('Auth/Update_Profile/') . $result['id']; ?>">Edit</a>
                        </buttion>
                        <span class="ml-1">
                          <buttion class='btn btn-danger delete-btn' data-delete="<?php echo $result['id']; ?>">
                            <a class="text-white" href="javascript:void(0)">Delete</a>
                          </buttion>
                        </span>
                      </td>
                    </tr>
                <?php }
                }?>
              </tbody>
            </table>
            <div style='margin-top: 10px;'>
              <?= $pager->links() ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>
<?= $this->section("script"); ?>
<script>
  $(document).ready(function() {
    $(".newUsers").addClass("active");
  })
</script>
<?= $this->endSection(); ?>