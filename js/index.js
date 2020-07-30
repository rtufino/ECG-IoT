Highcharts.chart('grafica-ecg', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Sistema de Monitoreo constante de una señal ECG'
    },
    yAxis: {
        title: {
            text: "Amplitud (mV)"
        },
        labels: "no"
    },
    xAxis: {
        title: {
            text: "Tiempo (ms)"
        }
    },
    data: {
        csvURL: 'http://localhost/ecg/get-data.php',
        enablePolling: true,
        dataRefreshRate: 1
    }
});
