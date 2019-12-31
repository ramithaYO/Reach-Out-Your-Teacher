<template>
    <div>
        <!-- <nav-bar></nav-bar> -->
        <div id="headerRow">
            <profile-header v-if="ProfileHeader" ></profile-header>
        <div v-if="!profileChange" id="topRaw" class="b-row" style="color:white;">
            {{windowWidth}}
            inta :{{inta}}
            intb:{{intb}}
          
            <b-button  variant="primary" type="submit">SignUp</b-button>
        </div>
        </div>

        <div id="containerTop" class="container-fluid">
            <div class="row">
                <div v-if="windowWidth>=1170" id="abc" class="col-xs-12 col-md-2 "  fixed="left" style="padding-left:27px">
                    
                        <side-Bar v-on:scroll="handleScroll" id="sideBar12" v-bind:class="{'sticky':isStickey}" ></side-Bar>
                          
                    
                </div>
                <div v-bind:class="{ 'col-md-8': isActive }" id="Lside" class="col-xs-6 col-md-7" >
                
                          <router-view></router-view>
                       
                    
                </div>
                <div v-bind:class="{ 'col-md-4': isActive }" id="Lside1" class="col-xs-12 col-md-3">
                   
                        <rightSide-Bar   id="Lside34"></rightSide-Bar>
                         
                    
                </div>
                
            </div>
        </div>

  <f-fut id="cca"></f-fut>

        
    </div>
</template>

<script>
$(document).ready(function(){
$(window).scroll(function () {   
   
 if($(window).scrollTop() > $("#headerRow").height()+170) {
    $('#sideBar12').css('position','fixed');
    $('#sideBar12').css('top','0'); 
 }

 else if ($(window).scrollTop() <= $("#headerRow").height()+170) {
    $('#sideBar12').css('position','');
    $('#sideBar12').css('top','');
 }  
    if ($('#sideBar12').offset().top + $("#sideBar12").height() > $("#cca").offset().top) {
        $('#sideBar12').css('top',-($("#sideBar12").offset().top + $("#sideBar12").height() - $("#cca").offset().top));
    }


});
});



import sideBar from "./sideBar"
import rightSideBar from "./rightSideBar"
import middleBar from "./MiddleCol"
import navBar from "../NavBar/navBar"
import footer1 from "../Footer/footer"
import profileHeader from '../Profile/ProfileHeader'
export default {
    components:{
        'side-Bar':sideBar,
        'rightSide-Bar':rightSideBar,
        'middle-Bar':middleBar,
        'nav-bar':navBar,
        'f-fut':footer1,
        'profile-header':profileHeader
    },
     data() {
    return {
      isActive:true,
      isStickey:false,
      offSetTOP:0,
      windowWidth:0,
      txt: '',
      inta:0,
      intb:0,
      top:'',
      profileChange:true,
      ProfileHeader:false,
    }
  },
  methods:{
      handleScroll (event) {
      // Any code to be executed when the window is scrolled
       var side=$('#sideBar12');

     
    },
    offSetup(){

    },
    splitingName(value){
        var array=value.split('/');
        for (let index = 0; index < array.length; index++) {
            if(array[index]=="Profile"){
                return true;
            }
            
        }
        return false;
    }
  },

  watch: {
   
    windowWidth(newWidth, oldWidth){
       // this.windowWidth=100;
       if(this.windowWidth>1170){
           this.isActive=false;
       }else{
           this.isActive=true;
       }
    },
    '$route'(to,from){
        this.profileChange=(this.$session.get('jwt')!=null);
        this.ProfileHeader=this.splitingName(to.path);
        //console.log("alksdlaksnd==="+)

     
    }
  },
   
 created(){
    // this.windowWidth= screen.width;
    
      if(this.$session.get('jwt')==null){
          this.$router.push('/test');
      }
    
    window.addEventListener('scroll', this.handleScroll);
     this.profileChange=(this.$session.get('jwt')!=null);
     this.ProfileHeader=this.splitingName(this.$route.path);
     
 },
  mounted() {


      
    this.windowWidth=window.innerWidth;
    this.$nextTick(() => {
      window.addEventListener('resize', () => {
        this.windowWidth=window.innerWidth
      });
    })
  },
  destroyed () {
    window.removeEventListener('scroll', this.handleScroll);
  }
}
</script>


<style scoped>

.sticky{
    position: fixed;
    /* top:0; */
}

#Lside{
    background-color: white;
    padding-left: 0px;
    padding-right: 0px;
    
    
    
}
 /* #ppc{
        width: 100%;
    } */

#topRaw{
    height: 240px;

    background-image: url("https://picsum.photos/200/300?image=0");
}
#containerTop{
    width: 98%;
}

@media screen and (max-width: 766px) {
    
    #ppc{
        width: 100%;
    }
    #abc{
        display: none;
    }
    #containerTop{
    width: 100%;
}
    #Lside1{
         padding-left: 0px;
    padding-right: 0px;
    }
}
@media screen and (max-width: 1000px) {
    
   #abc{
        display: none;
    }
    
    #containerTop{
  /* /  border-style: solid; */
    width: 100%;
    
    }

    /* .col-md-3{
          border-style: solid;
          border-color: blue;
          width: 225%;
    }
    .col-md-7{

    } */
     
}
</style>
