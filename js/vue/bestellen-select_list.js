var app = new Vue({
  el: '#SelectList',
  data: {
    PLZ: 0,
    countries: '',
    school: 0,
    states: ''
  },
  methods: {
    getCountries: function(){
      axios.get('php-script/bestellen-dynamic-selectL/dynamic-selectL.php', {
        params: {
          request: 'PLZ'
        }
      })
      .then(function (response) {
         app.countries = response.data;
 
         app.schools = '';
         app.school  = 0;

      });
 
    },
    getSchool: function(){
      axios.get('php-script.php', {
         params: {
           request: 'Schule',
           country_id: this.PLZ
         }
      })
      .then(function (response) {
         app.schools = response.data;
         app.school = 0;

      }); 
    }, 
  },
  created: function(){
    this.getCountries();
  }
});