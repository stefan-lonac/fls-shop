
<!-- 
	========================================================
	======================================================== 
		START: DROPDOWN container ->ERFOLGREICH BEENDET PAGE 
	========================================================
	======================================================== 
-->




		<div class="finished" v-show="finishedHidden">
			<!-- START: Title container -->
			<div class="grid-800">
				<h1><img src="images/check.svg" alt=""></h1>
			</div><!-- END: Title container -->


				<!-- START: Text container -->
			<div class="textContH">
				<p>
					Ihre Bestellung wurde erfolgreich versendet. Wir werden es prüfen und Sie so bald wie möglich kontaktieren.		
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
									<th class="txt-r">ANZAHL</th>      
								</tr>
			
							</thead>
			
							<tbody>
						
									<tr v-for="item in items">
										<td>{{ item.rumnummer }}</td>
										<td>{{ item.farbe }}</td>
										<td>{{ item.laschentyp }}</td>
										<td>{{ item.gebaude }}</td>
										<td class="txt-r">{{ item.quantity }}</td>
									</tr>
									
							</tbody>
			
						</table>
						
					</div><!-- END: class: == fls__table == -->
			
				</section><!-- END: Table order row -->

				<ul class="info-finish pt-50 bg-grey">
					<li>
								<p>ANSPRECHPARTNER </p>
								<p>{{ newOrder.contact }}</p>
					</li>

					<li>
								<p>NUMMER </p>
								<p>{{ newOrder.number }}</p>
					</li>

					<li>
								<p>IHRE E-MAIL ADRESSE </p>
								<p>{{ newOrder.email }}</p>
					</li>

					<li>
								<p>WOLLEN SIE DIE BEKLEBUNG SELBST VORNEHMEN? </p>
								<p>{{ newOrder.check }}</p>
					</li>

					<li>
								<p>KOMMENTAR / KOSTENSTELLEN</p>
								<p>{{ newOrder.comment }}</p>
					</li>
						</ul>

		</div>
<!--    
	========================================================
	======================================================== 
		END: DROPDOWN container -> ERFOLGREICH BEENDET PAGE 
	========================================================
	======================================================== 
-->
