<?php 
echo $script_name;
if($script_name=="index.php" && isset($_GET['signIn'])){
?>

<script>
$j("body").css( "background-color", "pink" );
</script>
<?php
	}
	?>