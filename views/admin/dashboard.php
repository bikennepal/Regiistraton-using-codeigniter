 <?php include_once('header.php'); ?>
 <div class="container">
 	<div class="row">
 		<a href="adduser" class="btn btn-lg btn-primary"style="margin-top:50px;">Add Articles</a>
 	</div>
 
 <?php  if($error=$this->session->flashdata('msg')): 
 $msg_class=$this->session->flashdata('msg_class');

 ?>
<div class="row">
<div class="col-lg-6">
<div class="alert <?= $msg_class?>">
<?= $error; ?>
</div>
</div>
</div>

<?php endif; ?>
  </div>
  <!-- <?php echo $this->db->last_query(); ?> -->
 <div class="container">
 <div class="table">
 	<table>
 	<thead>
 		<tr>
 			
 			<th>articles title</th>
 			<th>Edit</th>
 			<th>Delete</th>
 		</tr>
  
 	</thead>
 	<tbody>
 		<?php if(count($articles)): ?>
 			<?php foreach($articles as $art): ?>
 		<tr>
 			<td>1</td>
 			<td><?php echo $art->article_title; ?></td>
 			<td><?= anchor("admin/edituser/{$art->id}",'Edit',['class'=>'btn btn-primary']); ?></td>
 			  
 			<td>
 				<?=
 				form_open('admin/delarticles'),
 				form_hidden('id',$art->id),
 				form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
 				form_close(); ?>
 			</td>

 		</tr>
 	<?php endforeach; ?>
 	<?php else:?>
 	<tr>
 		<td colspan="3">no data avalible</td>
 	</tr> 
 <?php endif; ?>
 	</tbody>

 	
 	 
 	</table>
<?php echo $this->pagination->create_links(); ?> 
 </div>

	</div>

 <?php include_once('footer.php'); ?>