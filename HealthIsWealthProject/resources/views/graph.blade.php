@extends('frontend.app')
@section('content')
<div class="registerform">
    <div class="cardHeader">Graph for Post</div>
<div id="graph"></div>
<div class="create-categories">
<a href="{{ route('posts.index') }}"><i class="fas fa-arrow-circle-left"></i></a>
</div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
  var postData = <?php echo json_encode($postData) ?>;
  Highcharts.chart('graph', {
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
