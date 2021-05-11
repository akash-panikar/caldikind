//alert("Hello Richard");
$(function() {
    
    "use strict";
    // ============================================================== 
    // Our member
    // ============================================================== 
    var graph_data=$('#graphData').text();
    var gdata=JSON.parse(graph_data);
    var a = '0';
    var b = '0';
    var c = '0';
    for(var graph in gdata){
        if(gdata[graph].memberType=='General Membership')
        {
            a=gdata[graph].totalNums;
        }
        if(gdata[graph].memberType=='Personal Training')
        {
            b=gdata[graph].totalNums;
        }
        if(gdata[graph].memberType=='Premium Membership')
        {
            c=gdata[graph].totalNums;
        }
        
    }
    var chart = c3.generate({
        bindto: '#members',
        data: {
            columns: [
                ['General Membership', a],
                ['Personal Training', b],
                ['Premium Membership', c],
            ],

            type: 'pie',
            onclick: function(d, i) { console.log("onclick", d, i); },
            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
            onmouseout: function(d, i) { console.log("onmouseout", d, i); }
        },
        pie: {
            label: {
                show: false
            },
            title: "Visits",
            width: 20,

        },

        legend: {
            hide: true
            //or hide: 'data1'
            //or hide: ['data1', 'data2']
        },
        color: {
            pattern: ['#24d2b5', '#6772e5', '#20aee3']
        }
    });
    // ============================================================== 
    // Our Visitor
    // ============================================================== 

    var chart = c3.generate({
        bindto: '#attendance',
        data: {
            columns: [
                ['Desktop', 4],
                ['Tablet', 6],
                ['Mobile', 90],
            ],

            type: 'donut',
            onclick: function(d, i) { console.log("onclick", d, i); },
            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
            onmouseout: function(d, i) { console.log("onmouseout", d, i); }
        },
        donut: {
            label: {
                show: false
            },
            title: "Visits",
            width: 20,

        },

        legend: {
            hide: true
            //or hide: 'data1'
            //or hide: ['data1', 'data2']
        },
        color: {
            pattern: ['#24d2b5', '#6772e5', '#20aee3']
        }
    });
    // ====================='#eceff1', ========================================= 
    // Our Income
    // ==============================================================
    var chart = c3.generate({
        bindto: '#income',
        data: {
            columns: [
                ['Growth Income', 100, 200, 100, 300],
                ['Net Income', 130, 100, 140, 200]
            ],
            type: 'bar'
        },
        bar: {
            space: 0.2,
            // or
            width: 15 // this makes bar width 100px
        },
        axis: {
            y: {
                tick: {
                    count: 4,

                    outer: false
                }
            }
        },
        legend: {
            hide: true
            //or hide: 'data1'
            //or hide: ['data1', 'data2']
        },
        grid: {
            x: {
                show: false
            },
            y: {
                show: true
            }
        },
        size: {
            height: 339
        },
        color: {
            pattern: ['#24d2b5', '#20aee3']
        }
    });

    // ============================================================== 
    // Sales Different
    // ============================================================== 

    var chart = c3.generate({
        bindto: '#sales',
        data: {
            columns: [
                ['One+', 50],
                ['T', 60],
                ['Samsung', 20],

            ],

            type: 'donut',
            onclick: function(d, i) { console.log("onclick", d, i); },
            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
            onmouseout: function(d, i) { console.log("onmouseout", d, i); }
        },
        donut: {
            label: {
                show: false
            },
            title: "",
            width: 18,

        },
        size: {
            height: 150
        },
        legend: {
            hide: true
            //or hide: 'data1'
            //or hide: ['data1', 'data2']
        },
        color: {
            pattern: ['#eceff1', '#24d2b5', '#6772e5', '#20aee3']
        }
    });
    // ============================================================== 
    // Sales Prediction
    // ============================================================== 

    var chart = c3.generate({
        bindto: '#prediction',
        data: {
            columns: [
                ['data', 91.4]
            ],
            type: 'gauge',
            onclick: function(d, i) { console.log("onclick", d, i); },
            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
            onmouseout: function(d, i) { console.log("onmouseout", d, i); }
        },

        color: {
            pattern: ['#ff9041', '#20aee3', '#24d2b5', '#6772e5'], // the three color levels for the percentage values.
            threshold: {
                //            unit: 'value', // percentage is default
                //            max: 200, // 100 is default
                values: [30, 60, 90, 100]
            }
        },
        gauge: {
            width: 22,
        },
        size: {
            height: 120,
            width: 150
        }
    });
    setTimeout(function() {
        chart.load({
            columns: [
                ['data', 10]
            ]
        });
    }, 1000);

    setTimeout(function() {
        chart.load({
            columns: [
                ['data', 50]
            ]
        });
    }, 2000);

    setTimeout(function() {
        chart.load({
            columns: [
                ['data', 70]
            ]
        });
    }, 3000);

    // ============================================================== 
    // Sales chart
    // ============================================================== 
    Morris.Area({
        element: 'sales-chart',
        data: [{
                period: '01',
                Income: 50,
                Expense: 80,
                Profit: 20
            }, {
                period: '02',
                Income: 130,
                Expense: 100,
                Profit: 80
            }, {
                period: '03',
                Sales: 80,
                Expense: 60,
                Profit: 70
            }, {
                period: '04',
                Income: 70,
                Expense: 200,
                Profit: 140
            }, {
                period: '05',
                Income: 180,
                Expense: 150,
                Profit: 140
            }, {
                period: '06',
                Income: 105,
                Expense: 250,
                Profit: 80
            },
            {
                period: '07',
                Income: 250,
                Expense: 150,
                Profit: 200
            }
        ],
        xkey: 'period',
        ykeys: ['Income', 'Expense', 'Profit'],
        labels: ['Income', 'Expense', 'Profit'],
        pointSize: 0,
        fillOpacity: 0,
        pointStrokeColors: ['#20aee3', '#24d2b5', '#6772e5'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 3,
        hideHover: 'auto',
        lineColors: ['#20aee3', '#24d2b5', '#6772e5'],
        resize: true

    });


});