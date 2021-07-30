<!DOCTYPE html>
<html>
<head>
	<title>Coupan Master - E-Commerce</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		#category_image{width: 40px;height: 40px;border-radius: 100%;border: 1px  solid silver}
		 .btn-flat:hover{background: #13124e;color: white}
		 .action_dropdown li a{color: grey;font-size: 14px;font-weight: 500}
		 .action_dropdown{width: 120px !important;}
		 #category_filter{width: 180px !important;padding-top: 8px;padding-bottom: 8px;}
		 #category_filter li a{color: grey;font-size: 14px;font-weight: 500;}
		 #search_category{display: flex;}
		 #search_category li:first-child{width: 250px;}
		 #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 38px; border-radius: 0px;}
		 #pagination a{color: black; font-weight: 500;border: 1px solid black;padding:5px 8px;margin-left: 5px;border-radius: 3px;}
		 #pagination strong{font-weight: 500;border: 1px solid black;padding:5px 8px;margin-left: 5px; background: black;color: white;border-radius: 3px;}
		 h6{font-weight: 500;font-size: 15px;}
		 select{display: block;}
		 select{border: 1px solid silver;height: 35px;padding-left: 10px; box-shadow: none;}
	</style>
</head>
<body>
<!---Body Section --->
<?php $this->load->View('Admin/topbar'); ?>
<!---Manage Category Section -->
<div style="margin-left: 15px; margin-right: 15px;">
	<div class="card" >
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<h5 style="font-weight: 500"><span class="fa fa-compass" style="color: #ff3d00"></span>&nbsp;Coupan Master </h5>
			<!--Category Search form --->
			<div class="row">
				<div class="col l6 m6 s12"></div>
				<div class="col l6 m6 s12">
					<span class="right">
						<a class="waves-effect waves-light btn modal-trigger" href="#modal1" style="background: #13124e;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;"><span class="fa fa-filter">&nbsp;Add Coupan Code</span></a>

					</span>
					<!------Add Coupan Modal ------>
					<?= form_open('Admin/add_coupan_master'); ?>
					<div id="modal1" class="modal">
					    <div class="modal-content">
					      <h4 style="border-bottom: 1px solid silver">Add Coupan Code</h4>
					      <h6>Coupan Code</h6>
					      <input type="text" name="coupan_code" id="input_box" required="" placeholder="Enter Coupan Code">
					      <h6>Coupan Value</h6>
					      <input type="text" name="coupan_value" id="input_box" required="" placeholder="Enter Coupan Value">
					      <h6>Coupan Type</h6>
					      <select name="coupan_type" required="">
					      	<option selected="" disabled="">Select Coupa Type</option>
					      	<option value="Percentage">Percentage</option>
					      	<option value="Rupee">Rupee</option>
					      </select>
					      <h6>Cart Minimum Value</h6>
					      <input type="text" name="cart_min_value" required="" id="input_box" placeholder="Enter Cart Min Value">
					      <h6>Expiry Date</h6>
					      <input type="date" name="expiry_date" id="input_box">
					    </div>
					    <div class="modal-footer">
					    	<button type="submit" class="btn waves-effect waves-light"  style="background: green;color: white; text-transform: capitalize;font-weight: 500;outline: none;box-shadow: none;"><span class="fa fa-compass" style="color: #fff"></span>&nbsp;create Coupon</button> 
					      <a href="#!" class="modal-close waves-effect waves-green btn-flat" style="background: red;color: white; text-transform: capitalize;font-weight: 500;outline: none;box-shadow: none;">Cancel</a>
					    </div>
					  </div>
					 <?= form_close(); ?> 
					<!------Add Coupan Modal ------>
				</div>
			</div>
			<!--Category Search form --->
		</div>
		<div class="card-content" style="padding: 0px">
			<table class="table">
				<tr>
					<th style="text-align: center;">Coupan Type</th>
					<th>Coupan Code</th>
					<th>Coupan Value</th>
					<th>Cart Min Value</th>
					<th>Expiry Date</th>
					<th>Expired Coupon</th>
					<th>Status</th>
					<th>Action</th>
					
				</tr>
				<?php if(count($coupan_master)):
					foreach($coupan_master as $coupan):
				 ?>
				<tr>
					<td style="font-size: 14px;color: grey;font-weight: 500;text-align: center;">
						<?= $coupan->coupan_type; ?><br>
					</td>
					<td style="font-size: 14px;color: grey;font-weight: 500">
						<?= $coupan->coupan_code; ?><br>
					</td>
					<td style="font-size: 14px;color: orange;font-weight: 500">
						<?php if($coupan->coupan_type == 'Rupee'): ?>
							<span class="fa fa-rupee-sign" >&nbsp;<?= $coupan->coupan_value; ?></span>
						<?php else: ?>
							<?= $coupan->coupan_value; ?> %
						<?php endif; ?>
						<br>
					</td>
					<td style="font-size: 14px;color: grey;font-weight: 500">
						<?= $coupan->cart_min_value; ?><br>
					</td>
					<td style="font-size: 14px;color: grey;font-weight: 500">
						<span class="fa fa-clock" style="color: green"></span>
						<?= date('d M Y',strtotime($coupan->expiry_date)); ?><br>
					</td>
					<td style="font-size: 14px;color: grey;font-weight: 500">
						<?php if($coupan->expiry_date < date('Y-m-d')): ?>
							<h6 style="color: red;font-weight: 500;font-size: 12px;">Expired Coupon </h6>
						<?php else: ?>
						<?php endif; ?>
						<br>
					</td>
					<td style="font-size: 14px;color: grey;font-weight: 500"><?= ($coupan->status == "0")? '<span style="color: green">Active</span>': '<span style="color: red">Expire</span>'; ?></td>
					<td>
						<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $coupan->id; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>

						<a class="waves-effect waves-light btn modal-trigger" href="<?= base_url('Admin/edit_coupon_master/'.$coupan->id); ?>" style="background: #13124e;box-shadow: none;text-transform: capitalize;"><span class="fa fa-edit">&nbsp;Edit</span></a>
						<a href="<?= base_url('Admin/delete_coupan_mster_rec/'.$coupan->id); ?>" class="waves-effect waves-light btn "  style="background: red;box-shadow: none;text-transform: capitalize;"><span class="fa fa-trash">&nbsp;delete</span></a>


							<!---Action Dropdown --->
						<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $coupan->id; ?>">
							<?php if ($coupan->status == "0"):  ?>
							<li><a href="<?= base_url('Admin/change_coupn_master_status/'.$coupan->id.'/1'); ?>"><span class="fa  fa-eye" style="color: red"></span>&nbsp;
							Deactivate</a></li>
							<?php else: ?>
								<li><a href="<?= base_url('Admin/change_coupn_master_status/'.$coupan->id.'/0'); ?>"><span class="fa fa-eye" style="color: #ff3d00"></span>&nbsp;Activate</a></li>
							<?php endif; ?>
						</ul>
						<!---Action Dropdown --->




					</td>
					
					
				</tr>
			<?php endforeach; 
			else: ?>
				<tr>
					<td colspan="5" style="text-align: center; font-weight: 500;color: red;">Coupan  Not Found</td>
				</tr>
			<?php endif; ?>
			<tr>
				<td colspan="7">
					<div id="pagination">
						<?= $this->pagination->create_links(); ?>
					</div>
				</td>
			</tr>
			</table>
		</div>
	</div>
</div>
<!---Manage Category Section -->

<!------Edit Coupan Modal ------->




<!---Body Section --->


<!---Js file include --->
<?php $this->load->View('Home/js_file.php'); ?>
<!---Js file include --->

</body>
</html>