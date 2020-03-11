<?php include 'header.php'; ?>


<!-- 
	========================================================
	======================================================== 
	START: TABLE container -> SCHULEN DIE DAS FLS HABEN PAGE 
	========================================================
	======================================================== 
-->

<div class="grid-960" id="table">



		<!-- START: Title Table container -->
		<div class="title-container grid-800" v-show="!verified">
			<h1>SCHULEN DIE DAS FLS HABEN</h1>	
			<h1 class="schule-title" v-for="schule in showSchool">{{schule.Schule}}</h1>
		</div><!-- END: Title Table container -->

		<!-- START: Title Order container -->
		<div class="title-container grid-800" v-show="orderVerified">
			<h1>WARENKORB</h1>	
		</div><!-- END: Title Order container -->


			<!-- START: Filter section -->
			<section class="filters__container">

				<!-- START: fls__filters -->
				<div class="fls__filters" v-if="!isHidden">

		            <div class="fls__filter__header" >
						<div class="fls__indikator" @click="filterShow">filter</div>
					</div>

		            <!-- START: filters__content -->
		            <div class="filters__content">

						<!-- START: fls__flex -->
		                <div class="filter__flex">
							
							<!-- START: fls__radios -->
		                	<div class="fls__radios">
			                    <h3>Farbe</h3>
			                    
			                    <ul>

									<li v-for="(farbe, index) in farbeFilters">
										<input 	:id="farbe.farbe" 
												type="checkbox"
												name="marker-color"
												
												:value="farbe.farbe" 
												v-model="filterFarbe" 
												>

										<label :for="farbe.farbe"></label>
									</li>		
									
			                    </ul>

		                  	</div><!-- END: fls__radios -->
						


							<!-- START: fls__checkbox -->
							<div class="fls__checkbox" id="markers">
								<h3>Türmarker</h3>
								<ul class="filter__flex">

									<li>
										<input id="fls__checkbox-5" v-model="filterLabel" type="checkbox" value="Kurze Laschen">
										<label for="fls__checkbox-5"><img src="images/ic_kurze_laschen.svg" alt=""></label>
									</li>
									<li>
										<input id="fls__checkbox-6" v-model="filterLabel" type="checkbox" value="Raumlasche">
										<label for="fls__checkbox-6"><img src="images/ic_laschen.svg" alt=""></label>
									</li>
								
								</ul>
							</div><!-- END: fls__checkbox -->


							
							<!-- START: fls__checkbox == Gebäude == -->
							<div class="fls__checkbox"> 
									<h3>Gebäude</h3>

									<ul>
										<li v-for="(gebaude, index) in gebaudeFilters">
											<input :id="'fls__checkbox-' + index + '-gebaude'" type="checkbox" :value="gebaude.gebaude" v-model="filterBuilding">
											<label :for="'fls__checkbox-' + index + '-gebaude'">{{ gebaude.gebaude }}</label>
										</li>
									</ul>

							</div><!-- END: fls__checkbox == Gebäude == -->
						
							<!-- <div>
								<h3>Reset Filters</h3>
								<button class="reset-filters" @click="uncheck">Reset Filters</button>
							</div> -->
							
						</div><!-- END: fls__flex -->

						
		            </div><!-- END: filters__content -->
				
				</div><!-- END: fls__filters -->

				<!-- START: cart start -->
				<div class="fls__filters cart-absolute" v-show="!buttonBackHide" id="cartID" v-if="!isHidden">
					<div class="fls__cart pos-relative">
												
						<div v-show="items.length > 0" class="cart__content pos-absolute"  v-show="!verified">
							<span class="icon-ic_cart_grey active"  @click="orderVerified = true, verified = true, showCart = false, isHidden = true">WARENKORB</span>
							<span class="sum">{{ items.length + (items.length > 0 || items.length === 0 ? "" : " Items") }}</span>
						</div>

						<!-- <div style="clear:both;margin-top:50px;"></div> -->
						<div class="cart__content" v-show="items.length === 0" @click="showCart = !showCart" v-show="!verified">
							<span class="icon-ic_cart_grey">WARENKORB</span>
						</div>
						
					</div>


					<!-- START: cart-->
					<div class="cart" id="cart-container" v-if="showCart" :class="[cartDisplay,{ 'dNone' : items.length > 0 }]">
						
						<div v-show="items.length === 0">
							<h2 class="cart-h2">Kurzlich hinzugefugte Artikel</h2>
							<p>Sie haben keine Artikel im Warenkorb.</p>
						</div>

					</div>
				</div><!-- END: cart -->
				
			</section><!-- END: Filter section -->


	        <!-- START: Table content section -->
	        <section v-show="!verified" class="fls__table-container">
		        <div class="fls__table" > 

	              	<table>

		                <thead id='scrollFix'>
		                    <tr>

		                        <th class="sortF" @click="sort('rumnummer')">RAUMNUMMER</th>
		                        <th class="sortF" @click="sort('farbe')">FARBE</th>
		                        <th class="sortF" @click="sort('laschentyp')">Türmarker</th>
		                        <th class="sortF" @click="sort('gebaude')">GEBÄUDE</th>        
		                        <th>&nbsp;</th>

		                    </tr>
		                </thead>

		              	<tbody name="fade" is="transition-group">

						  	<transition-group name="flip-list">
								<tr v-for="(item, index) in filteredItems.slice(0, pageSize)" class="responsive-table" :key="index">

									
									<td>{{ item.rumnummer }}</td>
									<td>{{ item.farbe }}</td>
									<td>{{ item.laschentyp }}</td>
									<td>{{ item.gebaude }}</td>
									<!-- <td>{{ item.Idskola }}</td> -->
									<td class="td-responsive">
										
										<div class="table__flex">
											
											<div class="table__flex">
												
												<div class="table__cart pointer">
													<span @click="addToCart(item)">
														<i class="fas fa-plus"></i>
													</span>
												</div>

												<div class="add" style="padding: 0 20px 0 20px;">
													<!-- <div class="table__flex" v-if="item.quantity != 0">
														<div><span class="icon-ic_check"></span></div>
														<div class="counter">{{ item.quantity }}</div>
					
													</div>
		 -->
		 											<div class="table__flex">
														<!-- <div><span class="icon-ic_check"></span></div> -->	
														<div class="counter">{{ item.quantity }}</div>
													</div>
												</div>

												<div class="pointer">
													<span @click="removeFromCartMinus(item)">
														<i class="fas fa-minus"></i>
													</span>
												</div>

											</div>

										</div>
									
									</td>
							
								</tr> 
							</transition-group>

		              	</tbody>
						
					</table>

					<div class="textContH" v-if="pagesLength == 0">
						<p class="cart-h2">In der Tabelle sind keine derartigen Aufkleber enthalten</p>
					</div>

					<div class="load-button">
						<button class="load-more" v-if="pagesLength > 0 && rows.length > 4 && pageSize < rows.length" @click="LoadMoreRows">
							Weitere Artikel laden
						</button>
						<br>

						<button class="load-less" v-show="pageSize > 10" @click="ShowLessRows">
							Weniger Artikel anzeigen
						</button>
					</div>



				<h2 v-if="!checkedFilter.length, !rows.length">No items in table</h2>  
	          	</div><!-- END: Table content -->

		</section><!-- END: Table section -->

