@extends('layouts.app')
@section('content')
<a href="{{ route('posts.index') }}"><button class="button-secondary" style="width: 100px;margin-bottom:29px;margin-left:101px;">Back</button></a>
<div style="margin-left:100px" id="container"></div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
  var postData = <?php echo json_encode($postData) ?>;
  Highcharts.chart('container', {
    title: {
      text: 'New Post Growth, 2022'
    },
    subtitle: {
      text: 'Source: positronx.io'
    },
    xAxis: {
      categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
        'October', 'November', 'December'
      ]
    },
    yAxis: {
      title: {
        text: 'Number of New Posts'
      }
    },
    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
    },
    plotOptions: {
      series: {
        allowPointSelect: true
      }
    },
    series: [{
      name: 'New Posts',
      data: postData
    }],
    responsive: {
      rules: [{
        condition: {
          maxWidth: 500
        },
        chartOptions: {
          legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom'
          }
        }
      }]
    }
  });
</script>
@endsection