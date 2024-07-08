<?php
session_start();
session_destroy();

?>

<script>
var allowed=function(){window.location='index';}
setTimeout(allowed,100);
</script>
