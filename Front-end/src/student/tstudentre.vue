<template>
   
  
    <div>
 
       recent exam results
        <br>
       All results
    
   <!-- <div>
     <apexchart  type="bar" :options="chartOptions" :series="series"></apexchart>
   </div> -->
 
   

<button @click="updata">graphical view </button>
<button @click="hide">hide </button>



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

      data() {
      return {
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
 this.$http.get('http://127.0.0.1:8000/api/getmarks/'+2,{
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
