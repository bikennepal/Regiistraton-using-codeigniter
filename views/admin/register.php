<?php include_once('header.php'); ?>
<div class="container">
	<h1>Admin form </h1>


	<?php  if($user=$this->session->flashdata('user')): 
 $user_class=$this->session->flashdata('msg_class');

 ?>
<div class="row">
<div class="col-lg-6">
<div class="alert <?= $user_class?>">
<?= $user; ?>
</div>
</div>
</div>

<?php endif; ?>
  
 <?php echo form_open('login/sendemail'); ?>
	<div class="form-group">
		<div class="row">
			<div class="col-lg-6">
		<label for="email">Username:</label>

		 
		<?php echo form_input(['class'=>'form-control','placeholder'=>'enter username','name'=>'username','value'=>set_value('username')]);?>
		<?php echo form_error('username',"<div class='text-danger'>","</div>"); ?>
	</div>
</div></div>
	<div class="form-group">
		<div class="row">
			<div class="col-lg-6">
		<label for="pwd">password:</label>
		<?php echo form_password(['class'=>'form-control','placeholder'=>'enter password','type'=>'password','name'=>'password','value'=>set_value('password')]); ?>
		<?php echo form_error('password',"<div class='text-danger'>","</div>"); ?>
	</div>
	</div></div>


	<div class="form-group">
		<div class="row">
			<div class="col-lg-6">
		<label for="pwd">Firstname:</label>
		<?php echo form_input(['class'=>'form-control','placeholder'=>'enter your name','type'=>'text','name'=>'firstname','value'=>set_value('firstname')]); ?>
		<?php echo form_error('firstname',"<div class='text-danger'>","</div>"); ?>
	</div>
	</div></div>

	<div class="form-group">
		<div class="row">
			<div class="col-lg-6">
		<label for="pwd">Lastname:</label>
		<?php echo form_input(['class'=>'form-control','placeholder'=>'enter password','type'=>'lastname','name'=>'lastname','value'=>set_value('lastname')]); ?>
		<?php echo form_error('lastname',"<div class='text-danger'>","</div>"); ?>
	</div>
	</div></div>

	<div class="form-group">
		<div class="row">
			<div class="col-lg-6">
		<label for="pwd">Email:</label>
		<?php echo form_input(['class'=>'form-control','placeholder'=>'enter password','type'=>'text','name'=>'email_id','value'=>set_value('email_id')]); ?>
		<?php echo form_error('email_id',"<div class='text-danger'>","</div>"); ?>
	</div>
	</div></div>
	<?php echo form_submit(['type'=>'submit','class'=>'btn btn-default','value'=>'Submit']); ?>
	<?php echo form_reset(['type'=>'reset','class'=>'btn btn-default','value'=>'reset']); ?>


</div>
<?php include_once('footer.php'); ?>