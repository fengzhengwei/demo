$(document).ready(function(){
  $('.btn').on('click',function(){
    var start = $('.start').val();
    $.ajax({
      url:"",
      data:""
    })
  })
})
$(function () {
$('#lineChart').highcharts({
  title: {
    text: '销售额统计',
    x: -20 //center
  },
  subtitle: {
    text: '每天',
    x: -20
  },
  xAxis: {
    categories: ['08-07', '08-08', '08-09', '08-10', '08-11', '08-12','08-13', '08-14', '08-15', '08-16', '08-17', '08-18']
  },
  yAxis: {
    title: {
      text: '当天销售总金额（元）'
    },
    plotLines: [{
      value: 0,
      width: 1,
      color: '#808080'
    }]
  },
  tooltip: {
    valueSuffix: '（元）'
  },
  legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle',
    backgroundColor:'#CCCCCC',
    borderWidth: 2
  },
  series: [{
    name: '总金额',
    data: [516,717,565,695,669,587,694,656,585,545,656,856]
  }]
});
});