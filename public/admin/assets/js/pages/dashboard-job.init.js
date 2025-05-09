function getChartColorsArray(e) {
  if (null !== document.getElementById(e)) {
    var t = document.getElementById(e).getAttribute("data-colors");
    if (t)
      return (t = JSON.parse(t)).map(function (e) {
        var t = e.replace(" ", "");
        if (-1 === t.indexOf(",")) {
          var o = getComputedStyle(document.documentElement).getPropertyValue(
            t
          );
          return o || t;
        }
        var r = e.split(",");
        return 2 != r.length
          ? t
          : "rgba(" +
              getComputedStyle(document.documentElement).getPropertyValue(
                r[0]
              ) +
              "," +
              r[1] +
              ")";
      });
    console.warn("data-colors Attribute not found on:", e);
  }
}

chart = new ApexCharts(document.querySelector("#eathereum_sparkline_charts"), {
  series: [{ name: "Total Countries", data: country_graph_data }],
  chart: {
    width: 130,
    height: 46,
    type: "area",
    sparkline: { enabled: !0 },
    toolbar: { show: !1 },
  },
  dataLabels: { enabled: !1 },
  stroke: { curve: "smooth", width: 1.5 },
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      inverseColors: !1,
      opacityFrom: 0.45,
      opacityTo: 0.05,
      stops: [50, 100, 100, 100],
    },
  },
  tooltip: {
    fixed: { enabled: !1 },
    x: { show: !1 },
    y: {
      title: {
        formatter: function (e) {
          return "";
        },
      },
    },
    marker: { show: !1 },
  },
  colors: getChartColorsArray("eathereum_sparkline_charts"),
}).render();

chart = new ApexCharts(document.querySelector("#unicharts"), {
  series: [{ name: "Total Universities", data: university_graph_data }],
  chart: {
    width: 130,
    height: 46,
    type: "area",
    sparkline: { enabled: !0 },
    toolbar: { show: !1 },
  },
  dataLabels: { enabled: !1 },
  stroke: { curve: "smooth", width: 1.5 },
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      inverseColors: !1,
      opacityFrom: 0.45,
      opacityTo: 0.05,
      stops: [50, 100, 100, 100],
    },
  },
  tooltip: {
    fixed: { enabled: !1 },
    x: { show: !1 },
    y: {
      title: {
        formatter: function (e) {
          return "";
        },
      },
    },
    marker: { show: !1 },
  },
  colors: getChartColorsArray("unicharts"),
}).render();

chart = new ApexCharts(document.querySelector("#total_course_charts"), {
  series: [{ name: "Total Courses", data: course_graph_data }],
  chart: {
    width: 130,
    height: 46,
    type: "area",
    sparkline: { enabled: !0 },
    toolbar: { show: !1 },
  },
  dataLabels: { enabled: !1 },
  stroke: { curve: "smooth", width: 1.5 },
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      inverseColors: !1,
      opacityFrom: 0.45,
      opacityTo: 0.05,
      stops: [50, 100, 100, 100],
    },
  },
  tooltip: {
    fixed: { enabled: !1 },
    x: { show: !1 },
    y: {
      title: {
        formatter: function (e) {
          return "";
        },
      },
    },
    marker: { show: !1 },
  },
  colors: getChartColorsArray("total_course_charts"),
}).render();

chart = new ApexCharts(document.querySelector("#service_request_charts"), {
  series: [{ name: "Total Service Request", data: service_request_graph_data }],
  chart: {
    width: 130,
    height: 46,
    type: "area",
    sparkline: { enabled: !0 },
    toolbar: { show: !1 },
  },
  dataLabels: { enabled: !1 },
  stroke: { curve: "smooth", width: 1.5 },
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      inverseColors: !1,
      opacityFrom: 0.45,
      opacityTo: 0.05,
      stops: [50, 100, 100, 100],
    },
  },
  tooltip: {
    fixed: { enabled: !1 },
    x: { show: !1 },
    y: {
      title: {
        formatter: function (e) {
          return "";
        },
      },
    },
    marker: { show: !1 },
  },
  colors: getChartColorsArray("service_request_charts"),
}).render();

//app user graph
chart = new ApexCharts(document.querySelector("#app_user_charts"), {
  series: [{ name: "Total App Users", data: app_user_graph }],
  chart: {
    width: 130,
    height: 46,
    type: "area",
    sparkline: { enabled: !0 },
    toolbar: { show: !1 },
  },
  dataLabels: { enabled: !1 },
  stroke: { curve: "smooth", width: 1.5 },
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      inverseColors: !1,
      opacityFrom: 0.45,
      opacityTo: 0.05,
      stops: [50, 100, 100, 100],
    },
  },
  tooltip: {
    fixed: { enabled: !1 },
    x: { show: !1 },
    y: {
      title: {
        formatter: function (e) {
          return "";
        },
      },
    },
    marker: { show: !1 },
  },
  colors: getChartColorsArray("app_user_charts"),
}).render();

