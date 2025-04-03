var options = {
  series: [
    {
      name: "series1",
      data: [31, 40, 28, 51, 42, 109, 100],
    },
  ],

  chart: {
    foreColor: "#fff",
    height: 350,
    type: "area",
    toolbar: {
      show: false,
    },
    xaxis: {
      foreColor: "#848485",
    },
  },
  responsive: [{
    breakpoint: 460,
    options: {
      chart: {
        height: 200,
      },
    },
  }],
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: "smooth",
    colors: ["#205DEE"],
  },
  grid: {
    show: false,
  },

  xaxis: {
    type: "Months",
    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sap", "Oct", "Nov", "Dec"],
  },
  tooltip: {
    x: {
      format: "dd/MM/yy HH:mm",
    },
  },
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();
