<h1>write an article</h1>
<?php
    if(isset($_SESSION['fingerprint'])){
        echo "<p>Welcome ".$_SESSION['name']."!</p>";
    }else echo "Welcome unknown user!";
?>
<form action="?module=city&action=store" method="POST">
    <label for="title">title</label>
    <input type="text" name="title">
    <label for="article">article</label>
    <input type="text" name="article">
    <label for="date">date</label>
    <input type="date" name="date">
    <button type="submit">submit</button>
</form>