<template>
   <!-- <b-container fluid class="main"> -->
        <div class="side" style="">
            <br>
        <div class="container"  id="b1" style="margin-top: -7px;padding-bottom:40px">
            
            <!-- <b-button style="margin-top:0px;"  class="font-weight-bold" block variant="primary">Ask A Quation</b-button> -->
        </div>
        <hr style="height:3px; background-color: #f2f2f2; margin-top: 1%; margin-bottom: 0%;">
        <div class="second" style="padding-top:14px;">
            
                    <b-container  class="bv-example-row text-center">
            <b-row  id="statusRow" >
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

                   <vue-cal class="vuecal--rounded-theme vuecal--green-theme"
         xsmall
         hide-view-selector
         :time="false"
         default-view="month"
         :disable-views="['week']">
</vue-cal>
            </b-row>
        </b-container>
        <br><br>
  
         
<br>
<br>

        </div>
       
    </div>
   <!-- </b-container> -->
</template>
<script>
import VueCal from 'vue-cal'
import 'vue-cal/dist/vuecal.css'
export default {
     components: { 'vue-cal': VueCal },
}
</script>


<style scoped>


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



.second{
    
    background-color:#f7f8f7;
    
}






</style>

