<template>

  <div >

     
     

      <b-container fluid class="ma"  style="background-color: black; " >
        <div class="row1" >
        <div class="cl" style="height:100px">
        <img src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="rounded-circle " alt="Tiger" 
            width="5" height="5">
            <div  style=" display: inline-block;padding-left:8px " class="font text-white">
              <span style=" font-weight: bold;font:color:white;font-size: 20px;">{{username}}
                <br>
                <p style="font-size: 13px;"> {{usercareer}} </p>
                
              </span>
            </div>
</div>
</div>
      </b-container>

    <b-container fluid style="height:83px; background-color: black; ">
        <div class="row2">


                       <table v-if="data>=845" class="table a"   align="right"  >


 <thead  >
    <tr style=" height: 30px;font-size: 13px; font-weight: normal;">
      <th scope="col" style="background-color:black;width:65px;border-color: black;" id="column">
        <!-- <div style="background-color:gray;height: 30px;padding-top:4px;border-radius:2px;">
                        <span  class="material-icons" style="font-size: 16px;padding-left:4px">library_books</span>
                      <span  >3 Questions</span>


  
  
            </div> -->

      </th>
      <th scope="col" style="background-color:black;width:66px;padding-left:8px;;padding-right:8px;border-color: black;" id="column">
            <!-- <div style="background-color:gray;height: 30px;padding-top:4px;border-radius:2px;">
                        <span  class="material-icons" style="font-size: 16px;padding-left:4px">group</span>
                      <span >3 Followers</span>


  
  
            </div> -->
      </th>
      <th scope="col" style="width:10px;border-color: black;" id="column">
       <b-button  v-if="usercareer=='student'" v-b-modal.modal-sm2 variant="primary"  class="btn btn-primary btn-sm" style="font-size: 14px;font-weight: bold;">Message</b-button>
       <b-modal v-if="usercareer=='student'" id="modal-sm2" title="Messages">
            <g-feed ></g-feed>
            </b-modal> 
      </th>
      <th scope="col" style="width:87px;padding-right:6px;padding-left:6px;border-color: black;" id="column">
      <b-button  v-b-modal.modal-sm  class="btn-primary btn-sm" variant="primary" style="font-size: 14px;font-weight: bold;">Add Class</b-button>
                
             <b-modal v-if="usercareer=='teacher'" id="modal-sm" title="Add Class">
            <a-class ></a-class>
            </b-modal>    
              <b-modal v-if="usercareer!='teacher'" id="modal-sm" title="Add Class">
            <sa-class ></sa-class>
            </b-modal>                              
                                                
                                    
      </th>
      <th scope="col" style="background-color:blue;width:38px;border-radius:2px;color:white;border-color: black;" id="column">
        <b-button  v-b-modal.modal-xl  variant="primary" class="btn btn-primary btn-sm" style="font-size: 14px;font-weight: bold;">Remove class</b-button >
     <b-modal v-if="usercareer=='teacher'" id="modal-xl" size="lg" title="Remove class">
            <r-class ></r-class>
            </b-modal>  
             <b-modal v-if="usercareer!='teacher'" id="modal-xl" size="lg" title="Remove class">
            <sr-class ></sr-class>
            </b-modal>  
      </th>
    </tr>
  </thead>



</table>






                       <table v-if="data<845&&data>=550" class="table d"   align="left" >


 <thead  >
    <tr style=" height: 30px;font-size: 13px; font-weight: normal;">
    
      <th scope="col" style="border-color: black;" id="column">
         <b-button  v-b-modal.modal-sm2  variant="primary"  class="btn btn-primary btn-sm" style="font-size: 14px;font-weight: bold;">Message</b-button>
         <b-modal v-if="usercareer=='student'" id="modal-sm2" title="Message">
            <g-feed ></g-feed>
            </b-modal> 
      </th>
      <th scope="col" style="border-color: black;padding-left:6px;padding-right:6px" id="column">
       <b-button  v-b-modal.modal-sm  variant="primary" class="btn btn-primary btn-sm" style="font-size: 14px;font-weight: bold;">Add class</b-button>
       <b-modal v-if="usercareer=='teacher'" id="modal-sm" title="Add class">
            <a-class ></a-class>
            </b-modal>  
             <b-modal v-if="usercareer!='teacher'" id="modal-sm" title="Add class">
            <sa-class ></sa-class>
            </b-modal>  
      </th>
      <th scope="col" style="background-color:blue;color:white;border-color: black;" id="column">
        <b-button  v-b-modal.modal-lg  variant="primary" class="btn btn-primary btn-sm" style="font-size: 14px;font-weight: bold;">Remove class</b-button>
    <b-modal v-if="usercareer=='teacher'" id="modal-lg" size="lg" title="Remove class">
            <r-class ></r-class>
            </b-modal>  
             <b-modal v-if="usercareer!='teacher'" id="modal-lg" size="lg" title="Remove class">
            <sr-class ></sr-class>
            </b-modal>  
      </th>
        <th scope="col" style="background-color:black;width:65px;border-color: black;padding-left:9px" id="column">
        <!-- <div style="background-color:gray;height: 30px;padding-top:4px;border-radius:2px;">
                        <span  class="material-icons" style="font-size: 16px;padding-left:4px">library_books</span>
                      <span  >3 Questions</span>


  
  
            </div> -->

      </th>
      <th scope="col" style="background-color:black;width:66px;padding-left:8px;;padding-right:8px;border-color: black;" id="column">
            <!-- <div style="background-color:gray;height: 30px;padding-top:4px;border-radius:2px;">
                        <span  class="material-icons" style="font-size: 16px;padding-left:4px">group</span>
                      <span >3 Followers</span>


  
  
            </div> -->
      </th>
    </tr>


    
  </thead>



