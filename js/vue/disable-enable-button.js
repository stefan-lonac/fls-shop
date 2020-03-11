


var app = new Vue({
  el: "#enableB",
  
  /*
      ======================                 ======================
      ======================   START: Data   ======================
      ======================                 ======================
  */
	data: {
		quantitytwo: 0,
    email: '',
    emailRules: [],
    checkbox: 0,
    errors: [],

    country: 0,
    countries: '',
    school: '',
    schools: []
  },
  /*
      ======================                 ======================
      ======================    END: Data    ======================
      ======================                 ======================
  */




  /* 
    ======================                 ======================
    ====================== START: Computed ======================
    ======================                 ======================
  */
	computed: {
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
    // END: Submit button Function

  },
  /* 
    ======================                 ======================
    ====================== END: Computed   ======================
    ======================                 ======================
  */




  /*
    ======================                 ======================
    ====================== START: Methods  ======================
    ======================                 ======================
  */
  methods: {


    handleBlur: function() {
      this.errors = [];
      let emailValue  = document.getElementById('emailValue');
      let emailX      = document.getElementById('emailX');

      if (!this.email.length) {
        this.errors.push("");
        emailValue.classList.remove('borderInput');
        emailX.classList.remove('error-x');
      } 
      else if(!this.validEmail(this.email)) {
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
         app.countries = response.data;
         
         console.log(app.countries);
         app.schools = '';
         app.school  = 0;
      });
    },
    getSchool: function(){
      axios.get('php-scripts/bestellen-selectList/selectList.php', {
         params: {
           request: 'school',
           PLZ: app.country,
         } 
      })
      .then(function (response) {
        app.schools = response.data;
        app.school = 0;
        console.log(app.schools.length);
      }); 
    }, 


    // Email function validation
    sendEmail: function() {
      axios.get('email-send.php', {
        params: {
          email: this.email
        }.then(function (response) {
          console.log(email);
          app.email = response.data;
        })
      })
    },


    validEmail: function(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
      
    },
    clickSubmit: function() {
      if (this.submitDisabled) {
        console.log(this.email);
        this.sendEmail;
        window.location.href = 'test.php?school='+app.school;
      }
    }
    // END: Email function validation
  },
  /*
      ======================                 ======================
      ====================== END: Methods    ======================
      ======================                 ======================
  */


  // Select list Function -> When the page is loaded, the SCHOOL are displayed in the selected list
  created: function(){
    this.getCountries();
  }
  // END: Select list Function -> When the page is loaded, the SCHOOL are displayed in the selected list

})


