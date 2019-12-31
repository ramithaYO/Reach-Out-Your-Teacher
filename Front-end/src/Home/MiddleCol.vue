<template>
    <div class="mainBody">
    <b-container fluid>
        <nav class='greedy '>
  
        <ul class='links'  style="list-style: none;">
          <router-link tag="li" to="/Main/Home/About" active-class="clickedLink"><a >About</a></router-link>
          <router-link tag="li" to="/Main/Home" active-class="clickedLink" exact><a >Questions</a></router-link>
            <!-- <li @click="AboutClicked" v-bind:class="{'clickedLink':CAbout}" ><a >About</a></li> -->
            <!-- <li @click="QuestionsClicked" v-bind:class="{'clickedLink':CQuestion}"><a href='http://localhost:8080/Main/Home' > Questions</a></li> -->
            <li><a href='#'>Polls</a></li>
            <li><a href='#'>Answers</a></li>
            <li><a href='#'>Best Answers</a></li>
            <li><a href='#'>Asked Questions</a></li>
            <li><a href='#'>Followed Questions</a></li>
            <li><a href='#'>Favorite Questions</a></li>
            <li><a href='#'>Posts</a></li>
            <li><a href='#'>Comments</a></li>
            <li><a href='#'>Followers Questions</a></li>
            <li><a href='#'>Followers Answers</a></li>
            <li><a href='#'>Followers Posts</a></li>
            <li><a href='#'>Followers Comments</a></li>
            
        </ul>
        <button><i class="material-icons">
        more_horiz
        </i></button>
        <ul class='hidden-links hidden'  style="list-style: none;"></ul>
        </nav>
    </b-container>
    <!-- <p>This project is on <a target="_blank" href="https://github.com/lukejacksonn/GreedyNav">github</a></p>
    <h5>Resize the window and any overflowing items will get stacked into the dropdown menu</h5> -->
      <hr style="height:3px; background-color: #f2f2f2;  margin-bottom: 0%;  margin-top: 0%;">
      <div>
        <!-- <router-view></router-view>    -->
         <router-view></router-view>
                    <!-- <n-card></n-card> -->
      </div>
    </div>

</template>

<script>
$(function() {

  var $nav = $('nav.greedy');
  var $btn = $('nav.greedy button');
  var $vlinks = $('nav.greedy .links');
  var $hlinks = $('nav.greedy .hidden-links');

  var numOfItems = 0;
  var totalSpace = 0;
  var breakWidths = [];

  // Get initial state
  $vlinks.children().outerWidth(function(i, w) {
    totalSpace += w;
    numOfItems += 1;
    breakWidths.push(totalSpace);
  });

  var availableSpace, numOfVisibleItems, requiredSpace;

  function check() {

    // Get instant state
    availableSpace = $vlinks.width() - 10;
    numOfVisibleItems = $vlinks.children().length;
    requiredSpace = breakWidths[numOfVisibleItems - 1];

    // There is not enought space
    if (requiredSpace > availableSpace) {
      $vlinks.children().last().prependTo($hlinks);
      numOfVisibleItems -= 1;
      check();
      // There is more than enough space
    } else if (availableSpace > breakWidths[numOfVisibleItems]) {
      $hlinks.children().first().appendTo($vlinks);
      numOfVisibleItems += 1;
    }
    // Update the button accordingly
    $btn.attr("count", numOfItems - numOfVisibleItems);
    if (numOfVisibleItems === numOfItems) {
      $btn.addClass('hidden');
    } else $btn.removeClass('hidden');
  }

  // Window listeners
  $(window).resize(function() {
    check();
  });

  $btn.on('click', function() {
    $hlinks.toggleClass('hidden');
  });

  check();

});
import card from './ProblemCard'
export default {
    components:{
        'n-card':card
    },
    data(){
      return{
        CQuestion:true,
        CAbout:false,
      }
    },
    methods:{
      QuestionsClicked(){
        this.CQuestion=true;
        this.CAbout=false;
      },
      AboutClicked(){
         this.CQuestion=false;
        this.CAbout=true;
      }
    }
}
</script>

<style scoped>

.clickedLink{
    padding-bottom: 25.5px; 
  
  /* padding: 12px 5px 12px; */
  font-weight: bold;
  text-decoration: none;
  border-bottom: solid;
}

.mainBody{
     /* position: absolute; */
}

nav.greedy {
  position: relative;
   z-index:99;
     
  height: 73px;
  /* margin-bottom: 12px; */
  display: flex;
  /* border-style: solid; */
  background: white;
}



nav.greedy button {
  align-self: stretch;
  transition: all .4s ease-out;
  padding: 0 ;
  outline: 0;
  border: 0;
  padding-top: 14px;
  font-size: 0.9rem;
  font-weight: bold;
  background: white;
  color: gray;
}

nav.greedy button.hidden {
  transition: none;
  border-right: 0.5rem solid #b6b6b6;
  width: 0;
  padding: 0;
  overflow: hidden;
  
}

/* nav.greedy button::after {
  content: attr(count);
  display: inline-flex;
  width: 30px;
  height: 30px;
  align-items: center;
  justify-content: center;
  background: #9f9f9f;
  color: #f2f2f2;
  box-shadow: 0 0 1px 0 rgba(0,0,0,0.8);
  border-radius: 50%;
  font-size: 14px;
  line-height: 14px;
  margin-left: 1rem;
  margin-right: calc(-1rem + -8px);
} */

ul.links {
  display: flex;
  justify-content: flex-start;
  flex: 1;
  overflow: hidden;
  text-decoration: none;
  text-align: center;   
  /* border-style: solid; */
  margin-bottom: 0px;
  
}

ul.links li {
  flex: none;
  /* border-style: dashed; */
  margin-left: 2px;
  padding: 1rem; 
  padding-top: 23px;
  /* padding-bottom: 42.5px;  */
  
  /* padding: 12px 5px 12px; */
  font-weight: bold;
  text-decoration: none;
  
}
ul.links li :hover{
  /* flex: none; */
  /* border-style: dashed; */
  /* margin-left: 2px;
  padding: 1rem; 
  padding-top: 25px; */
  padding-bottom: 25.5px; 
  
  /* padding: 12px 5px 12px; */
  font-weight: bold;
  text-decoration: none;
  border-bottom: solid;
}

ul.links li a:hover {
  color: black;
  
  /* background-color: red; */
}

ul.links li a:hover {
  color: black;
  
  /* background-color: red; */
}

ul.links li a {
  color: gray;
  text-decoration: none;
}

ul.links li a :hover {
  color: black;
  text-decoration: none;
}

ul.hidden-links {
  position: absolute;
  background: white;
  right: 0;
   /* padding-top: 0px; */
  top: 100%;
  text-decoration: none;
  /* border-style: solid; */
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

ul.hidden-links li a {
  color: gray;
  padding-right: 0rem;
    
  font-weight: bold;
  text-decoration: none;
  
}

ul.hidden-links li a:hover {
  color: black;
}
ul.hidden-links.hidden {
  display: none;
  text-decoration: none;
  
}

ul.hidden-links li {
  /* padding: 1rem; */
  padding-top: 2px;
  padding-bottom: 2px;
  padding-left: 10px;
  padding-right: 0px;
  margin-right: 35px;
  text-decoration: none;
  
  /* border-style: solid; */

}

/*
-- Demo Styles
*/

</style>

