<template>
  <div>
    <b-form @submit="onSubmit" @reset="onReset" v-if="show">
    

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
      <b-button type="submit" variant="primary">Submit</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
    </b-form>
    <b-card class="mt-3" header="Form Data Result">
      <pre class="m-0">{{ form }}</pre>
    </b-card>
  </div>
</template>

<script>
 import { VueEditor } from 'vue2-editor'
  export default {
       props:['msg'],
   components: {
      VueEditor
   },

    data() {
      return {
        form: {
        
          testno: '',
          content: "Some initial content",
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
      }
    },
    methods: {
      onSubmit(evt) {
        evt.preventDefault()
        alert(JSON.stringify(this.form))
      },
      onReset(evt) {
        evt.preventDefault()
   
        this.form.testno = ''
        this.form.content=''
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    }
  }
</script>