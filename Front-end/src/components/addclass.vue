<template>
  <div>

    <b-form>
     

      <b-form-group id="input-group-2" label="Institute Name:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="form.cname"
          required
          placeholder=""
        ></b-form-input>
      </b-form-group>
      
      <b-form-group id="input-group-3" label="Class location:" label-for="input-3">
        <b-form-input
          id="input-3"
          v-model="form.clocation"
          required
          placeholder=""
        ></b-form-input>
      </b-form-group>
      <b-form-group id="input-group-4" label="Class Fee:" label-for="input-4">
        <b-form-input
          id="input-4"
          v-model="form.cfee"
          required
          placeholder=""
        ></b-form-input>
      </b-form-group>
  
       <b-form-group id="input-group-5" label="day:" label-for="input-5">
        <b-form-select
          id="input-5"
          v-model="form.day"
          :options="days"
          required
        ></b-form-select>
      </b-form-group>
       <b-form-group id="input-group-7" label="time:" label-for="input-7">
      <b-row>
          <b-col>
              <b-form-input
         
          v-model="form.ctime"
          required
          placeholder=""
        ></b-form-input>
          </b-col>
          <b-col>
                <b-form-select
          id="input-7"
          v-model="form.time"
          :options="time"
          required
        ></b-form-select>
          </b-col>
      </b-row>
      </b-form-group>
      <b-form-group id="input-group-6" label="Subject :" label-for="input-6">
        <b-form-input
        
          id="input-6"
          v-model="form.sname"
          required
          placeholder=""
        ></b-form-input>
      </b-form-group>

     

      <b-button @click="submit" variant="primary">Submit</b-button>
      <b-button @click="reset" variant="danger">Reset</b-button>
    </b-form>
    <!-- <b-card class="mt-3" header="Form Data Result">
      <pre class="m-0">{{ form }}</pre>
    </b-card> -->
  </div>
</template>

<script>

  export default {
  

    data() {
      return {
          Datevalue:'',
        form: {
          email: '',
          name: '',
          day: null,
          cname: '',
          clocation: '',
          cfee: '',
          ctime:'',
          time:'',
          sname:'',
          userid:'',
          checked: []
        },
        days: [{ text: 'Select One', value: null }, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday','Sunday'],
        time: [{ text: 'Select One', value: null }, 'AM', 'PM'],
        show: true
      }
    },
    methods: {
    submit() {
       this.form.userid= this.$session.get('userid')
  
        this.$http.post('http://localhost:8000/api/addclass', this.form ,{
             headers: {
            'Authorization': 'Bearer ' + this.$session.get('jwt')
          }}).then(function (response) {
            // alert("done");
             console.log(response.body.users);
              
          }, function (err) {
            console.log('err', err)
            // this.errorAnabile=true;

          })
        
      },
     reset() {
      
        // Reset our form values
        this.form.email = ''
        this.form.name = ''
        this.form.day = null
        this.form.time = null
        this.form.ctime = ''
        this.form.cname = ''
        this.form.clocation = ''
         this.form.cfee = ''
        this.form.sname = ''
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    }
  }
</script>