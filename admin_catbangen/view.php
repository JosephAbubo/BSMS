<h1>Notifications</h1>

<?php
    
    include("functions.php");

    $id = $_GET['id'];

    $query ="UPDATE `notifications` SET `status` = 'read' WHERE `id` = $id;";
    performQuery($query);

    $query = "SELECT * from `notifications` where `id` = '$id';";
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            if($i['type']=='like'){
                echo ucfirst($i['name'])." Requested a Document. <br/>".$i['price'] 
                  .$i['date'];
            }else{
                echo "Some commented on your post.<br/>".$i['message'];
            }
        }
    }
    
?><br/>
<a href="dashboard.php">Back</a>