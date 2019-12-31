<template>
   <div id="app">
      <b-form inline>
      Date :     <date-picker v-model="newForm.Datevalue" :lang="lang"></date-picker>
      <label class="mr-sm-2" for="inline-form-custom-select-pref"> Today Class</label>
    <b-form-select
      class="mb-2 mr-sm-2 mb-sm-0"
      v-model="newForm.value"
      :options="{ '1': 'Yes', '0': 'No' }"
      id="inline-form-custom-select-pref"
    >
      <option slot="first" :value="null">Choose...</option>
    </b-form-select>
     </b-form>
        <br>
     <vue-editor v-model="newForm.content" :editorToolbar="customToolbar"></vue-editor>
     <!-- <button @click="get"  >Add  </button> -->
     <br>

     <button type="button"  @click="get" class="btn btn-success">Add</button>
   </div>
 </template>

 <script>
   import { VueEditor } from 'vue2-editor'
import DatePicker from 'vue2-datepicker'
   export default {
  props:['msg'],
   components: {
      VueEditor,
      DatePicker
   },

   data() {
       return {
        
          newForm:{
        content: "Some initial content",
         Datevalue:'',
        value:'',
         cid:''
        },
         customToolbar: [
          ["bold", "italic", "underline", "strike"],
          ["blockquote", "code-block"],
          [{ header: 1 }, { header: 2 }],
          [{ list: "ordered" }, { list: "bullet" }],
          [{ script: "sub" }, { script: "super" }],
          [{ indent: "-1" }, { indent: "+1" }],
          [{ direction: "rtl" }],
          [{ size: ["small", false, "large", "huge"] }],
          [{ header: [1, 2, 3, 4, 5, 6, false] }],
          [{ font: [] }],
          [{ color: [] }, { background: [] }],
          [{ align: [] }],
          ["clean"],
          ["link", "image", "video"]
        ],
          lang: {
        days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        months: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        pickers: ['next 7 days', 'next 30 days', 'previous 7 days', 'previous 30 days'],
        placeholder: {
          date: 'Select Date',
          dateRange: 'Select Date Range'
        }
      },
      // custom range shortcuts
      shortcuts: [
        {
          text: 'Today',
          onClick: () => {
            this.time3 = [ new Date(), new Date() ]
          }
        }
      ],
      timePickerOptions:{
        start: '00:00',
        step: '00:30',
        end: '23:30'
      }
       }
     },
     methods:{
         get(){
           console.log(this.newForm.value)
             this.newForm.cid=this.msg
               this.$http.post('http://localhost:8000/api/addcontent', this.newForm ,{
             headers: {
            'Authorization': 'Bearer ' + this.$session.get('jwt')
          }}).then(function (response) {
            // alert("done");
             console.log(response.body);
              
          }, function (err) {
            console.log('err', err)
            // this.errorAnabile=true;

          })
         }
     }
   }
 </script>