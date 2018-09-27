<?php
/**
 *
 *
 **/

?>
<div class="group-username form-group">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" value="" placeholder="Input your username..." />
</div>

<div class="group-password form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" value="Input your password..." />
</div>

<a href="#" class="forgot-password">Forgot Password</a>

<?php do_action("login_signup-submit-button"); ?>
