<template>
	<div class="row">

		<div class="col-md-12">
			
			<div class="col-md-6">
					
				<div class="form-group">
						
					<label for="Streetname">Street name</label>
						
					<input type="text" v-model="street_name" class="form-control" id="street_name" placeholder="Enter Street name">
					
				</div>
			
			</div>

			<div class="col-md-6">
					
				<div class="form-group">
						
					<label for="Streetnumber">Street number</label>
						
					<input type="text" v-model="street_num" class="form-control" id="street_num" placeholder="Enter Street number">
					
				</div>
			
			</div>

		</div>

		<div class="col-md-12">
			
			<div class="col-md-6">
					
				<div class="form-group">
						
					<label for="City">City</label>
						
					<input type="text" v-model="city" class="form-control" id="city" placeholder="Enter city">
					
				</div>
			
			</div>

			<div class="col-md-6">

				<label for="Country">Country</label>
		
				<select
						class="form-control"
						v-model="selectedValue"
						name="name"
						v-on:change="onChange(selectedValue)"
						id="id"
				>
						<!--if selectedValue is empty then this else not-->
					<option value="" v-if="!hideEmptySelect">Select</option>
						
					<option v-for="element in elements" v-bind:value="element.id" :key="element.id">
								{{element.name}}
					</option>

				</select>

			</div>

		</div>

		<div class="col-md-12 ">
			
			<button class="btn btn-default pull-left" @click.prevent="goToPrevious()">Previous</button>
			
			<button class="btn btn-success pull-right" @click.prevent="csvExport()" :disabled="isDisabled">Finish</button>
			
		</div>
	
	</div>

</template>

<script type="text/javascript">

import { mapGetters } from 'vuex'

	export default {
		data(){
			return{
				selectedValue : '',

				street_name : '',
				
				street_num : '',

				city : '',

				elements : [{id:1,name:'India'},{id:2,name:'Russia'},{id:3,name:'Cuba'},{id:4,name:'Argentina'},{id:5,name:'China'}],
				
				hideEmptySelect : false,
				
			}
		},

		computed:{
			isDisabled(){
				return this.street_name !== '' && this.street_num !== '' && this.city !== '' && this.selectedValue !== '' ? false : true 
			},

			...mapGetters(['getAboutDetails','getAccountDetails'])
		},

		methods:{
			onChange(val){
				this.selectedValue = val;
				console.log(this.selectedValue)
			},

			csvExport() {
				console.log(this.getAboutDetails,'drer')
				let arrData = [];
				arrData.push(this.getAboutDetails)
				arrData.push(this.getAccountDetails)
	      let csvContent = "data:text/csv;charset=utf-8,";
	      csvContent += [
	        Object.keys(arrData[0]).join(";"),
	        ...arrData.map(item => Object.values(item).join(";"))
	      ]
	        .join("\n")
	        .replace(/(^\[)|(\]$)/gm, "");

	      const data = encodeURI(csvContent);
	      const link = document.createElement("a");
	      link.setAttribute("href", data);
	      link.setAttribute("download", "export.csv");
	      link.click();
	    },

			goToPrevious(){
				window.eventHub.$emit('showAccountTab','account');
			}
		}
	};
</script>