@extends('layouts.principal')

@section('titulo', 'Estadísticas')

@section('encabezado', 'Estadísticas')

@section('subencabezado', 'Gráficos Estadísticos')

@section('breadcrumb')
    <li>
        <i class="fa fa-bar-chart"></i>
        Estadísticas
    </li>
    
@endsection
@section('contenido')
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
             ['Task', 'Hours per Day'],
         @foreach ($pastel as $pastels)
        ['{{ $pastels->actividad}}', {{$pastels->cantidad}}],
        @endforeach
        ]);

        var options = {
          title: 'Estadísticas de Reserva por Actividades',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
@endsection