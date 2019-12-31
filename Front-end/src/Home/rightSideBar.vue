<template>
   <!-- <b-container fluid class="main"> -->
        <div class="side" style="">
            <br>
        <div class="container"  id="b1" style="margin-top: -7px;">
            
            <!-- <b-button style="margin-top:0px;"  class="font-weight-bold" block variant="primary">Ask A Quation</b-button> -->
        </div>
        <hr style="height:3px; background-color: #f2f2f2; margin-top: 1%; margin-bottom: 0%;">
        <div class="second" style="padding-top:14px;">
            
                    <b-container  class="bv-example-row text-center">
            <b-row  id="statusRow" >
                <vue-cal class="vuecal--rounded-theme vuecal--green-theme"
         xsmall
         hide-view-selector
         :time="false"
         default-view="month"
         :disable-views="['week']">
</vue-cal>
                <!-- <b-col style="color: blue;" id="col1">
                    <p style="margin-bottom:0px; font-size: 13px">Questions</p>
                    <h2 style="color: black;"   >24</h2>
                </b-col>
                <b-col style="color: red;" id="col1">
                    <p style="margin-bottom:0px; font-size: 13px" >Anwers</p>
                    <h2  style="color: black;" >124</h2>
                </b-col>
                <div class="w-100"></div>
                <b-col style="color: green;" id="col1">
                    <p style="margin-bottom:0px; font-size: 13px">Best Answers</p>
                    <h2  style="color: black;" >2</h2>
                </b-col>
                <b-col style="color: blue;" id="col1">
                    <p style="margin-bottom:0px; font-size: 13px"   >Users</p>
                    <h2  style="color: black;" >34</h2>
                </b-col> -->
            </b-row>
        </b-container>
        <br><br>
        <!-- <hr style="height:3px; background-color: #f2f2f2; "> -->
        <b-container>
            <b-row  style=" margin: auto; height: 32px;   ">
                 <!-- <b-row > -->
                    <b-col class="text-center col6" cols="4"  @click="clickedcol6" :class="{ col6Clicked: col6IsActive }" >Teacher</b-col>
                    <b-col class="text-center col7" cols="4"  @click="clickedcol7" :class="{ col7Clicked: col7IsActive }">Student</b-col>
                <!-- </b-row> -->
                <!-- <b-col>Populer</b-col>
                <b-col>Answer</b-col> -->
            </b-row>
            <b-row style=" background-color: white; border-color:rgb(212, 209, 209); border-top-style:solid; border-width: thin;">
                <b-container v-if="col6IsActive">
                   <b-container class="cmCard">
                      <b-row class="" style="margin-top:10px; margin-right:-35px;">
                           <b-col cols="1" style=" padding-left:1px; padding-right:1px; ">
                               <img class="avatar1" src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                           </b-col>
                       <b-col cols="10" >
                          
                              <p id="p1" style="font-size: 13px;  font-weight:bold;">
                               Send Feedback to students
                                
                           </p>
                           <b-row>
                               <b-col cols="1">
                               <i class="material-icons" style="font-size: 15px !important;">
                                message
                                </i>
                           </b-col>
                           <b-col id="p11" cols="6" style="font-size: 12px;">
                              
                           </b-col> 
                           </b-row>
                          
                        
                           
                       </b-col>
                      </b-row>
                   </b-container>
                   <hr style="height:1px; background-color: #f2f2f2;  margin-bottom: 0%;">
                <b-container class="cmCard">
                      <b-row class="" style="margin-top:4px; margin-right:-35px;">
                           <b-col cols="1" style=" padding-left:1px; padding-right:1px; ">
                               <img class="avatar1" src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                           </b-col>
                       <b-col cols="10" >
                          
                              <p id="p1" style="font-size: 13px;  font-weight:bold;">
                               View recent Activities
                                
                           </p>
                           <b-row>
                               <b-col cols="1">
                               <i class="material-icons" style="font-size: 15px !important;">
                                remove_red_eye
                                </i>
                           </b-col>
                           <b-col id="p11" cols="6" style="font-size: 12px;">
                             
                           </b-col> 
                           </b-row>
                         
                        
                           
                       </b-col>
                      </b-row>
                      <br>
                   </b-container>
                </b-container>
                <b-container v-if="col7IsActive">
                    <b-container class="cmdCard">
                      <b-row class="" style="margin-top:12px; padding-right:0px;">
                           <b-col cols="1" style=" padding-left:1px; padding-right:1px; ">
                               <img class="avatar1" src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                           </b-col>
                       <b-col cols="10" style=" padding-left:25px;">
                           <!-- <a href="#" style="color: black;"> -->
                              <b-row style=" padding-bottom: 1px">
                                  <p  style="font-size: 13px; margin-bottom: 0px">
                              Get Feedback from teachers
                             
                             </p>
                              </b-row>
                          
                           <!-- </a> -->
                        
                           
                       </b-col>
                      </b-row>
                   </b-container>
                   <b-container class="cmdCard">
                      <b-row class="" style="margin-top:12px; padding-right:0px;">
                           <b-col cols="1" style=" padding-left:1px; padding-right:1px; ">
                               <img class="avatar1" src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                           </b-col>
                       <b-col cols="10" style=" padding-left:25px;">
                           <!-- <a href="#" style="color: black;"> -->
                              <b-row style=" padding-bottom: 1px">
                                  <p  style="font-size: 13px; margin-bottom: 0px">
                             View Results
                              
                             </p>
                              </b-row>
                           
                           <!-- </a> -->
                        
                           
                       </b-col>
                      </b-row>
                   </b-container>
                   <b-container class="cmdCard">
                      <b-row class="" style="margin-top:12px; padding-right:0px;">
                           <b-col cols="1" style=" padding-left:1px; padding-right:1px; ">
                               <img class="avatar1" src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                           </b-col>
                       <b-col cols="10" style=" padding-left:25px;">
                           <!-- <a href="#" style="color: black;"> -->
                              <b-row style=" padding-bottom: 1px">
                                  <p  style="font-size: 13px; margin-bottom: 0px">
                              View attendance
                          
                             </p>
                              </b-row>
                          
                           <!-- </a> -->
                        
                           
                       </b-col>
                      </b-row>
                   </b-container>
                   <br>
                </b-container>
            </b-row>
          
        </b-container>
        
            <hr style="height:3px; background-color: #f2f2f2; margin-bottom: 0%; margin-top: 0%; ">
        <b-container style="background-color:white;">
            <b-row style=" padding-top:15px;">
            <b-col cols="1">
                <i class="material-icons"> help_outline </i>
            </b-col>
            <b-col cols="10">
                <h5 style=" font-weight:bold;">Feedbacks About The System</h5>
            </b-col >
        </b-row>

        <b-container class="cmCard">
                      <b-row class="" style="margin-top:4px; margin-right:-35px;">
                           <b-col cols="1" style=" padding-left:1px; padding-right:1px; ">
                               <img class="avatar1" src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                           </b-col>
                       <b-col cols="10" >
                           <a href="#" style="color: black;">
                              <p id="p1" style="font-size: 13px;  font-weight:bold;">
                              This system was really usefull for me to keep track of my son.Also 
                              an awesome way to get feedbacks from teachers.
                                
                           </p>
                           <b-row>
                               <b-col cols="1">
                               <i class="material-icons" style="font-size: 15px !important;">
                                message
                                </i>
                           </b-col>
                           <b-col id="p11" cols="6" style="font-size: 12px;">
                                <!-- <span style="font-size: 12px; padding:auto"> -->
                               Parent
                           <!-- </span> -->
                           </b-col> 
                           </b-row>
                           </a>
                        
                           
                       </b-col>
                      </b-row>
                   </b-container>
                <b-container class="cmCard">
                      <b-row class="" style="margin-top:4px; margin-right:-35px;">
                           <b-col cols="1" style=" padding-left:1px; padding-right:1px; ">
                                <img class="avatar1" src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                           </b-col>
                       <b-col cols="10" >
                           <a href="#" style="color: black;">
                              <p id="p1" style="font-size: 13px;  font-weight:bold;">
                              This system help me to keep track of my students, because by using this system
                              i can evalute each and every student in my class
                                
                           </p>
                           <b-row>
                               <b-col cols="1">
                               <i class="material-icons" style="font-size: 15px !important;">
                                message
                                </i>
                           </b-col>
                           <b-col id="p11" cols="6" style="font-size: 12px;">
                                <!-- <span style="font-size: 12px; padding:auto"> -->
                              Teacher
                           <!-- </span> -->
                           </b-col> 
                           </b-row>
                           </a>
                        
                           
                       </b-col>
                      </b-row>
                   </b-container>
                   <br>
                

        </b-container>
        <hr style="height:3px; background-color: #f2f2f2; margin-bottom: 0%; margin-top: 0%;">
        <b-container  style="background-color:white;">
                <b-row style=" padding-top:15px;">
                <b-col cols="1">
                    <i class="material-icons"> people</i>
                </b-col>
                <b-col cols="10">
                    <h5 style=" font-weight:bold;">Current Members</h5>
                </b-col >
            </b-row>
 <!-- asjdbkjasbdjkjasbdkjabsdkjbajsbdkajsbdkjas -->
            <b-container fluid="" class="profileCard">
                <br>
                    <b-row>
                        <b-col cols="3" >
                            <img class="avatar" src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                        </b-col>
                   <b-col cols="9">
                             
                            
                    
                <div class="imContainer" >
                    <div class="tcel2" >
                        <a href="#">
                        <p style=" font-weight:bold; margin-top:-10px; padding-bottom:0px; margin-bottom:0px;">Teachers</p>
                        <b-row style="width:100%;  padding-bottom:0px; margin-bottom:-18px">
                            <b-col  style=" padding-right:0px; "> <p id="b21" style="font-size: 12px;"> </p> </b-col>
                            <b-col  style=" padding-left:0px; "><p id="b21" style="font-size: 12px;"></p></b-col>
                        </b-row>
                        <span class="label label-primary" style="background-color:blue; padding-left:5px;padding-right:5px; color:white; font-size: 12px">3</span>
                    </a>

                    </div>
                    
                
                </div>
                   </b-col>
                    </b-row>
            </b-container>
          
            <hr style="height:0.5px; background-color: #f2f2f2; margin-bottom: 2%; margin-top: 4%;">
              <b-container fluid="" class="profileCard">
                <br>
                    <b-row>
                        <b-col cols="3" >
                            <img class="avatar" src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                        </b-col>
                   <b-col cols="9">
                             
                            
                    
                <div class="imContainer" >
                    <div class="tcel2" >
                        <a href="#">
                        <p style=" font-weight:bold; margin-top:-10px; padding-bottom:0px; margin-bottom:0px;">Students</p>
                        <b-row style="width:100%;  padding-bottom:0px; margin-bottom:-18px">
                            <b-col  style=" padding-right:0px; "> <p id="b21" style="font-size: 12px;"></p> </b-col>
                            <b-col  style=" padding-left:0px; "><p id="b21" style="font-size: 12px;"></p></b-col>
                        </b-row>
                        <span class="label label-primary" style="background-color:blue; padding-left:5px;padding-right:5px; color:white; font-size: 12px">20</span>
                    </a>

                    </div>
                    
                
                </div>
                   </b-col>
                    </b-row>
            </b-container>
             <hr style="height:0.5px; background-color: #f2f2f2; margin-bottom: 2%; margin-top: 4%;">
              <b-container fluid="" class="profileCard">
                <br>
                    <b-row>
                        <b-col cols="3" >
                            <img class="avatar" src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                        </b-col>
                   <b-col cols="9">
                             
                            
                    
                <div class="imContainer" >
                    <div class="tcel2" >
                        <a href="#">
                        <p style=" font-weight:bold; margin-top:-10px; padding-bottom:0px; margin-bottom:0px;"></p>
                        <b-row style="width:100%;  padding-bottom:0px; margin-bottom:-18px">
                            <b-col  style=" padding-right:0px; "> <p id="b21" style="font-size: 12px;"></p> </b-col>
                            <b-col  style=" padding-left:0px; "><p id="b21" style="font-size: 12px;"></p></b-col>
                        </b-row>
                        <!-- <span class="label label-primary" style="background-color:orange; padding-left:5px;padding-right:5px; color:white; font-size: 12px"></span> -->
                    </a>

                    </div>
                    
                
                </div>
                   </b-col>
                    </b-row>
            </b-container>
            <br>
            
        </b-container>

         <hr style="height:3px; background-color: #f2f2f2; margin-bottom: 0%; margin-top: 0%;">

         <b-container style="background-color:white">
              <b-row style=" padding-top:15px;">
            <b-col cols="1">
               <!-- <i class="material-icons">bookmark</i> -->
            </b-col>
            <b-col cols="10">
                <!-- <h5 style=" font-weight:bold;">Trending Tags</h5> -->
            </b-col >
        </b-row>
        <b-row>
            <b-container style="padding-left:29px; padding-right:25px">
                <b-row>
                     <!-- <b-col id="bb1"><b-button id="bc1" size="sm" variant="outline-primary">Java</b-button></b-col>
                  <b-col id="bb1"><b-button id="bc1" size="sm" variant="outline-primary">Python</b-button></b-col>
                   <b-col id="bb1"><b-button id="bc1" size="sm" variant="outline-primary">c++</b-button></b-col>
                    <b-col id="bb1"><b-button id="bc1" size="sm" variant="outline-primary">Marga</b-button></b-col>
                     <b-col id="bb1"><b-button id="bc1" size="sm" variant="outline-primary">People</b-button></b-col>
                      <b-col id="bb1"><b-button id="bc1" size="sm" variant="outline-primary">Hart</b-button></b-col>
                       <b-col id="bb1"><b-button id="bc1" size="sm" variant="outline-primary">Love</b-button></b-col>
                        <b-col id="bb1"><b-button id="bc1" size="sm" variant="outline-primary">JavaScript</b-button></b-col> 
                         <b-col id="bb1"><b-button id="bc1" size="sm" variant="outline-primary">Vue</b-button></b-col>
                  <b-col id="bb1"><b-button id="bc1" size="sm" variant="outline-primary">Node</b-button></b-col>
                   <b-col id="bb1"><b-button id="bc1" size="sm" variant="outline-primary">loop</b-button></b-col>
                    <b-col id="bb1"><b-button id="bc1" size="sm" variant="outline-primary">trink</b-button></b-col>
                     <b-col id="bb1"><b-button id="bc1" size="sm" variant="outline-primary">Button</b-button></b-col>    -->
                </b-row>
            </b-container>
           
            
            
        </b-row>
          <br><br><br><br>
         </b-container>
       
        
            
        </div>
       
    </div>
   <!-- </b-container> -->
