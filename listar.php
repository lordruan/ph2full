<?php 
	session_start();
	include_once('header.php');

?>
	<!-- DataTables CSS -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"></link>
	<!-- JQuery -->
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<div id="listar" class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">
			<table id="lista_produtos"class="table table-stripped">
				<thead>
					<tr>
						<th>Descrição</th>
						<th>Valor Unitario</th>
						<th>Opções</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
					 
		</div>
		<div class="col-lg-2"></div>
	</div>
	<script>
		var tabela_produtos = $('#lista_produtos').DataTable( {
		        "ajax": 'controller/Produtos.php',
		        "columns": [
		            { "data": "descricao" },
		            { "data": "valor_unitario" },
		            { "data": "opcoes" },
		        ]
		    });
		var fn_excluir = function (id) {
			var data = {
				'id' : id,
				'metodo': 3
			};
			$.ajax({
				url: "controller/Produtos.php",
				type: 'POST',
		        data: data,
		        success: function(response){
		           fn_add_alerta(response['message'], response['type']);
		           tabela_produtos.ajax.reload();
		        }});
		};
	</script>
<?php include_once('footer.php') ?>