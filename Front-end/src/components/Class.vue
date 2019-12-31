<template>
    <div>


  <br>
  <br>
  
   <h3>
         <font face = "Times New Roman" style="font-weight: bold;font-style:italic;padding-left:40px"  color = "blue" size = "5">REGISTERED CLASSES</font><br />

       </h3>
   

   <router-view></router-view>

    </div>
</template>




<script>
import { METHODS } from 'http';
export default {
    data(){
        return {
            users:[]
        }
    },
    methods:{

    hello(){
    console.log('hello')
     this.$http.get('http://127.0.0.1:8000/api/user/C071')
    .then(function(response){
     this.users=response.body.users;
    
           });
  }

    }
}
</script>
