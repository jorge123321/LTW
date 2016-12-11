<div id="content">
	<div id="item">
		<?php
			echo '<h1>' . $result['name'] . '</h1>';
			echo '<p>' . $result['location'] . '</p>';
			echo '<p>' . $result['category'] . '</p>';
			echo '<p>' . $result['open'] . '-' . $result['end'] . '</p>';
			echo '<p>' . $result['description'] . '</p>';
		?>
	</div>
</div>