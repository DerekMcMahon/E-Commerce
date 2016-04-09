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
	<title>Lytics - Analytics for All</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="css/heat_map.css">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/heatmap.js"></script>
    <script>
		window.onload = function() {
	        // create a heatmap instance
	        var heatmap = h337.create({
	          container: document.getElementById('heatmap-container'),
	          maxOpacity: .6,
	          radius: 20,
	          blur: .90
	        });

    		$.get("get_json_heatmap_data.php", function(data) {
            	data = JSON.parse(data);
            	// console.log(data);
            	heatmap.setData(data);
    		});

    		// Use the following JS to record data
	   //      var heatmapContainer = document.getElementById('heatmap-container-wrapper');

	   //      heatmapContainer.onmousemove = heatmapContainer.ontouchmove = function(e) {
				// // we need preventDefault for the touchmove
				// e.preventDefault();
				// var x = e.layerX;
				// var y = e.layerY;
				// if (e.touches) {
				// 	x = e.touches[0].pageX;
				// 	y = e.touches[0].pageY;
				// }

				// heatmap.addData({ x: x, y: y, value: 1 });
	   //      };

	   //      heatmapContainer.onclick = function(e) {
				// var x = e.layerX;
				// var y = e.layerY;
				// heatmap.addData({ x: x, y: y, value: 20 });

				// console.log(heatmap.getData());
    //     	};
        	
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
							<a href="heat_map.php"><li class="selected">Heat Map</li></a>
							<a href="conversion_rate.php"><li>Conversion Rate</li></a>
							<a href="visitors.php"><li>Visitors</li></a>
						</ul>
					</div>
				</td>
				<td id="content">
				    <div id="heatmap-container-wrapper">
				  		<div id="heatmap-container">

					  	  	<div class="main-content">
					  	  		<img src="img/robinhood_website.jpeg">
					  	  	</div>
				  	  	
				  		</div>
				    </div>
				</td>
			</tr>
		</table>

		</div>
	</section>

	<?php include("footer.html") ?>
</body>
</html>