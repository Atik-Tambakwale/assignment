<?php require "includes/header.php"; ?>

<div class="row">
    <div class="col-md-4">
        <form action="" id="add-user-frm" onsubmit="return add_user()" method="POST">
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" required="Please Enter Your First Name">
            </div>
            <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required="Please Enter Your Last Name">
            </div>
            <div class="form-group">
                <label for="">Mobile</label>
                <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile Name" required="Please Enter Your Mobile number">
            </div>
            <div class="form-group">
                <label for="">Email Address</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Email Name" required="Please Enter Your Email Name">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <textarea name="address" id="address" class="form-control" rows="3" required="Plase Enter Address "></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">ADD USER</button>
            </div>
        </form>
    </div>

    <div class="col-md-8" id="users-list">

    </div>
</div>
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Edit User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method='post' action='' onsubmit="return update_user()">
              <input type="hidden" name="user_id" id="user_id">
              <div class="form-group">
                  <label for="">First Name</label>
                  <input type="text" name="efname" id="efname" class="form-control" placeholder="First Name" required="Please Enter Your First Name">
              </div>
              <div class="form-group">
                  <label for="">Last Name</label>
                  <input type="text" name="elname" id="elname" class="form-control" placeholder="Last Name" required="Please Enter Your Last Name">
              </div>
              <div class="form-group">
                  <label for="">Mobile</label>
                  <input type="text" name="emobile" id="emobile" class="form-control" placeholder="Mobile Name" required="Please Enter Your Mobile number">
              </div>
              <div class="form-group">
                  <label for="">Email Address</label>
                  <input type="text" name="eemail" id="eemail" class="form-control" placeholder="Email Name" required="Please Enter Your Email Name">
              </div>
              <div class="form-group">
                  <label for="">Address</label>
                  <textarea name="eaddress" id="eaddress" class="form-control" rows="3" required="Plase Enter Address "></textarea>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary">UPDATE USER</button>
              </div>
          </form>
      </div>

    </div>
  </div>
</div>

<?php
require "includes/footer.php";
?>
<script>
    fetch_users()
</script>
