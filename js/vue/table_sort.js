

var table = new Vue({
  el: '#vueapp',
  data: {

    // ==============> BESTELLEN PAGE <==============
      quantitytwo: 0,
      emailSending: '',
      emailRules: [],
      checkbox: 0,
      errors: [],
  
      country: 0,
      countries: '',
      school: '',
      schools: [],

      schoolsClick: [],
      schuleAdd: [],
    // ==============> END: BESTELLEN PAGE <==============


    // Hide - Show 
    isHidden: false,
    isHback: false,
    finishedHidden: false,
    orderVerified: false,
    verified: false,
    buttonBackHide: false,

    // Show school on table page
    showSchool: [],
    // END: Show school on table page


    // Table functions
    rows: [],
    currentSort: 'name',
    currentSortDir: 'asc',
    pageSize: 10,
    currentPage: 1,

    pagesLength: '',
    // END: Table functions


    // Add to cart
    items: [],
    showCart: false,
    showOrderBounce: false,
    quantity: 1,

    cartDisplay: true,
    // END: Add to cart


    // Validation form

      // errors: [],
      attemptSubmit: false,
      // reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,

    // END: validation form

    // START: order
    newOrder: {
      contact: "",
      number: "",
      email: "",
      check: "nein",// Show checked radio button "Order page" 
      numberOrder: "",
      comment: "",
    },
    // END: order


    // Filters
    filterColor:    '',
    filterLabel:    [],
    filterBuilding: [],
    filterFarbe:    [],
    checkedFilter:  [],

    gebaudeFilters: [],
    farbeFilters:   [],
    // END: filters

    // Order finish
    order: [],
    // EDN: Order finish


    // Animations
    showAnimate: true,
    // END: Animations


    localStr: [],


    // Pagination
    page: 1,
    perPage: 15,
    pages: [],
    // END: Pagination
  },




  /* 
    ======================                 ======================
    ====================== START: Computed ======================
    ======================                 ======================
  */
  computed:{
    // ===============================> BESTELLEN PAGE <===============================
    

      showCountries: function() {
        this.getCountries();
      },

      // Submit button Function
      submitDisabled: function (error) {
        if (this.validEmail(this.email)) {
          emailValue.classList.remove('borderInput');
          emailX.classList.remove('error-x');
          this.errors.splice(this.errors.indexOf(error), 1);
        }
        
        if (this.errors.length < 1 && this.checkbox === true && this.countries.length > 0 && this.schools.length > 0) {
          return true;
        } else {
          return false;
        }
      },
      // END: Submit button Functio
      
      // ORDER by Name    
      orderedUsers: function () {
        return _.orderBy(this.rows, 'name')
      },
      // END: ORDER by Name  

      
    // ===============================> END: BESTELLEN PAGE <===============================

 


    // Sort function -> use 
    sortedRows: function() {
      return this.rows.sort((a,b) => {
        let modifier = 1;
        if(this.currentSortDir === 'desc') modifier = -1;
        if(a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
        if(a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
        return 0;
      });
      // END: Sort function
      
    },
    

    
    // Filter COLOR
    filteredItems: function() {
      this.checkedFilter = [];
      
      // IF click on color filter show clicked filter rows
      if (this.filterColor !== '' || this.filterLabel.length > 0 || this.filterBuilding.length > 0 || this.filterFarbe.length) {
        this.rows.forEach( item => {
          if ((this.filterColor === '' || (this.filterColor !== '' && this.filterColor === item.farbe))
              && (this.filterLabel.length < 1 || (this.filterLabel.length > 0 && this.filterLabel.includes(item.laschentyp)))
              && (this.filterBuilding.length  < 1 || (this.filterBuilding.length > 0 && this.filterBuilding.includes(item.gebaude)))
              && (this.filterFarbe.length  < 1 || (this.filterFarbe.length > 0 && this.filterFarbe.includes(item.farbe))) ) {

            this.checkedFilter.push(item);
          }
        });
        this.sortedRows;
        console.log(this.rows);
      } else {// Show all rows in table
        return this.sortedRows;
      } // END: Show all rows in table

      //END: IF click on color filter show clicked filter rows
      return this.checkedFilter; 
    },
    // END: Filter COLOR

    


    // Validation form Functions
    validateFunct: function () {

      var errorContact = document.getElementById('contact-error');
      var contactInput = document.getElementById('contact');

      var numberInput  = document.getElementById('number');
      var errorNumber  = document.getElementById('number-error');

      var emailInput  = document.getElementById('email');
      var errorEmail  = document.getElementById('email-error');

      var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

      if (this.newOrder.contact === ''  || 
          this.newOrder.number === '' || 
          this.newOrder.email === '' || !re.test(emailInput.value) || this.items == 0) {
        this.finishedHidden = false;
        return false;
      } else {
        errorContact.classList.remove('is-invalid-none');
        contactInput.classList.add('border-err-good');  

        errorNumber.classList.remove('is-invalid-none');
        numberInput.classList.add('border-err-good');
        
        errorEmail.classList.remove('is-invalid-none');
        emailInput.classList.add('border-err-good');
        
        return true;
      }

    }
    // END: Validation form Functions   

  },
  /* 
      ======================                 ======================
      ====================== END: Computed   ======================
      ======================                 ======================
  */

mounted: function() {
  if(localStorage.number || localStorage.email) {
    this.school       = localStorage.school;
    this.emailSending = localStorage.email;
  }
},


  /*
     ======================                 ======================
     ====================== START: Methods  ======================
     ======================                 ======================
  */
  methods: {

    // LOAD MORE BUTTON
    LoadMoreRows: function() {
      this.pageSize += 5 || 1;
    },

    ShowLessRows:function() {
      this.pageSize -= 5 || 1;
    },

    // END: LOAD MORE BUTTON



    // PAGINATION functions
    setPages: function() {
      let numberOfPages = Math.ceil(this.filteredItems.length / this.pageSize);
      this.pagesLength = numberOfPages;
      for (let index = 1; index <= numberOfPages; index++) {
        this.pages.push(index);
      }
    },

    // END: PAGINATION functions


    // Onclick UNCHECK all filters
    uncheck: function() {
      table.filterColor     = '';
      table.filterLabel     = [];
      table.filterBuilding  = [];
      table.checkedFilter   = [];
      table.filterFarbe     = [];
    },
    // END: Onclick UNCHECK all filters



      // fetch table from Database
      tableShow: function() {
        axios.get('php-scripts/table/table-fetch.php', {
          params: {
            schoolTable: localStorage.name
          }
        })
        .then(function (response) {
            table.rows = response.data;
        })
        .catch(function (error) {
            console.log(error);
        })
      },
      // END: fetch table from Database



      // Show name of school on table Page
      showSchoolName: function() {
        axios.get('php-scripts/show-name-scool/name-school.php', {
          params: {
            schuleId: localStorage.name
          }
        })
        .then(function (response) {
            table.showSchool = response.data;
            console.log(table.showSchool);
        })
        .catch(function (error) {
            console.log(error);
        })
      },
      // END: Show name of school on table Page

      
      // fetch table from Database
      tableFilter: function() {
        axios.get('php-scripts/table_filters/gebaude.php', {
          params: {
            gebaudeFilter: localStorage.name
          }
        })
        .then(function (response) {
            table.gebaudeFilters = response.data;
        })
        .catch(function (error) {
            console.log(error);
        })
      },



      tableFarbeFilter: function() {
        axios.get('php-scripts/table_filters/farbe.php', {
          params: {
            farbeFilters: localStorage.name
          }
        })
        .then(function (response) {
            table.farbeFilters = response.data;
        })
        .catch(function (error) {
            console.log(error);
        })
      },
      // END: fetch table from Database

          
    // ===============================> BESTELLEN PAGE <===============================


    schoolF: function() {
      localStorage.name   = this.school;
      localStorage.email  = this.emailSending;
      // localStorage.schule = this.schoolsClick;
      for (l = 0;l < this.schoolsClick.length; l++) {
        this.schoolsClick[l] = localStorage.setItem("localTest", JSON.stringify(this.schoolsClick[l]));
        var parseJson = JSON.parse(localStorage.getItem("localTest"));

      }
      localStorage.schule = parseJson.Schule;
    },


    
    addSchools: function() {
      this.schools.forEach(sch => {
        this.schoolsClick.push(sch);
      });
     
    },




    handleBlur: function() {
      this.errors     = [];
      let emailValue  = document.getElementById('emailValue');
      let emailX      = document.getElementById('emailX');

      if (!this.emailSending.length) {
        this.errors.push("");
        emailValue.classList.remove('borderInput');
        emailX.classList.remove('error-x');
      } 
      else if(!this.validEmail(this.emailSending)) {
        this.errors.push("E-Mail ist nicht korrekt.");   
        emailValue.classList.add('borderInput');
        emailX.classList.add('error-x');
      } else {
        emailValue.classList.remove('borderInput');
        emailX.classList.remove('error-x');
      }
    },
  
  
  
      getCountries: function(){
        axios.get('php-scripts/bestellen-selectList/selectList.php', {
          params: {
            request: 'country'
          }
        })
        .then(function (response) {
          table.countries = response.data;
          
          table.schools = [];
          table.school  = 0;
        });
      },
      getSchool: function(){
        axios.get('php-scripts/bestellen-selectList/selectList.php', {
          params: {
            request: 'school',
            PLZ_city: table.country,
          } 
        })
        .then(function (response) {
          table.schools = response.data;
        }); 
      }, 



      // Email function validation
      sendEmail: function() {
        axios.get('php-scripts/email/email-send.php', {
          params: {
            email: table.emailSending
          }
          }).then(function (response) {
            table.emailSending = response.data;
            console.log(response);
          })
      },

      // SEND order Email
      sendEmailOrder: function() {
        var formDataOrder = table.toFormData(table.newOrder);
        axios.post('php-scripts/email/order-email.php', formDataOrder,{ 
          params: {
            action: 'addedOrder',
            itemsRequest: this.items,
          }
        })
        .then(function (response) {
            console.log(response);
          })
      },
      // SEND order Email


      // SEND order Customer Email
      sendEmailCustomerOrder: function() {
        var formDataOrder = table.toFormData(table.newOrder);
        axios.post('php-scripts/email/order-customer.php', formDataOrder,{ 
          params: {
            action: 'addedOrder',
            itemsRequest: this.items,
          }
        })
        .then(function (response) {
            console.log(response);
          })
      },
      // END: SEND order Customer Email
  
      validEmail: function(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
        
      },
      clickSubmit: function() {
        if (table.submitDisabled) {
          table.sendEmail();
          table.schoolF();
          window.location.href = 'thank-you-page.php';
          localStorage = table.school;
        }
      },
      // END: Email function validation
    // ===============================> END: BESTELLEN PAGE <===============================




      setColorFilter: function(color) {
        this.filterColor    = color;
      },


      // Rotate icon 
      rotate: function () {
        var iconRotate = document.querySelectorAll('.rotate');

        let length = iconRotate.length;
        for (let i = 0; i < length; i++) {
          iconRotate[i].onclick = () => {
            for (let x = 0; x < length; x++) {
                if (i===x) continue
                iconRotate[x].classList.remove('down');
            }
            iconRotate[i].classList.toggle('down');
          }
        }
      },
      // END: Rotate icon



      // Sort function
      sort: function(s) {
          if (s === this.currentSort) {
            this.currentSortDir = this.currentSortDir === 'asc' ? 'desc':'asc';
          }
          this.currentSort = s; 

          var sortf = document.querySelectorAll('.sortF');
          
      }, 
      // END: Sort function

      



  // ======= Validation form Functions ======= 
  
      // In -->addOrder<-- function
      toFormData: function(obj) {
        var form_data = new FormData();
        for (var key in obj) {
          form_data.append(key, obj[key]);
        }
        return form_data;
      },


      // Add order
      addOrder: function () {
        var formData = table.toFormData(table.newOrder);
        axios.get('php-scripts/add/add.php', {
          params: {
            action: 'added',
          },
          formData
        })
          .then(function(response){
            console.log(response);
          });
          return true;
      },    
      // END: Add order
   


      addOrderLabels: function () {
        axios.get('php-scripts/label_order/label-order.php', {
          params: {
            itemsRequest: this.items
          }
        })
        .then(function(response){
          console.log(response);
        });
      },  
      // END: Add order labels
      

      // Pick -->addOrder<-- and -->validateForm<-- FUNCTIONS
      OrderValidate: function () {
        if (this.validateFunct) {
          this.sendEmailOrder();
          this.sendEmailCustomerOrder();
          this.addOrder(); 
          this.orderVerified  = false; 
          this.verified       = true;
          this.isHidden       = true;
          this.buttonBackHide = true;
          this.finishedHidden = true;
        }
      },


     
  // ======= END: Validation form Functions =======



      // cart function (Add)
      addToCart(item) {
        var found = false;
        item.quantity++;
        
        this.items.forEach(itema => {
          if (itema.id === item.id) {
            found = true;
          }
        });
        if (found === false) {
          this.items.push(item);
          console.log("Added -> ", item);
        }

      },
      // END: cart function (Add)


      // Minus Quantity
      removeFromCartMinus(item) {

        if(item.quantity === 1) {

          this.items.splice(this.items.indexOf(item), 1);
          console.log("Removed Quantity-> ", item); 

          return item.quantity = 0;

        } else if (item.quantity === 0) {

          return item.quantity = 0;

        } else if (item.quantity > 0) {
          item.quantity--;
        }

      },
      // END: Minus Quantity

  
      // (Remove)
      removeFromCart: function (item) {
        this.items.splice(this.items.indexOf(item), 1);
        console.log("Removed -> ", item); 

        return item.quantity = 0;
      },
      // END: (Remove)




      // Go back to table button ==> ZURÜCK <== 
      goback: function() {
          this.orderVerified = false;
          this.verified = false;
          this.isHidden = false;
      },
      // END: Go back to table button ==> ZURÜCK <==
      
      

      // START: Filters table
      filterShow: function () {
        let filterContent = document.querySelector('.filters__content');
        let filterBefore = document.querySelector('.fls__indikator');

        if (filterContent) {
          filterContent.classList.toggle('showFilter');
          filterBefore.classList.toggle('minus');
        }
      },
      // END: Filters table

  },
  /* ======================                 ======================
     ====================== START: Methods  ======================
     ======================                 ======================
  */

created: function() {
  this.tableShow();
  this.tableFilter();
  this.tableFarbeFilter();
  this.showSchoolName();
},

beforeMount() {
  this.showCountries();
},


watch: {

  // PAGINATION watch (watch function when activated)
  filteredItems: function () {
    this.setPages();
  },
  // END: PAGINATION watch (watch function when activated)
  
},


})
