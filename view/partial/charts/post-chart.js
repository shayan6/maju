var ctx = document.getElementById("postChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: day,
        datasets: [{
            label: 'Posts',
            data: counts,
            borderColor: "white",
            borderWidth: 6,
            hoverBorderWidth: 0,
            backgroundColor: '#00c367'
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
