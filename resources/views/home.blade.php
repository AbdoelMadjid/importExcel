@extends('layouts.app')

@section('content')
<!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $total }}</h3>

              <p>Todos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $m }}</h3>

              <p>Hombres</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $f }}</h3>

              <p>Mujeres</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $o }}</h3>

              <p>Otros</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

       <!-- solid sales graph -->
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Grafico de Edades</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <div class="box-body border-radius-none">
              <canvas class="chart" id="line-chart" style="height: 250px;"></canvas>

            </div>
          
          </div>
          <!-- /.box -->
          <div class="row justify-content-md-center">
            
            <div class="col-md-12">
              <div id="fb-root"></div>
              <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.3&appId=288315375364682&autoLogAppEvents=1"></script>

              <div class="fb-page" data-href="https://www.facebook.com/Sitrapequia/ " data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Sitrapequia/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Sitrapequia/">Sindicato Sitrapequia</a></blockquote></div>
            </div>

          </div>
@endsection
@section('scripts')

<script type="text/javascript">
    /* Morris.js Charts */
  // Sales chart

    var ventasChart = document.getElementById("line-chart");

    var speedData = {
      labels: ["menor a 20","20 a 29","30 a 39", "40 a 49", "50 a 59", "60 a 69", "70 a 79", "80 a 89", "90 a 99"],
      datasets: [{
        label: "Personas",
        data: [@foreach($employeesOld as $employeeOld) {{ $employeeOld }}, @endforeach],
        borderColor: [
            'rgba(255, 255, 255, 0.8)'
        ],
        backgroundColor:[
          'rgba(255, 255, 255, 0)',
        ],

      }]
    };
     
    var chartOptions = {
      legend: {
        display: true,
        position: 'top',
        labels: {
          boxWidth: 80,
          fontColor: 'white'
        }
      }
    };

    var lineChart = new Chart(ventasChart, {
        type: 'line',
        data: speedData,
        options: chartOptions,
    });

</script>
@endsection
