<template>
    <b-container fluid id="we">
        <br>
        <br>
            <h3>
         <font face = "Times New Roman" style="font-weight: bold;font-style:italic"  color = "blue" size = "5">UPCOMING CLASSES</font><br />

       </h3>
        <br>

         <div v-if="users.length==0">
               has not yet registerd for any classes 
         </div>
        <dir v-for="(u,index) in users">
        <b-container fluid class="PbCard">
           
                    <b-container v-if="windowWidth>1011" style="margin-top:10px;">
                         <b-row>
                                <span class="rImage">
                                    <img class="avatar" src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                                </span>
                                <span>
                                        <p id="nameTxt">{{u.INSTITUTE}}</p>
                                </span>

                                <span  style="margin-top:4px; margin-left:9px;">
                                    <p style="font-size: 12px; background-color:yellow; padding-left:3px; padding-right:3px;">Class</p>
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
                                            <p id="nameTxt">{{u.INSTITUTE}}</p>
                                    </span>
                                    <span  style="margin-top:4px; margin-left:9px;">
                                        <p style="font-size: 12px; background-color:yellow; padding-left:3px; padding-right:3px;">Class</p>
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
                              
                                    <br>
                                      <b-table stacked :items= "[{ SUBJECT: u.SUBJECT,LOCATION :u.LOCATION,DATE :u.DATE,TIME:u.TIME}]"></b-table>   
                                

                                    <div v-if="windowWidth>1011" class="bottomRow" style="margin-top:12px; padding:12px;background-color:#f2f2f2">
                                         <b-row>
                                          
                                          
                                        </b-row>
                                    </div>
                                    <div v-if="windowWidth<=1011" class="bottomRow" style="margin-top:12px; padding:12px;background-color:#f2f2f2">
                                      
                                         <b-row>
                                          
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
import content from '../student/content'
import attendence from '../student/Attendence'
import results from '../student/results'
export default {
    components:{
    'c-tent':content,
    'a-t':attendence,
    're-sults':results,
 
  },
    data(){
        return{
             windowWidth:0,
             users:[]
        }
    },
    created(){
      if(this.$session.get('jwt')==null){
          this.$router.push('/test');
      }
    },
     mounted() {
         this.windowWidth=window.innerWidth;
    this.$nextTick(() => {
      window.addEventListener('resize', () => {
        this.windowWidth=window.innerWidth
      });
    })
     
     this.$http.get('http://127.0.0.1:8000/api/StuClass/'+this.$session.get('userid'),{
          headers: {
            'Authorization': 'Bearer '+this.$session.get('jwt')
          }

            })
    .then(function(response){
    //  this.users=response.body.users;
    
           }).catch(error => {
   
    if( error.statusText ==='Unauthorized'){
      console.log('Unauthorized')
    }
});
this.gettime();
  },
  watch:{
      windowWidth(newWidth, oldWidth){
          this.windowWidth=newWidth;

    }
  
  },
  methods:{
        gettime(){
              
  
        this.$http.get('http://localhost:8000/api/getupcomingevent/'+this.$session.get('userid')+'/'+this.$session.get('usercareer'),{
             headers: {
            'Authorization': 'Bearer ' + this.$session.get('jwt')
          }}).then(function (response) {
            // alert("done");
             this.users=response.body.results;
              
          }, function (err) {
            console.log('err', err)
            // this.errorAnabile=true;

          })
         },
   
   
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






