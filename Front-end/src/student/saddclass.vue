
<template>

  <div>
    <br>
    <br>

   
    <br>
    <br>
    <br>

    <b-form @submit="onSubmit" @reset="onReset" v-if="show">
    

      <b-form-group id="input-group-2" label="Name:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="form.cid"
          placeholder="Enter Class ID"
        ></b-form-input>
      </b-form-group>

   
     <br>

      <b-button type="submit" variant="primary">Search</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
     
      
    </b-form>
 <b-table stacked :items="items"></b-table>
  <b-button @click ="add" variant="primary">ADD</b-button>
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
           cid: '',
           userid:'',
        
        },
          items: [
        
        
        ],
        Classes: [{ text: 'Select The Class', value: null }, ],
        classarry:[],
        classid:'',
        ClassStudent:[],
        show: true
      }
    },
   
    methods: {
     add(){
      this.form.userid= this.$session.get('userid')
  
        this.$http.post('http://localhost:8000/api/saddclass', this.form ,{
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

      onSubmit(evt) {

        evt.preventDefault()
          this.form.Class = null


        this.$http.get('http://127.0.0.1:8000/api/findtheclass/'+this.form.cid,{
          headers: {
            'Authorization': 'Bearer '+this.$session.get('jwt')
          }

            })
    .then(function(response){
        
     this.users=response.body.results;
      for (let index = 0; index < this.users.length; index++) {
           console.log(this.users[index])
             this.items.push(this.users[index]);
        }
  
    
           })

       
      },
      onReset(evt) {
        evt.preventDefault()
        // Reset our form values
       
        this.form.cid = ''
     
     
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      },
      
    },
    
   
 
   
  }
</script>