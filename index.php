<html>
	<head>
		<title>Minecraft Lookup</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>
			$(document).ready(function() {
				$(".submitter").submit(function(e){
					e.preventDefault();
					$('#submit').prop( "disabled", true );
					$('.usr').prop( "disabled", true );
					$("#results").html('<span style="float:left;">Loading... <i class="fa fa-circle-notch fa-spin"></i></span><br>');
					$.ajax({
						type: 'post',
						url: 'search.php',
						data: $('.submitter').serialize(),
						success: function(data) {
						$("#results").html(data);
						$('#submit').prop( "disabled", false );
						$('.usr').prop( "disabled", false );
						}
					});

				});
			});
		</script>
		<style>
			table td tr {
				border-style:solid;
			}
			html {
				font-family: Arial;
			}
		</style>
	</head>
	<body>
		<center>
			<div style="width:30vw; vertical-align: center;">
				<h1>Minecraft Username Lookup</h1>
				<form class="submitter">
					<p>Username: <input type="text" name="username" /><input type="submit" id="submit" value="Search" style="margin-left:5px" /></p>
				</form>
			</div>
			<div style="text-align: center; width:100%;">
				<div id="results" style="display:inline-block; text-align: left; margin-bottom:35px">
				</div>
			</div>
		</center>


		<footer style=" 

  
  position: fixed;
  bottom: 0;
  width: 100%;
  left: 0px; right: 10px
  height: 1.5rem;  
  background-color:black;
  color:white;


  "><span style="margin-left:15px;">Saad M 2022 </span><a style='color:blue' href="https://github.com/saadmh902/">GitHub</a></footer>
	</body>
</html>