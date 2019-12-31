<template>
 <div>
     
        <div  v-if="!profileChange">
        <sing-In :isActive="change" @val="listn"></sing-In>
        <sign-Up :isActive1="change1" @val1="listn1" v-on:clickedSomething="LoginConfirm"></sign-Up>
        
        <b-navbar toggleable="lg" type="dark" variant="dark">
        <b-navbar-brand href="#">REACH OUT YOUR TEACHER</b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
          

            <!-- Right aligned nav items -->
            <b-navbar-nav class="ml-auto">
         
            <b-nav-item>
                <b-button  @click="change=true">Sign up</b-button>
                <b-button @click="change1=true" variant="info">Sign in</b-button>
            </b-nav-item>

            
            </b-navbar-nav>
        </b-collapse>
        </b-navbar>
    </div>
 </div>
</template>

<script>
import signIn from '../Models/TMSingin'
import signUp from '../Models/TMsinUp'
export default {
    components:{

    'sing-In':signIn,
    'sign-Up':signUp
  },
  methods:{
      listn(){
          this.change=false;
      },
      listn1(){
          this.change1=false;
      },
      LoginConfirm(b1){
          this.AuthonIn=b1;
      }

  },
 
  data(){
      return{
          change:false,
          change1:false,
          AuthonIn:false,
           profileChange:true,
         // listn:0
      }
  },
  watch:{
    
    '$route'(to,from){
        this.profileChange=(this.$session.get('jwt')!=null);
     
    }


  },
    created(){
      this.profileChange=(this.$session.get('jwt')!=null);
    //(this.$session.get('jwt')==null),
    }

}
</script>

