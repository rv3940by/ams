<script type="text/javascript">
                        google.charts.load("current", {packages:["corechart"]});
			            google.charts.setOnLoadCallback(publisherPieChart);

			            <?php
			               $query1 = "SELECT zipcode, count(*) as number
			                         FROM alumni
			                         GROUP BY zipcode";
			               $result1 = mysqli_query($db, $query1);
			               ?>

			              function publisherPieChart() {
			                var publisherData = google.visualization.arrayToDataTable([
			                  ['Publisher', 'Number'],
			                    <?php
			               while ($row = mysqli_fetch_array($result1)) {
			                 echo "['".$row["zipcode"]."', ".$row["number"]."],";
			               }//end while
			               ?>
			                ]);

			                var publisherOptions = {
			                  title: 'Number of Zip-Code per Alumni',
			                  is3D: true,
			                };

			                var publisherChart = new google.visualization.PieChart(document.getElementById('publisher_piechart_3d'));
			                publisherChart.draw(publisherData, publisherOptions);
			              }//end publisherChart

			              //********************* Author Chart *******************************************
				            google.charts.load("current", {packages:["corechart"]});
				            google.charts.setOnLoadCallback(authorPieChart);

				            <?php
				               $query2 = "SELECT email, count(*) as number
				                         FROM alumni
				                         GROUP BY email";
				               $result2 = mysqli_query($db, $query2);
				                ?>

				            function authorPieChart() {
				            var authorData = google.visualization.arrayToDataTable([
				              ['Author', 'Number'],
				                <?php
				               while ($row2 = mysqli_fetch_array($result2)) {
				                 echo "['".$row2["email"]."', ".$row2["number"]."],";
				               }

				               ?>
				            ]);

				            var authorOptions = {
				              title: 'Number of email per Alumni',
				              is3D: true,
				            };

				            var authorChart = new google.visualization.PieChart(document.getElementById('author_piechart_3d'));
				            authorChart.draw(authorData, authorOptions);
				            }//end AuthorChart

				            //*************************** Price Chart **************************************
				              google.charts.load("current", {packages:['corechart']});
				              google.charts.setOnLoadCallback(drawChart);

				                <?php
				               $query3 = "SELECT count(address1) AS count, first_name
				                          FROM alumni
				                          GROUP BY first_name";
				               $result3 = mysqli_query($db,$query3);
				               ?>

				               function drawChart() {
				                  var priceData = google.visualization.arrayToDataTable([
				                  ['Price', 'Count'],
				                  <?php
				               while($row3 = mysqli_fetch_array($result3)){
				               echo "['".$row3['first_name']."',".$row3['count']."],";
				               }
				               ?>

				                  ]);
				                  var priceOptions = {
				                  title: 'Number of Adress by Alumni'
				                  };
				                  var priceChart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
				                  priceChart.draw(priceData, priceOptions);
				               }


</script>
