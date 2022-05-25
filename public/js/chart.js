var chartCanvas = document.getElementById("myChart");

Chart.defaults.global.defaultFontFamily = "Calibri";
Chart.defaults.global.defaultFontSize = 14;

var data1 = {
    label: "Canon y regalías mineras",
    data: [0,0,0,0,0,0,0,1,2,3,75,364,305,209,184,181,240,245,183,183,183,207,419,361,262,456,812,763,710,574,570,609,591,551,512,554,543,577,511,463,369],
    lineTension: 0,
    fill: false,
    borderColor: '#4472C4'
};

var data2 = {
    label: "Otros recursos para inversión",
    data: [50,20,50,70,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50],
    lineTension: 0,
    fill: false,
    borderColor: '#ED7D31'
};

var data3 = {
    label: "Total",
    data: [50,20,50,70,50,50,50,51,52,53,125,414,355,259,234,231,290,295,233,233,233,257,469,411,312,506,862,813,760,624,620,659,641,601,562,604,593,627,561,513,419],
    lineTension: 0,
    fill: false,
    borderColor: '#A5A5A5'
};

var lineX = {
    labels: ['1996','1997','1998','1999','2000','2001','2002','2003','2004','2005','2006','2007','2008','2009','2010','2011','2012','2013','2014','2015','2016','2017','2018','2019','2020','2021','2022','2023','2024','2025','2026','2027','2028','2029','2030','2031','2032','2033','2034','2035','2036'],
    datasets: [data1, data2, data3]
};

var chartOptions = {
  legend: {
    display: true,
    position: 'top',
    labels: {
      boxWidth: 60,
      fontColor: 'black'
    }
  }
};

var lineChart = new Chart(chartCanvas, {
  type: 'line',
  data: lineX,
  options: chartOptions
});