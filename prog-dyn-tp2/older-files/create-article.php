
<?php 
require_once('check-session.php');
//print_r($_SESSION);
//print_r($_SERVER);
//print_r($_POST);

//connect to connex
require_once("connex.php");

//validation variables
$titleError = $articleError = $dateError = null;

//variables des donnees
$title = $article = $date = null;



//validation
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $error = false;

    foreach($_POST as $key => $value){
        //prevent an SQL injection && create variables from post data
        $$key = mysqli_real_escape_string($connex, $value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        $value = trim($value);
        
        
        if ( $key == 'title'){
            if(strlen($value) < 5 || strlen($value) > 100){
                $nameError = "Le Titre doit avoir entre 2 et 45 characteres";
                $error = true;
            }

        }elseif($key == "article"){
            if(strlen($value) > 1000){
                $addressError = "Votre entré ne peut avoir plus de 1000 charactères";
                $error = true;
            }

        }elseif($key == "date"){
           if(!validateDate($value)){
                $emailError = "date invalide";
                $error = true;
            }
        }
    }

    $sql = "SELECT userId FROM user WHERE '$name_session' = userName";

    $firstStep = mysqli_query($connex, $sql);
    $secondStep = mysqli_fetch_assoc($firstStep);
    $userId = $secondStep['userId'];
    echo $userId;

    $sql = "INSERT INTO forum(forumTitle, forumArticle, forumDate, forumUserId) VALUES ('$title', '$article', '$date', '$userId')";

    if (!$error){
        if(mysqli_query($connex, $sql)){
            header("Location: user-forum.php");

        }else{
            echo "Error: ".$sql."<br>".mysqli_error($connex);
        }
    }
}



function validateDate($date){
    if (preg_match("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $date, $parts)) {
        if(checkdate($parts[2],$parts[3],$parts[1])) {
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

?>



<?php
require_once('header.php');
?>



    <h1>Formulaire pour saisir un article</h1>
    <!-- action="store-client.php" -->
    <form method="POST">

        <label>Titre
            <input type="text" name="title" required minlength="5" maxlength="100" value="<?= $title;?>">
            <span class="error"><?=$titleError;?></span>
        </label>

        <label>Article
            <textarea name="article" required maxlength="1000" rows="20" cols="70" value="<?= $article;?>">
            </textarea>
            <span class="error"><?=$articleError;?></span>
        </label>

        <label>Date
            <input type="date" name="date" maxlength="10" value="<?= $date;?>">
            <span class="error"><?=$dateError;?></span>
        </label>

        <button type="submit">save</button>

    </form>
</body>
</html>