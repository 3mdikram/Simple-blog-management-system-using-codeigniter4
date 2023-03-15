<?= $this->extend('auth/component/layouts'); ?>
<?= $this->section('title'); ?>
Show Salary
<?= $this->endSection(); ?>
<?= $this->section('home_title'); ?>
Salary Details
<?= $this->endSection(); ?>
<?= $this->section('home_bread'); ?>
<a href="javascript:void(0)" onclick="window.history.back()">Back</a>
<?= $this->endSection(); ?>
<?= $this->section('styles');?>
<style>
    .card-success:not(.card-outline)>.card-header { background-color: #28a745;}
</style>
<script src="<?php echo base_url(); ?>/asset/auth/plugins/jquery/jquery.min.js"></script>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <?php if(count($results)>0){
                foreach($results as $item){ ?>
                    <div class="col-6">
                <div class="card card-success">
                    <div class="card-header ">
                        <h3 class="card-title"><?php echo date("D jS M Y ",strtotime($item['paid_date']));?></h3>
                    </div>
                    <div class="card-body">
                       <p>Bank : <span class="text-muted"><?php echo $item['bank_name'];?></span></p>
                       <p>Account No. : <span class="text-muted"><?php echo $item['account_no'];?></span></p>
                       <p>IFSC Code : <span class="text-muted"><?php echo $item['ifsc_code'];?></span></p>
                       <p>Amount : <span class="text-muted">₹<?php echo $item['amount'];?></span></p>
                       <p>Paid Mode : <span class="text-muted"><?php echo $item['paid_mode'];?></span></p>
                       <p>Ref No. : <span class="text-muted"><?php echo $item['ref_no'];?></span></p>
                    </div>
                </div>
            </div>
            <?php    }
            }else{ ?>
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Salary Details</h3>
                    </div>
                    <div class="card-body">
                       <h6 class="text-center">Salary Not Found</h6>
                    </div>
                </div>
            </div>
           <?php } ?>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        $(".salaryactive").addClass("active");
    });
</script>
<?= $this->endSection(); ?>