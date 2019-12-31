<template>
  <div>
    <!-- <b-button @click="show=true" variant="primary">Show Modal</b-button> -->

    <b-modal
      v-model="isActive"
      title=""
       size="xl"
      @close="closeModel"
      
    >
      <b-container fluid>
       
          <b-container class="bv-example-row">
            <b-row>
                <b-col class="image1">
                    <!-- <b-img thumbnail fluid src="https://picsum.photos/250/250/?image=54" alt="Image 1"></b-img> -->
                    <div class="b-container">
                        <br>
                        <br>    
                        <!-- <h3>Sign Up</h3>
                        <p>Sign Up to our social questions and Answers Engine to ask questions, answer people’s questions, and connect with other people.</p>
                        <div>
                            <br><br><br>
                            <b-button block variant="primary">Sign Up</b-button>
                        </div> -->
                    </div>
                </b-col>
                <b-col>
                    <div class="b-container">
                        <div class="alert alert-danger" v-show="errors.has('password') || form.cpassword!=form.password ||check ">
                        <div v-if="errors.has('password')">
                            {{ errors.first('password') }}
                        </div>
                        <div v-if="form.cpassword!=form.password">
                            {{ errors.first('password_confirmation') }}
                        </div>
                        <div v-if="check">
                            There are required fields (Agree of the terms).
                        </div>

                        </div>
                        <!-- @submit="onSubmit" -->
                        <b-form @submit.prevent="onSubmit"  @reset="onReset" v-if="show">

                        <div>
                         
                           <label for="carrer">Career</label>
                          <b-form-select v-model="form.selected" id="carrer" class="mb-3">
      <option :value="null" disabled >Please select an option</option>
      <option value="teacher">teacher</option>
      <option value="student" >student</option>
     
    </b-form-select>
                        </div>
                        
                        <b-form-group
                            id="input-group-1"
                            label="Email address:"
                            label-for="input-1"
                            description="We'll never share your email with anyone else."
                        >
                            <b-form-input
                            id="input-1"
                            v-model="form.email"
                            type="email"
                            required
                            placeholder="Enter email"
                            ></b-form-input>
                        </b-form-group>

                        <b-form-group
                            id="input-group-5"
                            label="Password:"
                            label-for="input-1"
                            description=" Your password must be 8-20 characters long, contain letters and numbers, and must not
                                contain spaces, special characters, or emoji."
                        >
                            <!-- <label for="text-password">Password</label> -->
                            <b-input v-validate="'required'" name="password" type="password" v-model="form.password" required id="text-password" aria-describedby="password-help-block"></b-input>
                           
                        </b-form-group>

                        <b-form-group
                            id="input-group-5"
                            label="Conform Password:"
                            label-for="input-1"
                            
                        >
                            <!-- <label for="text-password">Password</label> -->
                            <b-input v-validate="'required|confirmed:password'" name="password_confirmation"  type="password" v-model="form.cpassword" required id="text-password" aria-describedby="password-help-block"></b-input>
                          
                        </b-form-group>
                        

                        

                 
                         <b-form-checkbox
                            id="checkbox-1"
                            v-model="status"
                            name="checkbox-1"
                            value="accepted"
                            required
                            unchecked-value="not_accepted"
                          >
                           By registering, you agree to the terms of service and Privacy Policy.*
                          </b-form-checkbox>
                          <br>
                          <!-- <button @click="sbba">ajsdas</button> -->

                        <!-- <b-button type="submit" @click="Sub" variant="primary">Submit</b-button> -->
                        <b-button block variant="primary" type="submit">SignUp</b-button>
                        <!-- <b-button type="reset" variant="danger">Reset</b-button> -->
                        </b-form>
                        <!-- <b-card class="mt-3" header="Form Data Result">
                        <pre class="m-0">{{ form }}</pre>
                        </b-card> -->
                    </div>

                </b-col>
            </b-row>

            </b-container>
        
      </b-container>

      <div id="footer" slot="modal-footer" class="w-100">
       
      </div>
    </b-modal>
  </div>
</template>

<script>
  export default {
       props: ['isActive'],
    data() {
      return {
       
        show: false,
        status: 'not_accepted',
        val:0,
        userValidate:false,
        userId: '',
        usercareer:'',
        form: {
          email: '',
          selected: null,
          password:'',
          cpassword:'',
        },
      
         newForm:{
          email:'',
          name:'',
          password:'',
           c_password:''
        },
        value:'',
        check:false,
        show: true
      
      }
    },
    methods:{
        closeModel(){
            this.val++;
            this.$emit('val');
        },
       
        
      onSubmit(evt) {
   this.userId='th'
         this.$http.get('http://127.0.0.1:8000/api/getid/'+this.form.email)
    .then(function(response){
        
     this.userId=response.body.users.id;
     this.usercareer=response.body.users.name;
      //////
         this.newForm.name=this.form.selected;
        this.newForm.password=this.form.password;
        this.newForm.email=this.form.email;
        this.newForm.c_password=this.form.cpassword;
         console.log('this is my user id '+this.userId)
           this.$http.post('http://localhost:8000/api/userRegister', this.newForm).then(function (response) {
            if (response.status === 200 && 'success' in response.body) {
              this.$session.start()
              this.$session.set('jwt', response.body.success.token)
              this.$session.set('userid', response.body.success.userid)
              this.$session.set('usercareer', response.body.success.usercareer)
               console.log('this is my user user carrere '+ response.body.success.usercareer)
              this.token12=response.body.success.token;
              this.$http.headers.common['Authorization'] = 'Bearer ' + response.body.success.token

              this.isActive1=false;
              this.$router.push('/Main/Profile')
            }
            },function (response) {
    // Error
             console.log(response.data)
            });
        
// this.$router.push('/Main/Profile')
           })
        
        
      },
      storedata(){
      this.newForm.name=this.form.selected;
        this.newForm.password=this.form.password;
        this.newForm.email=this.form.email;
        this.newForm.c_password=this.form.cpassword;
         console.log('this is my user id '+this.userId)
           this.$http.post('http://localhost:8000/api/userRegister', this.newForm).then(function (response) {
            if (response.status === 200 && 'success' in response.body) {
              this.$session.start()
              this.$session.set('jwt', response.body.success.token)
              this.$session.set('userid',this.userId)
              this.$session.set('usercareer',this.usercareer)
              this.token12=response.body.success.token;
              this.$http.headers.common['Authorization'] = 'Bearer ' + response.body.success.token

              this.isActive1=false;
              this.$router.push('/Main/Profile')
            }
            },function (response) {
    // Error
             console.log(response.data)
            });
        
this.$router.push('/Main/Profile')
      },
      onReset(evt) {
        evt.preventDefault()
        // Reset our form values
        this.form.email = ''
        this.form.name = ''
        this.form.food = null
        this.form.checked = []
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    },
     computed: {
      // validation() {
      //   this.$http.get('http://localhost:8000/api/getTAVB/'+this.form.name).then(response => {

      //     // get body data
      //     this.userValidate = response.body.avb;

      //   }, response => {
      //     // error callback
      //   });
        
      //   return this.userValidate;
      // }
    }
  }
</script>

<style scoped>

.image1 {
  background-image: url("las.jpg");
  color: aliceblue;
   background-repeat:no-repeat;
  background-position: center;
  background-size: cover;
}
#footer{
     /* div { */
  opacity: 0.3;
  filter: alpha(opacity=30); /* For IE8 and earlier */
/* } */
  
}
</style>
