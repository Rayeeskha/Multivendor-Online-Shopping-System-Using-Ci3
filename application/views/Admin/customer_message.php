<!DOCTYPE html>
<html>
<head>
	<title>Technical Support - My Shop</title>
	<!--CSS FILE INCLUDE --->
	<?php $this->load->View('Home/css_file.php'); ?>
	<!--CSS FILE INCLUDE --->
	<style type="text/css">
		body{background: #ffebe5}
		
		 .btn-flat:hover{background: #13124e;color: white}
		 .action_dropdown li a{color: grey;font-size: 14px;font-weight: 500}
		 .action_dropdown{width: 120px !important;}
		 
		 #search_category{display: flex;}
		 #search_category li:first-child{width: 250px;}
		 #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 38px; border-radius: 0px;}
		 #pagination a{color: black; font-weight: 500;border: 1px solid black;padding:5px 8px;margin-left: 5px;border-radius: 3px;}
		 #pagination strong{font-weight: 500;border: 1px solid black;padding:5px 8px;margin-left: 5px; background: black;color: white;border-radius: 3px;}
		 table tr td{font-size: 14px;font-weight: bold;padding: 5px;}
	</style>
</head>
<body>
<!---Body Section --->
<?php $this->load->View('Admin/topbar'); ?>
<!---Order Section -->
<div style="margin-left: 15px; margin-right: 15px;">
	<div class="card" >
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-comments" style="color: #ff3d00"></span>&nbsp; Customer Message</h5>
			<!--Category Search form --->
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Admin/search_customer_message'); ?>
					<ul id="search_category">
						<li>
							<input type="text" name="customer_name" id="input_box" value="<?= set_value('fullname'); ?>" placeholder="Enter Customer Name" required="">
						</li>
						<li>
							<button type="submit" class="btn waves-effect waves-light" style="background: green;box-shadow: none;text-transform: capitalize;height: 38px">Search Message</button>
						</li>
					</ul>
					<?= form_close(); ?>
				</div>
				<div class="col l6 m6 s12">
					
				</div>
			</div>
			<!--Category Search form --->
		</div>
		<div class="card-content" style="padding: 0px">
			<table class="table">
				<tr>
					
					<th style="text-align: center;">Customer ID</th>
					<th>Customer Name</th>
					
					<th>Register Date</th>
					
					<th>Mobile Number</th>
					<th style="text-align: center;">Action</th>
				</tr>
				<?php if(count($customer_message)):
					foreach($customer_message as $c_message):
				 ?>
				<tr>
					<td style="text-align: center;">
						<a href="#!"><?= $c_message->user_id; ?></a>
					</td>
					<td>
						<?= $c_message->full_name; ?>
					</td>
					
					
					<td><?= date('d M Y',strtotime($c_message->message_date)); ?></td>
					<td><a href="tel:<?= $c_message->mobile; ?>"><?= $c_message->mobile; ?></a></td>
					
					<td>
						<center>
							<button type="button" class="btn btn-flat btn-floating dropdown-trigger" 
							data-target="user_Action_<?= $c_message->id; ?>">
							<span class="fa fa-ellipsis-v"></span>
						</button>
						</center>

						<!--Order Action Dropdown --->
						<ul class="dropdown-content action_dropdown" id="user_Action_<?= $c_message->id; ?>">
							<li><a href="<?= base_url('Admin/delete_message/' .$c_message->user_id); ?>"
							 onclick="return confirm('Confirmation ! Are You Sure You want to Delete this Order ?')" class="waves-effect">
							 <span class="fa fa-trash"style="color: red"></span>&nbsp;
							Delete </a></li>
							 <li><a href="<?= base_url('Admin/show_message/' .$c_message->user_id); ?>" target="_blank" class="waves-effect"><span class="fa fa-eye" style="color: green"></span> &nbsp;View </a></li> 
							
						</ul>
						<!--Order Action Dropdown --->
					</td>
				</tr>
				<?php endforeach;
				else: ?>
					<tr>
						<td colspan="7" style="text-align: center;color: red;font-weight: 500;font-size: 20px;">Customer's Message Not Found</td>
					</tr>
				<?php endif; ?>
				<tr>
				<td colspan="7" style="padding: 15px;">
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
<?php $this->load->View('Home/js_file.php'); ?>
<!---Js file include --->

<!---Custom Js file --->
<?php $this->load->View('Admin/custom_js'); ?>
<!---Custom Js file --->
</body>
</html>