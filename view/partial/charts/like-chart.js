
            var ctx = document.getElementById("likeChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: day,
                    datasets: [{
                        label: 'Likes',
                        data: counts,
                        fill: false,
                        lineTension: 0.4,
                        borderColor: "#FBB463",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "#fff",
                        pointBackgroundColor: "#2a2f37",
                        pointBorderWidth: 2,
                        pointHoverRadius: 6,
                        pointHoverBackgroundColor: "#FC2055",
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 2,
                        pointRadius: 4,
                        pointHitRadius: 5,
                        spanGaps: false
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