<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- BootsTrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
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
				    <a class="navbar-brand" href="#">Inicio</a>
				</div>
				<!--Tudo que for escondido a menos de 940px-->
				<div class="navbar-collapse collapse navbar-inverse-collapse">
		          <ul class="nav navbar-nav">
		            <li><a href="#listar">Listar</a></li>
		          </ul>
				</div>
			</div>
		</nav>
		<div class="container" style="padding-top: 50px;">
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-10">
					<div id="alertas"></div>
					<form action="controller/Produtos.php?incluir">
						<div class="form-group">
					    <label for="descricao">Descrição</label>
					    <input type="text" class="form-control" id="descricao" placeholder="Descrição">
					  </div>
					  <div class="form-group">
					    <label for="valor_unitario">Valor Unitário</label>
					    <input type="float" class="form-control" id="valor_unitario" placeholder="Valor Unitario">
					  </div>
					  <button type="submit" class="btn btn-default">Salvar</button>
					</form>
				</div>
				<div class="col-lg-2"></div>
			</div>
		</div>
		<!-- JQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- BootsTrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<script>
			var fn_get_parameter = function (name) {
			    url = window.location.href;
			    name = name.replace(/[\[\]]/g, "\\$&");
			    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
			        results = regex.exec(url);
			    if (!results) return null;
			    if (!results[2]) return '';
			    return decodeURIComponent(results[2].replace(/\+/g, " "));
			},
			fn_add_alerta = function (message, type) {
				    $('#alertas').append(
				        '<div class="alert alert-'+type+'">' +
				            '<button type="button" class="close" data-dismiss="alert">' +
				            '&times;</button>' + message + '</div>');
				};
			<?php if (isset($_GET['flash'])) : ?>
				var flash = fn_get_parameter('flash'); 
				var type = fn_get_parameter('type'); 
				fn_add_alerta(flash,type);
			<?php endif; ?>
		</script>
	</body>
</html>