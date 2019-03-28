
    <date-range-picker 
        :startDate="startDate" 
        :endDate="endDate" 
        @update="console.log(value)"
        :locale-data="locale"
        :opens="opens"       
    >
    <div slot="input" slot-scope="picker"></div>
	</date-range-picker>

<script>	
import DateRangePicker from 'vue2-daterange-picker'
 
export default {
    extend: { DateRangePicker },
    data() {
        return {
            startDate: '2017-09-05',
            endDate: '2017-09-15',
            opens: "center"
            
        }
    }
}
</script>