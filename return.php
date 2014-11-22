<?php
session_start();
include 'lib/conn.php';
include 'top.php';
?>

	<div class="main">
		<div class="services">
			<div class="wrap">
				<div class="error-page">
					<?php
						// verifica se 'enviado' existe na sessão
						if( isset( $_SESSION['enviado'] ) ) {
							// se foi enviado
							if( $_SESSION['enviado'] ) { ?>
								<div class="msg success" style="margin: 0 auto; width: 60%;">
									Foi enviado :)
								</div>
						<?php } else { ?>
								<div class="msg alert" style="margin: 0 auto; width: 60%;">
									Não foi enviado :(
								</div>
						<?php }
							// remove 'enviado da sessão'
							unset( $_SESSION['enviado'] );
						}

						$s = 'SELECT * FROM contato WHERE idContato = ' . $_GET["id"];
						$result = mysql_query( $s );
						//var_dump( $result );
						$r = mysql_fetch_assoc( $result );
						
						/*
						foreach( $r as $c=>$v){
							
						}
						*/
					?>

					<!--
					<p>Page Not Found!</p>
					<h3>404</h3>
					-->
				</div>
			</div>
		</div>
	</div>

<?php include 'bottom.php'; ?>