<template>
  <div id="app" >
    <!-- <b-container fluid> -->
           <s-Bar  v-if="available"></s-Bar>
          <!-- <t-test></t-test> -->
      <nav-Bar  v-if="!available"></nav-Bar>
    <!-- <button @click="change=true">click</button> -->
    <!-- <sing-In :isActive="change"></sing-In> -->
    <!-- <Home></Home> -->
    <router-view></router-view>
    <!-- <button @click="abcd">asdlas</button>
    {{inta}} -->
    <!-- <f-fut id="cca"></f-fut> -->
    <!-- <t-test></t-test> -->

    <!-- </b-container> -->
    <!-- <dir>
      <button @click="login()">Login</button>
      <button @click="set1()">Click1212</button>
      <button @click="get2()">dahsdh</button>
    </dir> -->
    
  </div>
</template>

<script>
import navBar from './NavBar/navBar'
import sBar from './NavBar/singinnav'
import signIn from './Models/TMSingin'
import Home from './Home/Home'
import test from './test'
import footer from './Footer/footer'

export default {
  components:{
    'nav-Bar':navBar,
    's-Bar':sBar,
    'sing-In':signIn,
    'Home':Home,
    't-test':test,
    'f-fut':footer
  },
  name: 'app',

  data () {
    return {
      authuntication:false,
     change:'false',
     inta :0,
     baba:0,
     token12:'',
     available:true
    }
  },
   watch:{
    
    '$route'(to,from){
        this.available=(this.$session.get('jwt')!=null);
     
    }


  },
 
    created(){
      this.available=(this.$session.get('jwt')!=null);
    //(this.$session.get('jwt')==null),
    },
  methods:{
    abcd(){
     this.inta= $("#cca").offset().top
    },
    login(){
      this.$http.post('http://localhost:8000/api/pp', {
            password: 'asd',
            email: 'asdas'
          }).then(function (response) {
            if (response.status === 200 && 'token' in response.body) {
              this.$session.start()
              this.$session.set('jwt', response.body.token)
              this.$http.headers.common['Authorization'] = 'Bearer ' + response.body.token
              console.log(this.$session);
              this.$router.push('/Main/Home')
            }
          }, function (err) {
            console.log('err', err)
          })
        },
        set1(){
           this.$http.post('http://localhost:8000/api/userLogin', {
            password: 'kanchi110',
            email: 'cba@gmail.com'
          }).then(function (response) {
            //console.log(response.body.success.token)
            if (response.status === 200 && 'success' in response.body) {
              this.$session.start()
              this.$session.set('jwt', response.body.success.token)
              this.token12=response.body.success.token;
              this.$http.headers.common['Authorization'] = 'Bearer ' + response.body.success.token
             //console.log("slada");
              this.$router.push('/Main/Profile')
            }
           // console.log(response.body.success.token);
          }, function (err) {
            console.log('err', err)
          })
        },
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
        }
    
  }
}
</script>

<style scoped>
.container-fluid {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
#app{
  background-color: #f2f2f2;
   width: 100%;
}
</style>
