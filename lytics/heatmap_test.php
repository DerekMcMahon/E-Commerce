

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Lytics - Analytics for All</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/heatmap.css">
    <style>
    </style>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/heatmap.js"></script>
    <script>
      window.onload = function() {
        // create a heatmap instance
        var heatmap = h337.create({
          container: document.getElementById('heatmap-container'),
          maxOpacity: .6,
          radius: 50,
          blur: .90,
          // backgroundColor with alpha so you can see through it
          backgroundColor: 'rgba(0, 0, 58, 0.30)'
        });
        var heatmapContainer = document.getElementById('heatmap-container-wrapper');

        heatmapContainer.onmousemove = heatmapContainer.ontouchmove = function(e) {
          // we need preventDefault for the touchmove
          e.preventDefault();
          var x = e.layerX;
          var y = e.layerY;
          if (e.touches) {
            x = e.touches[0].pageX;
            y = e.touches[0].pageY;
          }
          
          heatmap.addData({ x: x, y: y, value: 1 });

        };

        heatmapContainer.onclick = function(e) {
          var x = e.layerX;
          var y = e.layerY;
          heatmap.addData({ x: x, y: y, value: 20 });
        };

      };
    </script>
  </head>
  <body>

  	<?php include("header.html") ?>

    <div id="heatmap-container-wrapper">
  		<div id="heatmap-container">

  	  	<section class="main-content">
  	  	</section>
  	  	
  		</div>
    </div>

    <?php include("footer.html") ?>
  </body>
</html>