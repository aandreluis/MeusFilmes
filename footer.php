	<!-- Rodapé -->
	<div class="rodape-bg mt-5">
		<footer class="d-flex flex-wrap justify-content-center align-items-center py-4">
			<div class="col-12 col-md-4 d-flex align-items-center">
				<a href="index2.php" class="mb-2 me-2 ms-2 mt-2 mb-md-0 text-muted text-decoration-none lh-1">
					<img class="d-inline-block align-text-center me-2" width="40" src="img/logo-footer.png" alt="logo">
				</a>
				<span class="text-muted me-2">&copy; 2021 MeusFilmes, Desenvolvido por <a class="link-secondary" href="https://github.com/aandreluis/" target="_blanck">André Luis</a></span>
			</div>
			<ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
				<a class="me-2 mb-md-0 text-muted text-decoration-none lh-1" href="https://github.com/aandreluis/meusfilmes" target="_blanck"><i class="bi bi-github"></i></a>
				<a class="me-2 mb-md-0 text-muted text-decoration-none lh-1" href="https://www.instagram.com/andreluisstn/" target="_blanck"><i class="bi bi-instagram"></i></a>
				<a class="me-2 mb-md-0 text-muted text-decoration-none lh-1" href="mailto:andreluisstn@gmail.com" target="_blanck"><i class="bi bi-envelope-fill"></i></a>
			</ul>
		</footer>
	</div>
	<!-- Rodapé -->

	<!-- SCRIPT PARA FECHAR OS ALERT AUTOMATICAMENTE USANDO JQUERY -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
		
			window.setTimeout(function() {
				$(".alert").fadeTo(1000, 0).slideUp(1000, function(){
					$(this).remove(); 
				});
			}, 4000);
			
		});
	</script>
	<!-- SCRIPT PARA FECHAR OS ALERT AUTOMATICAMENTE USANDO JQUERY -->
	
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	</body>
</html>