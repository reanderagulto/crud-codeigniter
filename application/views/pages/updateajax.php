		<?php include("application/views/languages/en.php");?>
		<?php
			$attrib = array(
								'method' => 'POST'
						   );
						   
			echo form_open("MainController/updateEmp", $attrib);
		?>
				<div class="modal-content">
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputEmail1"><?=EMPNO?></label>
							<input type="text" class="form-control" name="txtempno" id="txtempno" value="<?=$info['emp_no']?>" readonly>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1"><?=FNAME?></label>
							<input type="text" class="form-control" name="txtfname" id="txtfname" value="<?=$info['f_name']?>" required>
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1"><?=MNAME?></label>
							<input type="text" class="form-control" name="txtmname" id="txtmname" value="<?=$info['m_name']?>">
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1"><?=LNAME?></label>
							<input type="text" class="form-control" name="txtlname" id="txtlname" value="<?=$info['l_name']?>">
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1"><?=ADDRESS?></label>
							<textarea class="form-control" name="txtaddress" id="txtaddress"  style="resize:none;"><?=$info['address']?></textarea>
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1"><?=EMAIL?></label>
							<input type="text" class="form-control" name="txtemail" id="txtemail" value="<?=$info['email']?>">
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1"><?=CONTACT?></label>
							<input type="text" class="form-control" name="txtcontact" id="txtcontact" value="<?=$info['contact']?>">
						</div>

					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Update</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
		</form>