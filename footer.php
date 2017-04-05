		</div>
		<script>
			<?php if (isset($_GET['flash'])) : ?>
				var flash = fn_get_parameter('flash'); 
				var type = fn_get_parameter('type'); 
				fn_add_alerta(flash,type);
			<?php endif; ?>
		</script>
	</body>
</html>