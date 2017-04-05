<?php include_once('header.php') ?>
	<div id="incluir" class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">
			<form action="controller/Produtos.php" method="POST">
				<input type="hidden" name="metodo" value='1'>
				<div class="form-group">
			    <label for="descricao">Descrição</label>
			    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
			  </div>
			  <div class="form-group">
			    <label for="valor_unitario">Valor Unitário</label>
			    <input type="number" step="0.01" class="form-control" id="valor_unitario" name="valor_unitario" placeholder="Valor Unitario">
			  </div>
			  <button type="submit" class="btn btn-default">Salvar</button>
			</form>
		</div>
		<div class="col-lg-2"></div>
	</div>
<?php include_once('footer.php') ?>