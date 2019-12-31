<template>
   <div id="app">
    
        <br>
     <vue-editor v-model="newForm.content" :editorToolbar="customToolbar"></vue-editor>
     <br>
     
     <button type="button" @click="get" class="btn btn-success">Send</button>
   </div>
 </template>

 <script>
   import { VueEditor } from 'vue2-editor'
import DatePicker from 'vue2-datepicker'
   export default {
  props:['msg','clz'],
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
         cid:'',
         sid:'',
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
        
             this.newForm.sid=this.msg
             this.newForm.cid=this.clz
             this.newForm.content='Message From Class ID: '+this.newForm.cid+'-'+this.newForm.content;
             console.log(this.newForm.content);
               this.$http.post('http://localhost:8000/api/addmsg', this.newForm ,{
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