<!DOCTYPE html>
<html>
<head>
	<title>codeigniter Dynamic Dependent Select Box using Ajax</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type=""></style>
</head>
<body>
	<div class="container box">
		<br/>
		<br/>
		<h3 align="center">
			codeigniter Dynamic Dependent Box using Ajax
		</h3>
		<br>
		<div class="form-group">
			<select name="country"id="country" class="form-control input-lg">			<option value="">select country</option>
			<?php 
			foreach($country as $row)
			{
				echo '<option value="'.$row->country_id.'">'.$row->country_name.'</option>';
			} ?>
			</select>

		</div>




		<div class="form-group">
			<select name="state"id="state" class="form-control input-lg">			<option value="">select state</option>
			 
			</select>

		</div>



		<div class="form-group">
			<select name="city"id="city" class="form-control input-lg">			<option value="">select city</option>
			 
			</select>

		</div>
	</div>

</body>
</html>
<script>
	$(document).ready(function(){
		$('#country').change(function(){
			var country_id = $('#country').val();
			if(country_id !='')
			{
				$.ajax({
					url:"<?php echo base_url();?>dynamic_dependent/fetch_state",
					method:"POST",
					data:{country_id:country_id},
					success:function(data)
					{
						$('#state').html(data);
						$('#city').html('<option value="")select ciyt</option>);                          
					} 
				});
			}
			else
			{
				$('#state').html('<option value="">select state</option>');
				$('#City').html('<option value="">select city</option>');

			}
		});
				$('#state').change(function(){
					var state_id = $('#state').val();
						if(state_id !='')
			{
				$.ajax({
					url:"<?php echo base_url();?>dynamic_dependent/fetch_state",
					method:"POST",
					data:{state_id:state_id},
					success:function(data)
					{
						$('#city').html(data);
						                           
					} 
				});
			}

			else{
				$('#city').html('<option value="">select city</option>');
				}
			
			});
		});


</script>