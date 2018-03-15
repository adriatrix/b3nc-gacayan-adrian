<?php

require '../connect.php';

$user_id = $_GET['id'];

$sql = "SELECT u.* FROM users u WHERE u.id = '$user_id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_array($result);
extract($user);

?>

<div class="columns">
  <div class="column is-12">
    <div class="field">
      <p class="control"><strong>Username:</strong></p>
      <input class="input" type="text" name="username" value="<?php echo''.$username.''; ?>" disabled>
    </div>
    <div class="field is-horizontal">
      <div class="field-body">
        <div class="field">
          <p class="control"><strong>Password:</strong><span class="has-text-danger password-errormsg"> *</span></p>
          <input class="input" type="password" name="password" value="●●●●●●●" required>
        </div>
        <div class="field">
          <p class="control"><strong>Confirm:</strong><span class="has-text-danger confpass-errormsg"> *</span></p>
          <input class="input" type="password" name="confirmPassword" value="●●●●●●●" required>
        </div>
      </div>
    </div>
    <div class="field is-horizontal">
      <div class="field-body">
        <div class="field">
          <p class="control"><strong>First Name:<span class="has-text-danger fname-errormsg"> *</span></strong>
            <input class="input" type="text" name="firstname" value="<?php echo''.$firstname.''; ?>" required>
          </p>
        </div>
        <div class="field">
          <p class="control"><strong>Last Name:<span class="has-text-danger lname-errormsg"> *</span></strong>
            <input class="input" type="text" name="lastname" value="<?php echo''.$lastname.''; ?>" required>
          </p>
        </div>
      </div>
    </div>
    <div class="field is-horizontal">
      <div class="field-body">
        <div class="field">
          <p class="control"><strong>Email Address:<span class="has-text-danger email-errormsg"> *</span></strong>
            <input class="input" type="email" name="email" value="<?php echo''.$email.''; ?>" required>
          </p>
        </div>
        <div class="field">
          <p class="control"><strong>Contact Number:<span class="has-text-danger contact-errormsg"> *</span></strong>
            <input class="input" type="text" name="contact_num" value="<?php echo''.$contact_num.''; ?>" required>
          </p>
        </div>
      </div>
    </div>
    <hr>
    <div class="field">
      <p class="control"><strong>Unit No./Floor No., Building/Subdivision Name:<span class="has-text-danger address2-errormsg"> *</span></strong>
        <input class="input" type="text" name="address1" value="<?php echo''.$address1.''; ?>" required>
      </p>
    </div>
    <div class="field">
      <p class="control"><strong>Street Number, Street Address, Barangay<span class="has-text-danger address1-errormsg"> *</span></strong>
        <input class="input" type="text" name="address2" value="<?php echo''.$address2.''; ?>" required>
      </p>
    </div>
    <div class="field is-horizontal">
      <div class="field-body">
        <div class="field">
          <p class="control"><strong>City:<span class="has-text-danger city-errormsg"> *</span></strong>
            <input class="input" type="text" name="city" value="<?php echo''.$city.''; ?>" required>
          </p>
        </div>
        <div class="field">
          <p class="control"><strong>Zip Code:<span class="has-text-danger zipcode-errormsg"> *</span></strong>
            <input class="input" type="text" name="zipcode" value="<?php echo''.$zipcode.''; ?>" required>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
