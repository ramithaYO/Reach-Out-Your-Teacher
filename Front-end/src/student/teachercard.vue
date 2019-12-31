<template>
    <b-container fluid id="we" >
       
        <br>
        <dir v-for="u in users">
        <b-container fluid class="PbCard" style="background-color:#f2f2f2">
           
                    <b-container v-if="windowWidth>1011" style="margin-top:10px;">
                         <b-row>
                                <span class="rImage">
                                    <img class="avatar" src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                                </span>
                                <span>
                                        <p id="nameTxt">{{u.Name}}</p>
                                </span>

                                <span  style="margin-top:4px; margin-left:9px;">
                                    <p style="font-size: 12px; background-color:yellow; padding-left:3px; padding-right:3px;">Teacher</p>
                                </span>
                                <span class="setRow1" style="margin-top:4px; margin-left:9px;">
                                    <p style="color:gray; font-size: 11px; padding-left:3px; padding-right:3px;">started : April 19,2018 </p>
                                </span>
                    </b-row>
                    <br>
                    </b-container>

                    <div class="page1" v-if="windowWidth<=1011" >
                        <b-row>
                            <div class="tcel">
                                <img class="avatar" src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">  
                            </div>
                          
                            <div class="tcel2" style="padding-left:15px;">
                                    <b-row >
                                        
                                        <span>
                                            <p id="nameTxt">{{u.Name}}</p>
                                    </span>
                                    <span  style="margin-top:4px; margin-left:9px;">
                                        <p style="font-size: 12px; background-color:yellow; padding-left:3px; padding-right:3px;">Teacher</p>
                                    </span>
                                    </b-row>
                                    <b-row style="margin-top:0px; margin-bottom:-12px;
                                    ">
                                        <p style="color:gray; font-size: 11px; padding-top:0px; padding-right:3px;">started : April 19,2018</p>
                                        
                                    </b-row>
                                   
                                
                            </div>
                        </b-row>
                    </div>





                     
                     <div class="page">
                         
                         <div class="page-contant" >
                             <b-row>
                                 <b-col>
                                     <div>
  
</div>
                                       <!-- <p style="font-weight: bold; font-size: 19px;">Is this statement, “i see him last night” can be understood as “I saw him last night”?</p>
                                 <p>In my local language (Bahasa Indonesia) there are no verb-2 or past tense form as time tracker. So, I often forget to use the past form of verb when speaking english. I saw him last night (correct) I see him ...</p> -->
                                     
                                     
                                        teacher discriptopm    :  {{u.Description}}
                                        <br>
                                       contact number    : {{u.ContNo}}
                                        <br>
                                        
                                        
                                    <div class="tagpool">
                                       
                                        <b-button id="bu"  variant="outline-primary">english</b-button>
                                        <b-button id="bu"  variant="outline-primary">lanuage</b-button>
                                       
                                        
                                    </div>

                                  
                                    

                                 </b-col>
                             </b-row>
                         </div>
                     </div>

                 
        <!-- </b-row> -->
        
        </b-container>
        <br>
        </dir>
        <!-- end -->
 
        <!-- start -->
        <br>
    
        <!-- end -->
        <br><br><b></b>

 
    </b-container>
</template>


<script>
export default {
    data(){
        return{
             windowWidth:0,
             users:[],
             userid:16,
        }
    },
     mounted() {
        //  console.log(this.$route.params.id);
         this.windowWidth=window.innerWidth;
    this.$nextTick(() => {
      window.addEventListener('resize', () => {
        this.windowWidth=window.innerWidth
      });
    })
    
     this.$http.get('http://127.0.0.1:8000/api/teachers/'+this.userid,{
          headers: {
            'Authorization': 'Bearer '+this.$session.get('jwt')
          }

            })
    .then(function(response){
     this.users=response.body.users;
    
    
           });
  },
  watch:{
      windowWidth(newWidth, oldWidth){
          this.windowWidth=newWidth;

    }
  
  }
}
</script>









<style scoped>

#ank1:hover{
    text-decoration: none;
}
.rImage{
    margin-right: 7px;
    margin-left: 7px; 
}

.avatar {
    height: 50px;
    width: 50px;
    display: block;
    border-radius: 52px;
     padding: 3px;
    
    
    
    box-sizing: border-box;
    background-color: white;
    border: 2px solid blue;
}

#nameTxt{
    font-weight: bold;
    color: blue;
    font-size: 15px;
    
}

.page {
    margin-top: -20px;
  display: table;
  width: 100%;
}
.page-contant,
.sidebar {
  display: table-cell;
}

.sidebar {
  width: 67px;
}

#bu{
    font-size: 10px;
    font-weight: bold;
    color: gray;
    border-color: gray;
    padding: 3px;
}
#rowLabel{
    font-size: 14px;
    /* border-style: solid; */
    background-color: white;
    /* margin: 2px; */
    padding: 7px 10px 7px;
    margin: 7px ;
}
#iconsLabels{
    font-size: 17px;
    padding-top:4px;
    padding-right:3px;
}
#iconsLabels1{
    font-size: 17px;
    /* padding-top:4px; */
    /* padding-right:3px; */
}
#b1{
    background-color: black;
    color: white;
    border-color: black;
    font-weight: bold;
}
.tba{
    display: table;
    width: 112px;
}
.page1{
    display: table;
    margin-top:10px;
    margin-bottom: 7px;
    
}

.tcel1,
.tcel2,
.tcel{
    display:table-cell;
    /* border-style: solid; */
}

@media screen and (max-width: 500px)  {
 #b1{
     margin-top: 10px;
 }
}

</style>



