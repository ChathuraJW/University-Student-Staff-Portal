let gpaDistribution = document.getElementById('gpaDistribution').getContext('2d');
new Chart(gpaDistribution, {
    type: 'line',
    data: {
        labels: ['0.0','0.2','0.4','0.6','0.8','1.0','1.2','1.4','1.6','1.8','2.0','2.2','2.4','2.6','2.8','3.0','3.2','3.4','3.6','3.8','4.0'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3,12, 19, 3, 5, 2, 3,12, 19, 3, 5, 2, 3,12, 19, 3, 5, 2, 3,12, 19, 3, 5],
            backgroundColor: [
                'rgb(9,130,217)'
            ],
            borderColor: [
                'rgba(59,122,255,0.9)'
            ],
            borderWidth: 1
        },{
            data: [ {
                x: '3.6',
                y: 12,
                r: 10
            } ],
            label: ['Your Position'],
            steppedLine: true,
            backgroundColor: "#cd2026",
            type: 'bubble'
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        legend: {
            display: false,
        }
    }
});

let individualGPADistribution = document.getElementById('individualGPADistribution').getContext('2d');
new Chart(individualGPADistribution, {
    type: 'line',
    data: {
        labels: ['1Y1S', '1Y2S', '2Y1S', '2Y2S', '3Y1S', '3Y2S', '4Y1S', '4Y2S'],
        datasets: [{
            label: '# of Votes',
            data: [4, 3.5, 3.8, 3.4, 2.5, 3.4, 3.0, 4],
            backgroundColor: [
                'rgba(99,138,255,0.66)'
            ],
            borderColor: [
                'rgb(155,179,239)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        legend: {
            display: false,
        }
    }
});

let gradeContribution = document.getElementById('gradeContribution').getContext('2d');
new Chart(gradeContribution, {
    type: 'bar',
    data: {
        labels: ['A+', 'A', 'A-', 'B+', 'B', 'B-', 'C+', 'C','C-','D+','D','D-','E'],
        datasets: [{
            label: '1Y1S',
            data: [1,2,3,1,0, 0, 0, 0,0,0,0,0,0],
            backgroundColor: 'rgba(15,65,229,0.84)'
            ,
            borderWidth: 1
        },{
            label: '1Y2S',
            data: [0,3,0,0,2, 1, 0, 0,0,0,0,0,0],
            backgroundColor: 'rgba(229,15,15,0.96)'
            ,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            xAxes: [{
                stacked: true,
                barPercentage: 0.8,
            }],
            yAxes: [{
                stacked: true,
            }]
        }
    }
});
