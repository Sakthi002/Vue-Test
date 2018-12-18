<template>
	
	<div class="row">
		
		<div class="col-md-12">

			<div class="col-md-4" v-for="check in checkBoxes">
			
				<input type="checkbox" :id="check.id" :value="check.value" v-model="checkedValues">
				
				<label>{{check.value}}</label>
				  
			</div>

		</div>

		<div class="col-md-12 ">
			
			<button class="btn btn-default pull-left" @click.prevent="goToPrevious()">Previous</button>
			
			<button class="btn btn-success pull-right" @click="handleSubmit()">Next</button>
			
		</div>
	
	</div>
</template>

<script>

export default {
		
		name: 'account-component',

		description : 'Account details component',
		
		data () {

			return {

				checkBoxes : [{id:'design',value : 'Design'},{id:'code',value : 'Code'},{id:'develop',value : 'Develop'}],
						
				checkedValues : [],

				base : window.axios.defaults.baseURL
			
			}
		
		},
		
		methods: {

			handleSubmit() {

				this.$store.dispatch('setAccountData',this.checkedValues);

				window.eventHub.$emit('showAddressTab','address');
							
			},

			goToPrevious(){
				window.eventHub.$emit('showAboutTab','about');
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
	.name{
		    margin-top: 30px;
    margin-left: 73px;
	}
</style>