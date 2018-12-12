		<!-- Page Content -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1 class="mt-5">Add New Employee</h1>
					<p class="lead">This module will add new employees in the database</p>
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mx-auto">
					<?php if($show_error !== null && $show_error !== false) {?>
						<?php if($show_error === "EMP0001") { ?>
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
					
					<h2><?=NEWEMP?></h2>
					<hr>
					<?php
						$attrib = array(
											'method' => 'POST'
									   );
									   
						echo form_open("MainController/saveEmployee", $attrib);
					?>
							<div class="form-group">
								<label for="exampleInputEmail1"><?=EMPNO?></label>
								<input type="text" class="form-control" name="txtempno" id="txtempno"value="<?php echo sprintf('EMP-%03d', $tblAI);?>" readonly>
							</div>
							
							<div class="form-group">
								<label for="exampleInputEmail1"><?=FNAME?></label>
								<input type="text" class="form-control" name="txtfname" id="txtfname" placeholder="First Name" required>
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1"><?=MNAME?></label>
								<input type="text" class="form-control" name="txtmname" id="txtmname" placeholder="Middle Name">
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1"><?=LNAME?></label>
								<input type="text" class="form-control" name="txtlname" id="txtlname" placeholder="Last Name" required>
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1"><?=ADDRESS?></label>
								<textarea class="form-control" name="txtaddress" id="txtaddress" placeholder="Address" style="resize:none;" required></textarea>
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1"><?=EMAIL?></label>
								<input type="text" class="form-control" name="txtemail" id="txtemail" placeholder="Email Addres">
							</div>
							
							<div class="form-group">
								<label for="exampleInputPassword1"><?=CONTACT?></label>
								<input type="text" class="form-control" name="txtcontact" id="txtcontact" placeholder="Contact No.">
							</div>
							
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
				</div>
			</div>
		</div>