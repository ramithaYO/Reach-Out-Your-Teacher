<template>
    <b-container id="abc" class="bv-example-row bv-example-row-flex-cols" style="margin-top:40px">

  <router-link class="home" to="/Main/Home" tag="b-row" active-class="clicked12">
       <span><i class="material-icons">home</i></span>
    <b-col class="font-weight-bold"> HOME</b-col>
  </router-link>
 
  <router-link v-if="profileChange" class="profile" to="/Main/Profile" tag="b-row" active-class="clicked12">
  <!-- <b-row class="assignment_ind"> -->
    <!-- <b-col align-self="start">One of three columns</b-col> -->
     <span><i class="material-icons">assignment_ind</i></span>
    <b-col class="font-weight-bold" align-self="center">PROFILE</b-col>
    <!-- <b-col align-self="end">One of three columns</b-col> -->
  <!-- </b-row> -->

  </router-link>
  
  
   <router-link class="student"  v-if="(usercar=='teacher')" to="/Main/Student" tag="b-row" active-class="clicked12">
  <!-- <b-row class="assignment_ind"> -->
    <!-- <b-col align-self="start">One of three columns</b-col> -->
    <span><i class="material-icons">folder</i></span>
    <b-col class="font-weight-bold" align-self="center">STUDENTS</b-col>
    <!-- <b-col align-self="end">One of three columns</b-col> -->
  <!-- </b-row> -->

  </router-link>
  <router-link class="teacher"  v-if="(usercar=='student')" to="/Main/Teacher" tag="b-row" active-class="clicked12">
  <!-- <b-row class="assignment_ind"> -->
    <!-- <b-col align-self="start">One of three columns</b-col> -->
    <span><i class="material-icons">folder</i></span>
    <b-col class="font-weight-bold" align-self="center">TEACHERS</b-col>
    <!-- <b-col align-self="end">One of three columns</b-col> -->
  <!-- </b-row> -->

  </router-link>
   <router-link class="clz"  v-if="(usercar=='teacher')" to="/Main/Class" tag="b-row" active-class="clicked12">
  <!-- <b-row class="assignment_ind"> -->
    <!-- <b-col align-self="start">One of three columns</b-col> -->
    <span><i class="material-icons">poll</i></span>
    <b-col class="font-weight-bold" align-self="center">CLASS</b-col>
    <!-- <b-col align-self="end">One of three columns</b-col> -->
  <!-- </b-row> -->

  </router-link>
    <router-link class="sclz" v-if="!(usercar=='teacher')" to="/Main/SClass" tag="b-row" active-class="clicked12">
  <!-- <b-row class="assignment_ind"> -->
    <!-- <b-col align-self="start">One of three columns</b-col> -->
    <span><i class="material-icons">poll</i></span>
    <b-col class="font-weight-bold" align-self="center">CLASS</b-col>
    <!-- <b-col align-self="end">One of three columns</b-col> -->
  <!-- </b-row> -->

  </router-link>
   <router-link class="help" to="/Main/help" tag="b-row" active-class="clicked12">
  <!-- <b-row class="assignment_ind"> -->
    <!-- <b-col align-self="start">One of three columns</b-col> -->
    <span><i class="material-icons">add_location</i></span>
    <b-col class="font-weight-bold" align-self="center">HELP</b-col>
    <!-- <b-col align-self="end">One of three columns</b-col> -->
  <!-- </b-row> -->

  </router-link>
  
</b-container>
    
</template>

<script>
export default {
  data(){
    return{
      profileChange:true,
      sestionToken:'',
      usercar:'',
    }
  },
  watch:{
    
    '$route'(to,from){
        this.profileChange=(this.$session.get('jwt')!=null);
     
    }


  },
    methods:{
      checkingSesion(){
      //  return ();
      }
    },
    created(){
      this.profileChange=(this.$session.get('jwt')!=null);
      this.usercar=this.$session.get('usercareer');
      console.log(this.usercar)
    //(this.$session.get('jwt')==null),
    }

}
</script>



<style scoped>

.clicked12{
  color: blue
}


.home:hover{
    color:blue 

}
.student:hover{
    color:blue 

}
.clz:hover{
    color:blue 

}
.help:hover{
    color:blue 

}
.profile:hover{
    color:blue 

}

.teacher:hover{
    color:blue 

}
.sclz:hover{
    color:blue 

}

</style>



