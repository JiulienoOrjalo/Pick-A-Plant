
<?php include 'b_server.php'; ?>
<div class="modal fade" role="dialog" id="edit_modals<?php echo $data2['username']?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- MODAL HEADER -->
				<div class="modal-header">
					<h3 class="modal-title"><b>Edit Profile</b></h3>
					<button type="button" class="close" data-dismiss="modal"> &times; </button>
				</div>
				<!-- MODAL HEADER -->

				<!--MODAL BODY-->
				<div class="modal-body">
					<form method="post" name="profile" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-5">
								<div class="form-group">
				                    <img src="<?php echo $data2['profile']?>"  onclick="triggerClick()" id="imgcard">
				                    <input type="file" name="file" onchange="displayImage(this)" id="profileImage" style="display: none;">
				                    <p>File Size: Maximum 2MB</p>
				                    <p>File Extension: .JPG, .PNG</p>
								</div>
							</div>
							<div class="col-sm-7">
								<div class="form-group">
									<label class="def"><h4>Username</h4></label>
									<input type="text" readonly name="username" class="form-control" value="<?php echo $data2['username']?>">
								</div>

								<div class="form-group">
									<label class="def"><h4>First Name</h4></label>
									<input type="text" name="firstname" class="form-control" value="<?php echo $data2['firstname']?>">
								</div>

								<div class="form-group">
									<label class="def"><h4>Last Name</h4></label>
									<input type="text" name="lastname" class="form-control" value="<?php echo $data2['lastname']?>">
								</div>

								<div class="form-group">
									<label class="def"><h4>Address</h4></label>
									<input type="text" name="address" class="form-control" value="<?php echo $data2['address']?>">
								</div>

								<div class="form-group">
									<input type="submit" name="update_profile" value="Save Changes" class="btn btn-success form-control save">
								</div>
							</div>
						</div>
					</form>
				</div>
				<!--MODAL BODY-->

				
			</div>
		</div>
	</div>

	<script>
  function triggerClick(){
  document.querySelector('#profileImage').click();
}

function displayImage(e){
  if (e.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e){
      document.querySelector('#imgcard').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
</script>
