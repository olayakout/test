
<script>
	function get_date(field){
		var year=$j('#'.field).val();
		var month=$j('#'.field.'-mm').val();
		var day=$j('#'.field.'-dd').val();

		var date=date(year,month-1,day);
		return date;
	}
</script>