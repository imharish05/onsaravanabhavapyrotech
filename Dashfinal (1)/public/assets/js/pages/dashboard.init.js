function getChartColorsArray(r) {
    var el = document.querySelector(r);
    if (!el) return [];
    var colors = el.getAttribute("data-colors");
    if (!colors) return [];

    return JSON.parse(colors).map(function (c) {
        c = c.replace(" ", "");
        if (c.indexOf("--") === -1) return c;
        c = getComputedStyle(document.documentElement).getPropertyValue(c);
        return c || undefined;
    });
}

// mini-chart1
if (document.querySelector("#mini-chart1")) {
    var barchartColors = getChartColorsArray("#mini-chart1"),
        options = { series: [60, 40], chart: { type: "donut", height: 110 }, colors: barchartColors, legend: { show: !1 }, dataLabels: { enabled: !1 } },
        chart1 = new ApexCharts(document.querySelector("#mini-chart1"), options);
    chart1.render();
    if (typeof ChartColorChange === "function") ChartColorChange(chart1, "#mini-chart1");
}

// mini-chart2
if (document.querySelector("#mini-chart2")) {
    var barchartColors2 = getChartColorsArray("#mini-chart2"),
        options2 = { series: [30, 55], chart: { type: "donut", height: 110 }, colors: barchartColors2, legend: { show: !1 }, dataLabels: { enabled: !1 } },
        chart2 = new ApexCharts(document.querySelector("#mini-chart2"), options2);
    chart2.render();
    if (typeof ChartColorChange === "function") ChartColorChange(chart2, "#mini-chart2");
}

// mini-chart3
if (document.querySelector("#mini-chart3")) {
    var barchartColors3 = getChartColorsArray("#mini-chart3"),
        options3 = { series: [65, 45], chart: { type: "donut", height: 110 }, colors: barchartColors3, legend: { show: !1 }, dataLabels: { enabled: !1 } },
        chart3 = new ApexCharts(document.querySelector("#mini-chart3"), options3);
    chart3.render();
    if (typeof ChartColorChange === "function") ChartColorChange(chart3, "#mini-chart3");
}

// mini-chart4
if (document.querySelector("#mini-chart4")) {
    var barchartColors4 = getChartColorsArray("#mini-chart4"),
        options4 = { series: [30, 70], chart: { type: "donut", height: 110 }, colors: barchartColors4, legend: { show: !1 }, dataLabels: { enabled: !1 } },
        chart4 = new ApexCharts(document.querySelector("#mini-chart4"), options4);
    chart4.render();
    if (typeof ChartColorChange === "function") ChartColorChange(chart4, "#mini-chart4");
}

// market-overview
if (document.querySelector("#market-overview")) {
    var barchartColorsMarket = getChartColorsArray("#market-overview"),
        optionsMarket = {
            series: [{ name: "Profit", data: [12.45, 16.2, 8.9, 11.42, 12.6, 18.1, 18.2, 14.16, 11.1, 8.09, 16.34, 12.88] }, { name: "Loss", data: [-11.45, -15.42, -7.9, -12.42, -12.6, -18.1, -18.2, -14.16, -11.1, -7.09, -15.34, -11.88] }],
            chart: { type: "bar", height: 400, stacked: !0, toolbar: { show: !1 } },
            plotOptions: { bar: { columnWidth: "20%" } },
            colors: barchartColorsMarket,
            fill: { opacity: 1 },
            dataLabels: { enabled: !1 },
            legend: { show: !1 },
            yaxis: { labels: { formatter: function (r) { return r.toFixed(0) + "%" } } },
            xaxis: { categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], labels: { rotate: -90 } }
        },
        chartMarket = new ApexCharts(document.querySelector("#market-overview"), optionsMarket);
    chartMarket.render();
    if (typeof ChartColorChange === "function") ChartColorChange(chartMarket, "#market-overview");
}

// sales-by-locations
if (document.querySelector("#sales-by-locations")) {
    var vectormapColors = getChartColorsArray("#sales-by-locations");
    $("#sales-by-locations").vectorMap({
        map: "world_mill_en",
        normalizeFunction: "polynomial",
        hoverOpacity: .7,
        hoverColor: !1,
        regionStyle: { initial: { fill: "#e9e9ef" } },
        markerStyle: { initial: { r: 9, fill: vectormapColors, "fill-opacity": .9, stroke: "#fff", "stroke-width": 7, "stroke-opacity": .4 }, hover: { stroke: "#fff", "fill-opacity": 1, "stroke-width": 1.5 } },
        backgroundColor: "transparent",
        markers: [{ latLng: [41.9, 12.45], name: "USA" }, { latLng: [12.05, -61.75], name: "Russia" }, { latLng: [1.3, 103.8], name: "Australia" }]
    });
}