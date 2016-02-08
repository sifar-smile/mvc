<div class="container">
    <h2>You are in the View: app/view/home/index.php (everything in the box comes from this file)</h2>
    <p>In a real application this could be the homepage.</p>
</div>

<h3>Globals messages</h3>
<div>
    <!-- lister les messages globaux ici -->
</div>
<?php if ($currentUser) : ?>
    <!-- formulaire d'ajout d'un global message -->
	<form action="<?php echo URL; ?>home/addGlobalMessage" method="POST">
	            <label>Message</label>
	            <input type="text" name="texte" value="" required />
	            <input type="submit" name="submit_add_gm" value="Submit" />
	</form>
<?php endif; ?>	
