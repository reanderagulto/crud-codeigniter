		
		
		<!-- Page Content -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1 class="mt-5">Employee List</h1>
					<p class="lead">
						This module populate the table with the employees` data. <br>
						This module will also search, update and delete employees.
					</p>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-lg-12 mx-auto">
					<?php if($show_error !== null && $show_error !== false) {?>
						<?php if($show_error === "DEL0001" || $show_error === "UPT0001") { ?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<?php echo constant($show_error); ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php } ?>	
						<?php if($show_error === "DB0002") { ?>
							<div class="alert alert-warning alert-dismissible fade show" role="alert">
								<?php echo constant($show_error); ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php } ?>
					<?php } ?>
					<h2><?=LISTEMP?></h2>
					<hr>
					<a href="<?=base_url()?>index.php/MainController/addEmployee" class="btn btn-primary">Create</a>
					<br><br>
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Emp. No</th>
								<th>Full Name</th>
								<th>Contact</th>
								<th>Email</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($emplist as $emp) { ?>
								<tr>
									<td><?=$emp['emp_no']?></td>
									<td><?=$emp['f_name']?> <?=$emp['l_name']?></td>
									<td><?=$emp['contact']?></td>
									<td><?=$emp['email']?></td>
									<td>
										<button class="btn btn-primary btn-read" id="<?=$emp['emp_id']?>" data-toggle="modal" data-target="#mdlRead"><i class="fa fa-search-plus"></i></button>
										<button class="btn btn-success btn-edit" id="<?=$emp['emp_id']?>" data-toggle="modal" data-target="#mdlEdit"><i class="fa fa-pencil-alt"></i></button>
										<button class="btn btn-danger btn-delete" id="<?=$emp['emp_id']?>" data-toggle="modal" data-target="#mdlDelete"><i class="fa fa-times"></i></button>

									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="mdlRead" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Employee's Information</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<div class="form-group">
					<label for="exampleInputEmail1"><?=EMPNO?></label>
					<input type="text" class="form-control" name="txtempno" id="txtempno" readonly>
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1"><?=FNAME?></label>
					<input type="text" class="form-control" name="txtfname" id="txtfname" readonly>
				</div>
				
				<div class="form-group">
					<label for="exampleInputPassword1"><?=MNAME?></label>
					<input type="text" class="form-control" name="txtmname" id="txtmname" readonly>
				</div>
				
				<div class="form-group">
					<label for="exampleInputPassword1"><?=LNAME?></label>
					<input type="text" class="form-control" name="txtlname" id="txtlname" readonly>
				</div>
				
				<div class="form-group">
					<label for="exampleInputPassword1"><?=ADDRESS?></label>
					<textarea class="form-control" name="txtaddress" id="txtaddress"  style="resize:none;" readonly></textarea>
				</div>
				
				<div class="form-group">
					<label for="exampleInputPassword1"><?=EMAIL?></label>
					<input type="text" class="form-control" name="txtemail" id="txtemail" readonly>
				</div>
				
				<div class="form-group">
					<label for="exampleInputPassword1"><?=CONTACT?></label>
					<input type="text" class="form-control" name="txtcontact" id="txtcontact"  readonly>
				</div>
							
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="mdlEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-update " role="document">
			</div>
		</div>
		
				<!-- Modal -->
		<div class="modal fade" id="mdlDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<input type="hidden" id="txtempid_del" name="txtempid_del" />
					<div class="modal-body">
						<h4 align="center">Are you sure you want to delete the employee's information?</h4>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" id="btnYes_Del">Yes</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					</div>
				</div>
			</div>
		</div>
	
	
		<script>
			$(document).ready(function()
			{
				$('.btn-read').on('click', function()
				{	
					var id = $(this).attr('id');
					var dataString = { 
                        id : id
                    };
					$.ajax(
					{
						type: "POST", 
                        url: "<?=base_url()?>index.php/MainController/getIndiData",
                        data: dataString,
                        dataType: "json",
                        cache: false,
						success: function(data)
						{
							$('#txtempno').val(data.emp_no);
							$('#txtfname').val(data.f_name);
							$('#txtmname').val(data.m_name);
							$('#txtlname').val(data.l_name);
							$('#txtaddress').val(data.address);
							$('#txtemail').val(data.email);
							$('#txtcontact').val(data.contact);
						}
					});
				});
				
				$('.btn-edit').on('click', function()
				{	
					var id = $(this).attr('id');
					var dataString = { 
                        id : id
                    };
					$.ajax(
					{
						type: "POST", 
                        url: "<?=base_url()?>index.php/MainController/updateAjax",
                        data: dataString,
                        cache: false,
						success: function(data)
						{
							$('.modal-dialog-update').html(data);
						}
					});
				});
				
				$('.btn-delete').on('click', function()
				{	
					var id = $(this).attr('id');
					$("#txtempid_del").val(id);
				});
				
				$('#btnYes_Del').click(function()
				{
					var id = $("#txtempid_del").val();
					window.location.href = "<?=base_url()?>index.php/MainController/deleteInfo/" + id;
				});
			});
		</script>
		