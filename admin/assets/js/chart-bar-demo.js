      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = '#292b2c';
        
      // Bar Chart Example
      barchart();
      function barchart(month,total){
          var ctx = document.getElementById("myBarChart");
          var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: month,
              datasets: [{
                label: "Sell",
                backgroundColor: "#1A30DC",
                borderColor: "rgba(2,117,216,1)",
                data: total,
              }],
            },
            options: {
              scales: {
                xAxes: [{
                  time: {
                    unit: 'month'
                  },
                  gridLines: {
                    display: false
                  },
                  ticks: {
                    maxTicksLimit: 12
                  }
                }],
                yAxes: [{
                  ticks: {
                    min: 1000,
                    // max: 1000000,
                    maxTicksLimit: 40
                  },
                  gridLines: {
                    display: true
                  }
                }],
              },
              legend: {
                display: false
              }
            }
          });
      }

      $(document).ready(function(){
        $.ajax({
            url:"http://localhost/e-shop/admin/fetch_per_month_sell.php",
            type:"GET",
            dataType:"JSON",
            success:function(data){
                //console.log(data.length);
                
                var month = [];
                var total = [];
                var i;
                for(i = 0; i<data.length; i++){
                  month.push(data[i].month);
                  total.push(data[i].total);
                }
                //console.log(month);
                barchart(month,total);
                // $.each(data,function(key,val){
                //     //console.log(val.month);
                //     var month = new Array();
                //     month.push(val.month);
                //     //barchart(month);
                //     console.log(month);
                // });
            }
        });
      });