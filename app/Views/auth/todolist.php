<?= $this->extend('auth/component/layouts'); ?>
<?= $this->section('title'); ?>
To Do List
<?= $this->endSection(); ?>
<?= $this->section('home_title'); ?>
To Do List
<?= $this->endSection(); ?>
<?= $this->section('home_bread'); ?>
TDL
<?= $this->endSection(); ?>
<?= $this->section('styles'); ?>
<style>
    #btnsearch {
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

    .pagination li.active {
        background: deepskyblue;
        color: white;
    }

    .pagination li.active a {
        color: white;
        text-decoration: none;
    }
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>/asset/auth/jquery-ui/jquery-ui.min.css" />
<script src="<?php echo base_url(); ?>/asset/auth/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/asset/website/jquery-ui/jquery-ui.min.js"></script>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-1">
                        <ul class="nav nav-pills">
                            <button class="btn w-100 text-left nav-item btn-primary disabled">To Do List</button>
                            <span class="text-center offset-5 text-success font-weight-bold">
                                <?php
                                $session = \Config\Services::session();
                                echo $session->getFlashdata('success'); ?>
                                </p>
                            </span>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <button type="button" id="AddrowData" class="btn btn-info"><i class='fas fa-plus-circle'></i></button>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped mt-2">
                            <thead>
                                <tr>
                                    <th width='20%'>Name</th>
                                    <th width='20%'>Item</th>
                                    <th width='20%'>Date</th>
                                    <th width='20%'>Issue_by</th>
                                    <th width='15%'>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tablerowAppend">
                                <?php if (count($result) > 0) {
                                    foreach ($result as $item) { ?>
                                        <tr>
                                            <td><?= $item['name']; ?></td>
                                            <td><?= $item['item']; ?></td>
                                            <td><?= date('Y-d-m', strtotime($item['created_at'])); ?></td>
                                            <td><?= $item['issue_by']; ?></td>
                                            <td class="text-center">
                                                <a onclick="return confirm('Are you sure you want to delete this?')" href="ToDoList/delete/<?= $item['id']; ?>"><span class="badge badge-danger badge-pill"><i class='fas fa-times-circle'></i></span></a>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                        <div style='margin-top: 10px;'>
                            <?= $pager->links() ?>
                        </div>
                    </div>
                </div>
                <div id="loadformData">

                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById("AddrowData").addEventListener('click', function() {
        mydiv = document.getElementById("loadformData");
        mydiv.innerHTML += ` <div class="card">
                        <div class="card-body">
                            <form action="<?php echo base_url('Auth/ToDoList/AddItem'); ?>" method="POST">
                                <div class="row">
                                    <div class="col-2">
                                        <input type="text" name="uname" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="col-3">
                                        <input type="text" name="itemName" class="form-control" placeholder="Item Name">
                                    </div>
                                    <div class="col-3">
                                        <input type="text" name="date" class="datepicker form-control" placeholder="Date">
                                    </div>
                                    <div class="col-3">
                                        <select class="form-control" name="issued">
                                            <option value="">Select Issue By</option>
                                            <option value="HR">HR</option>
                                            <option value="HR">HR</option>
                                        </select>
                                    </div>
                                    <div class="col-1">
                                        <input type="submit" class="btn btn-success" value="Save">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>`;
    });
    $(document).ready(function() {
        $(".todolistActive").addClass("active");
        $(document).on('input', ".datepicker", function() {
            $(".datepicker").datepicker();
        });
    });
</script>
<?= $this->endSection(); ?>
<?= $this->section('scripts'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/asset/website/jquery-ui/jquery-ui.min.js"></script>

<?= $this->endSection(); ?>