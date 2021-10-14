<?php

require_once 'connec.php';


$pdo = new PDO(DSN,USER,PASS);


if ($_SERVER['REQUEST_METHOD']=== 'POST') {
    $firstname = ($_POST['firstname']);
    $lastname = ($_POST['lastname']);    
    $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';
    $statement= $pdo->prepare($query);
    $statement->bindValue(':firstname',$firstname, PDO::PARAM_STR);
    $statement->bindValue(':lastname',$lastname, PDO::PARAM_STR);
    $statement->execute();
    $query = 'SELECT * FROM  friend';
    $statement=$pdo->query($query);
    $friends=$statement->fetchAll(PDO::FETCH_ASSOC);
    
}



?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PDO </title>
</head>


<body>
<div>
<ul>

<?php foreach ($friends as $friend) :?>
    <li>
    firstname : <?= $friend['firstname'] ?> lastname : <?= $friend['lastname']?>

    </li>
<?php endforeach ?>

</ul>

</div> 

<form action="" method="POST">
    <input type="text" placeholder="firstname" name="firstname">
    <input type="text" placeholder="lastname" name="lastname">
    <button>OK</button>
</form>    







    
</body>
</html>