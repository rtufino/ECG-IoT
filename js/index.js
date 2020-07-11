Highcharts.chart('grafica-ecg', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Live Data ECG'
    },
    data: {
        csvURL: 'http://localhost/ecg/get-data.php',
        enablePolling: true,
        dataRefreshRate: 1
    }
});