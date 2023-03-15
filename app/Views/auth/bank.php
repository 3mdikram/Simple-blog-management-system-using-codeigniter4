<?= $this->extend('auth/component/layouts'); ?>
<?= $this->section('title'); ?>
Bank
<?= $this->endSection(); ?>
<?= $this->section('home_title'); ?>
Bank Details
<?= $this->endSection(); ?>
<?= $this->section('home_bread'); ?>
Bank
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="content">
  <div class="container-fluid">
    <button class="btn btn-success" id="openmodel" data-toggle="modal">Add New Bank Account</button>
    <div class="row mt-4 ml-5">
      <?php if (count($results) > 0) {
        foreach ($results as $item) { ?>
          <div class="col-md-5" id="closetdiv">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $item['bank_name']; ?></h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" style="display: block;">
                <div class="">
                  <p>IFSC Code .<span class="text-muted"><?php echo $item['ifsc_code']; ?></span></p>
                  <p>A/c No.<span class="text-muted"><?php echo $item['account_no']; ?></span></p>
                  <p class="mt-2"><span style="cursor:pointer;" class="update-bnk-data" data-bnkn="<?php echo $item['bank_name']; ?>" data-bankid="<?php echo $item['id']; ?>" data-ifss="<?php echo $item['ifsc_code']; ?>" data-acnt="<?php echo $item['account_no']; ?>">
                      <i class="fas fa-pencil-alt text-primary"></i></span>
                    <span class="ml-2 bank-delete" style="cursor:pointer;" data-bdelete="<?php echo $item['id']; ?>">
                      <i class="fas fa-trash text-danger"></i></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
      <?php }
      } else {
        echo "<p class='text-center'>Data Not Found!</p>";
      } ?>
    </div>
    <?= $this->include("auth/component/bank_model"); ?>
  </div>
</section>
<script>
  $(document).on('click', ".bank-delete", function(e) {
    e.preventDefault();
    var id = $(this).data("bdelete");
    var element=this;
    var conf = confirm("Are you sure you want to delete this?");
    if(conf){
    $.ajax({
      url: '<?php echo base_url('Auth/Bank/deleteBank'); ?>',
      type: 'POST',
      data:{id:id},
      dataType: 'json',
      success: function(response) {
        $(element).closest("#closetdiv").fadeOut();
      },
      error: function() {
        alert('Error deleting data');
      }
    });
    }
  });
  $(document).ready(function(){
    $(".bankactive").addClass("active");
  })
</script>
<?= $this->endSection(); ?>