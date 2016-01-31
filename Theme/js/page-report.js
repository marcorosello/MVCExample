(function ($) {
    $('.js-calendar').datepicker();

    google.charts.load('current', {packages: ['corechart', 'line']});
    google.charts.setOnLoadCallback(drawLineChart);

    function drawLineChart() {

        $.getJSON("?action=chartdata", function (chartdata) {
            var data = google.visualization.arrayToDataTable(chartdata);
            var options = {
                hAxis: {title: 'Time'},
                vAxis: {title: 'Popularity'},
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('LineChart'));

            chart.draw(data, options);
        });
    }
}(jQuery));