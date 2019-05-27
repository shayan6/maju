
var ctx = document.getElementById("commentChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: day,
        datasets: [{
            label: 'Comments',
            data: counts,
            borderColor: "white",
            borderWidth: 6,
            hoverBorderWidth: 0,
            backgroundColor: '#f05152'
        }]
    },
    options: {
        tooltips: {
            intersect: false,
        },
        legend: {
            display: false
        },
        elements: {
            line: {
                tension: 0
            }
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Count'
                }
            }]
        }
    }
});