</template>
<script>
import VueCal from 'vue-cal'
import 'vue-cal/dist/vuecal.css'

export default {
     components: { 'vue-cal': VueCal },
    data(){
        return{
            col6IsActive:true,
            col7IsActive:false,
            mainProps: { blank: true, blankColor: '#777', width: 20, height: 20, class: 'm1' }
        }
    },
    methods:{
        clickedcol6(){
            this.col6IsActive=true;

            this.col7IsActive=false;
        },
        clickedcol7(){
            this.col7IsActive=true;
            this.col6IsActive=false;
        }
    }
}
</script>

<style scoped>
.imContainer{
    display: table;
    /* border-style: solid; */
    width: 180px;
    
}

.tcel1{
    display: table-cell;
     background-color: red;
    display: table-cell;
     border-style: solid;
    /* margin-right: 10px; */
    
}

.tcel2{
    /* margin-top: 110px; */
    padding-top:0px;
    
   
}


#b21{
    color:black;
}
#b21:hover{
    color: blue;
    


}

#p12{
    color: black;
}
#p12:hover{
    color: blue;
}
#p11:hover { color: blue;}
#p1:hover { color: blue;}
/* anker tag */

a:hover {
  color: blue;
  text-decoration: none;
}
#statusRow{
   
    width: 100%; 
    
    /* background-color: blue; */
    margin: auto;
    
    /* border-style: solid; */

    /* padding: 5px; */
}
.main{
    width: 100%;
    
    
}
#col1{
    border-style: solid;
    border-color:  #f2f2f2; 
    background-color: white;
    border-style: solid;
    


    margin: -1px;
    height: 80px;
    /* padding: opx; */
}

