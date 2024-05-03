<!DOCTYPE html>

<?php 
	session_start();
?>

<html>
	<head>
		<link rel="stylesheet" href="style_wiki.css" type="text/css">
		<link rel="stylesheet" href="style_parteien_unterseiten.css" type="text/css">
		<link rel="stylesheet" href="style_footer.css" type="text/css">
		<link rel="stylesheet" href="style_head.css" type="text/css">
		<link rel="shortcut icon" href="Bilder/BrowserIcon.png" type="x-icon">
		<meta="viewport" content="width=device-width">
		<title>Schule wird Staat | Lager</title>
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
				<a class="zurück" href="lager_home.php">zurück</a>
				<div>
					<h4>Im Lager</h4>
					<input id="search-input" class="searchbar" type="text" placeholder="Datenbank durchsuchen">
				</div>
				
				<table class="article">
					<tr  class="desc">
						<th  class="artikel" data-colname="name" data-order="desc"><th>
					</tr>
					<tbody id="myTable">
						
					</tbody>
				</table>


				<?php 
					include 'includes/define_con.php';
					echo "<script> var myArray = [";
					$i = 0;
					$sql = $con->prepare("SELECT Name, KN, Kategorie FROM stuff");
					$sql->execute();
					$sql->bind_result($r_name, $r_kn, $r_kat);
					while($sql->fetch()) {
						$i += 1;
						$t_name = "{'name':'<form action=lager_test1.php method=post><input type=hidden name=clickedon value=$i><input type=hidden name=nclickedon value=$r_name><input type=hidden name=kclickedon value=$r_kn><label for=enter$i style=cursor:pointer;><a class=tabart>" . $i . "). " . $r_name . " - " . $r_kat . "</a></label><input type=submit id=enter$i value=submit style=display:none;></form>'},";
						echo $t_name;
					}
					echo "] </script>";
					?>
				
				<script>
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
 