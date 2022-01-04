<?php include 'header.php'; ?>



<!-- 
	========================================================
	======================================================== 
				START: DROPDOWN container -> BESTELLEN PAGE 
	========================================================
	======================================================== 
-->
<div class="grid-960" id="SelectList">


	<!-- START: Title container -->
	<div class="title-container grid-800">
		<h1>BESTELLEN</h1>
	</div><!-- END: Title container -->
	


	<!-- START: Text container -->
	<div class="textContH pb-40">
		<p>
			Nach der Eingabe, wird Ihnen ein Link geschickt, der Sie zum Shop der jeweiligen OBJEKTE führt. Dort können Sie die gewünschten Türmarker nachbestellen.
		</p>

		<p class="pt-20">
			Sie können auch eine PDF herunterladen und die benötigten Elemente per Fax bestellen.
		</p>
	</div><!-- END: Text container -->




	<!-- START: class: ==== bg-grey === -->
	<div class="bg-grey" id="enableB">
	
		<!-- START: Dropdown 1 Section container -->
		<section>
	       	<div class="custom-select">
	       		<div class="selectTitle pb-20">
	       			<h2>STADT WÄHLEN</h2>
	       		</div>
	            <select v-model='country' @change='getSchool()'>
					<option value='0'>Stadt auswählen…</option>
					<option v-for='cou in countries' :value='cou.Id'>{{ cou.PLZ_city }}</option>
				</select>	
				
			</div>
		
	 	</section><!-- END: Dropdown 1 Section container -->



		<!-- START: Dropdown 2 Section container -->
		<section>		
	       	<div class="custom-select">
	       		<div class="selectTitle mb-20">
	       			<h2>OBJEKTE WÄHLEN</h2>
	       		</div>

				<!-- @change='tableShow()' -->
	            <select id="select-sch" v-model="school" @change="addSchools">
					<option value="0">Objekt auswählen…</option>
	                <option v-for='sch in schools' :value='sch.Id' >{{ sch.Schule }}</option>
				</select>
				<!-- <p v-for="scho in schoolsClick">{{scho.Schule}}</p> -->
				
			</div>
	 	</section><!-- END: Dropdown 2 Section container -->

		<!-- START: Input field and button Section container -->
			<section class="fls__modal">
	            <div class="fls__input">


					<!-- START: form == class -> mw-400 -->
	              	<div class="mw-400">
						<ul>

							<li>
								<div class="selectTitle pb-20">
									<h2>IHRE E-MAIL ADRESSE</h2>
								</div>
								<div class="email-input">
									<input type="text" id="emailValue" placeholder="Enter e-mail address" @blur='handleBlur' v-model="emailSending">
									<span id="emailX" class=""></span>
									<span class="error__message" v-for="error in errors">{{ error }}</span>
								</div>
							</li>
							  
						</ul>
					


						<!-- START: Submit button -->
						<div class="fls__button">
							<input id="gdpr-button" type="submit" value="Senden" @click="clickSubmit" :disabled="!submitDisabled">   
						</div><!-- END: Submit button -->
					
						
										<!-- START: Checkbox -->
						<div class="fls__gdpr fls__checkbox">
							<input id="gdpr" type="checkbox" value="value3" v-model="checkbox">
							<label for="gdpr">Ich habe die <a href="https://www.farbleitsystem.com/impressum_datenschutzerklaerung/">Datenschutzerklärung</a> zur 
									Kenntnis genommen und bin mit Ihrer Geltung einverstanden.</label>
						</div><!-- END: Checkbox -->

					</div><!-- END: form == class -> mw-400 -->
	    
	            </div>
	    

	        
			</section><!-- END: Input field and button Section container -->
     </div><!-- END: class: ==== bg-grey === -->
		

     <div class="textContH mt-80">
     	<p>
     		Wir senden Ihnen gerne Musterproben zu. Pro Türmarker berechnen wir 20,00 € zuzüglich Mwst. und Versandkosten.
     	</p>
     </div>



 </div>
<!--    
		========================================================
		======================================================== 
				END: DROPDOWN container -> BESTELLEN PAGE 
		========================================================
		======================================================== 
-->

<?php include 'footer.php'; ?>