// course application charts
chart = new ApexCharts(document.querySelector("#course_applications"), {
  series: [{ name: "Total Course Applications", data: course_application }],
  chart: {
    width: 130,
    height: 46,
    type: "area",
    sparkline: { enabled: !0 },
    toolbar: { show: !1 },
  },
  dataLabels: { enabled: !1 },
  stroke: { curve: "smooth", width: 1.5 },
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      inverseColors: !1,
      opacityFrom: 0.45,
      opacityTo: 0.05,
      stops: [50, 100, 100, 100],
    },
  },
  tooltip: {
    fixed: { enabled: !1 },
    x: { show: !1 },
    y: {
      title: {
        formatter: function (e) {
          return "";
        },
      },
    },
    marker: { show: !1 },
  },
  colors: getChartColorsArray("course_applications"),
}).render();

chart = new ApexCharts(document.querySelector("#users_charts"), {
  series: [{ name: "Total Rejected", data: users_charts }],
  chart: {
    width: 130,
    height: 46,
    type: "area",
    sparkline: { enabled: !0 },
    toolbar: { show: !1 },
  },
  dataLabels: { enabled: !1 },
  stroke: { curve: "smooth", width: 1.5 },
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      inverseColors: !1,
      opacityFrom: 0.45,
      opacityTo: 0.05,
      stops: [50, 100, 100, 100],
    },
  },
  tooltip: {
    fixed: { enabled: !1 },
    x: { show: !1 },
    y: {
      title: {
        formatter: function (e) {
          return "";
        },
      },
    },
    marker: { show: !1 },
  },
  colors: getChartColorsArray("users_charts"),
}).render();

chart = new ApexCharts(document.querySelector("#refer_charts"), {
  series: [{ name: "Total Rejected", data: referGraph }],
  chart: {
    width: 130,
    height: 46,
    type: "area",
    sparkline: { enabled: !0 },
    toolbar: { show: !1 },
  },
  dataLabels: { enabled: !1 },
  stroke: { curve: "smooth", width: 1.5 },
  fill: {
    type: "gradient",
    gradient: {
      shadeIntensity: 1,
      inverseColors: !1,
      opacityFrom: 0.45,
      opacityTo: 0.05,
      stops: [50, 100, 100, 100],
    },
  },
  tooltip: {
    fixed: { enabled: !1 },
    x: { show: !1 },
    y: {
      title: {
        formatter: function (e) {
          return "";
        },
      },
    },
    marker: { show: !1 },
  },
  colors: getChartColorsArray("refer_charts"),
}).render();



//bar charts
var statisticsApplicationColors = getChartColorsArray("chart");
statisticsApplicationColors &&
  ((options = {
    series: [
      {
        name: "Companay",
        type: "column",
        data: [30, 48, 28, 74, 39, 87, 54, 36, 50, 87, 84],
      },
      {
        name: "New Jobs",
        type: "column",
        data: [20, 50, 42, 10, 24, 28, 60, 35, 47, 64, 78],
      },
      {
        name: "Total Jobs",
        type: "area",
        data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43],
      },
      {
        name: "Job View",
        type: "line",
        data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39],
      },
    ],
    chart: { height: 350, type: "line", stacked: !1, toolbar: { show: !1 } },
    legend: { show: !0, offsetY: 10 },
    stroke: { width: [0, 0, 2, 2], curve: "smooth" },
    plotOptions: { bar: { columnWidth: "30%" } },
    fill: {
      opacity: [1, 1, 0.1, 1],
      gradient: {
        inverseColors: !1,
        shade: "light",
        type: "vertical",
        opacityFrom: 0.85,
        opacityTo: 0.55,
        stops: [0, 100, 100, 100],
      },
    },
    labels: [
      "01/01/2022",
      "02/01/2022",
      "03/01/2022",
      "04/01/2022",
      "05/01/2022",
      "06/01/2022",
      "07/01/2022",
      "08/01/2022",
      "09/01/2022",
      "10/01/2022",
      "11/01/2022",
    ],
    colors: statisticsApplicationColors,
    markers: { size: 0 },
    xaxis: { type: "datetime" },
    tooltip: {
      shared: !0,
      intersect: !1,
      y: {
        formatter: function (e) {
          return void 0 !== e ? e.toFixed(0) + " points" : e;
        },
      },
    },
  }),
  (chart = new ApexCharts(document.querySelector("#chart"), options)).render());
var options,
  chart,
  ApplicationReveicedTimeColors = getChartColorsArray(
    "application-received-time"
  );
ApplicationReveicedTimeColors &&
  ((options = {
    series: [
      {
        name: "Received Application",
        data: [34, 44, 54, 21, 12, 43, 33, 80, 66],
      },
    ],
    chart: { type: "line", height: 378, toolbar: { show: !1 } },
    stroke: { width: 3, curve: "smooth" },
    labels: [
      "8 PM",
      "9 PM",
      "10 PM",
      "11 PM",
      "12 PM",
      "1 AM",
      "2 AM",
      "3 AM",
      "4 AM",
    ],
    dataLabels: { enabled: !1 },
    colors: ApplicationReveicedTimeColors,
    markers: { hover: { sizeOffset: 4 } },
  }),
  (chart = new ApexCharts(
    document.querySelector("#application-received-time"),
    options
  )).render());
