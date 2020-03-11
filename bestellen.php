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



<!-- <script src="js/vue/disable-enable-button.js"></script> -->
<!-- <script src="js/vue/bestellen-select_list.js"></script> -->

<script>

// Select Lists

// var x, i, j, selElmnt, a, b, c;
// /*look for any elements with the class "custom-select":*/
// x = document.getElementsByClassName("custom-select");
// for (i = 0; i < x.length; i++) {
//   selElmnt = x[i].getElementsByTagName("select")[0];
//   /*for each element, create a new DIV that will act as the selected item:*/
//   a = document.createElement("DIV");
//   a.setAttribute("class", "select-selected");
//   a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
//   x[i].appendChild(a);
//   /*for each element, create a new DIV that will contain the option list:*/
//   b = document.createElement("DIV");
//   b.setAttribute("class", "select-items select-hide");
//   for (j = 1; j < selElmnt.length; j++) {
//     /*for each option in the original select element,
//     create a new DIV that will act as an option item:*/
//     c = document.createElement("DIV");
//     c.innerHTML = selElmnt.options[j].innerHTML;
//     c.addEventListener("click", function(e) {
//         /*when an item is clicked, update the original select box,
//         and the selected item:*/
//         var y, i, k, s, h;
        
//         s = this.parentNode.parentNode.getElementsByTagName("select")[0];
//         h = this.parentNode.previousSibling;
//         for (i = 0; i < s.length; i++) {
//           if (s.options[i].innerHTML == this.innerHTML) {
//             s.selectedIndex = i;
//             h.innerHTML = this.innerHTML;
//             y = this.parentNode.getElementsByClassName("same-as-selected");
//             for (k = 0; k < y.length; k++) {
//               y[k].removeAttribute("class");
//             }
//             this.setAttribute("class", "same-as-selected");
//             break;
//           }
//         }
//         h.click();
//     });
//     b.appendChild(c);
//   }
//   x[i].appendChild(b);
//   a.addEventListener("click", function(e) {
//       /*when the select box is clicked, close any other select boxes,
//       and open/close the current select box:*/
//       e.stopPropagation();
//       closeAllSelect(this);
//       this.nextSibling.classList.toggle("select-hide");
//       this.classList.toggle("select-arrow-active");
  
	    
//     });
// }
// function closeAllSelect(elmnt) {
//   /*a function that will close all select boxes in the document,
//   except the current select box:*/
//   var x, y, i, arrNo = [];
//   x = document.getElementsByClassName("select-items");
//   y = document.getElementsByClassName("select-selected");
//   for (i = 0; i < y.length; i++) {
//     if (elmnt == y[i]) {
//       arrNo.push(i)
//     } else {
//       y[i].classList.remove("select-arrow-active");
//     }
//   }
//   for (i = 0; i < x.length; i++) {
//     if (arrNo.indexOf(i)) {
//       x[i].classList.add("select-hide");
//     }
//   }
// }
// /*if the user clicks anywhere outside the select box,
// then close all select boxes:*/
// document.addEventListener("click", closeAllSelect);

// // Additions By Strahinja 02/04
// var activeSelect = document.querySelector('.select-selected');
// console.log(activeSelect);
// function activeSelect() {
//     activeSelect.innerHTML="testiranje";
// }
// activeSelect.addEventListener('click', activeSelect);


// // GDPR Checkbox

// var gdpr = document.getElementById('gdpr');

// gdpr.addEventListener("change", gdprCheck);

// function gdprCheck(){
//     let gdprButton = document.getElementById('gdpr-button')
//     gdprButton.disabled = !this.checked;
// }

</script>

<?php include 'footer.php'; ?>
