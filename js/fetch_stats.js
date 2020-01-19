
var xhttp = new XMLHttpRequest();
xhttp.open("POST", "http://192.168.1.100/SourceCode/php/fetch_stats.php", true);
xhttp.onreadystatechange = function(){
  if(this.readyState == 4 && this.status == 200){
    var data = JSON.parse(this.responseText);
    // console.log(data["0"]["year"]); // 2019

    // data = [{"year":2019,"count":{"frontdev":1,"backdev":1,"appdev":0,"mentor":0,"mnp":0,"design":0,"content":0,"event":0}},
    //{"year":2020,"count":{"frontdev":0,"backdev":1,"appdev":0,"mentor":0,"mnp":0,"design":0,"content":0,"event":0}}]

    var year_labels = [];
    var i;

    var front_data = [], back_data = [], app_data = [], mentor_data = [], mnp_data = [];
    var design_data = [], content_data = [], event_data = [];

    for(i = 0; i<data.length; i++){

      var year1 = data[i.toString()]["year"]; // 2019 when i = 0
      var year2 = year1+1; // 2020 when i = 0
      year_labels.push(year1 + " - " + year2); // 2019 - 2020 when i = 0

      var count_arr = data[i.toString()]["count"];
      // for i = 0 // 2019
      // count_arr = {frontdev: 1, backdev: 1, appdev: 0, mentor: 0, mnp: 0, design: 0, content: 0, event: 0}
      front_data.push(count_arr["frontdev"]);
      back_data.push(count_arr["backdev"]); // [1] ; i = 0
      app_data.push(count_arr["appdev"]); // [0] ; i = 0
      mentor_data.push(count_arr["mentor"]);
      mnp_data.push(count_arr["mnp"]);
      design_data.push(count_arr["design"]);
      content_data.push(count_arr["content"]);
      event_data.push(count_arr["event"]);
    }

    // [1, 0] number of developers
    // console.log(front_data); // [1, 0, ...] count of frontdevs for n years 2019, 2020, ...
    // console.log(back_data); // [1, 1, ...] count of back for n years 2019, 2020, ...
    // .
    // .
    // .

    // console.log(year_labels); // ["2019 - 2020", "2020 - 2021", ...]

    // below is the code for chart

    $(function () {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */

      //--------------
      //- AREA CHART -
      //--------------

      // Get context with jQuery - using jQuery's .get() method.
      var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

      var areaChartData = {
        // it will be dynamic
        labels  : year_labels,
        datasets: [
          {
            label               : 'Front End Developers',
            backgroundColor     : '#800000',
            borderColor         : 'white',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : front_data // it will be dynamic
          },
          {
            label               : 'Back End Developers',
            backgroundColor     : '#283747',
            borderColor         : 'white',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : back_data
          },
          {
            label               : 'Mobile App Developers',
            backgroundColor     : '#DC7633',
            borderColor         : 'white',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : app_data
          },
          {
            label               : 'Mentors',
            backgroundColor     : '#F1C40F ',
            borderColor         : 'white',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : mentor_data
          },
          {
            label               : 'Media and Promotions',
            backgroundColor     : '#117A65',
            borderColor         : 'white',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : mnp_data
          },
          {
            label               : 'Designers',
            backgroundColor     : '#2471A3',
            borderColor         : 'white',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : design_data
          },
          {
            label               : 'Content Writers',
            backgroundColor     : '#A569BD',
            borderColor         : 'white',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : content_data
          },
          {
            label               : 'Event Managers',
            backgroundColor     : 'black',
            borderColor         : 'white',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : event_data
          },
        ]
      }

      var areaChartOptions = {
        maintainAspectRatio : false,
        responsive : true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines : {
              display : false,
            }
          }],
          yAxes: [{
            gridLines : {
              display : false,
            }
          }]
        }
      }

      // This will get the first returned node in the jQuery collection.
      var areaChart       = new Chart(areaChartCanvas, {
        type: 'line',
        data: areaChartData,
        options: areaChartOptions
      })

      //-------------
      //- LINE CHART -
      //--------------
      var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
      var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
      var lineChartData = jQuery.extend(true, {}, areaChartData)
      lineChartData.datasets[0].fill = false;
      lineChartData.datasets[1].fill = false;
      lineChartOptions.datasetFill = false

      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: lineChartData,
        options: lineChartOptions
      })

      //-------------
      //- DONUT CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
      var donutData        = {
        labels: [
            'Chrome',
            'IE',
            'FireFox',
            'Safari',
            'Opera',
            'Navigator',
        ],
        datasets: [
          {
            data: [700,500,400,600,300,100],
            backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          }
        ]
      }
      var donutOptions     = {
        maintainAspectRatio : false,
        responsive : true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      var donutChart = new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      })

      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData        = donutData;
      var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
      })

      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChartData = jQuery.extend(true, {}, areaChartData)
      var temp0 = areaChartData.datasets[0]
      var temp1 = areaChartData.datasets[1]
      barChartData.datasets[0] = temp1
      barChartData.datasets[1] = temp0

      var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
      }

      var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })

      //---------------------
      //- STACKED BAR CHART -
      //---------------------
      var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
      var stackedBarChartData = jQuery.extend(true, {}, barChartData)

      var stackedBarChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        scales: {
          xAxes: [{
            stacked: true,
          }],
          yAxes: [{
            stacked: true
          }]
        }
      }

      var stackedBarChart = new Chart(stackedBarChartCanvas, {
        type: 'bar',
        data: stackedBarChartData,
        options: stackedBarChartOptions
      })
    }) // $(function (){
  } // if(this.readyState == 4 && this.status == 200)
}; // xhttp.onreadystatechange = function()
xhttp.send();
