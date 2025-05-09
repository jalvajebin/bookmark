function getChartColorsArray(a) {
  if (null !== document.getElementById(a)) {
    var r = document.getElementById(a).getAttribute("data-colors");
    if (r)
      return (r = JSON.parse(r)).map(function (a) {
        var r = a.replace(" ", "");
        if (-1 === r.indexOf(",")) {
          var t = getComputedStyle(document.documentElement).getPropertyValue(
            r
          );
          return t || r;
        }
        var e = a.split(",");
        return 2 != e.length
          ? r
          : "rgba(" +
              getComputedStyle(document.documentElement).getPropertyValue(
                e[0]
              ) +
              "," +
              e[1] +
              ")";
      });
  }
}

chart = new ApexCharts(document.querySelector("#line-chart"), {
  series: [
    {
      name: "series1",
      data: [31, 40, 36, 51, 49, 72, 69, 56, 68, 82, 68, 76],
    },
  ],
  chart: {
    height: 320,
    type: "line",
    toolbar: "false",
    dropShadow: {
      enabled: !0,
      color: getChartColorsArray("line-chart"),
      top: 18,
      left: 7,
      blur: 8,
      opacity: 0.2,
    },
  },
  dataLabels: { enabled: !1 },
  colors: getChartColorsArray("line-chart"),
  stroke: { curve: "smooth", width: 3 },
}).render();

// Sales Analytics
chart = new ApexCharts(document.querySelector("#donut-chart"), {
  series: course_app_graph_data,
  chart: { type: "donut", height: 262 },
  labels: ["Application Processed", "Offer Letter Initiated", " Interview Conducted","University Confirmation","Visa Processed","Successful Journey"],
  colors: getChartColorsArray("donut-chart"),
  legend: { show: !1 },
  plotOptions: { pie: { donut: { size: "70%" } } },
}).render();

radialchart1 = new ApexCharts(document.querySelector("#radialchart-1"), {
  series: [37],
  chart: {
    type: "radialBar",
    width: 60,
    height: 60,
    sparkline: { enabled: !0 },
  },
  dataLabels: { enabled: !1 },
  colors: getChartColorsArray("radialchart-1"),
  plotOptions: {
    radialBar: {
      hollow: { margin: 0, size: "60%" },
      track: { margin: 0 },
      dataLabels: { show: !1 },
    },
  },
}).render();

radialchart2 = new ApexCharts(document.querySelector("#radialchart-2"), {
  series: [72],
  chart: {
    type: "radialBar",
    width: 60,
    height: 60,
    sparkline: { enabled: !0 },
  },
  dataLabels: { enabled: !1 },
  colors: getChartColorsArray("radialchart-2"),
  plotOptions: {
    radialBar: {
      hollow: { margin: 0, size: "60%" },
      track: { margin: 0 },
      dataLabels: { show: !1 },
    },
  },
}).render();

radialchart3 = new ApexCharts(document.querySelector("#radialchart-3"), {
  series: [54],
  chart: {
    type: "radialBar",
    width: 60,
    height: 60,
    sparkline: { enabled: !0 },
  },
  dataLabels: { enabled: !1 },
  colors: getChartColorsArray("radialchart-3"),
  plotOptions: {
    radialBar: {
      hollow: { margin: 0, size: "60%" },
      track: { margin: 0 },
      dataLabels: { show: !1 },
    },
  },
}).render();
