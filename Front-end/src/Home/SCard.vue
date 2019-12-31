

<template>
    <b-container fluid id="we">
      
       <br>
       <br>
       <br>
      
        <dir v-for="(u,index) in ClassStudent">
        <b-container fluid class="PbCard">
           
                    <b-container v-if="windowWidth>1011" style="margin-top:10px;">
                         <b-row>
                                <span class="rImage">
                                    <img class="avatar" src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                                </span>
                                <span>
                                        <p id="nameTxt">{{u.Name}} {{u.Lname}}</p>
                                </span>

                                <span  style="margin-top:4px; margin-left:9px;">
                                    <p style="font-size: 12px; background-color:yellow; padding-left:3px; padding-right:3px;">Student</p>
                                </span>
                             
                    </b-row>
                    <br>
                    </b-container>

                    <div class="page1" v-if="windowWidth<=1011">
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
                                        <p style="font-size: 12px; background-color:yellow; padding-left:3px; padding-right:3px;">Student</p>
                                    </span>
                                    </b-row>
                                 
                                
                            </div>
                        </b-row>
                    </div>





                     
                     <div class="page">
                         
                         <div class="page-contant">
                             <b-row>
                                 <b-col>
                                     <div>
  
</div>
                                       <!-- <p style="font-weight: bold; font-size: 19px;">Is this statement, “i see him last night” can be understood as “I saw him last night”?</p>
                                 <p>In my local language (Bahasa Indonesia) there are no verb-2 or past tense form as time tracker. So, I often forget to use the past form of verb when speaking english. I saw him last night (correct) I see him ...</p> -->
                                    
                                   
                                    <b-table stacked :items= "[{ ID_Number: u.StudentRegNo,Address :u.Address, TElephone_Number :u.Tel_No}]"></b-table>        
                                  

                                    <div v-if="windowWidth>1011" class="bottomRow" style="margin-top:12px; padding:12px;background-color:#f2f2f2">
                                         <b-row>
                                             <b-col>
                                                   <b-button v-b-modal="'result' + index" variant="primary">
                                                          <i class="material-icons" id="iconsLabels1">remove_red_eye</i>
                                                    View Results
                                                      </b-button>
                                                         
                                                <b-modal :id="'result' + index" size="xl" title="Content">
                                                   <s-result :msg="u.StudentRegNo" :clz="classid"></s-result>
                                                
                                                </b-modal>
                                             </b-col>
                                            <b-col>
                                                  <b-button v-b-modal="'msg' + index" variant="primary">
                                                          <i class="material-icons" id="iconsLabels1">message</i>
                                                 Message
                                                      </b-button>
                                                         
                                                <b-modal :id="'msg' + index" size="xl" title="Send Feedback">
                                                   <s-msg :msg="u.StudentRegNo" :clz="classid"></s-msg>
                                                
                                                </b-modal>
                                               
                                                  
                                                   
                                             
                                             
                                                   <!-- <button type="button" class="btn btn-outline-secondary btn-sm" style="background-color:white;color:black">
                                                
                                                    <i class="material-icons" id="iconsLabels1">remove_red_eye</i>
                                                      
                                                </button> -->
                                                   
                                               
                                               
                                            </b-col>
                                            
                                            <b-col col lg="2" >
                                                <!-- <button type="button" class="btn btn-outline-secondary btn-sm" style="background-color:white;color:black">
                                                
                                                   
                                                     More..
                                                </button> -->
                                            </b-col>
                                        </b-row>
                                    </div>
                                    <div v-if="windowWidth<=1011" class="bottomRow" style="margin-top:12px; padding:12px;background-color:#f2f2f2">
                                         <b-row>
                                             <b-col >
                                            
                                                   
                                                        
                                                      <button type="button" class="btn btn-outline-secondary btn-sm" @click="viewresults" style="background-color:white;color:black">
                                                               <i class="material-icons" id="iconsLabels1"   >message</i>
                                                      View Results
                                                      </button>
                                                 
                                                   
                                              
                                             </b-col>
                                             <b-col>
                                                 
                                                      <button type="button" class="btn btn-outline-secondary btn-sm" style="background-color:white;color:black">
                                                
                                                    <i class="material-icons" id="iconsLabels1">remove_red_eye</i>
                                                     Message
                                                </button>
                                               
                                                

                                             </b-col>
                                              <b-col style="margin-top:3px">
                                                 
                                                      <button type="button" class="btn btn-outline-secondary btn-sm" style="background-color:white;color:black">
                                                
                                                    <i class="material-icons" id="iconsLabels1">remove_red_eye</i>
                                                     Results
                                                </button>
                                               
                                                

                                             </b-col>
                                             <b-col style="margin-top:3px">
                                                  <button type="button" class="btn btn-outline-secondary btn-sm" style="background-color:white;color:black">
                                                
                                                   
                                                     More..
                                                </button>
                                               
                                             </b-col>
                                            
                                        </b-row>
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
import sresults from '../components/Sresults'
import msg from '../components/msg'
export default {
      components:{
    's-result':sresults,
    's-msg':msg,
  
 
  },
    data(){
        return{
            classid:0,
            sid:0,
             windowWidth:0,
            
               id:this.$route.params.id,
        name:this.$route.params.name,
        ClassStudent:[],
        }
    },
     mounted() {
         this.windowWidth=window.innerWidth;
    this.$nextTick(() => {
      window.addEventListener('resize', () => {
        this.windowWidth=window.innerWidth
      });
    })
     
    //  this.$http.get('http://127.0.0.1:8000/api/user/C071',{
    //       headers: {
    //         'Authorization': 'Bearer '+this.$session.get('jwt')
    //       }

    //         })
    // .then(function(response){
    //  this.users=response.body.users;
    
    //        });


              this.classid=this.$route.params.id;

           if(this.$route.params.name==404){
            
         this.$http.get('http://127.0.0.1:8000/api/Clstudent/'+this.$route.params.id,{
          headers: {
            'Authorization': 'Bearer '+this.$session.get('jwt')
          }

            })
    .then(function(response){
        
     this.ClassStudent=response.body.users;
           })
         }
         else{
               
            this.$http.get('http://127.0.0.1:8000/api/Clstudent/'+this.$route.params.id+'/'+this.$route.params.name,{
          headers: {
            'Authorization': 'Bearer '+this.$session.get('jwt')
          }

            })
    .then(function(response){
       
     this.ClassStudent=response.body.users;
    
           })

         }
  },
  methods:{
 viewresults(){
 this.$router.push('/Main/Student/results/'+this.classid+'/'+this.sid)

 }
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



