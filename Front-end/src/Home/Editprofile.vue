<template>
   <div>
       <b-form @submit="onSubmit" @reset="onReset" v-if="show">
       <b-container class="mainContainer">
           <b-row>
               <b-row class="basicInformation">           
                       <div class="col">
                           <i style="font-size:37px" class="material-icons">account_box</i>
                       </div>
                          <span style="font-size:20px; font-weight:bold"> Basic Information</span>
               </b-row>
               
           </b-row>
           <div class="formDetails">
                <div class="formContaint">
                       <div>
                            
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
                                disabled
                                placeholder="Enter email"
                                ></b-form-input>
                            </b-form-group>

                            <b-form-group>
                                <!-- <b-form  @submit.stop.prevent> -->
                                    <label for="feedback-user">User ID</label>
                                    <b-input v-model="form.userName" disabled :state="validation" id="feedback-user"></b-input>
                                    <b-form-invalid-feedback :state="validation">
                                        Your user ID must be 5-12 characters long.
                                    </b-form-invalid-feedback>
                                    <b-form-valid-feedback :state="validation">
                                      
                                    </b-form-valid-feedback>
                                <!-- </b-form> -->
                            </b-form-group>

                            <b-form-group id="input-group-2" label="First Name:" label-for="input-2">
                                <b-form-input
                                id="input-2"
                                v-model="form.Fname"
                                
                                placeholder="Enter First Name"
                                ></b-form-input>
                            </b-form-group>

                            <b-form-group id="input-group-2" label="Last Name:" label-for="input-2">
                                <b-form-input
                                id="input-2"
                                v-model="form.Lname"
                               
                                placeholder="Enter Last Name"
                                ></b-form-input>
                            </b-form-group>
                              <div class="imageContainer">
                                <!-- <img src="../images/img_avatar.png" alt="Avatar"> -->
                                <img v-if="pimage=='pqr' " :src="previewImage" class="uploading-image" />
                                <img v-if="pimage!='pqr' " src="./images/user.png" alt="" class="uploading-image">
                                
                                
                            </div>
                            <span>Profile Picture</span>
                            <b-form-group>
                                <!-- <input type="file" accept="image/jpeg" @change=uploadImage> -->
                                 <b-form-file
                                    v-model="file"
                                    @change=uploadImage
                                    :state="Boolean(file)"
                                    placeholder="Choose a file..."
                                    drop-placeholder="Drop file here..."
                                    >
                                 </b-form-file>
                            </b-form-group>
                            

                          
                            <b-form-group id="input-group-2" label="Contact Number:" label-for="input-2">
                                <b-form-input
                                id="input-2"
                                v-model="form.contactNumber"
                               
                                placeholder="Enter Contact Number"
                                ></b-form-input>
                            </b-form-group>
                                
    
                        </div>
                   </div>
                   <b-row>
               <b-row class="basicInformation" style="margin-top:10px;">           
                       <div class="col">
                           <i style="font-size:37px" class="material-icons">account_box</i>
                       </div>
                          <span style="font-size:20px; font-weight:bold">Studies Details</span>
               </b-row>
               
           </b-row>
           <div class="studiesDetailsFrom">
                    <!-- <b-form @submit="onSubmit" @reset="onReset" v-if="show"> -->
                        <b-form-group id="input-group-2" label="Studied at 1:" label-for="input-2">
                                <b-form-input
                                id="input-2"
                                v-model="form.std1"
                               
                                placeholder="Enter School Name"
                                ></b-form-input>
                            </b-form-group>

                   
                    
                        <b-form-group id="input-group-2" label="Studied at 2:" label-for="input-2">
                                <b-form-input
                                id="input-2"
                                v-model="form.std2"
                                
                                placeholder="Enter University Name"
                                ></b-form-input>
                            </b-form-group>

                   
                    
                        <b-form-group id="input-group-2" label="Working at:" label-for="input-2">
                                <b-form-input
                                id="input-2"
                                v-model="form.wat"
                                
                                placeholder="Enter Work Place Name"
                                ></b-form-input>
                            </b-form-group>

                    <!-- </b-form> -->
               </div>
               <b-row>
               <b-row class="basicInformation" style="margin-top:10px;">           
                       <div class="col">
                           <i style="font-size:37px" class="material-icons">account_box</i>
                       </div>
                          <span style="font-size:20px; font-weight:bold">Socail Links</span>
               </b-row>

                </b-row>

                 <div class="socialLinkContaint">
                   <b-form>
                      <b-row>
                          <b-col>
                               <b-form-group id="input-group-2" label="Facebook (Put the full URL):" label-for="input-2">
                                <b-form-input
                                id="input-2"
                                v-model="form.facebook"
                               
                                placeholder="Enter Facebook URL"
                                ></b-form-input>
                            </b-form-group>
                            <b-form-group id="input-group-2" label="Youtube (Put the full URL)" label-for="input-2">
                                <b-form-input
                                id="input-2"
                                v-model="form.youtube"
                                
                                placeholder="Enter Youtube URL"
                                ></b-form-input>
                            </b-form-group>
                            <b-form-group id="input-group-2" label="Linkedin (Put the full URL)" label-for="input-2">
                                <b-form-input
                                id="input-2"
                                v-model="form.linkedin"
                                
                                placeholder="Enter Linkedin URL"
                                ></b-form-input>
                            </b-form-group>
                           
                           
                          </b-col>
                       
                      </b-row>

                   </b-form>
               </div>
                <b-row>
               <b-row class="basicInformation" style="margin-top:10px;">           
                       <div class="col">
                           <i style="font-size:37px" class="material-icons">account_box</i>
                       </div>
                          <span  v-if="(usercar=='teacher')" style="font-size:20px; font-weight:bold">Info Details</span>
                           <span  v-if="!(usercar=='teacher')" style="font-size:20px; font-weight:bold">Address</span>
               </b-row>


                </b-row>
                
               <div class="infoDetails">
                   <b-form>
                       <b-form-textarea
                            id="textarea"
                            v-model="form.info"
                            placeholder="Enter something..."
                            rows="3"
                            max-rows="6"
                    ></b-form-textarea>
                   </b-form>
               </div>
           </div>
           <br>
            <b-button type="submit" variant="primary">Submit</b-button>
            <b-button type="reset" variant="danger">Reset</b-button>
            <br>
            <br>
           
                          
                        
           
       </b-container>
     
