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
}
},
xAxis: {
title: {
text: "Tiempo (ms)"
}
},
    data: {
        csvURL: 'http://18.188.129.30/ecg/get-data.php',
        enablePolling: true,
        dataRefreshRate: 1
    }
});
