<template>
    <div>
     
      <div id="myNav" v-bind:class="{'aset':iset, 'anset':!iset }"  class="overlay">
  <a  class="closebtn" @click="closeNav">&times;</a>
  <div class="overlay-content">
    <a href="#">About us</a>
    <a href="#">Contact Us</a>
  </div>
</div>
<div>
  <b-navbar toggleable="lg" type="dark"  style=" background: black;height:100px;" id="fixed">
     <span style="font-size:30px;cursor:pointer" @click="openNav" class="drop">&#9776;</span>
    
        
    <b-navbar-brand href="#" class="icon">
    
      
  
         <font face = "Times New Roman" style="font-weight: bold;font-style:italic"  color = "white" size = "3">  {{name}}</font><br />

       
      </b-navbar-brand>
    <b-navbar-brand href="#" class="icon2">{{name1}}</b-navbar-brand>

      
     
     
      <b-navbar-nav  style="font-weight:bold;padding-left:150px;" class="dropeleme">
        <b-nav-item href="#"><span style="color:white">About us</span></b-nav-item>
        <b-nav-item href="#"><span style="color:white">Contact us</span></b-nav-item>
     
      </b-navbar-nav>




      <b-navbar-nav class="ml-auto searchbar" style="padding-right:30px;">
        <div style="padding-bottom:29px;" >
      
</div>

        
      </b-navbar-nav>
    



    
    <b-navbar-nav class="rightelement">
      <b-row  >
<!-- <b-nav-item-dropdown  id="rightbox" class="btn btn-secondary dropdown-toggle" no-caret> -->
      <b-dropdown id="dropdown-dropleft"   variant="dark" class="m-2 drop1" no-caret >
   <template slot="button-content" ><em>
     <b-row >
      <b-col style="padding-top:9px">
        <img src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="rounded-circle " alt="Tiger" 
            width="25" height="25">
      </b-col>
     <b-col id="name" style="padding-left:0px">
<span style="font-size:9px">  welcome  </span>
<br>
{{username}}
     </b-col>
     </b-row>
      
     </em></template>
    <b-dropdown-item @click="userprofile">User Profile</b-dropdown-item>
    <b-dropdown-item @click="userprofile">Edit Profile</b-dropdown-item>
    <b-dropdown-item @click="logout">Log out</b-dropdown-item>
  </b-dropdown>




       <b-dropdown id="dropdown-dropleft" dropleft  variant="dark" class="m-2 drop2" no-caret >
   <template slot="button-content" ><em>
     <b-row >
      <b-col style="padding-top:9px">
        <img src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="rounded-circle " alt="Tiger" 
            width="25" height="25">
      </b-col>
     <b-col id="name" style="padding-left:0px">
<span style="font-size:9px">  welcome  </span>
<br>
{{username}}
     </b-col>
     </b-row>
      
     </em></template>
    <b-dropdown-item @click="userprofile">User Profile</b-dropdown-item>
    <b-dropdown-item @click="userprofile">Edit Profile</b-dropdown-item>
    <b-dropdown-item @click="logout">Log out</b-dropdown-item>
  </b-dropdown>
    
    <div id="ex4" right style="padding-top:10px">
  <span class="p1 fa-stack fa-2x has-badge" data-count="14">
    <!--<i class="p2 fa fa-circle fa-stack-2x"></i>-->
    <i class="p3 fa far fa-bell fa-stack-1x xfa-inverse " style="font-size:20px;color:gray" data-count="4b"></i>
  </span>
</div>

      </b-row>
     




    
    </b-navbar-nav>
  </b-navbar>
</div>



        
    </div>
</template>

<script>

export default {
  data(){
    return{
      iset:false,
      name:'REACH OUT YOUR TEACHER',
      name1:'ROUT',
      username:'',
    }
  },
 
  methods:{
    getfeedbacks(){
     console.log('this us ny feedac')
    },
   created() {
    this.$http.get('http://localhost:8000/api/getusernamen/'+this.$session.get('userid')+'/'+this.$session.get('usercareer'),{
             headers: {
            'Authorization': 'Bearer ' + this.$session.get('jwt')
          }}).then(function (response) {
            // alert("done");
             this.username=response.body.username;
              
          }, function (err) {
            console.log('err', err)
            // this.errorAnabile=true;

          })


   //////
    this.$nextTick(() => {
      window.addEventListener('resize', () => {
        this.windowWidth=window.innerWidth
      });
    })
  },
    userprofile(){
       this.$router.push('/Main/Profile')
    },
    logout(){
      this.$http.post('http://localhost:8000/api/userlogout',{}
         ,{
             headers: {
            'Authorization': 'Bearer ' + this.$session.get('jwt')
          }
         }).then(function (response) {
            this.$session.set('jwt',null)
              this.$session.set('userid',null)
              this.$session.set('usercareer',null)
              this.$router.push('/test')
              
          }, function (err) {
            console.log('err', err)
            this.errorAnabile=true;

          })
    },
    openNav(){
      this.iset=true;
    }
    ,closeNav(){
      console.log('sjdbfkjsbadkjfbskjdjbfksdbk')
      this.iset=false;
    }

  }
}
</script>



<style scoped>
.aset{
  display: '';
}

.anset{
  display: none;
}
.overlay {
  height: 100%;
  width: 300px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(125,125,125);
  background-color: rgba(125,125,125, 1);
  overflow-x: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;
  top: 5%;
  width: 100%;
  text-align: left;
  margin-top: 30px;
}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 18px;
  color: rgb(0,0,0);
  display: block;
  transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

.overlay .closebtn {
  position: absolute;
  top: 8px;
  right: 5%;
  font-size: 25px;
}

@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 835px;
  }
}
.icon{
  padding-left:20px;            
}
.rightelement{
  padding-right:20px;
 
}

 
  .img {
    /* display: block; */
    width: 80px;
    height: 80px;
    /* background: yellow; */
   
    }


.dropeleme1:hover{
background-color: red;
}
#ex4 .p1[data-count]:after{
  position:absolute;
  right:17%;
  top:14%;
  content: attr(data-count);
  font-size:30%;
  padding:.2em;
  border-radius:50%;
  line-height:1em;
  color: white;
  background:rgba(255,0,0,.85);
  text-align:center;
  min-width: 1em;

}
@media (min-width: 1285px){
.drop{
     display: none;
}
}
@media (max-width: 1285px){

.dropeleme{
   display: none;
}







}
@media (min-width: 986px){
.drop2{
  display: none;
 
}
}


@media (max-width: 986px){
  .drop1{
  display: none;
 
}
  .searchbar{
  display: none;
}
#name{
  display: none;
 
}
}

@media (max-width: 500px){
#ex4{
display: none;
}
.icon{
 
  padding-left:0px;
}

.rightelement{
  padding-right:0px;

}
}

@media (min-width: 400px){

.icon2{
 display: none;
 
}

}
@media (max-width: 400px){

.icon{
 display: none;
 
}

}
.dropdown-toggle::after {
    display:none;
}
    
    

</style>