#b1{
    padding-bottom: 15px;
}
.col6{
    background-color: #f7f8f7;
     
    border-style:solid;
     
     padding-top:2px;
     border-width: 0.7px;
     border-right: none;
     border-bottom: none;
     border-color:rgb(212, 209, 209);;
     /* padding-right: 12px; */
  
    /* border-style: solid; */
    /* padding: auto; */
}
.col6:hover{
    color: blue;
}

.col7:hover{
    color: blue;
}
.col6Clicked{
    background-color:white;
    border-bottom-color: white;
    box-shadow: 0px 8px 0px white;
    


}
.col7{
    background-color: #f7f8f7;
   
    border-style:solid;
     /* border-bottom: none; */
     padding-top:2px;
     border-width: 0.7px;
     border-bottom: none;
       border-color:rgb(212, 209, 209);

     /* padding-right: 12px; */
  
    /* border-style: solid; */
    /* padding: auto; */
}
.col7Clicked{
    background-color:white;
    border-bottom-color: white;
    box-shadow: 0px 8px 0px white;
    


}
.second{
    
    background-color:#f7f8f7;
    
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

.avatar1 {
    height: 25px;
    width: 25px;
    display: block;
    border-radius: 25px;
    /* padding: 3px; */
    
    /* box-sizing: border-box; */
    /* background-color: white; */
    /* border: 2px solid blue; */
}

#bb1{
    padding: 3px;
}
#bc1{
    border-color: black;
    color: black;
    padding:1px 4px 1px;
}


</style>

