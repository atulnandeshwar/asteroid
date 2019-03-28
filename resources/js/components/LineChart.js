import { Line } from 'vue-chartjs';

export default  {
  extends: Line,
  mounted () {
    this.fetchAsteroid();
    
  },
  data(){
  	return {
  		rows:[],
  		labels:[]
  	}
  },
  created(){
  	 
  },
  methods:{
  	setGraph(){
        
  		  this.renderChart({
	      labels: this.labels,
	      datasets: [
	        {
	          label: 'Neo Stats',
	          backgroundColor: '#f87979',
	          data: this.rows
	        }
	      ]
	    });
  	},
  	fetchAsteroid(){
      
  		fetch('api/asteroids')
  			.then(res => res.json())
  			.then(res => {
  				//console.log(res);
          this.rows = res.line_chart_data;
          this.labels = res.line_chart_option;
          this.setGraph();
  		});
  	}
  }

};