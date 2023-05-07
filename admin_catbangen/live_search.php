<?php include 'server/server.php' ?>

<?php
	if(isset($_SESSION['role'])){
		if($_SESSION['role'] =='staff'){
			$off_q = "SELECT *,tblofficials.id as id, tblposition.id as pos_id,tblchairmanship.id as chair_id FROM tblofficials JOIN tblposition ON tblposition.id=tblofficials.position JOIN tblchairmanship ON tblchairmanship.id=tblofficials.chairmanship WHERE `status`='Active' ORDER BY tblposition.order ASC ";
		}else{
			$off_q = "SELECT *,tblofficials.id as id, tblposition.id as pos_id,tblchairmanship.id as chair_id FROM tblofficials JOIN tblposition ON tblposition.id=tblofficials.position JOIN tblchairmanship ON tblchairmanship.id=tblofficials.chairmanship ORDER BY tblposition.order ASC, `status` ASC ";
		}
	}else{
		$off_q = "SELECT *,tblofficials.id as id, tblposition.id as pos_id,tblchairmanship.id as chair_id FROM tblofficials JOIN tblposition ON tblposition.id=tblofficials.position JOIN tblchairmanship ON tblchairmanship.id=tblofficials.chairmanship WHERE `status`='Active' ORDER BY tblposition.order ASC ";
	}
	
	$res_o = $conn->query($off_q);

	$official = array();
	while($row = $res_o->fetch_assoc()){
		$official[] = $row; 
	}
include("config1.php");

if(isset($_POST['input'])){

    $input = $_POST['input'];

    $query = "SELECT * FROM tblofficials WHERE termstart LIKE '{$input}%' LIMIT 15";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){?>
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>Fullname</th>
                    <th>Position</th>
                    <th>Term Start</th>
                    <th>Term End</th>
                    
                   
                </tr>
          </thead>

          <tbody>
            <?php
                while($row = mysqli_fetch_assoc($result)){
                     $name = $row['name'];
                     
                     $position = $row['position'];
                     $termstart = $row['termstart'];
                     $termend = $row['termend'];
                   
                 

                     ?>
                        <tr>
                            <td><?php echo $name;?></td>
                            <td><?php echo $position;?></td>
        
                            <td><?php echo $termstart;?></td>
                            <td><?php echo $termend;?></td>
                           
                          </tr>
                     <?php
                }
            ?>
            </tbody>
        </table>

        <?php

    }else{
        echo "<h6 class='text-danger text-center mt-3'>No data Found</h6>";
    }
}

?>