<!-- 
	======================================================== 
	START: Order list INCLUDED
	========================================================
-->
				<?php include 'order-include.php'; ?>
<!-- 
	======================================================== 
	END: Order list INCLUDED
	========================================================
-->







    <div class="textContH mt-80" v-show="!verified">
     	<p>
     		* Falls sie eine Türmarker vermissen bzw eine neue Türmarker benötigen, die nicht im Verzeichnis zu finden ist, dann kontaktieren sie uns per <strong>{{emailSending}}</strong>.
     	</p>
 	</div>


</div>
<!-- 
	========================================================
	======================================================== 
	START: TABLE container -> SCHULEN DIE DAS FLS HABEN PAGE 
	========================================================
	======================================================== 
-->




<script>

function sortIcon(e) {
  var elems = document.querySelectorAll(".activeFilter");
  [].forEach.call(elems, function(el) {
    el.classList.remove("activeFilter");
  });
  e.target.className = "activeFilter";
}

</script>



<style>



	.fls__filters .cart__content .sum {
		left: 24px;
    	bottom: -2px;
	}
	.pos-relative {
		position: relative;
	}
	.pos-absolute {
		position: absolute!important;
	    right: 0;
	}




	.cart-scroll {
		height: 500px;
		overflow-y: scroll;
	}

	.error-m, .error-m li {
		color: red!important;
	}

	.is-invalid {
		border: solid 1px red!important;
	}

	.is-valid {
		border: solid 1px green!important;
		color: green!important;
	}

	.is-invalid-none {
		color: red!important;
		display: block!important;
	}
	.border-err {
		border: solid 1px red!important;
	}
	.border-err-good {
		border: solid 1px green!important;

	}

	.resetFilter {
		border: solid 1px blue;
		cursor:pointer;
		padding: 10px;
	}


	.button-pag {
		padding: 0 10px;
	}
</style>



<?php include 'footer.php'; ?>