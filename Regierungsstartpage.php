<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" href="style_wiki.css" type="text/css">
		<link rel="stylesheet" href="style_footer.css" type="text/css">
		<link rel="stylesheet" href="style_head.css" type="text/css">
		<link rel="shortcut icon" href="Bilder/BrowserIcon.png" type="x-icon">
		<meta="viewport" content="width=device-width">
		<title>Schule wird Staat | Regierung</title>
		<meta charset ="utf-8">
		<script src="jquery.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.menubutton').click(function() {
					$('nav').slideToggle('slow');
				});
			});
		</script>
	</head>	
	<body>
		<div id="wrapper">
			<?php include 'includes/headliner.php'; ?>
			<div class="main">
				<div>
					<h4>Parteien Übersicht</h4>
					<input id="search-input" class="searchbar" type="text" placeholder="Parteien durchsuchen">
				</div>
				
				<table class="article">
					<tr  class="desc">
						<th  class="artikel" data-colname="name" data-order="desc"><th>
					</tr>
					<tbody id="myTable">
						
					</tbody>
				</table>

				<?php include "functions/a_n_partei.php"; ?>

				<script>
				var myArray = [
					{'name':'<a class="tabart" href="redirections/part_u_1.php"><?php a_n_partei(1); echo $_SESSION["n_p"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/part_u_2.php"><?php a_n_partei(2); echo $_SESSION["n_p"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/part_u_3.php"><?php a_n_partei(3); echo $_SESSION["n_p"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/part_u_4.php"><?php a_n_partei(4); echo $_SESSION["n_p"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/part_u_5.php"><?php a_n_partei(5); echo $_SESSION["n_p"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/part_u_6.php"><?php a_n_partei(6); echo $_SESSION["n_p"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/part_u_7.php"><?php a_n_partei(7); echo $_SESSION["n_p"]; ?></a>'}
				]
				
				
				$('#search-input').on('keyup', function(){
					var value = $(this).val()
					console.log('Value:', value)
					var data = searchTable(value, myArray)
					buildTable(data)
				})

				buildTable(myArray)
				
				function searchTable(value, data){
					var filteredData = []
					
					for (var i = 0; i < data.length; i++){
						value = value.toLowerCase()
						var name = data[i].name.toLowerCase()
						
						if(name.includes(value)){
							filteredData.push(data[i])
						}
					}
					
					return filteredData
				}
				
				function buildTable(data){
					var table = document.getElementById('myTable')
					table.innerHTML = ''
					for (var i = 0; i < data.length; i++){
						var colname = `name-${i}`
						var colbschr = `bschr-${i}`

						var row = `<tr>
										<td>${data[i].name}</td>
								   </tr>`
						table.innerHTML += row
					}
				}
				</script>
			</div>
			<footer>
				<?php include 'includes/footliner.php'; ?>
			</footer>
		</div>
	</body> 
</html>
 