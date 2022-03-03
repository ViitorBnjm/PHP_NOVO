<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove todas as sessions
session_unset();

// remove uma session
session_destroy();
?>

</body>
</html> 