
    var ctx = document.getElementById("signupChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: day,
            datasets: [{
                label: 'Signups',
                data: counts,
                borderColor: "white",
                borderWidth: 6,
                hoverBorderWidth: 0,
                backgroundColor: '#047bf8'
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