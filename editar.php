<?php include_once('header.php') ?>
	<div id="incluir" class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">
			<form action="controller/Produtos.php" method="POST">
				<input type="hidden" name="metodo" value='5'>
				<input type="hidden" name="id" id="id" value="">
				<div class="form-group">
			    <label for="descricao">Descrição</label>
			    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" value="">
			  </div>
			  <div class="form-group">
			    <label for="valor_unitario">Valor Unitário</label>
			    <input type="number" step="0.01" class="form-control" id="valor_unitario" name="valor_unitario" placeholder="Valor Unitario" value="">
			  </div>
			  <button type="submit" class="btn btn-default">Salvar</button>
			</form>
		</div>
		<div class="col-lg-2"></div>
	</div>
	<script>
	var data = {
		'id' : fn_get_parameter('id'),
		'metodo': 4
	},
	retorno = null,
	fn_carrega_dados = function  (dados) {
		$('#descricao').val(dados.descricao);
		$('#valor_unitario').val(dados.valor_unitario);
		$('#id').val(dados.id);
		console.log('ok');
	};
	$.ajax({
		url: "controller/Produtos.php",
		type: 'POST',
        data: data,
        success: function(response){
        	retorno = response;
        	fn_carrega_dados(retorno);
        }});
	</script>
<?php include_once('footer.php') ?>