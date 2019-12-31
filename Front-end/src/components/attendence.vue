<template>
    
    <div>

  

         <!-- <div style="position:relative;">
		<a class='btn btn-primary' href='javascript:;'>
			Choose File...
			<input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
		</a>
		&nbsp;
		<span class='label label-info' id="upload-file-info"></span>
	</div> -->

        <br>
            <b-form-file
      v-model="file"
      :state="Boolean(file)"
      placeholder="Choose a file..."
      drop-placeholder="Drop file here..."
    ></b-form-file>
    <div class="mt-3">Selected file: {{ file ? file.name : '' }}</div>
  
  <br>

  <!-- <button @click="send">SUBMIT</button> -->
  <button type="button"  @click="send" class="btn btn-success">SUBMIT</button>
    </div>
</template>


<script type="text/javascript">

export default {
   props:['msg'],
    data(){
        return{
            file:null,

        }
    },
    methods:
    {
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

      }
    }
}
</script>
