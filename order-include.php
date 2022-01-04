
        <!-- 
            ======================================================== 
            START: Order list
            ========================================================
        -->


        <div class="checkout" v-show="orderVerified">

            <div id="arrowBack" class="filter__flex-stefan" @click="goback">
                <img src="images/iconmonstr-arrow-72.svg" alt="arrow-back">
                <p>ZURÜCK</p>
            </div>

            <!-- START: Table order row -->
            <section class="order__table">

                <!-- START: class: == fls__table == -->
                <div class="fls__table">

                    <table v-if="items != 0">

                        <thead>
                            <tr>

                                <th>RAUMNUMMER</th>
                                <th>FARBE</th>
                                <th>Türmarker</th>
                                <th>GEBÄUDE</th> 
                                <th>ANZAHL</th>      
                                <th>&nbsp;</th>

                            </tr>

                        </thead>

                        <tbody name="fade" is="transition-group">

                                <tr v-for="(item, index) in items" v-bind:key="item" class="list-item">

                                    <td :value="item.rumnummer">{{ item.rumnummer }}</td>
                                    <td>{{ item.farbe }}</td>
                                    <td>{{ item.laschentyp }}</td>
                                    <td>{{ item.gebaude }}</td>
                                    <!-- <td>{{ new Date().getFullYear() }}</td> -->  <!-- Show current year -->
                                  
                                    <td class="input-quantity">
                                        <div class="table__flex border-quantity">

                                            <div class="table__cart pointer">
                                                <span @click="addToCart(item)">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                            </div>

                                            <div class="add" style="padding: 0 10px 0 10px;">
                                                <!-- <div class="table__flex" v-if="item.quantity != 0">
                                                    <div><span class="icon-ic_check"></span></div>
                                                    <div class="counter">{{ item.quantity }}</div>
                
                                                </div>-->
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
                                    </td>
                                    <td class="remove-item">
                                        <img src="images/ic_remove.svg" alt="remove ordered item" @click="removeFromCart(item)">
                                    </td>

                    
                                </tr>  
                                                                    
                        </tbody>

                    </table>

                    
                    
                </div><!-- END: class: == fls__table == -->

            </section><!-- END: Table order row -->
            


            <!-- START: Input field Section -->
            <section class="fls__modal">

            <div class="modal__item-error">
                <h2 v-if="items == 0">
                    Bitte gehen Sie zurück und fügen Sie Artikel hinzu
                </h2>
            </div>

            <!-- START: class: == fls__input == -->
            <div class="fls__input" >
                
                <!-- START: Input form -->
                <div class="fls__form">
                    <ul>
                        
                        <li>
                            <span for="contact">ANSPRECHPARTNER</span>
                            <input type="text" id="contact" v-model="newOrder.contact" placeholder="Ansprechpartner" v-bind:class="{ 'is-invalid': attemptSubmit && missingContact }">
                            <span style="display: none;" class="error__message" id="contact-error">Field is required</span>
                            
                        </li>
                        <li>
                            <span for="number">TELEFONNUMMER</span>
                            
                            <input type="number" id="number" v-model="newOrder.number" placeholder="Telefonnummer" v-bind:class="{ 'is-invalid': attemptSubmit && missingNumber }">
                            <span style="display: none;" class="error__message" id="number-error">Field is required</span>

                            <!-- <li v-for="error in errors">
                                <span class="error__message">{{ error }}</span>
                            </li> -->

                            
                            
                        </li>
                        
                        <li>
                            <span for="email">IHRE E-MAIL ADRESSE</span>
                            <input type="text" id="email" v-model="newOrder.email" placeholder="Inhre e-mail adresse" v-bind:class="{ 'is-invalid': attemptSubmit && missingEmail }">
                            
                            <span style="display: none;" class="error__message" id="email-error">Field is required</span>
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
                        <div class="textContH">
                            <p>
                                WOLLEN SIE DIE BEKLEBUNG SELBST VORNEHMEN?
                            </p>
                        </div><!-- END: Text container -->

                        

                            <ul>

                                <li>
                                    <input type="radio" v-model="newOrder.check" value="ja" id="test1" name="radio-group" checked="">
                                    <label for="test1">Ja</label>
                                </li>

                                <li>
                                    <input type="radio" v-model="newOrder.check" value="nein" id="test2" name="radio-group">
                                    <label for="test2">Nein</label> 
                                </li>

                            </ul>
                            
                        
                        </div><!-- END: Radio buttons -->



                    <!-- START: Text field -->
                    <ul>
                        <li>
                            <span>KOMMENTAR / KOSTENSTELLEN</span>
                            <textarea name="" rows="5" placeholder="Kommentar" v-model="newOrder.comment"></textarea>
                        </li>
                    </ul>
                    <!-- END: Text field -->



                    <!-- START: Button form -->
                    <div class="fls__button">
                        <input @click="OrderValidate()" id="gdpr-button" type="submit" value="Bestellung abschliessen" :disabled="!validateFunct">
                    </div>
                    <!-- END: Button form -->
                    
                </div><!-- END: Input form -->  

            </div><!-- END: class: == fls__input == -->

            </section><!-- START: Input field Section -->

        </div>
        <!-- 
            ======================================================== 
            END: Order list
            ========================================================
        -->
        

<style>
    .list-item {
    display: inline-block;
    margin-right: 10px;
    }
    .list-enter-active, .list-leave-active {
    transition: all 1s;
    }
    .list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
    opacity: 0;
    transform: translateY(30px);
    }
</style>



<!-- 
    ======================================================== 
    START: Order list INCLUDED
    ========================================================
-->
                <?php include 'finished.php'; ?>
<!-- 
    ======================================================== 
    END: Order list INCLUDED
    ========================================================
-->