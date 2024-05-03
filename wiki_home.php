<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" href="style_wiki.css" type="text/css">
		<link rel="stylesheet" href="style_footer.css" type="text/css">
		<link rel="stylesheet" href="style_head.css" type="text/css">
		<link rel="shortcut icon" href="Bilder/BrowserIcon.png" type="x-icon">
		<meta="viewport" content="width=device-width">
		<title>Schule wird Staat | Wiki</title>
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
					<h4>Wiki-Startseite</h4>
					<input id="search-input" class="searchbar" type="text" placeholder="Wiki durchsuchen">
				</div>
				
				<table class="article">
					<tr  class="desc">
						<th  class="artikel" data-colname="name" data-order="desc"><th>
					</tr>
					<tbody id="myTable">
						
					</tbody>
				</table>

				<script>
				var myArray = [
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_1.php">Einführung und Ziele</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_2.php">Angestellte:r</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_3.php">Arbeitsamt</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_4.php">Betriebsleiter:in</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_5.php">Busfahrer:in</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_6.php">Dokuteam</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_7.php">Finanzamt</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_8.php">Forscher:in</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_9.php">Geistliche:r</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_10.php">Historiker:in</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_11.php">Journalist:in</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_12.php">Künstler:in</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_13.php">Musiker:in</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_14.php">Parteiaktivist:in</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_15.php">Pilot:in</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_16.php">Polizei</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_17.php">Reisebüro</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_18.php">Rentner:in</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_19.php">Richter:in</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_20.php">Schauspieler:in</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_21.php">Sportunternehmer:in</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_22.php">Staatsanwaltschaft</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_23.php">Standesamt</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_24.php">Unternehmer:in</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_25.php">Verbrecher:in</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_26.php">Versorgungsarbeiter:in</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_27.php">Verteidiger:in</a>'},
					{'name':'<a class="tabart" href="Wiki_Unterseiten/Unterseite_28.php">Zentralbank</a>'},
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
			<?php include 'includes/footliner.php'; ?>
		</div>
	</body> 
</html>
 