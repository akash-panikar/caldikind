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
            onclick: function(d, i) { ("onclick", d, i); },
            onmouseover: function(d, i) {("onmouseover", d, i); },
            onmouseout: function(d, i) { ("onmouseout", d, i); }
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
    
    // ====================='#eceff1', ========================================= 
    // Our Income
    // =========================================================================   
    var graph_income=$('#graphIncome').text();
   graph_income=JSON.parse(graph_income);
   var income_one=graph_income[0];
   var income_two=graph_income[1];
   var income_three=graph_income[2];
   
    var graph_exp=$('#grapExpense').text();
   graph_exp=JSON.parse(graph_exp);
   var exp_1=graph_exp[0];
   var exp_2=graph_exp[1];
   var exp_3=graph_exp[2];
   
   var profit_array=[];
   var total_profit_cnt=graph_income.length+1
   for(var p=0; p<graph_income.length; p++){
       if(p==0){
           profit_array[p]='Profit';
       }else{
           profit_array[p] = graph_income[p] - graph_exp[p];
           
           if(profit_array[p] < 0){
               profit_array[p]=0;
           }
       }
       
//   var profit_2 = income_two - exp_2;
//   var profit_3 = income_three - exp_3;
   }
   
   //var profit = graph_income - graph_exp;
//   var profit_1 = income_one - exp_1;
//   var profit_2 = income_two - exp_2;
//   var profit_3 = income_three - exp_3;
   
    
    var chart = c3.generate({
        bindto: '#income',
        data: {
            columns: [
                //['Income', income_one, income_two, income_three, 900],
                graph_income,
                graph_exp,
                profit_array
                //['Expense', exp_1, exp_2, 140, 200],
                //['Profit', profit_1, profit_2, profit_3, 20]
            ],
            type: 'bar'
        },
        bar: {
            space: 0.2,
            // or
            width: 30 // this makes bar width 100px
        },
        axis: {
            y: {
                tick: {
                    count: 5,

                    outer: false
                }
            }
        },
        legend: {
            hide: false
            //or hide: 'data1'
            //or hide: ['data1', 'data2']
        },
        labels: {
            x: {
                xkey: 'month',
            }
        },
        grid: {
            x: {
                show: true
            },
            y: {
                show: false
            }
        },
        size: {
            height: 339
        },
        color: {
            pattern: ['#24d2b5', '#20aee3', '#6772e5']
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
                month: 'January',
                Income: 50,
                Expense: 80,
                Profit: 20
            }, {
                month: 'February',
                Income: 130,
                Expense: 100,
                Profit: 80
            }, {
                month: 'March',
                Sales: 80,
                Expense: 60,
                Profit: 70
            }, {
                month: 'April',
                Income: 70,
                Expense: 200,
                Profit: 140
            }, {
                month: 'May',
                Income: 180,
                Expense: 150,
                Profit: 140
            }, {
                month: 'June',
                Income: 105,
                Expense: 250,
                Profit: 80
            },
            {
                month: 'July',
                Income: 250,
                Expense: 150,
                Profit: 200
            }
        ],
        xkey: 'month',
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

});