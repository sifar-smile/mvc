<div class="container">
    <h2>You are in the View: app/view/user/edit.php (everything in this box comes from that file)</h2>
    <!-- add user form -->
    <div>
        <h3>Edit your account</h3>
        <form action="<?php echo URL; ?>user/editUser" method="POST">
            <label>Login</label>
            <input type="text" name="login" value="<?php echo htmlspecialchars($currentUser->login, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Firstname</label>
            <input type="text" name="firstname" value="<?php echo htmlspecialchars($currentUser->firstname, ENT_QUOTES, 'UTF-8'); ?>" />
            <label>Lastname</label>
            <input type="text" name="lastname" value="<?php echo htmlspecialchars($currentUser->lastname, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($currentUser->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_add_user" value="Submit" />
        </form>
    </div>
</div>