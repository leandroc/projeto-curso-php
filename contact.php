<?php 
session_start();
include 'top.php';
?>

	<div class="main">
		<div class="contact">
			<div class="wrap">

				<!---start-contact---->
				<div class="section group">
					<div class="col span_1_of_3">
						<div class="contact_info">
							<h3>Find Us Here</h3>

							<div class="map">
								<iframe width="100%" height="400" frameborder="0" scrolling="no"
								marginheight="0" marginwidth="0"
								src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe>

								<br />

								<small>
									<a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265"
									style="color: #666; text-align: left; font-size: 0.85em">View Larger Map</a>
								</small>
							</div>
						</div>
					</div>

					<div class="col span_2_of_3">
						<div class="contact-form">
							<h3>Contact Us</h3>

						<?php
							// veriica se 'enviado' existe na sessão
							if( isset( $_SESSION['enviado'] ) ) {
								// se foi enviado
								if( $_SESSION['enviado'] ) { ?>
									<div class="msg success">
										Foi enviado :)
									</div>
							<?php } else { ?>
									<div class="msg alert">
										Não foi enviado :(
									</div>
							<?php }
								// remove 'enviado da sessão'
								unset( $_SESSION['enviado'] );
							}
						?>
						
						
						<?php
							// veriica se 'enviado' existe na sessão
							if( isset( $_SESSION['feedback'] ) ) {
								// se foi enviado
						?>

							<div class="msg alert">
								<?php echo $_SESSION['feedback']; ?>
							</div>

						<?php
								// remove 'enviado da sessão'
								unset( $_SESSION['feedback'] );
							}
						?>
						
						
						
							<form method="post" action="lib/actions/contact.php" enctype="multipart/form-data">
								<div>
									<span><label>NAME</label></span>
									<span><input name="userName" type="text" class="textbox" /></span>
								</div>

								<div class="group">
								    <div class="col span_1_of_2">
										<span><label>E-MAIL</label></span>
										<span><input name="userEmail" type="text" class="textbox" /></span>
									</div>

									<div class="col span_1_of_2">
										<span><label>PHONE</label></span>
										<span><input name="userPhone" type="text" class="textbox" /></span>
									</div>
								</div>
								
								<div>
							    	<span><label>SEXO</label></span>
							    	<span>
							    		<label id="userMasc">
								    		<input id="userMasc" type="radio" name="userSex" value="Masculino" required="required"/>
								    		Masculino
							    		</label>

							    		<label for="userFem">
								    		<input id="userFem" type="radio" name="userSex" value="Feminino"/>
								    		Feminino
							    		</label>
							    	</span>
							    </div>

							    <div class="group">
								    <div class="col span_1_of_2">
										<span><label>ASSUNTO</label></span>
										<span>
											<select name="userSubject" type="text" class="textbox">
												<option value="Sem assunto">Selecione</option>
												<option value="Crítica">Crítica</option>
												<option value="Dúvida">Dúvida</option>
												<option value="Sugeastão">Sugestão</option>
											</select>
										</span>
									</div>

									<div class="col span_2_of_2">
								    	<span><label>MELHOR HORÁRIO ENTRARMOS EM CONTATO:</label></span>
								    	<span>
								    		<label id="userManha">
								    			<input id="userManha" type="checkbox" name="melhorHorario[]" value="Manhã" />
								    			Manhã
								    		</label>
	
								    		<label id="userTarde">
								    			<input id="userTarde" type="checkbox" name="melhorHorario[]" value="Tarde" />
								    			Tarde
								    		</label>
	
								    		<label id="userNoite">
								    			<input id="userNoite" type="checkbox" name="melhorHorario[]" value="Noite" />
								    			Noite
								    		</label> 
								    	</span>
								    </div>
								</div>

								<div>
									<span><label>SUBJECT</label></span>
									<span><textarea name="userMsg"></textarea></span>
								</div>
								
								<div>
									<span><label>AVATAR</label></span>
									<span><input name="userAvatar" type="file" /></span>
								</div>
								
								<div>
									<span><label>CURRICULUM</label></span>
									<span><input name="userCurriculum" type="file" /></span>
								</div>

								<div>
									<span><input type="submit" class="mybutton" value="Submit" /></span>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!---End-contact---->
			</div>

			<div class="clear"></div>
		</div>
	</div>

<?php include 'bottom.php'; ?>