<?php
    if(isset($_SESSION['fingerprint'])){
        echo "<p>Welcome ".$_SESSION['name']."!</p>";
    }else echo "Welcome unknown user!";
?>

<p>
    MVC framework
</p>