</b-form>
   </div>
</template>

<script>
export default {
    data() {
      return {
         usercar:'',
          previewImage:'../Home/images/user.png',
          previewImage1:'../images/img_avatar.png',
          currentUserName:'cba',
          file:'',
          file1:'',
          userValidate:false,
          pimage:null,
          cimage:null,
          s1:'',
          s2:'',
          userid:'',
        form: {
          email: '',
          Fname: '',
          Lname:'',
          userName: 'cba',
          contactNumber:'',
          std1:'',
          std2:'',
          wat:'',
          userid:'',
          usercarrer:'',
          facebook:'',
          youtube:'',
         
          linkedin:'',
          info:'',


        },        
        show: true
      }
    },
     computed: {
      validation() {
        return true;
      }
    },
    created(){
       this.usercar=this.$session.get('usercareer');
        if(this.$session.get('jwt')==null){
        this.$router.push('Home');
      }
      this.form.userName=this.$session.get('userid');
     console.log(this.$session.get('jwt'));
      this.resetingForm();
      
    },
    methods: {
        resetingForm(){
        this.userid=this.$session.get('userid');
            // this.s1="http://localhost:8000/uploads/"+this.form.userName+ ".png"
            this.previewImage="http://localhost:8000/uploads/"+this.userid+ ".png";
            
            // this.previewImage1="http://localhost:8000/uploads/images/cover/"+this.form.userName+ ".png";
            
            this.$http.get('http://localhost:8000/api/getProfileData/'+this.userid,{
                headers: {
                'Authorization': 'Bearer ' + this.$session.get('jwt')
                }
            }
          ).then(response => {
               // console.log(response.body)
               this.pimage=response.body.pimage;   
                this.form.email=response.body.email;
                this.form.Fname=response.body.Fname;
                this.form.Lname=response.body.Lname;
                // this.form.userName=response.body.userName;
                this.form.userName=this.$session.get('userid');
                this.form.contactNumber=response.body.contactNumber;
               this.form.std1=response.body.std1;
                this.form.std2=response.body.std2;
                this.form.wat=response.body.wat;
                this.form.facebook=response.body.facebook;
                this.form.youtube=response.body.youtube;
                this.form.linkedin=response.body.linkedin;
                this.form.info=response.body.info;
               console.log(response.body.pimage);

            }, response => {
                // error callback
            });

        },
         uploadImage(e){
                const image = e.target.files[0];
                this.pimage=e.target.files[0];
                const reader = new FileReader();
                reader.readAsDataURL(image);
                reader.onload = e =>{
                    this.previewImage = e.target.result;
                    
                    console.log(this.previewImage);
                };
            },
          
      onSubmit(evt) {
        evt.preventDefault()
       // alert(JSON.stringify(this.form))
        this.form.userid=this.$session.get('userid');
        this.form.usercarrer=this.$session.get('usercareer')
        console.log('this is my yser '+this.form.usercarrer)
         this.$http.post('http://localhost:8000/api/profileEdit', this.form
         ,{
             headers: {
            'Authorization': 'Bearer ' + this.$session.get('jwt')
          }
         }).then(function (response) {
           //  alert("done");
             console.log(response.body);
              
          }, function (err) {
            console.log('err', err)
            this.errorAnabile=true;

          })

            var formData = new FormData();

       
              formData.append('pimage', this.pimage);
              formData.append('userName', this.$session.get('userid'));  

           this.$http.post('http://localhost:8000/api/imageUpload', formData ,{
             headers: {
            'Authorization': 'Bearer ' + this.$session.get('jwt')
          }}).then(function (response) {
            // alert("done");
             console.log(response.body);
              
          }, function (err) {
            console.log('err', err)
            // this.errorAnabile=true;

          })
           this.$router.push('Profile');

      },
      onReset(evt) {
        evt.preventDefault()
        this.resetingForm();
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    }
  }
</script>

<style scoped>

.mainContainer{
    padding-left:47px;
    padding-top:40px;
}
.formDetails{
    padding-top: 5px;
    padding-left:0px;
}

.imageContainer{
    margin-top:30px;
    margin-bottom: 30px;
    margin-left: 40%;
}

.imageContainer img {
    height: 120px;
    width: 120px;
  border-radius: 50%;
  
}

.uploading-image{
     /* display:flex; */
   }
</style>