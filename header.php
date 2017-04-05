<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- BootsTrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- JQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- BootsTrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<!-- Funcoes proprias -->
		<script src="js/funcoes.js"></script>
		
		<title>Adicionar produtos</title>
	</head>
	<body>
		<nav class="navbar navbar-fixed-top navbar-inverse">
			<div class="container">
				<!-- essa classe é usada como aldenador para o conteudo colapsavel -->
				<div class="navbar-header">
			          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			          </button>
				    <a class="navbar-brand" href="index.php">Inicio</a>
				</div>
				<!--Tudo que for escondido a menos de 940px-->
				<div class="navbar-collapse collapse navbar-inverse-collapse">
		          <ul class="nav navbar-nav">
		            <li><a id="listar" href="listar.php">Listar</a></li>
		          </ul>
				</div>
			</div>
		</nav>
		<div style="display:none;">
			<form id="formListar">
				<input type="hidden" name="metodo" value='2'>
			</form>
		</div>
		<div class="container" style="padding-top: 75px;">
			<div class="row">
				<div class="col-lg-12">
					<div id="alertas"></div>
				</div>
			</div>
