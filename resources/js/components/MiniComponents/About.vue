<template>
	<div class="row">
		<div class="col-md-12">

			<div class="col-md-3">
			
				<input ref="fileInput" type="file" @change="onFileSelected"  multiple style="display:none">
		
				<div class="user-block">
          
          <img class="img-circle" src="https://www.library.caltech.edu/sites/default/files/styles/headshot/public/default_images/user.png?itok=1HlTtL2d" data-toggle="modal" @click="$refs.fileInput.click()"  alt="User Image">
        
        </div>
				
				<div class="no_file">
					
					<span v-if="selectedFile"> {{selectedFile.name}}{{selectedFile.value}}  
							<i class="fa fa-times btn btn-xs btn-default" @click="removeFile" style="cursor:pointer">&nbsp;Close</i>
					</span>

					<span v-else> 
						No file choosen
					</span>

				</div>

			
			</div>

			<div class="col-md-9">
				
				<form>
						
						<div class="form-group" :class="{ 'has-error': submitted && errors.has('firstName') }">
							
							<label for="firstName">First Name</label>
							
							<input type="text" v-model="user.firstName" v-validate="'required'" name="firstName" class="form-control" />
							
							<span v-if="submitted && errors.has('firstName')" class="help-block">{{ errors.first('firstName') }}</span>
						
						</div>
						
						<div class="form-group" :class="{ 'has-error': submitted && errors.has('lastName') }">
															
							<label for="lastName">Last Name</label>
							
							<input type="text" v-model="user.lastName" v-validate="'required'" name="lastName" class="form-control"  />
							
							<span v-if="submitted && errors.has('lastName')" class="help-block">{{ errors.first('lastName') }}</span>
						
						</div>
						
						<div class="form-group" :class="{ 'has-error': submitted && errors.has('email') }">
							
							<label for="email">Email</label>
								
							<input type="email" v-model="user.email" v-validate="'required|email'" name="email" class="form-control"  />
							
							<span v-if="submitted && errors.has('email')" class="help-block">{{ errors.first('email') }}</span>
						
						</div>
					
					</form>
			
				</div>
			
			</div>  

			<div class="col-md-12 ">
				
				<button class="btn btn-success pull-right" @click.prevent="handleSubmit">Next</button>
			
			</div>
	
	</div>
</template>

<script>
export default {
		name: 'app',
		data () {
				return {
						user: {
								firstName: '',
								lastName: '',
								email: '',
						},
						submitted: false,

						selectedFile : ''
				}
		},
		methods: {

			onFileSelected(event) {
			
			this.selectedFile = event.target.files[0];
			
			var element=this.$refs.fileInput;
			
			element.value="";
						
		},

		removeFile() {
			
			this.selectedFile = null;
			
		},

		redirect(){
			window.eventHub.$emit('showAccountTab','account');
		},

				handleSubmit(e) {
						this.submitted = true;
						this.$validator.validate().then(valid => {
								if (valid) {
									this.$store.dispatch('setAboutData',this.user);
										this.redirect()
								}
						});
				}
		}
};
</script>

<style scoped>
	.img-circle{
		border: 5px solid #ccccc8 !important;
		width: 130px !important;
		height: 130px !important;
		cursor: pointer;
	}
	.user-block{
		position: relative;
    top: 20px;
    left: 37px;
	}
	.no_file{
		text-align: center;
		margin-top : 40px;
	}
</style>

