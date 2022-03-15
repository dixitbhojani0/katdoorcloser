var proInqGraph = function() {
	var data=[];		
    return {
		initAmChartProIng: function(graph_data_result) {		  	
            if (typeof(AmCharts) === 'undefined' || $('#dashboard_proInq').size() === 0) {
                return;
            }
			var data=graph_data_result;
		
            var chart = AmCharts.makeChart("dashboard_proInq", {
                "type": "serial",
				"maximum":10000000,
				"fontSize":12,
                "addClassNames": true,
                "theme": "light",
                "path": "../assets/global/plugins/amcharts/ammap/images/",
                "autoMargins": true,
                "marginLeft": 30,
                "marginRight": 8,
                "marginTop": 10,
                "marginBottom": 26,
                "balloon": {
                    "adjustBorderColor": false,
                    "horizontalPadding": 10,
                    "verticalPadding": 8,
                    "color": "#ffffff"
                },

                "dataProvider": data,
                "valueAxes": [{
                    "axisAlpha": 0,
                    "position": "left"
                }],
                "startDuration": 1,
                "graphs": [{
                    "alphaField": "alpha",
                    "balloonText": "<span style='font-size:12px;'>[[title]] on [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
                    "fillAlphas": 1,
                    "title": "Total Product Inquiry",
                    "type": "column",
                    "valueField": "revenue",
                    "dashLengthField": "dashLengthColumn"
                }, {
                    "id": "graph2",
                    "balloonText": "<span style='font-size:12px;'>[[title]] on [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
                    "bullet": "round",
                    "lineThickness": 3,
                    "bulletSize": 7,
                    "bulletBorderAlpha": 1,
                    "bulletColor": "#FFFFFF",
                    "useLineColorForBulletBorder": true,
                    "bulletBorderThickness": 3,
                    "fillAlphas": 0,
                    "lineAlpha": 1,
                    "title": "No.of Product Inquiry",
                    "valueField": "Product"
                }],
                "categoryField": "date",
                "categoryAxis": {
                    "gridPosition": "end",
                    "axisAlpha": 0,
                    "tickLength": 0
                },
                "export": {
                    "enabled": true
                }
            });
        },
        proinqData:function(){
        //alert();
	       var month=$("#month_product").val();
	       var year=$("#year_product").val();
	       var obj=this;
	       $.ajax({
                url:"graph_contact_us_ajax_function.php",
	           data:{
				  mode:"product_inquiry",
				  month:month,
				  year:year,
			    },
			    success:function(result){ 
				    result=$.parseJSON(result);				
				    if(result.ack==1)
				    {  
					  var graph_data_result=[];
					  var graph_data=result.result;
					  $.each(graph_data,function(index,value){
						  graph_data_result.push(value);
					  });					 
				    }
				    else
				    {
					  graph_data_result=[];
					  /* toastr.error("No Orders found!!"); */
				    }
				    obj.initAmChartProIng(graph_data_result); 
			    }
		    })
	    },
       proinq_init: function() {
            this.proinqData();
        }		
    };
}();
jQuery(document).ready(function() {
    proInqGraph.proinq_init(); // init metronic core componets
});