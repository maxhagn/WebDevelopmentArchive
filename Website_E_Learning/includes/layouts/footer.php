<?php
  // 5. Close database connection
	if (isset($database)) {
	  $database->close_connection();
	}
?>