</table>

 <table v-if="data<550" class="table b " style="margin-bottom:0px"   align="left" >


 <thead  >
    <tr style=" height: 30px;font-size: 13px; font-weight: normal;">
    
      <th scope="col" style="width:10px;border-color: black;" id="column">
       
           <b-button  v-b-modal.modal-sm2  variant="primary" class="btn btn-primary btn-sm" style="font-size: 14px;font-weight: bold;">Message</b-button >
          <b-modal v-if="usercareer=='student'" id="modal-sm2" title="Message">
            <g-feed ></g-feed>
            </b-modal> 
      </th>
      <th scope="col" style="width:87px;padding-right:6px;padding-left:6px;border-color: black;" id="column">
        
           <b-button  v-b-modal.modal-sm  variant="primary" class="btn btn-primary btn-sm" style="font-size: 14px;font-weight: bold;"> Add class </b-button>
     <b-modal v-if="usercareer=='teacher'" id="modal-sm" title="Add class">
            <a-class ></a-class>
            </b-modal>  
               <b-modal v-if="usercareer!='teacher'" id="modal-sm" title="Add class">
            <sa-class ></sa-class>
            </b-modal>  
      </th>
      <th scope="col" style="color:white;border-color: black;" id="column">
         <b-button  v-b-modal.modal-lg  variant="primary"  class="btn btn-primary btn-sm" style="font-size: 14px;font-weight: bold;" >Remove class</b-button >
       <b-modal v-if="usercareer=='teacher'" id="modal-lg" size="lg" title="Remove class">
            <r-class ></r-class>
            </b-modal>  
             <b-modal v-if="usercareer!='teacher'" id="modal-lg" size="lg" title="Remove class">
            <sr-class ></sr-class>
            </b-modal>  
      </th>
        
    </tr>


    
  </thead>



</table>


        
 <table v-if="data<550" class="table c"  align="left">


 <thead >
   <th scope="col" style="background-color:black;width:65px;border-color: black;" id="column">
        <!-- <div style="background-color:gray;height: 30px;padding-top:4px;border-radius:2px;">
                        <span  class="material-icons" style="font-size: 16px;padding-left:4px">library_books</span>
                      <span  >3 Questions</span>


  
  
            </div> -->

      </th>
      <th scope="col" style="background-color:black;width:66px;padding-left:8px;;padding-right:8px;border-color: black;" id="column">
            <!-- <div style="background-color:gray;height: 30px;padding-top:4px;border-radius:2px;">
                        <span  class="material-icons" style="font-size: 16px;padding-left:4px">group</span>
                      <span >3 Followers</span>


  
  
            </div> -->
      </th>
    
  </thead>



</table>






 
      
         </div>
      </b-container>





  </div>
</template>

<script>
import addclass from '../components/addclass'
import removeclass from '../components/removeclass'
import saddclass from '../student/saddclass'
import getfeedback from '../student/getfeedback'
import sremoveclass from '../student/sremoveclass'

export default {
  components:{
    'a-class':addclass,
    'r-class':removeclass,
    'sa-class':saddclass,
    'sr-class':sremoveclass,
    'g-feed':getfeedback,
 
  },
  data(){
    return{
      data:true,
      windowWidth:0,
      usercareer:'',
      username:'',
    }
  },
  created(){
  this.usercareer= this.$session.get('usercareer');
  this.username=' '
  var x = "Total Width: " + screen.width;
  this.data=screen.width;
   console.log(x);
  },
  watch: {
   
    windowWidth(newWidth, oldWidth){
     this.data=newWidth;

    }
  },

  mounted() {
    this.$http.get('http://localhost:8000/api/getusername/'+this.$session.get('userid')+'/'+this.$session.get('usercareer'),{
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
}

</script>
<style scoped>
#column{
  padding-top: 0px;
  padding-left: 0px;
  padding-right: 0px;
  padding-bottom: 0px;
}
/* this change the image size */
    img {
    /* display: block; */
    width: 90px;
    height: 90px;
  
    }
    .row1{
      position: relative;
    
    }
    .ma{
      height:250px;
    }

    .cl {

    position: absolute;
    top: 195px;
    left:1%;
}
/* this code change the table width */
table.a {
   white-space: nowrap;
  width: 300px;  
  
  
   /* position: absolute;  */
  /* bottom: 0px; */
  /* left:78%; */
}
table.d {

  width: 300px;  
  white-space: nowrap;
  
   /* position: absolute;  */
  /* bottom: 0px; */
  /* left:78%; */
}
table.b {

  width: 530px;  
  white-space: nowrap;
  
   /* position: absolute;  */
  /* bottom: 0px; */
  /* left:78%; */
}
.row2{
  
  padding-top:20px;
}
table.c {

  width: 250px;  
  white-space: nowrap;

}
.table th.fit {
    white-space: nowrap;
    width: 16%;
}


/* search bar */

input[type=text] {
  width: 130px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  /* background-image: url('searchicon.png'); */
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  /* padding: 12px 20px 12px 40px; */
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
  width: 100%;
}



  /* end of the search bar */
@media (max-width: 850px) { 
.cl {
  top: 150px;

    
}

}

@media (max-width: 580px) { 
.ma{
  height: 169px;
}
.cl {
  top:60px;

    
}
 img {
    /* display: block; */
    width: 80px;
    height:80px;
  
    }


table.b {

  width: 300px;  
  white-space: nowrap;
  
   /* position: absolute;  */
  /* bottom: 0px; */
  /* left:78%; */
}

.row2{
  padding-top:0px;
}
}
</style>
