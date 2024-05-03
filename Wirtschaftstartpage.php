<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" href="style_wiki.css" type="text/css">
		<link rel="stylesheet" href="style_footer.css" type="text/css">
		<link rel="stylesheet" href="style_head.css" type="text/css">
		<link rel="shortcut icon" href="Bilder/BrowserIcon.png" type="x-icon">
		<meta="viewport" content="width=device-width">
		<title>Schule wird Staat | Unternehmen</title>
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
					<h4>Unternehmen Übersicht</h4>
					<input id="search-input" class="searchbar" type="text" placeholder="Unternehmen durchsuchen">
				</div>
				
				<table class="article">
					<tr  class="desc">
						<th  class="artikel" data-colname="name" data-order="desc"><th>
					</tr>
					<tbody id="myTable">
						
					</tbody>
				</table>

				<?php include "functions/a_n_business.php"; ?>

				<script>
				var myArray = [
					{'name':'<a class="tabart" href="redirections/busi_u_1.php"><?php a_n_business(1); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_2.php"><?php a_n_business(2); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_3.php"><?php a_n_business(3); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_4.php"><?php a_n_business(4); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_5.php"><?php a_n_business(5); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_6.php"><?php a_n_business(6); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_7.php"><?php a_n_business(7); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_8.php"><?php a_n_business(8); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_9.php"><?php a_n_business(9); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_10.php"><?php a_n_business(10); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_11.php"><?php a_n_business(11); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_12.php"><?php a_n_business(12); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_13.php"><?php a_n_business(13); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_14.php"><?php a_n_business(14); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_15.php"><?php a_n_business(15); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_16.php"><?php a_n_business(16); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_17.php"><?php a_n_business(17); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_18.php"><?php a_n_business(18); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_19.php"><?php a_n_business(19); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_29.php"><?php a_n_business(20); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_21.php"><?php a_n_business(21); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_22.php"><?php a_n_business(22); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_23.php"><?php a_n_business(23); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_24.php"><?php a_n_business(24); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_25.php"><?php a_n_business(25); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_26.php"><?php a_n_business(26); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_27.php"><?php a_n_business(27); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_28.php"><?php a_n_business(28); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_29.php"><?php a_n_business(29); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_30.php"><?php a_n_business(30); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_31.php"><?php a_n_business(31); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_32.php"><?php a_n_business(32); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_33.php"><?php a_n_business(33); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_34.php"><?php a_n_business(34); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_35.php"><?php a_n_business(35); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_36.php"><?php a_n_business(36); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_37.php"><?php a_n_business(37); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_38.php"><?php a_n_business(38); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_39.php"><?php a_n_business(39); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_40.php"><?php a_n_business(40); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_41.php"><?php a_n_business(41); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_42.php"><?php a_n_business(42); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_43.php"><?php a_n_business(43); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_44.php"><?php a_n_business(44); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_45.php"><?php a_n_business(45); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_46.php"><?php a_n_business(46); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_47.php"><?php a_n_business(47); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_48.php"><?php a_n_business(48); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_49.php"><?php a_n_business(49); echo $_SESSION["n_b"]; ?></a>'},
					{'name':'<a class="tabart" href="redirections/busi_u_50.php"><?php a_n_business(50); echo $_SESSION["n_b"]; ?></a>'}
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
 