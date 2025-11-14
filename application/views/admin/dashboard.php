<?php $this->load->view('admin/template/header'); ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/date-picker.css">

  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Dashboard</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Harian</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
      <!--div class="col-sm-12 col-xl-12 box-col-12">
        <div class="mb-3 row g-3">
          <label class="col-2 col-form-label text-sm-end">Date From</label>
          <div class="col-4">
            <div class="input-group">
              <input class="datepicker-here form-control digits" type="text" data-language="en">
            </div>
          </div>
        </div>
        <div class="mb-3 row g-3">
          
        <label class="col-2 col-form-label text-sm-end">Date To</label>
          <div class="col-4">
            <div class="input-group">
              <input class="datepicker-here form-control digits" type="text" data-language="en">
            </div>
          </div>
        </div>
      </div-->
      <!--div class="col-sm-12 col-xl-12 box-col-12">
        <div class="card">
          <div class="card-header">
            <h5>Top Stream Tracks</h5>
          </div>
          <div class="card-body">
            <div id="basic-bar"></div>
          </div>
        </div>
      </div-->
      <!--div class="col-sm-12 col-xl-12 box-col-12">
        <div class="card">
          <div class="card-header">
            <h5>Daily Reff Stream</h5>
          </div>
          <div class="card-body" >
            <div id="area-spaline" style="height: 200px !important;"></div>
          </div>
        </div>
      </div-->
      
      
    </div>
  </div>
  <!-- Container-fluid Ends-->

<script src="<?= base_url() ?>assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="<?= base_url() ?>assets/js/chart/apex-chart/stock-prices.js"></script>
<script>  // area spaline chart
  var options1 = {
    chart: {
      height: 300,
      type: 'area',
      toolbar: {
        show: false
      }
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth'
    },
    series: [{
      name: 'Original',
      data: [2914700, 2714700, 1914700, 2614700, 2914700, 2214700, 2414700]
    }, {
      name: 'Meta',
      data: [1412900, 1612900, 1412900, 1512900, 1912900, 1012900, 2012900]
    }, {
      name: 'Socmed',
      data: [1653200 , 1953200, 1353200, 1653200, 1753200, 1353200, 1653200]
    }],

    xaxis: {
      type: 'date',
      categories: ["2024-07-19", "2024-07-20", "2024-07-21", "2024-07-22", "2024-07-23", "2024-07-24", "2024-07-25"],
    },
    tooltip: {
      x: {
        format: 'dd/MM/yy'
      },
    },
    colors: [CubaAdminConfig.primary, CubaAdminConfig.secondary]
  }

  var chart1 = new ApexCharts(
    document.querySelector("#area-spaline"),
    options1
  );

  chart1.render();

  // basic bar chart
  var options2 = {
    chart: {
      height: 350,
      type: 'bar',
      toolbar: {
        show: true
      }
    },
    plotOptions: {
      bar: {
        horizontal: true,
      }
    },
    dataLabels: {
      enabled: false
    },
    series: [{
      data: [509374	, 525180	, 579838	, 664852	, 669441	, 744366, 792837	, 858518, 907380	, 1108452	]
    }],
    xaxis: {
      categories: ['Henry Moodie - drunk text', 'Feby Putri - Runtuh (w/ Fiersa Besari)', 'Lyodra - Pesan Terakhir', 'Mahalini - Mati-Matian', 'Bernadya - Satu Bulan', 'Billie Eilish - BIRDS OF A FEATHER', 'Mahalini - Bawa Dia Kembali', 'Adrian Khalif - Sialan (w/ Juicy Luicy)', 'Dudy Oris - Aku Yang Jatuh Cinta', 'Sal Priadi - Gala bunga matahari'],
    },
    colors: [CubaAdminConfig.primary]
  }

  var chart2 = new ApexCharts(
    document.querySelector("#basic-bar"),
    options2
  );

  chart2.render();

  
</script>
<?php $this->load->view('admin/template/footer'); ?>