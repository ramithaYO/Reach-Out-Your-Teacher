
<template>

  <div>
    <br>
    <br>

    <h3>
         <font face = "Times New Roman" style="font-weight: bold;font-style:italic;padding-left:40px"  color = "black" size = "5">SEARCH STUDENTS</font><br />

       </h3>
    <br>
    <br>
    <br>

    <b-form @submit="onSubmit" @reset="onReset"  style="font-weight: bold;font-style:italic;padding-left:40px;padding-right:40px" v-if="show">
    

      <b-form-group  id="input-group-2" label="Name:" label-for="input-2">
        <b-form-input
          style="font-style:italic"
          id="input-2"
          v-model="form.name"
          placeholder="Enter name"
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-3" label="Class (*)" label-for="input-3">
        <b-form-select
           style="font-style:italic"
          id="input-3"
          v-model="form.Class"
          :options="Classes"
          required
        ></b-form-select>
      </b-form-group>

     * required 
     <br>

      <b-button type="submit" variant="primary">Search</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
     
      
    </b-form>
 <div v-for="u in ClassStudent">
   {{u.StudentRegNo}}--  {{u.Address}}

 </div>
  </div>
</template>

<script>
import { constants } from 'fs';
  export default {
    data(){
      return { 
         myary:[],
          users:[],
        form: {
          name: '',
          Class: '',
           
        },
        Classes: [{ text: 'Select The Class', value: null }, ],
        classarry:[],
        classid:'',
        ClassStudent:[],
        show: true
      }
    },
   
    methods: {


      ggg(){
        this.myary=this.form.Class.split(' ');

        this.classid=this.classarry[this.myary[1]-1]
    //      if(this.form.name==' '){
    //      this.$http.get('http://127.0.0.1:8000/api/Clstudent/'+this.classid)
    // .then(function(response){
        
    //  this.ClassStudent=response.body.users;
    //        })
    //      }
    //      else{
    //         this.$http.get('http://127.0.0.1:8000/api/Clstudent/'+this.classid+'/'+this.form.name)
    // .then(function(response){
        
    //  this.ClassStudent=response.body.users;
    
    //        })

    //      }
     if(this.form.name==''){
         this.form.name=404;
     }
 
        this.$router.push('/Main/Student/card/'+this.classid+'/'+this.form.name)

        },
      onSubmit(evt) {

        evt.preventDefault()
        this.ggg()
       
      },
      onReset(evt) {
        evt.preventDefault()
        // Reset our form values
       
        this.form.name = ''
        this.form.Class = null
     
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      },
      
    },
    
   
    mounted () {

        this.form.Class = null


        this.$http.get('http://127.0.0.1:8000/api/Class/'+this.$session.get('userid'),{
          headers: {
            'Authorization': 'Bearer '+this.$session.get('jwt')
          }

            })
    .then(function(response){
        
     this.users=response.body.users;

     for (let index = 0; index < this.users.length; index++) {
            this.classarry.push(this.users[index].CID)
        }
  
      for (let index = 0; index < this.users.length; index++) {
      
            this.Classes.push('class '+(index+1))
        }
           })

 
}
   
  }
</script>