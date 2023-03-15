<?= $this->extend('auth/component/layouts'); ?>
<?= $this->section('title'); ?>
News Post
<?= $this->endSection(); ?>
<?= $this->section('home_title'); ?>
News Post
<?= $this->endSection(); ?>
<?= $this->section('home_bread'); ?>
<a href="javascript:void(0)" onclick="window.history.back()">Back</a>
<?= $this->endSection(); ?>
<?= $this->section('styles'); ?>
<script src="<?php echo base_url();?>/asset/auth/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>/asset/auth/plugins/summernote/summernote-bs4.min.css">
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <a href="javascript:void(0)" class="btn btn-primary btn-block mb-3">Post Folder</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Folders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="#" class="nav-link">
                      <i class="fas fa-inbox"></i> Approved Post
                      <span class="badge bg-primary float-right">12</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="fas fa-exclamation-triangle"></i> Denied Post
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-file-alt"></i> Drafts Post
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-trash-alt"></i> Trash
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-circle text-danger"></i> Advanture</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-circle text-warning"></i> Sci-fi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-circle text-primary"></i> Social</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title"><?= $title;?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?= $n_f['f_open'];?>
                <div class="form-group">
                <?= $n_f['n_title'];?>
                </div>
                <div class="form-group">
                <?= $n_f['n_message'];?>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary w-100"><i class="far fa-envelope"></i> Send</button>
            </div>
            <?= $n_f['f_close'];?>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <script src="<?php echo base_url();?>/asset/auth/plugins/summernote/summernote-bs4.min.js"></script>
    
    <script>
  $(document).ready(function () {
    //Add text editor
    $('.postNewsActive').addClass('active');
    $('#compose-textarea').summernote(
        {
        placeholder:'Write here..',
        height: 200,
        toolbar: [
    ['style', ['style']],
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['fontname', ['fontname']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link']],
    ['height', ['height']]
  ],
  popover: {
  link: [
    ['link', ['linkDialogShow', 'unlink']]
  ],
  table: [
    ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
  ],
  air: [
    ['color', ['color']],
    ['font', ['bold', 'underline', 'clear']],
    ['para', ['ul', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link']]
  ]
}
      }
    )
  });
</script>
<?= $this->endSection(); ?>
<?= $this->section('scripts'); ?>
<!-- AdminLTE App -->
<!-- Summernote -->
<?= $this->endSection(); ?>