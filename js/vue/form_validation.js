
var form = new Vue({
    el: '#validation',
    data: {
      errors: [],
      contact: '',
      number: '',
      email: '',
      attemptSubmit: false,
    },
    computed: {
        missingContact: function () { 
            if (!this.contact) {
                var element = document.getElementById("contact-error");
                element.innerHTML = "Contact required!";
                return this.contact === '';
            }
        },
        
        missingNumber: function (number) {
            if (!this.number) { 
                var element = document.getElementById("number-error");
                element.innerHTML = "Number required!";
                return this.number === '';
            }  
        },

        missingEmail: function (email) { 
            // var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            // validEmail = re.test(email);
            // this.errors.push('email required!');

            if (!this.email) {
                var element = document.getElementById("email-error");
                element.innerHTML = "E-Mail ist nicht korrekt.";
           
                // var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                // validEmail = re.test(email);
                return this.email === '';            
            }  
        },
    },
    
    methods: { 
      validateForm: function (event) {
        // this.errors = [];
        // console.log(errors);

        this.attemptSubmit = true;
        if (this.missingContact) {
            event.preventDefault();
        } 
        if (this.missingNumber) {
            event.preventDefault();
        }
        if (this.missingEmail) {
            event.preventDefault();
        }
      },
    },
});

