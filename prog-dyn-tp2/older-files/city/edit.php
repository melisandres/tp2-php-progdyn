<h1>add a city to the database</h1>
<form action="?module=city&action=update" method="post">
    <label for="cityName">cityname</label>
    <input type="text" name="cityName" value="<?= $data['cityName'];?>">
    <button type="submit">submit</button>
</form>