<template>
    <div>
       
        <template>
  <div>
  Enter the date :     <date-picker v-model="form.value" :lang="lang"></date-picker>
  
  </div>
</template> 
<br>
  <b-form-file
      v-model="file"
      :state="Boolean(file)"
      placeholder="Choose a file..."
      drop-placeholder="Drop file here..."
    ></b-form-file>
    <div class="mt-3">Selected file: {{ file ? file.name : '' }}</div>
    <br>
    <b-form-group id="input-group-2" label="Test Number:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="form.testno"
          required
          placeholder="Test Number"
        ></b-form-input>
      </b-form-group>
     Add description here
      <vue-editor v-model="form.content" :editorToolbar="customToolbar"></vue-editor>

     <br>
  <!-- <button @click="addresult" variant="primary"> Submit</button> -->
   <b-button type="submit"  @click="addresult" variant="primary">Submit</b-button>
   <b-button @click="reset" variant="danger">Reset</b-button>
    </div>
</template>


<script>
import DatePicker from 'vue2-datepicker'
  import { VueEditor } from 'vue2-editor'
export default {
   props:['msg'],
  components: { DatePicker , VueEditor},
  data() {
    return {
      file:null,
     
      text:null,
       form: {
         value:'',
          testno: '',
          content: "",
        },
        show: true,
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
      // custom lang
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
      addresult(){
    
         var formData = new FormData();
    
       
              formData.append('file', this.file);
              formData.append('Date', this.form.value);
              formData.append('testno',this.form.testno);
              formData.append('description',this.form.content);
              formData.append('classid', this.msg);  
      
           this.$http.post('http://localhost:8000/api/addresult', formData ,{
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
           onSubmit(evt) {
        evt.preventDefault()
        alert(JSON.stringify(this.form))
      },
      reset(evt) {
        evt.preventDefault()
   
        this.form.testno = ''
        this.form.value=''
        this.form.content=''
        this.show = false
        this.file=''
        this.$nextTick(() => {
          this.show = true
        })
      }
  }
}
</script> 