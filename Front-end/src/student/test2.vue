<template>
    <div>
      <b-row>
        <b-col>
 <b-button v-b-modal.modal-1>Launch demo modal</b-button>

  <b-modal id="modal-1" title="BootstrapVue">
    <p class="my-4">Hello from modal!</p>
  </b-modal>
        </b-col>
        <b-col>
 <b-button v-b-modal.modal-1>Launch demo modal</b-button>

  <b-modal id="modal-1" title="BootstrapVue">
    <p class="my-4">Hello from modal!</p>
  </b-modal>
        </b-col>
      </b-row>
      
 

         <br>
         <br>
         <br>
         <br>
       <ul>
     

  <li v-for="item in items">{{ item.first_name }} <b-button size="sm" v-b-modal="'my'" user="'item'" @click="sendInfo(item)">Saluta {{item.first_name}}</b-button></li>
</ul>

    <b-modal id="my">
      Hello {{selectedUser.first_name}} {{selectedUser.last_name}} !
    </b-modal>

    <c-content :msg="items"></c-content>
    <a-a :msg="items"></a-a>
     <b-table stacked :items= "[{Date: '1996-1-22',age:id}]"></b-table>
    </div>
</template>



<script>
import content from '../student/content'
import a from '../student/Attendence'
export default {
         components:{
    'c-content':content,
    'a-a':a
  },
    data(){
        return{
            id:16,
              hell:'what the fuck',
 items :
    [
        { Date: '1996-1-22' },
      
    ],
    selectedUser: '',

        }
    },
     methods: {
    sendInfo(item) {
        this.selectedUser = item;
    }

}
}
</script>
