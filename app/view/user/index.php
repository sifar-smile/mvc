<div class="container">
    <h2>You are in the View: app/view/user/index.php (everything in this box comes from that file)</h2>
    <!-- main content output -->
    <div class="box">
        <h1>Hello, <?php echo $currentUser->login ?></h1>
        <div><a href="<?php echo URL; ?>user/editUser">Edit your account</a></div>

        <h3>Globals messages</h3>
        <div>
            <?php
                // Lister tous les messages globaux
            ?>
        </div>
    </div>
</div>