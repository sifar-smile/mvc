<div class="container">
    <h2>You are in the View: app/view/user/login.php (everything in this box comes from that file)</h2>
    <!-- add user form -->
    <div>
        <h3>New user</h3>
        <form action="<?php echo URL; ?>user/addUser" method="POST">
            <label>Login</label>
            <input type="text" name="login" value="" required />
            <label>Password</label>
            <input type="text" name="password" value="" required />
            <label>Firstname</label>
            <input type="text" name="firstname" value="" />
            <label>Lastname</label>
            <input type="text" name="lastname" value="" />
            <input type="submit" name="submit_add_user" value="Submit" />
        </form>
    </div>
</div>