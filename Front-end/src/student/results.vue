<template>
   
  
    <div>
    <br>
    <br>

 <b-container fluid >
    <!-- User Interface controls -->
    <b-row  >
      <b-col md="6" class="my-1">
        <b-form-group label-cols-sm="3" label="Filter" class="mb-0">
          <b-input-group>
            <b-form-input v-model="filter" placeholder="Type to Search"></b-form-input>
            <b-input-group-append>
              <b-button :disabled="!filter"  variant="success" @click="filter = ''">Clear</b-button>
              
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
<br>

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
     

      <template slot="actions" slot-scope="row">
      
        <b-button size="sm" @click="row.toggleDetails">
          {{ row.detailsShowing ? 'Hide' : 'Show' }} Details
        </b-button>
      </template>

      <template slot="row-details" slot-scope="row">
        <b-card >
            <div v-html="row.item['description']"> </div>
            <!-- {{row.item['description']}} -->
         
        
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

    <!-- Info modal -->
    <b-modal :id="infoModal.id" :title="infoModal.title" ok-only @hide="resetInfoModal">
      <pre>{{ infoModal.content }}</pre>
    </b-modal>
  </b-container>





         <br>
         <br>
         <br>
         
        <br>
      
    
   <!-- <div>
     <apexchart  type="bar" :options="chartOptions" :series="series"></apexchart>
   </div> -->
 
   
<b-button variant="success"  @click="updata">graphical view</b-button>

<!-- <button @click="hide">hide </button> -->



<br>
<br>
<br>

  <div id="chart" ref="barchart"></div>
 
 <br>
 <br>
 <br>
 <div id="chart" v-if="visible">
      <apexchart type=radialBar height=350 :options="chartOptions1" :series="series1" />
    </div>




  
    </div>

    
</template>


<script>

export default {
   props:['msg'],
      data() {
      return {
        items: [],
        fields: [
          { key: 'test', label: 'TestNo',  },
          { key: 'marks', label: 'Marks',  class: 'text-center' },
          { key: 'date', label: 'Date' , sortDirection: 'desc' },
          { key: 'actions', label: '' }
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
        },
        ///
          visible:false,
           averag:[],
          series1: [76],
          mtdata:[ 60, 70, 91,34,11,22,33,44,155],
          cate:[],
          marksarry:[],
        chartOptions1: {
          colors:['#F44336'],
          plotOptions: {
            radialBar: {
              startAngle: -90,
              endAngle: 90,
              track: {
                background: "#e7e7e7",
                strokeWidth: '97%',
                margin: 5, // margin is in pixels
                shadow: {
                  enabled: true,
                  top: 2,
                  left: 0,
                  color: '#999',
                  opacity: 1,
                  blur: 2
                }
              },
              dataLabels: {
                
                name: {
                  show: true
                },
                value: {
                  offsetY: 15,
                  fontSize: '22px'
                }
              }
            }
          },
          fill: {
            type: 'gradient',
            gradient: {
              shade: 'light',
              shadeIntensity: 0.4,
              inverseColors: false,
              opacityFrom: 1,
              opacityTo: 1,
              stops: [0, 50, 53, 91]
            },
          },
          labels: ['Average'],
        },
        chartOptions: {     
          chart: {
            id: 'vuechart-example'
          },
          xaxis: {
            categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998,1999,2000,2001,2002,2003,2004]
          }
        },
        series: [{
          name: 'marks',
          data: [30, 40, 35, 50, 49, 60, 70, 91,34,11,22,33,44,55]
        }]
      }
    },
    mounted(){

    this.getdata()
    //   this.totalRows = this.items.length
      this.totalRows = this.items.length



 this.$http.get('http://127.0.0.1:8000/api/getmarks/'+this.$session.get('userid')+'/'+this.msg,{
          headers: {
            'Authorization': 'Bearer '+this.$session.get('jwt')
          }

            })
    .then(function(response){
     this.marksarry=response.body.results;
    //  console.log(this.marksarry['marks'])
     this.mtdata=this.marksarry['marks'];
     this.cate=this.marksarry['testno'];
   this.averag.push(this.marksarry['average']);
           });
    
    },
    methods:{

       resetInfoModal() {
        this.infoModal.title = ''
        this.infoModal.content = ''
      },
      onFiltered(filteredItems) {
        // Trigger pagination to update the number of buttons/pages due to filtering
        this.totalRows = filteredItems.length
        this.currentPage = 1
      },
      getdata(){
          this.userid=this.$session.get('userid');
          this.$http.get('http://127.0.0.1:8000/api/getmarkstable/'+this.$session.get('userid')+'/'+this.msg,{
          headers: {
            'Authorization': 'Bearer '+this.$session.get('jwt')
          }

            })
    .then(function(response){
     this.marks=response.body.marks;
  
     for (let index = 0; index < this.marks.length; index++) {
        
             this.items.push(this.marks[index]);
        }
        this.totalRows = this.items.length
           });
      },
hide(){
this.visible=0
},
      updata(){

     
this.visible=1

       this.series1=this.averag,
      new ApexCharts(this.$refs.barchart, {
      chart: {
        type: 'bar',
        height: 400
      },
      series: [{
        name: 'marks',
        data: this.mtdata
      }],
      xaxis: {
        // categories: ['test1','test2','test3','test4','test5','test6','test7', 'test8','test8']
        categories:this.cate
      },
      fill: {
  colors: ['#9C27B0']
},
      
    }).render()
    
      }
    }
 
}
</script>
