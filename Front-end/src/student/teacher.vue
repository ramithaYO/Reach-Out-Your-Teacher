<template>
    <div>
        
        <router-view></router-view>

<br>
<br>
<br>
         <!-- <b-container fluid>
   
    <b-row>
      <b-col md="6" class="my-1">
        <b-form-group label-cols-sm="3" label="Filter" class="mb-0">
          <b-input-group>
            <b-form-input v-model="filter" placeholder="Type to Search"></b-form-input>
            <b-input-group-append>
              <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>

  
     
   
      <b-col md="6" class="my-1">
        <b-form-group label-cols-sm="3" label="Per page" class="mb-0">
          <b-form-select v-model="perPage" :options="pageOptions"></b-form-select>
        </b-form-group>
      </b-col>
    </b-row>

    <b-table
      show-empty
      stacked="md"
      :items="items"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
      :filter="filter"
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      :sort-direction="sortDirection"
      @filtered="onFiltered"
    >
      <template slot="name" slot-scope="row">
        {{ row.value.first }} {{ row.value.last }}
      </template>

     

      <template slot="actions" slot-scope="row">
        <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1">
          view details
        </b-button>
       
      </template>

      <template slot="row-details" slot-scope="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
          </ul>
        </b-card>
      </template>
    </b-table>

    <b-row>
      <b-col md="6" class="my-1">
        <b-pagination
          v-model="currentPage"
          :total-rows="totalRows"
          :per-page="perPage"
          class="my-0"
        ></b-pagination>
      </b-col>
    </b-row>

    <b-modal :id="infoModal.id" :title="infoModal.title" ok-only @hide="resetInfoModal">
      <pre>{{ infoModal.content }}</pre>
    </b-modal>
  </b-container> -->

    </div>
</template>


<script>
//   export default {
//     data() {
//       return {
//           users:[],
//           userid:16,
//         items: [],
//         fields: [
//           { key: 'name', label: 'Person Full name', sortable: true, sortDirection: 'desc' },
//           { key: 'actions', label: 'Action' }
//         ],
//         totalRows: 1,
//         currentPage: 1,
//         perPage: 5,
//         pageOptions: [5, 10, 15],
//         sortBy: null,
//         sortDesc: false,
//         sortDirection: 'asc',
//         filter: null,
//         infoModal: {
//           id: 'info-modal',
//           title: '',
//           content: ''
//         }
//       }
//     },
//     computed: {
//       sortOptions() {
//         // Create an options list from our fields
//         return this.fields
//           .filter(f => f.sortable)
//           .map(f => {
//             return { text: f.label, value: f.key }
//           })
//       }
//     },
//     mounted() {
//       // Set the initial number of items
//       this.getdata()
//       this.totalRows = this.items.length
//     },
//     methods: {
//       info(item, index, button) {
//          console.log(item.id)
//           this.$router.push('/Main/Teacher/teacherprofile/'+item.id)
       
//       },
//       resetInfoModal() {
//         this.infoModal.title = ''
//         this.infoModal.content = ''
//       },
//       onFiltered(filteredItems) {
//         // Trigger pagination to update the number of buttons/pages due to filtering
//         this.totalRows = filteredItems.length
//         this.currentPage = 1
//       },

//       getdata(){
//           this.$http.get('http://127.0.0.1:8000/api/teachersid/'+this.userid,{
//           headers: {
//             'Authorization': 'Bearer '+this.$session.get('jwt')
//           }

//             })
//     .then(function(response){
//      this.users=response.body.users;
//      for (let index = 0; index < this.users.length; index++) {
//            console.log(this.users[index])
//              this.items.push(this.users[index]);
//         }
//            });
//       }
//     }
//   }
 </script>