<?php //user-main.php - main page for top-level users to manage users ?>

<main id="content">

<?php //output button for adding users ?>
<div class="cc-btn-row"><a class="cc-btn light-bg" href="<?=$ccurl . 'users/add-user/'?>"><?=$lang['Add a user']?></a></div>

<?php //output list of users ?>
<div class="manage-container dark-bg">
		<div class="row-container">
		<?php
		
		$query = "SELECT * FROM cc_" . $tableprefix . "users";
		$stmt = $cc->prepare($query);
		$stmt->execute();
		$results = $stmt->fetchAll();

		$gray = false;

		foreach($results as $row){
			echo '<div class="zebra-row';
			if($gray){ 
				echo ' gray-bg';
				$gray = false;
			}
			else $gray = true;
			echo '">';
			$avatar = $row['avatar'];
			if($avatar == "") $avatar = "default.png";
			echo '<div class="row-img"><img src="' . $ccurl . 'avatars/' . $avatar . '" /></div>';
			echo '<div class="row-caption">' . $row['username'] . '</div>';
			echo '<a href="' . $ccurl . 'users/delete-user/' . $row['id'] . '">' . $lang['Delete'] . '</a>';
			echo '<a href="' . $ccurl . 'users/edit-user/' . $row['id'] . '">' . $lang['Edit'] . '</a>';
			if($row['authlevel'] == 1) echo '<a href="' . $ccurl . 'users/permissions-user/' . $row['id'] . '">' . $lang['Manage Permissions'] . '</a>';
			echo '<div style="clear:both;"></div></div>';
		}

		?>
		</div>
	</div>

</main>