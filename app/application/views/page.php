<?php
	header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.		
	header('Pragma: no-cache'); // HTTP 1.0.
	header('Expires: 0'); // Proxies
?>
<?php
include("header.php");

include("sidebar.php");

include("$page".".php");

include("footer.php");
?>
</body>