$(document).ready(function(){
	$('.btn').on('click',function(){
		var start = $('.start').val();
		var end   = $('.end').val();
		$.ajax({
			url:"/count/order",
			data:"start="+start+"&end="+end,
			type:"post",
			dataType:"json",
			success:function(msg){
				alert(msg)
			}
		})
	})
})
$(function (msg) {
$('#lineChart').highcharts({
  title: {
    text: '订单数量统计',
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
      text: '总订单数量（单）'
    },
    plotLines: [{
      value: 0,
      width: 1,
      color: '#808080'
    }]
  },
  tooltip: {
    valueSuffix: '（单）'
  },
  legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle',
    backgroundColor:'#CCCCCC',
    borderWidth: 2
  },
  series: [{
    name: '总订单量',
    data: [55,53,52,55,54,51,54,55,52,50,56,52]
  }]
});
});