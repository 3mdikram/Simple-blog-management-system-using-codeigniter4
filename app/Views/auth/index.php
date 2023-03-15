<?= $this->extend('auth/component/layouts');?>
<?= $this->section('title');?>
Dashboard
<?= $this->endSection();?>
<?= $this->section('home_title');?>
Dashboard
<?= $this->endSection();?>
<?= $this->section('home_bread');?>
Dashboard
<?= $this->endSection();?>
<?= $this->section('styles'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/asset/auth/icons/font/bootstrap-icons.css">
<script src="<?php echo base_url(); ?>/asset/auth/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?= $this->endSection(); ?>
<?= $this->section('content');?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $tu;?></h3>
                <p>Users</p>
              </div>
              <div class="icon">
              <i class="bi bi-person-circle"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $tbank;?></h3>
                <p>Bank</p>
              </div>
              <div class="icon">
              <i class="bi bi-bank2"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3 class="text-white"><?= "₹".$sum;?></h3>
                <p class="text-white">Total Paid Salary</p>
              </div>
              <div class="icon">
              <i class="bi bi-currency-rupee"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $news;?></h3>
                <p>Total News</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <section class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <h6 class="text-black">
                <i class="bi bi-person-vcard"></i>
                  Daily Activity
                </h6>
              <div class="card-body pt-0">
                <div id="piechart" style="width: 500px; height: 400px;"></div>
              </div>
            </div>
          </section>
          <section class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <h6 class="text-black">
                <i class="bi bi-person-vcard"></i>
                 Map
                </h6>
              <div class="card-body pt-0">
              <div>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3556.898735835422!2d75.70929861460947!3d26.93842458311652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396c4dda9b31d587%3A0x419256c6759c9803!2sEntity%20Digital%20Sports%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1678870321863!5m2!1sen!2sin" width="500" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>
    <script>
  $(document).ready(function(){
    $(".homeactive").addClass("active");
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',45],
          ['Absent',20],
          ['Commute',18],
          ['News Post',100],
          ['Attendence',120]
        ]);

        var options = {
          title: 'Daily Activity',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
      //Map
      google.charts.load('current', {
      'packages': ['map'],
      // Note: you will need to get a mapsApiKey for your project.
      // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
      'mapsApiKey': 'AIzaSyBqcCyt4TOfzmZyukt-PJBNWCNn-tKNUu8'
    });
    google.charts.setOnLoadCallback(drawMap);
    function drawMap () {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Address');
      data.addColumn('string', 'Location');

      data.addRows([
        ['Lake Buena Vista, FL 32830, United States',                  'Walt Disney World'],
        ['6000 Universal Boulevard, Orlando, FL 32819, United States', 'Universal Studios'],
        ['7007 Sea World Drive, Orlando, FL 32821, United States',     'Seaworld Orlando' ]
      ]);

      var options = {
        mapType: 'styledMap',
        zoomLevel: 12,
        showTooltip: true,
        showInfoWindow: true,
        useMapTypeControl: true,
        maps: {
          // Your custom mapTypeId holding custom map styles.
          styledMap: {
            name: 'Styled Map', // This name will be displayed in the map type control.
            styles: [
              {featureType: 'poi.attraction',
               stylers: [{color: '#fce8b2'}]
              },
              {featureType: 'road.highway',
               stylers: [{hue: '#0277bd'}, {saturation: -50}]
              },
              {featureType: 'road.highway',
               elementType: 'labels.icon',
               stylers: [{hue: '#000'}, {saturation: 100}, {lightness: 50}]
              },
              {featureType: 'landscape',
               stylers: [{hue: '#259b24'}, {saturation: 10}, {lightness: -22}]
              }
        ]}}
      };

      var map = new google.visualization.Map(document.getElementById('map_div'));

      map.draw(data, options);
    }
  })
</script>
<?= $this->endSection();?>
<?= $this->section('scripts'); ?>
<?= $this->endSection(); ?>