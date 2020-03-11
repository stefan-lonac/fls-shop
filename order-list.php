<?php include 'header.php'; ?>


<!-- 
	========================================================
	======================================================== 
		START: DROPDOWN container -> BESTELL - LISTE PAGE 
	========================================================
	======================================================== 
-->
<div class="grid-960">




	<!-- START: Title container -->
	<div class="title-container grid-800">
		<h1>BESTELL - LISTE</h1>
	</div><!-- END: Title container -->


		<!-- START: Text container -->
	<div class="textContH pb-40">
		<p>
			Teilen Sie uns bitte mit, wer diesbezüglich der Ansprechpartner ist bzw. wer die Kosten für die Bestellung übernehmen wird. Falls nichts eingetragen wird, gehen wir davon aus, daß die Schule selbst die Kosten übernimmt und auch Angebot an die Schule adressiert wird.		
		</p>
	</div><!-- END: Text container -->


		<!-- START: Table order row -->
		<section>

			<!-- START: class: == fls__table == -->
            <div class="fls__table">
    
              	<table>
    
                    <thead>
                        <tr>
    
                            <th>RAUMNUMMER</th>
                            <th>FARBE</th>
                            <th>LASCHENTYP</th>
                            <th>GEBÄUDE</th> 
                            <th>ANZAHL</th>      
                            <th>&nbsp;</th>
    
                        </tr>
    
                    </thead>
    
                  	<tbody>
	                
	                    <tr>
	    
	                        <td>Adalbert-Stifter-Schule</td>
	                        <td>Brunhildenstr. 2</td>
	                        <td>65189 Wiesbaden</td>
	                        <td>2015</td>
	                        <td>
	                          <div class="table__flex">
	    
	                           <input type="text">
	                           <span class="icon-btn_refresh rotate"></span>
	                            
	                          </div>
	                        
	                        </td>
	                        <td><span class="icon-ic_delete"></span></td>
	                 
	                    </tr>  
                                   
          			</tbody>
    
                </table>
                 
          	</div><!-- END: class: == fls__table == -->
    
        </section><!-- END: Table order row -->


        <!-- START: Input field Section -->
        <section class="fls__modal">

        	<!-- START: class: == fls__input == -->
            <div class="fls__input" >
    			
    			<!-- START: Input form -->
              	<form action="" v-on:submit="validateForm" id="validation" novalidate="true" method="post">

	                <ul>
	                    
	                    <li>
	                        <span for="contact">ANSPRECHPARTNER</span>
	                        <input type="text" id="contact" v-model="contact" placeholder="ANSPRECHPARTNER" v-bind:class="{ 'is-invalid': attemptSubmit && missingContact }">
							<span style="display: none;" class="error__message" id="contact-error" v-bind:class="{ 'is-invalid-none': attemptSubmit && missingContact }"></span>

						</li>
	                    <li>
	                        <span for="number">BITTE RUFEN SIE MICH UNTER FOLGENDER NUMMER AN</span>
							
							<input type="number" id="number" v-model="number" placeholder="NUMMER AN" v-bind:class="{ 'is-invalid': attemptSubmit && missingNumber }">
							<span style="display: none;" class="error__message" id="number-error" v-bind:class="{ 'is-invalid-none': attemptSubmit && missingNumber }"></span>

							<!-- <li v-for="error in errors">
								<span class="error__message">{{ error }}</span>
							</li> -->

							
							
	                    </li>
	                    
	                    <li>
	                        <span for="email">IHRE E-MAIL ADRESSE</span>
	                        <input type="text" id="email" v-model="email" placeholder="IHRE E-MAIL ADRESSE" v-bind:class="{ 'is-invalid': attemptSubmit && missingEmail }">
							
							<span style="display: none;" id="email-error" class="error__message" v-bind:class="{'is-invalid-none': attemptSubmit && missingEmail }"></span>
						</li>
						
                    <!--
						<li><input class="error" type="text" placeholder="error">
	                    	<span class="error__message">E-Mail ist nicht korrekt.</span>
	                    </li>
	                    <li><input class="good" type="text" placeholder="good"></li> 
					-->
	                    
	        
	                </ul>
 
				
 					<!-- START: Radio buttons -->
            		<div class="fls__radio filter__radios__basic">

            			<!-- START: Text container -->
						<div class="textContH pb-20">
							<p>
								Wollen Sie die Beklebung selbst vornehmen?
							</p>
						</div><!-- END: Text container -->

		                

		                    <ul>

		                        <li>
		                            <input type="radio" id="test1" name="radio-group" checked="">
		                            <label for="test1">Ja</label>
		                        </li>

		                        <li>
		                            <input type="radio" id="test2" name="radio-group">
		                            <label for="test2">Nein</label>
		                        </li>


		                    </ul>
		                       
	                    
	               		</div><!-- END: Radio buttons -->



	               	<!-- START: Text field -->
					<ul>
						<li>
							<span>KOMMENTAR</span>
							<textarea name="" rows="5" placeholder="Komentar"></textarea>
						</li>
					</ul>
	               	<!-- END: Text field -->



	               	<!-- START: Button form -->
					<div class="fls__button">
						
						<input id="gdpr-button" type="submit" value="Senden" >
					</div>
					<!-- END: Button form -->
					

              	</form><!-- END: Input form -->

				<style>
					.error-m, .error-m li {
						color: red!important;
					}

					.is-invalid {
						border: solid 1px red!important;
					}

					.is-valid {
						border: solid 1px green!important;
					}

					.is-invalid-none {
						color: red!important;
						display: block!important;
					}
				</style>


            </div><!-- END: class: == fls__input == -->
        
     </section><!-- START: Input field Section -->





</div>
<!--    
	========================================================
	======================================================== 
		END: DROPDOWN container -> BESTELL - LISTE PAGE 
	========================================================
	======================================================== 
-->

<script src="js/vue/form_validation.js"></script>

<script>
var iconRotate = document.querySelector('.rotate');
console.log(iconRotate);

iconRotate.addEventListener('click', rotateIcon);
function rotateIcon(){
     iconRotate.classList.toggle('down');
}
</script>


<?php include 'footer.php'; ?>