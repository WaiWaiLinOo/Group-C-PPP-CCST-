$(document).ready(function () {
  
  $.ajax({
    dataType: "json",
    url: "/api/weeklyPost",
    type: "GET",
    success: function (data) {
      console.log(data);

      //var day = [];
      var post = [];
      var day = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
      $.each(data, function (index, value) {
        //day.push(index);
        post.push(value);
      });
      console.log(day);
      var chartdata = {

        labels: day,
        datasets: [{
          data: post,
          label: '# weekly post',
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      };

      var ctx = $("#myChart");
      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata,
        options: {
          responsive: true,
          plugins: {
            labels: {
              render: 'percentage',
            },
            title: {
              display: true,
              text: '2022'
            },
          },
          interaction: {
            intersect: false,
          },
          scales: {
            x: {
              display: true,
              title: {
                display: true
              }
            },
            y: {
              display: true,
              title: {
                display: true,
                text: 'weekly posts %'
              },
              ticks: {
                min: 0,
                max: 100,
                callback: function (value) {
                  return value + "%"
                }
              },
              scaleLabel: {
                display: true,
                labelString: "Percentage"
              }
            }
          }
        },
      });
    },
    error: function (data) {
      console.log(data);
    }
  });
});
