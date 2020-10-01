		<!-- dalam div row harus ada col yang maksimum nilainya 12 -->

			<div class="col-md-1"></div>
			<div class="col-md-10">
			
				<table id="myTable" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Product Name</th>
							<th>Product Image</th>
							<th>Price</th>
							<th>
								<?=anchor(	'create',
											'Add Product', 
											['class'=>'btn btn-primary btn-sm'])
								?>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach($products as $product) : ?>
						<tr>
							<td><?=$no?></td>
							<td><?=$product->name?></td>
							<td><?php
								$product_image = [	'src'	=> $product->image,
													'height'	=> '50'
													];
								echo img($product_image)
							?></td>
							<td><?=$product->price?></td>
							<td>
								<?=anchor(	'update/' . $product->id, 
											'Edit',
											['class'=>'btn btn-default btn-sm'])
								?> 
								<?=anchor(	'delete/' . $product->id, 
											'Delete',
											['class'=>'btn btn-danger btn-sm',
											 'onclick'=>'return confirm(\'Apakah Anda Yakin?\')'
											])
								?> 
							</td>
						</tr>
						<?php $no++; endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="col-md-1"></div>
		
		
		<script>
			$(document).ready(function(){
				$('#myTable').DataTable();
			});
		</script>