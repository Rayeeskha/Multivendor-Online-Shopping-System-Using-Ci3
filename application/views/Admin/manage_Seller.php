<!DOCTYPE html>
<html>
<head>
	<title>Manage Seller - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->view('Home/css_file.php'); ?>
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
	</style>
</head>
<body>
<!---Body Section --->
<?php $this->load->view('Admin/topbar'); ?>
<!---Manage Category Section -->
<div style="margin-left: 15px; margin-right: 15px;">
	<div class="card" >
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<h5 style="font-weight: 500">Manage Seller</h5>
			<!--Category Search form --->
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Admin/search_sellers'); ?>
					<ul id="search_category">
						<li>
							<input type="text" name="company_name" id="input_box" value="<?= set_value('company_name'); ?>" placeholder="Enter Company Name" required="">
						</li>
						<li>
							<button type="submit" class="btn waves-effect waves-light" style="background: #13124e;box-shadow: none;text-transform: capitalize;height: 38px">Search Now</button>
						</li>
					</ul>
					<?= form_close(); ?>
				</div>
				<div class="col l6 m6 s12">
					<span class="right">
						<button type="button" class="btn waves-effect waves-light dropdown-trigger" data-target="category_filter" style="background: #13124e;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">
							<span class="fa fa-filter">&nbsp;Filter Seller</span>
						</button>
					</span>
					<!---Category filter -->
					<ul class="dropdown-content" id="category_filter">
						<li><a href="<?= base_url('Admin/filter_sellers_Details/new_sellers'); ?>" class="waves-effect" style="border-bottom: 1px solid silver">New Sellers </a></li>
						<li><a href="<?= base_url('Admin/filter_sellers_Details/old_sellers'); ?>" class="waves-effect" style="border-bottom: 1px solid silver">Old Sellers </a></li>
						
					</ul>
					<!---Category filter -->
				</div>
			</div>
			<!--Category Search form --->
		</div>
		<div class="card-content" style="padding: 0px">
			<table class="table">
				<tr>
					<th style="text-align: center;">Profile</th>
					<th>Company Name</th>
					<th>Email</th>
					<th>Seller UID</th>
					<th>Mobile Number</th>
					<th>Pin Code</th>
					<th>GST Number</th>
					<th>Aadhar UID</th>
					<th>Status</th>
					<th>Added date</th>
					<th style="text-align: center;">ACTION</th>
				</tr>
				<?php if($sellers):
					count($sellers);
					foreach($sellers as $pro):
				 ?>
				<tr>
					<td>
						<center>
							<?php if($pro->seller_profile !== ""): ?>
								<a class="tooltipped" data-position="top" data-tooltip="<?= $pro->company_name; ?>">
								<img src="<?= base_url().'uploads/seller_profile/'.$pro->seller_profile; ?>" class="responsive-img" id="category_image">
							<?php else: ?>
								<a class="tooltipped" data-position="top" data-tooltip="<?= $pro->company_name; ?>">
								<img src="<?= base_url('assets/images/dh.png'); ?>" class="responsive-img" id="category_image">
							<?php endif; ?>
						</a>
						</center>
					</td>
					<td style="font-size: 14px;color: grey;font-weight: 500">
						<?= $pro->company_name; ?><br>
					</td>
					<td style="font-size: 14px;color: grey;font-weight: 500">
						<a href="mailto:<?= $pro->email; ?>"><?= $pro->email; ?></a><br>
					</td>
					<td style="font-size: 14px;color: grey;font-weight: 500">
						<?= $pro->seller_uid; ?><br>
					</td>
					<td style="font-size: 14px;color: grey;font-weight: 500">
						<a href="tel:<?= $pro->mobile_number; ?>"><?= $pro->mobile_number; ?></a><br>
					</td>
					<td style="font-size: 14px;color: grey;font-weight: 500">
						<?= $pro->pincode; ?><br>
					</td>
					<td style="font-size: 14px;color: grey;font-weight: 500">
						<?= $pro->gstno; ?><br>
					</td>
					<td style="font-size: 14px;color: grey;font-weight: 500">
						<?= $pro->aadhar_number; ?><br>
					</td>
					<td style="font-size: 14px;color: green;font-weight: 500"><?= ($pro->status == "Active")? 'Active': 'InActive'; ?></td>
					<td style="font-size: 14px;color: grey;font-weight: 500">
						<?= date('D M Y h:i:s', strtotime($pro->created_date)); ?><br>
					</td>

					<td>
						<center>
							<a href="#!" class="btn btn-flat btn-floating dropdown-trigger" data-target="action_dropdown_<?= $pro->id; ?>"><span class="fa fa-ellipsis-v"></span></a>
						</center>

						<!---Action Dropdown --->
						<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $pro->id; ?>">
							<li><a href="<?= base_url('Admin/edit_seller_details/'.$pro->id); ?>" style="border-bottom: 1px solid silver"><span class="fa fa-edit" style="color: blue;"></span>&nbsp;Edit</a></li>
							<li><a href="<?= base_url('Admin/delete_seller_rec/'.$pro->id); ?>" onclick="return confirm('Are you sure you want to  delete this Product ?..');" style="border-bottom: 1px solid silver"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>
							<?php if ($pro->status == "Active"):  ?>
							<li><a href="<?= base_url('Admin/change_seller_status/'.$pro->id.'/InActive'); ?>" style="border-bottom: 1px solid silver">
								<span class="fa  fa-eye-slash"></span>&nbsp;
							Inactive</a></li>
							<?php else: ?>
								<li><a href="<?= base_url('Admin/change_seller_status/'.$pro->id.'/Active'); ?>" style="border-bottom: 1px solid silver"><span class="fa fa-eye"></span>&nbsp;Active</a></li>
							<?php endif; ?>
						</ul>
						<!---Action Dropdown --->
					</td>
				</tr>
			<?php endforeach; 
			else: ?>
				<tr>
					<td colspan="5" style="text-align: center; font-weight: 500;color: red;font-size: 14px;">Sellers Records Found</td>
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

<!---Body Section --->


<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->

</body>
</html>