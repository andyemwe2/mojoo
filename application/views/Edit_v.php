<?php
	$id 			= $product->id;
if($this->input->post('is_submitted')){
	$name			= set_value('name');
	$description	= set_value('description');
	$price			= set_value('price');
} else {
	$name			= $product->name;
	$description	= $product->description;
	$price			= $product->price;
}
?>
<!doctype html>
		<!-- dalam div row harus ada col yang maksimum nilainya 12 -->
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<h1>Edit Product</h1>
				<div><?= validation_errors() ?></div>
				<?= form_open_multipart('product/update/' . $id, ['class'=>'form-horizontal']) ?>
					
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="name" placeholder="" value="<?= $name ?>">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Description</label>
						<div class="col-sm-10">
						  <textarea class="form-control" name="description"><?= $description ?></textarea>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Price</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" name="price" placeholder="" value="<?= $price ?>">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Product Image</label>
						<div class="col-sm-10">
						  <input type="file" class="form-control" name="userfile" >
						</div>
					  </div>
					  
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <input type="hidden" name="is_submitted" value="1" />
						  <button type="submit" class="btn btn-default">Save</button>
						</div>
					  </div>
					
				<?= form_close() ?>
			</div>
			<div class="col-md-1"></div>
		</div>
		
		
		<script>
			$(document).ready(function(){
				$('#myTable').DataTable();
			});
		</script>