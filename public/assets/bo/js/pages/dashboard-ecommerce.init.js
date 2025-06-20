function getChartColorsArray(e) {
  if (null !== document.getElementById(e)) {
    var t = document.getElementById(e).getAttribute("data-colors");
    if (t)
      return (t = JSON.parse(t)).map(function (e) {
        var t = e.replace(" ", "");
        return -1 === t.indexOf(",")
          ? getComputedStyle(document.documentElement).getPropertyValue(t) || t
          : 2 == (e = e.split(",")).length
          ? "rgba(" + getComputedStyle(document.documentElement).getPropertyValue(e[0]) + "," + e[1] + ")"
          : t;
      });
    console.warn("data-colors atributes not found on", e);
  }
}
var options,
  chart,
  linechartcustomerColors = getChartColorsArray("customer_impression_charts"),
  chartDonutBasicColors =
    (linechartcustomerColors &&
      ((options = {
        series: [
          { name: "Orders", type: "area", data: [34, 65, 46, 68, 49, 61, 42, 44, 78, 52, 63, 67] },
          { name: "Earnings", type: "bar", data: [89.25, 98.58, 68.74, 108.87, 77.54, 84.03, 51.24, 28.57, 92.57, 42.36, 88.51, 36.57] },
          { name: "Refunds", type: "line", data: [8, 12, 7, 17, 21, 11, 5, 9, 7, 29, 12, 35] },
        ],
        chart: { height: 370, type: "line", toolbar: { show: !1 } },
        stroke: { curve: "straight", dashArray: [0, 0, 8], width: [2, 0, 2.2] },
        fill: { opacity: [0.1, 0.9, 1] },
        markers: { size: [0, 0, 0], strokeWidth: 2, hover: { size: 4 } },
        xaxis: { categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], axisTicks: { show: !1 }, axisBorder: { show: !1 } },
        grid: { show: !0, xaxis: { lines: { show: !0 } }, yaxis: { lines: { show: !1 } }, padding: { top: 0, right: -2, bottom: 15, left: 10 } },
        legend: { show: !0, horizontalAlign: "center", offsetX: 0, offsetY: -5, markers: { width: 9, height: 9, radius: 6 }, itemMargin: { horizontal: 10, vertical: 0 } },
        plotOptions: { bar: { columnWidth: "30%", barHeight: "70%" } },
        colors: linechartcustomerColors,
        tooltip: {
          shared: !0,
          y: [
            {
              formatter: function (e) {
                return void 0 !== e ? e.toFixed(0) : e;
              },
            },
            {
              formatter: function (e) {
                return void 0 !== e ? "$" + e.toFixed(2) + "k" : e;
              },
            },
            {
              formatter: function (e) {
                return void 0 !== e ? e.toFixed(0) + " Sales" : e;
              },
            },
          ],
        },
      }),
      (chart = new ApexCharts(document.querySelector("#customer_impression_charts"), options)).render()),
    getChartColorsArray("store-visits-source")),
  worldemapmarkers =
    (chartDonutBasicColors &&
      ((options = {
        series: [44, 55, 41, 17, 15],
        labels: ["Direct", "Social", "Email", "Other", "Referrals"],
        chart: { height: 333, type: "donut" },
        legend: { position: "bottom" },
        stroke: { show: !1 },
        dataLabels: { dropShadow: { enabled: !1 } },
        colors: chartDonutBasicColors,
      }),
      (chart = new ApexCharts(document.querySelector("#store-visits-source"), options)).render()),
    "");
function loadCharts() {
  var e = getChartColorsArray("sales-by-locations");
  e &&
    ((document.getElementById("sales-by-locations").innerHTML = ""),
    (worldemapmarkers = ""),
    (worldemapmarkers = new jsVectorMap({
      map: "world_merc",
      selector: "#sales-by-locations",
      zoomOnScroll: !1,
      zoomButtons: !1,
      selectedMarkers: [0, 5],
      regionStyle: { initial: { stroke: "#9599ad", strokeWidth: 0.25, fill: e[0], fillOpacity: 1 } },
      markersSelectable: !0,
      markers: [
        { name: "Palestine", coords: [31.9474, 35.2272] },
        { name: "Russia", coords: [61.524, 105.3188] },
        { name: "Canada", coords: [56.1304, -106.3468] },
        { name: "Greenland", coords: [71.7069, -42.6043] },
      ],
      markerStyle: { initial: { fill: e[1] }, selected: { fill: e[2] } },
      labels: {
        markers: {
          render: function (e) {
            return e.name;
          },
        },
      },
    })));
}
(window.onresize = function () {
  setTimeout(() => {
    loadCharts();
  }, 0);
}),
  loadCharts();
var overlay,
  swiper = new Swiper(".vertical-swiper", { slidesPerView: 2, spaceBetween: 10, mousewheel: !0, loop: !0, direction: "vertical", autoplay: { delay: 2500, disableOnInteraction: !1 } }),
  layoutRightSideBtn = document.querySelector(".layout-rightside-btn");
layoutRightSideBtn &&
  (Array.from(document.querySelectorAll(".layout-rightside-btn")).forEach(function (e) {
    var t = document.querySelector(".layout-rightside-col");
    e.addEventListener("click", function () {
      t.classList.contains("d-block") ? (t.classList.remove("d-block"), t.classList.add("d-none")) : (t.classList.remove("d-none"), t.classList.add("d-block"));
    });
  }),
  window.addEventListener("resize", function () {
    var e = document.querySelector(".layout-rightside-col");
    e &&
      Array.from(document.querySelectorAll(".layout-rightside-btn")).forEach(function () {
        window.outerWidth < 1699 || 3440 < window.outerWidth ? e.classList.remove("d-block") : 1699 < window.outerWidth && e.classList.add("d-block");
      }),
      "semibox" == document.documentElement.getAttribute("data-layout") && (e.classList.remove("d-block"), e.classList.add("d-none"));
  }),
  (overlay = document.querySelector(".overlay"))) &&
  document.querySelector(".overlay").addEventListener("click", function () {
    1 == document.querySelector(".layout-rightside-col").classList.contains("d-block") && document.querySelector(".layout-rightside-col").classList.remove("d-block");
  }),
  window.addEventListener("load", function () {
    var e = document.querySelector(".layout-rightside-col");
    e &&
      Array.from(document.querySelectorAll(".layout-rightside-btn")).forEach(function () {
        window.outerWidth < 1699 || 3440 < window.outerWidth ? e.classList.remove("d-block") : 1699 < window.outerWidth && e.classList.add("d-block");
      }),
      "semibox" == document.documentElement.getAttribute("data-layout") && 1699 < window.outerWidth && (e.classList.remove("d-block"), e.classList.add("d-none"));
  });
