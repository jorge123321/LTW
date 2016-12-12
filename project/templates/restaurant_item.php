<div id="content">
	<div id="item">
		<?php

			echo '<h1>' . $result['name'] . '</h1>';
			echo '<p>' . $result['location'] . '</p>';
			echo '<p>' . $result['category'] . '</p>';
			echo '<p>' . $result['open'] . '-' . $result['end'] . '</p>';
			echo '<p>' . $result['description'] . '</p>';
			if (isset($_SESSION['idUser'])){
				if($_SESSION['type'] == 'reviewer'){
					echo '<textarea id="addreview" rows="5" cols="50"></textarea>';
					echo '<p><button id="add_review" type="button"</p>';
				}
			}
		?>
	</div>
</div>