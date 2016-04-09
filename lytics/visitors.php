<?php 
	session_start();
	if (!isset($_SESSION['first_name'])) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_SESSION['first_name'] ?>'s dashboard</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="css/visitor.css">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/Chart.js"></script>
    <script type="text/javascript">
    	window.onload = function() {
    		// Get context with jQuery - using jQuery's .get() method.
			var ctx = $("#chart").get(0).getContext("2d");
			// This will get the first returned node in the jQuery collection.
			var myNewChart = new Chart(ctx);

			var data = {
			    labels: ["May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec", "Jan", "Feb", "Mar", "Apr"],
			    datasets: [
			        {
			            label: "New Visitors (1K)",
			            fillColor: "rgba(220,220,220,0.2)",
			            strokeColor: "rgba(220,220,220,1)",
			            pointColor: "rgba(220,220,220,1)",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "rgba(220,220,220,1)",
			            data: [10, 15, 22, 47, 73, 56, 88, 160, 199, 250, 260, 327]
			        },
			        {
			            label: "Total Visitors (1K)",
			            fillColor: "rgba(151,187,205,0.2)",
			            strokeColor: "rgba(151,187,205,1)",
			            pointColor: "rgba(151,187,205,1)",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "rgba(151,187,205,1)",
			            data: [10, 25, 47, 167, 223, 311, 471, 670, 920, 1180, 1507, 1643]
			        }
			    ]
			};

    		var options = {

			    ///Boolean - Whether grid lines are shown across the chart
			    scaleShowGridLines : true,

			    //String - Colour of the grid lines
			    scaleGridLineColor : "rgba(0,0,0,.05)",

			    //Number - Width of the grid lines
			    scaleGridLineWidth : 1,

			    //Boolean - Whether to show horizontal lines (except X axis)
			    scaleShowHorizontalLines: true,

			    //Boolean - Whether to show vertical lines (except Y axis)
			    scaleShowVerticalLines: true,

			    //Boolean - Whether the line is curved between points
			    bezierCurve : true,

			    //Number - Tension of the bezier curve between points
			    bezierCurveTension : 0.4,

			    //Boolean - Whether to show a dot for each point
			    pointDot : true,

			    //Number - Radius of each point dot in pixels
			    pointDotRadius : 4,

			    //Number - Pixel width of point dot stroke
			    pointDotStrokeWidth : 1,

			    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
			    pointHitDetectionRadius : 20,

			    //Boolean - Whether to show a stroke for datasets
			    datasetStroke : true,

			    //Number - Pixel width of dataset stroke
			    datasetStrokeWidth : 2,

			    //Boolean - Whether to fill the dataset with a colour
			    datasetFill : true,

			    //String - A legend template
			    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

			};

			var myLineChart = new Chart(ctx).Line(data, options);

			// Set label data
			var total_visitors = data.datasets[1].data[11];
			var new_visitors = data.datasets[0].data[11];
			$("#total-visitor-count").text(total_visitors + " k");
			$("#new-visitor-count").text(new_visitors + " k");
    	};
    </script>

</head>

<body>
	<?php include("header.html") ?>

	<section class="dashboard">
		<div class="wrapper">
		<table>
			<tr class="dashboard-row">
				<td id="services">
					<div class="services-container">
						<h3 id="title">Services</h3>
						<ul id="links">
							<a href="heat_map.php"><li>Heat Map</li></a>
							<a href="conversion_rate.php"><li>Conversion Rate</li></a>
							<a href="visitors.php"><li class="selected">Metrics</li></a>
						</ul>
					</div>
				</td>
				<td id="content">
					<section class="split-content-container">
						<div class="split-content-row">
							<div class="split-content-cell">
								Total Visitors
							</div>
							<div class="split-content-cell">
								New Visitors
							</div>
						</div>
						<div class="split-content-row">
							<div id="total-visitor-count" class="split-content-cell">
							</div>
							<div id="new-visitor-count" class="split-content-cell">
							</div>
						</div>
					</section>
					<canvas id="chart" width="800px" height="500px"></canvas>
				</td>
			</tr>
		</table>

		</div>
	</section>

	<?php include("footer.html") ?>
</body>
</html>