<template>
   <div>
       <b-form @submit="onSubmit" @reset="onReset" v-if="show">
       <b-container class="mainContainer">
          
           <div class="formDetails">
                <div class="formContaint">
                       <div>
                            
                            

                              <div class="imageContainer">
                                <img v-if="pimage!=null" :src="previewImage" class="uploading-image" />
                                <img v-if="pimage==null" src="" alt="" class="uploading-image">
                                
                                
                            </div>
                            <span>Profile Picture</span>
                            <b-form-group>
                                 <b-form-file
                                    v-model="file"
                                    @change=uploadImage
                                    :state="Boolean(file)"
                                    placeholder="Choose a file..."
                                    drop-placeholder="Drop file here..."
                                    >
                                 </b-form-file>
                            </b-form-group>
                            
                           

                            
                                
                           
            <img src="http://localhost:8000/uploads/16.png" alt="">

                            

                           

                        </div>
                   </div>
                   <b-row>
             
               
           </b-row>
           
             

               
    
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
          previewImage:'../images/img_avatar.png',
          previewImage1:'../images/img_avatar.png',
          currentUserName:'cba',
          file:'',
          file1:'',
          userValidate:false,
          pimage:null,
          cimage:null,
          s1:'',
          s2:'',

        
        
        show: true
      }
    },
     computed: {
      validation() {

        return true;
      }
    },
    created(){
        if(this.$session.get('jwt')==null){
        this.$router.push('Home');
      }
    //   this.form.userName=this.$session.get('userName');
     // this.form.userName='cba';
    //   this.resetingForm();
      
    },
    methods: {
        resetingForm(){
            this.s1="http://localhost:8000/uploads/images/DP/"+this.form.userName+ ".png"
            this.previewImage="http://localhost:8000/uploads/images/DP/"+this.form.userName+ ".png";
            
            console.log(this.$session.get('jwt'));
            this.previewImage1="http://localhost:8000/uploads/images/cover/"+this.form.userName+ ".png";
            
            this.$http.get('http://localhost:8000/api/getProfileData/'+this.form.userName,{
                headers: {
                'Authorization': 'Bearer ' + this.$session.get('jwt')
                }
            }
          ).then(response => {
               // console.log(response.body)
               this.pimage=response.body.pimage;
               this.cimage=response.body.cimage;
               
            //     this.form.email=response.body.email;
            //     this.form.Fname=response.body.Fname;
            //     this.form.Lname=response.body.Lname;
            //     this.form.userName=response.body.userName;
            //     this.form.country=response.body.country;
            //     this.form.city=response.body.city;
            //     this.form.contactNumber=response.body.contactNumber;
            //    this.form.std1=response.body.std1;
            //     this.form.std2=response.body.std2;
            //     this.form.wat=response.body.wat;
            //     this.form.facebook=response.body.facebook;
            //     this.form.youtube=response.body.youtube;
            //     this.form.twitter=response.body.twitter;
            //     this.form.linkedin=response.body.linkedin;
            //     this.form.vimeo=response.body.vimeo;
            //     this.form.insatagram=response.body.insatagram;
            //     this.form.pin=response.body.pin;
            //     this.form.info=response.body.info;
               

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
        
        //  this.$http.post('http://localhost:8000/api/profileEdit', this.form
        //  ,{
        //      headers: {
        //     'Authorization': 'Bearer ' + this.$session.get('jwt')
        //   }
        //  }).then(function (response) {
        //    //  alert("done");
        //      console.log(response.body);
              
        //   }, function (err) {
        //     console.log('err', err)
        //     this.errorAnabile=true;

        //   })

            var formData = new FormData();

             // formData.append('cimage', this.cimage);
              formData.append('pimage', this.pimage);
              formData.append('userName', 16);  

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
        // Reset our form values
        // this.form.email = ''
        // this.form.name = ''
        // this.form.food = null
        // this.form.checked = []
        // Trick to reset/clear native browser form validation state
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