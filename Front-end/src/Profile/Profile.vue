<template>
    <div>
      <br>
      <br>
      <br>

         <h3>
         <font face = "Times New Roman" style="font-weight: bold;font-style:italic;padding-left:40px"  color = "black" size = "5">SETTINGS</font><br />

       </h3>
         <router-view></router-view>
    </div>
</template>

<script>
export default {
    methods:{
        get2(){
         // this.$http.headers.common['Authorization'] = 'Bearer ' + this.token12;
        //  console.log(this.$session.get('jwt'))
            this.$http.get('http://localhost:8000/api/userDetails',{
          headers: {
            'Authorization': 'Bearer '+this.$session.get('jwt')
          }

            }).then(response => {

              // get body data
              console.log(response.body);

            }, response => {
              // error callback
            });
        },
        get3(){
          
        console.log(this.$session.get('userid'))
        console.log(this.$session.get('usercareer'))
    }
    },
    created(){
        if(this.$session.get('jwt')==null){
             this.$router.push('/Main/Home')
        }
       
    },
    

}
</script>

