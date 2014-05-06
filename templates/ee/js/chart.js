// google charts implementation

google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {

    var data = new google.visualization.DataTable();
    data.addColumn('number', 'X');
    data.addColumn('number', 'Dark');
    data.addColumn('number', 'Light');
    data.addColumn({type:'string', role:'annotation'});
    data.addRows([
        [0,     67,     0,      null],
        [96,    177,    null,   null],
        [226,   null,   136,    'leads up 200%'],
        [350,   161,    null,   null],
        [410,   null,   130,    'social media PRESENCE'],
        [580,   null,   186,    'leads up 200%'],
        [651,   231,    null,   null],
        [809,   null,   168,    'social media PRESENCE'],
        [914,   215,    null,   null],
        [1040,  null,   207,    '900% GROWTH'],
        [1100,  247,    null,   null],
        [1200,  132,    6,      null]
    ]);

    var options = {
        annotations: {
            boxStyle: {
                stroke: '#888',
                strokeWidth: 0,
                rx: 10,
                ry: 10
            }
        },
        colors: ['e2f0fb','#0072bc'],
        areaOpacity: 1.0,
        legend: {position: 'none'},
        hAxis: {
            textPosition: 'none',
            baselineColor: '#fff',
            gridlines: {
                count: 2,
                color: '#fff'
            }
        },
        vAxis: {
            textPosition: 'none',
            baselineColor: '#0072bc',
            gridlines: {
                count: 2,
                color: '#fff'
            }
        },
        chartArea: {
            width: '100%'
        },
        width: window.innerWidth,
        height: 500,
        interpolateNulls: true,
        pointSize: 1
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);

    addPoints();

}

// Adjust chart width on window resize
var chart1 = "done";
$(window).resize(function() {
    if(chart1=="done"){
        chart1 = "waiting";
        setTimeout(function(){removePoints();drawChart();chart1 = "done"},1000);
    }
});

// Adds points and text in place of annotations.
function addPoints(){

    var textTags = document.getElementsByTagName("text");
    var chartWidth = window.innerWidth;
    var chartHeight = 500;

    var pointsArr = [];
    for (var i = 0; i < textTags.length; i++) {
        var match = false;

        var x = textTags[i].getAttribute("x");

        for (var j = 0; j < pointsArr.length; j++) {
            if (x == pointsArr[j].getAttribute("x")) {
                match = true;
            }
        }
        if (match == false) {
            pointsArr.push(textTags[i])
        }
    }

    for (var k = 0; k < pointsArr.length; k++) {

        if (pointsArr[k].hasAttribute("text-anchor") && pointsArr[k].hasAttribute("x") && pointsArr[k].hasAttribute("y")) {

            var top = pointsArr[k].getAttribute("y")/chartHeight*100;
            var left = pointsArr[k].getAttribute("x")/chartWidth*100;
            var offsetX, offsetY;

            var circle1 = document.createElement("div");
            circle1.style.position = "absolute";
            circle1.style.width = "50px";
            circle1.style.height = "50px";
            offsetY = -82.5 / chartHeight * 100;
            offsetX = 25 / chartWidth * 100;
            circle1.style.top = -(100 - top + offsetY) + "%";
            circle1.style.left = left - offsetX + "%";
            circle1.style.background = "rgba(72,162,228,0.5)";
            circle1.style.borderRadius = "50%";
            circle1.style.border = "1px solid rgba(255,255,255,0.5)";

            var circle2 = document.createElement("div");
            circle2.style.position = "absolute";
            circle2.style.width = "15px";
            circle2.style.height = "15px";
            offsetY = -99.25 / chartHeight * 100;
            offsetX = 7 / chartWidth * 100;
            circle2.style.top = -(100 - top + offsetY) + "%";
            circle2.style.left = left - offsetX + "%";
            circle2.style.background = "#fff";
            circle2.style.borderRadius = "50%";

            var txt = document.createElement("p");

            var content;
            if (k == 0 || k == 2) {
                content = "leads up <span>200%</span>";
                txt.className = "blue";
            }
            else if (k == 1 || k == 3) {
                content = "social media <span>presence</span>";
                txt.className = "black";
            }
            else if (k == 4) {
                content = "<strong>900%</strong> <span>growth</span>"
                txt.className = "blue";
            }
            else {
                content = " ";
            }

            txt.innerHTML = content;
            txt.style.position = "absolute";
            offsetY = -5;
            txt.style.top = -(100 - top + offsetY) + "%";
            txt.style.left = left + "%";

            var plots = document.getElementById('plots');
            plots.style.position = "relative";
            plots.style.height = chartHeight + "px";
            plots.style.marginBottom = (-1 * chartHeight) + "px";
            plots.style.width = chartWidth + "px";
            plots.appendChild(circle1);
            plots.appendChild(circle2);
            plots.appendChild(txt);


            // centers txt at any screen width
            offsetX = txt.offsetWidth / 2;
            txt.style.marginLeft = (-1 * offsetX) + "px";

        }
    }

    // Remove the annotations
    var css = "text { display: none; }",
        head = document.head || document. getElementsByTagName("head")[0],
        style = document.createElement("style");

    style.type = "text/css";
    if (style.styleSheet) {
        style.styleSheet.cssText = css;
    }
    else {
        style.appendChild(document.createTextNode(css));
    }

    head.appendChild(style);

}

// Removes the points from addPoints
function removePoints() {
    var plots = document.getElementById('plots')
    while (plots.hasChildNodes()) {
        plots.removeChild(plots.lastChild);
    }
}