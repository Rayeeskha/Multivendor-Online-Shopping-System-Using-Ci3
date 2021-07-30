<!DOCTYPE html>
<html>
<head>
	<title>Verify Seller Account</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->view('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		td{font-weight: 500;font-size: 14px}
	</style>

</head>
<body>
<!---Body Section --->
<?php $this->load->view('Admin/topbar'); ?>
<!---Body Section -->
<!-----Body Section Start ----->
<div style="margin-right: 15px;margin-left: 15px">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-users" style="color: red"></span>&nbsp;Verify Seller Account</h5>
		</div>
		<div class="card-content">
			<table class="table">
				<tr>
					<th>Company Name</th>
					<th>Email</th>
					<th>Seller ID</th>
					<th>Mobile</th>
					<th>PinCode</th>
					<th>State</th>
					<th>City</th>
					<th>PAN</th>
					<th>GST No</th>
					<th>Aadhar UID</th>
					<th>Status</th>
					<th>Created at</th>
					<th>Action</th>
				</tr>
				<?php if($sellers):
				count($sellers);
				foreach($sellers as $sale): ?>
					<tr>
						<td><?= $sale->company_name; ?></td>
						<td><a href="mailto:<?= $sale->email; ?>"><?= $sale->company_name; ?></a></td>
						<td><?= $sale->seller_uid; ?></td>
						<td><a href="tel:<?= $sale->mobile_number ; ?>"><?= $sale->mobile_number ; ?></a></td>
						<td><?= $sale->pincode; ?></td>
						<td><?= $sale->state; ?></td>
						<td><?= $sale->city; ?></td>
						<td><?= $sale->panno; ?></td>
						<td><?= $sale->gstno; ?></td>
						<td><?= $sale->aadhar_number; ?></td>
						<td style="color: green"><?= $sale->status ?></td>
						<td style="color: green"><span class="fa fa-clock">&nbsp;<?= date('d M Y',strtotime($sale->created_date)) ?></span></td>
						<td>
							<center>
							<a href="#!" class="btn btn-flat btn-floating dropdown-trigger" data-target="action_dropdown_<?= $sale->id; ?>"><span class="fa fa-ellipsis-v"></span></a>
						</center>

						<!---Action Dropdown --->
						<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $sale->id; ?>">
							<?php if ($sale->status == "AdminVerification"):  ?>
							<li><a href="<?= base_url('Admin/Verify_seller_Account/'.$sale->id.'/Active'); ?>" style="border-bottom: 1px solid silver">
								<span class="fa  fa-eye-slash"></span>&nbsp;
							Verify</a></li>
							<?php else: ?>
								<li><a href="<?= base_url('Admin/Verify_seller_Account/'.$sale->id.'/Unverify'); ?>" style="border-bottom: 1px solid silver"><span class="fa fa-eye"></span>&nbsp;Unverify</a></li>
							<?php endif; ?>
							<li><a href="<?= base_url('Admin/delete_sale/'.$sale->id); ?>" onclick="return confirm('Are you sure you want to  delete this Coupan ?..');"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>
						</ul>
						<!---Action Dropdown --->
						</td>
					</tr>

				<?php endforeach; else: ?>
					<h6 style="color: red;font-weight: 500;font-size: 15px;">Not Any Seller Verification</h6>
				<?php endif; ?>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>
<!-----Body Section Start ----->



<!---Js file include --->
<?php $this->load->view('Home/js_file.php'); ?>
<!---Js file include --->

</body>
</html>