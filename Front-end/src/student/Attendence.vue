<template>
  <b-container fluid>
  
   
       <!-- <b-form-file
      v-model="file"
      :state="Boolean(file)"
      placeholder="Choose a file..."
      drop-placeholder="Drop file here..."
    ></b-form-file>
    <div class="mt-3">Selected file: {{ file ? file.name : '' }}</div>
  
<h1>this is the {{msg}} </h1>
  <button @click="send"> click here to sed the details</button>
   <button @click="add" >click here to add additional row</button> -->
   <!-- <br>
   <br>
   <br> -->
   
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

    <!-- Main table element -->
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
      <template slot="Date" slot-scope="row">
        {{ row.value }} 
      </template>

      <template slot="isActive" slot-scope="row">
        {{ row.value ? 'Present :)' : 'Absent :(' }}
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

   
  </b-container>
</template>

<script>
  export default {
    props:['msg'],
    data() {
      return {
      
        file: null,
        users:[],
        items: [],
        fields: [
          { key: 'Date', label: 'Date', sortable: true, sortDirection: 'desc' },
          { key: 'isActive', label: 'Attendence' },
       
        ],
        totalRows: 1,
        currentPage: 1,
        perPage: 5,
        pageOptions: [5, 10, 15],
        sortBy: null,
        sortDesc: false,
        sortDirection: 'asc',
        filter: null,
        infoModal: {
          id: 'info-modal',
          title: '',
          content: ''
        }
      }
    },
    computed: {
      sortOptions() {
       
        return this.fields
          .filter(f => f.sortable)
          .map(f => {
            return { text: f.label, value: f.key }
          })
      }
    },
    mounted() {
     this.add();
      this.totalRows = this.items.length
    },
    methods: {
    
      resetInfoModal() {
        this.infoModal.title = ''
        this.infoModal.content = ''
      },
      onFiltered(filteredItems) {
        // Trigger pagination to update the number of buttons/pages due to filtering
        this.totalRows = filteredItems.length
        this.currentPage = 1
      },
      add(){
          this.$http.get('http://127.0.0.1:8000/api/attendece/'+this.$session.get('userid')+'/'+this.msg,{
          headers: {
            'Authorization': 'Bearer '+this.$session.get('jwt')
          }

            })
    .then(function(response){
     
     this.users=response.body.results;
      for (let index = 0; index < this.users.length; index++) {
           console.log(this.users[index])
             this.items.push(this.users[index]);
        }
  
    
           });
         
          // this.items.push({isActive: true, Date:'1996-01-25'});
            this.totalRows = this.items.length
      },
      send(){

         var formData = new FormData();
       console.log(this.file)
       
              formData.append('file', this.file);
              formData.append('userName', this.$session.get('userid'));  

           this.$http.post('http://localhost:8000/api/fileUpload', formData ,{
             headers: {
            'Authorization': 'Bearer ' + this.$session.get('jwt')
          }}).then(function (response) {
            // alert("done");
             console.log(response.body);
              
          }, function (err) {
            console.log('err', err)
            // this.errorAnabile=true;

          })

      },
     
    }
  }
</script>