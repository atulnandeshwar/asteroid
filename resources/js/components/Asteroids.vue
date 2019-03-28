<template>
	
	<div>
		<line-chart></line-chart>
		<date-range-picker></date-range-picker>	
		
	</div>
</template>
<script>
	import DateRagePicker from './dateragepicker.vue';
	import LineChart from './LineChart';	
	
    export default {
		components:{
			'line-chart' : LineChart,
			'date-range-picker' : DateRagePicker
		}
	}

</script>
