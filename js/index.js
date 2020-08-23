Highcharts.chart('grafica-ecg', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Sistema de Monitoreo Constante de una Señal ECG'
    },
    yAxis: {
        title: {
            text: "Señal (mV)"
        }
    },
    xAxis: {
        title: {
            text: "Tiempo"
        }
    },
    data: {
        csvURL: 'http://18.188.129.30/ecg/get-data.php',
        enablePolling: true,
        dataRefreshRate: 1
    }
});
