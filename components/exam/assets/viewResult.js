const regNo = document.cookie.split('userName')[1].split(';')[0].split('=')[1];

//Class Box Color Change
let degreeClass = document.getElementById('degreeClass');
let classNotation = document.getElementById('classNotation');
const overAllGPA = document.getElementById('valueGPA').innerText;
if (overAllGPA >= 3.7) {
    degreeClass.style.backgroundColor = "blue";
    classNotation.innerHTML = "FC";
} else if (overAllGPA >= 3.3) {
    degreeClass.style.backgroundColor = "green";
    classNotation.innerHTML = "SU";
} else if (overAllGPA >= 3.0) {
    degreeClass.style.backgroundColor = "orange";
    classNotation.innerHTML = "SL";
} else if (overAllGPA >= 2.0) {
    degreeClass.style.backgroundColor = "black";
    classNotation.innerHTML = "NM";
} else {
    degreeClass.style.backgroundColor = "red";
    classNotation.innerHTML = "--"
}

//Batch GPA Distribution Graph
let gpaDistribution = document.getElementById('gpaDistribution').getContext('2d');
const gpaDistributionURL = "http://localhost/USSP/components/exam/assets/getExamResultDataAPI.php?activity=GPADistribution&regNo=" + regNo;
console.log(gpaDistributionURL);
let userPosition = Math.round(overAllGPA * 10) / 10;
$.getJSON(gpaDistributionURL, function (studentCounts) {
    new Chart(gpaDistribution, {
        type: 'line',
        data: {
            labels: ['0.0', '0.1', '0.2', '0.3', '0.4', '0.5', '0.6', '0.7', '0.8', '0.9', '1.0', '1.1', '1.2', '1.3', '1.4', '1.5', '1.6', '1.7', '1.8', '1.9', '2.0', '2.1', '2.2', '2.3', '2.4', '2.5', '2.6', '2.7', '2.8', '2.9', '3.0', '3.1', '3.2', '3.3', '3.4', '3.5', '3.6', '3.7', '3.8', '3.9', '4.0'],
            datasets: [{
                data: [{
                    x: userPosition.toFixed(1).toString(),
                    y: studentCounts[userPosition * 10],
                    r: 10
                }],
                label: ['Your Position'],
                steppedLine: true,
                backgroundColor: "#cd2026",
                type: 'bubble',
            }, {
                label: 'Number of Undergraduates',
                data: studentCounts,
                backgroundColor: '#FFF1A6',
                borderColor: '#FFD700',
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
});

//Individual GPA Distribution for Each Semester
let individualGPADistribution = document.getElementById('individualGPADistribution').getContext('2d');
const gpaSemesterURL = "http://localhost/USSP/components/exam/assets/getExamResultDataAPI.php?activity=IndividualGPADistribution&regNo=" + regNo;
$.getJSON(gpaSemesterURL, function (gpaValues) {
    new Chart(individualGPADistribution, {
        type: 'line',
        data: {
            labels: ['1Y1S', '1Y2S', '2Y1S', '2Y2S', '3Y1S', '3Y2S', '4Y1S', '4Y2S'],
            datasets: [{
                label: 'Semester GPA',
                data: gpaValues,
                backgroundColor: 'rgba(99,138,255,0.66)'
                ,
                borderColor: 'rgb(155,179,239)',
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
});

//Grade Contribution for Overall Result
let gradeContribution = document.getElementById('gradeContribution').getContext('2d');
const gradeContributionURL = "http://localhost/USSP/components/exam/assets/getExamResultDataAPI.php?activity=GradeContribution&regNo=" + regNo;
$.getJSON(gradeContributionURL, function (data) {
    // ready dataset
    let colorList = ['rgba(20,63,196)', 'rgb(212,30,30)', 'rgb(6,200,6)', 'rgb(204,4,238)',
        'rgb(176,150,9)', 'rgb(10,163,177)', 'rgb(59,58,3)', 'rgb(15,229,111)'];
    let dataSet = Array();
    let i = 1;
    data.forEach(function (gradeCount) {
        let labelValue = Math.round(i / 2) + 'Y' + ((Math.round(i % 2) === 0) ? 2 : 1) + 'S';
        let dataElement = {
            label: labelValue,
            data: gradeCount,
            backgroundColor: colorList[i - 1],
            borderWidth: 1
        };
        dataSet.push(dataElement);
        i++;
    })
    // create chart object
    new Chart(gradeContribution, {
        type: 'bar',
        data: {
            labels: ['A+', 'A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D+', 'D', 'E', 'F'],
            datasets: dataSet
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
            },
            legend: {
                position: 'bottom',
            }
        }
    });
});

