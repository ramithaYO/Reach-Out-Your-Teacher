<template>
  <div>
    <!-- <b-button @click="show=true" variant="primary">Show Modal</b-button> -->

    <b-modal
      v-model="isActive1"
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
                          <h3>
         <!-- <font face = "Times New Roman" style="font-weight: bold;font-style:italic"  color = "green" size = "5">Sign In</font><br /> -->

       </h3>  
                      
                        <!-- <p>Sign Up to our social questions and Answers Engine to ask questions, answer people’s questions, and connect with other people.</p>
                        <div>
                            <br><br><br>
                            <b-button block variant="primary">Sign In</b-button>
                        </div> -->
                    </div>
                </b-col>
                <b-col>
                  <div v-if="errorAnabile" style="background-color:red">
                    Email Or password Wrong
                  </div>
                  <!-- <button @click="bb">sadjsajd</button> -->
                    <div class="b-container">
                        <div class="card">
                        <div class="card-header">
                            Login
                        </div>
                        <div class="card-body">
                             <!-- <div class="alert alert-danger" v-show="errors.has('password') || form.cpassword!=form.password ||check ">
                        <div v-if="errors.has('password')">
                            {{ errors.first('password') }}
                        </div>
                        <div v-if="form.cpassword!=form.password">
                            {{ errors.first('password_confirmation') }}
                        </div>
                        <div v-if="check">
                            There are required fields (Agree of the terms).
                        </div>
                        </div> -->
                        <b-form v-on:submit.prevent="onSubmit" @reset="onReset" v-if="show">

                        <b-form-group id="input-group-0" label="Username:" label-for="input-2">
                            <b-form-input
                            id="input-2"
                            v-model="form.name"
                            required
                            placeholder="Enter Username"
                            ></b-form-input>
                        </b-form-group>


                        <b-form-group
                            id="input-group-5"
                            label="Password:"
                            label-for="input-1"
                            
                        >
                            <!-- <label for="text-password">Password</label> -->
                            <b-input v-validate="'required'" name="password" type="password" v-model="form.password" required id="text-password" aria-describedby="password-help-block"></b-input>
                            <!-- <b-form-text id="password-help-block">
                                Your password must be 8-20 characters long, contain letters and numbers, and must not
                                contain spaces, special characters, or emoji.
                            </b-form-text> -->
                        </b-form-group>

                       
                        



                        <!-- <b-button type="submit" variant="primary">Submit</b-button> -->
                        <b-button block variant="primary" type="submit">Login</b-button>
                        <!-- <b-button type="reset" variant="danger">Reset</b-button> -->
                        </b-form>
                        
                        </div>
                        </div>
                       
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
       props: ['isActive1'],
    data() {
      return {
        show: false,
        val:0,
        errorAnabile:false,
        
        form: {
          email: '',
          name: '',
          password:'',
          cpassword:'',
        },
        value:'',
        check:false,
        userid:'',
        usercareer:'',
        show: true
      
      }
    },
    methods:{
        closeModel(){
            this.val1++;
            this.$emit('val1');
        },
        
      onSubmit() {
        this.userid='th'
         this.$http.get('http://127.0.0.1:8000/api/getid/'+this.form.name)
    .then(function(response){
        
     this.userid=response.body.users.id;
     this.usercareer=response.body.users.name;
     this.sessioncreate();    //is this okay to use like this
           })
        
       
       
        
      },
      sessioncreate(){
      this.$http.post('http://localhost:8000/api/userLogin', {
            password: this.form.password,
            email: this.form.name
          }).then(function (response) {
            //console.log(response.body.success.token)
            if (response.status === 200 && 'success' in response.body) {
              this.$session.start()
              this.$session.set('jwt', response.body.success.token)
              this.$session.set('userid',this.userid)
              this.$session.set('usercareer',this.usercareer)
              this.token12=response.body.success.token;
              this.$http.headers.common['Authorization'] = 'Bearer ' + response.body.success.token

              this.isActive1=false;
              this.$router.push('/Main/Profile')
            }
           // console.log(response.body.success.token);
          }, function (err) {
            alert('Wrong email or Password');
            console.log('err', err)
            this.errorAnabile=true;

          })


      },
      bb(){
        this.$emit('clickedSomething',true);
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
         
    }
  }
</script>

<style scoped>
.image1 {
  background-image: url("las.jpg");
  background-repeat:no-repeat;
  background-position: center;
  background-size: cover;
  color: aliceblue;
  width: 70px;
  
}
#footer{
     /* div { */
  opacity: 0.3;
  filter: alpha(opacity=30); /* For IE8 and earlier */
/* } */
  
}
</style>
