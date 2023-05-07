<?php
$conn=new PDO('mysql:host=localhost; dbname=poro-abms', 'root', '') or die(mysql_error());
if(isset($_POST['submit'])!=""){
  $name=$_FILES['file']['name'];
  $size=$_FILES['file']['size'];
  $type=$_FILES['file']['type'];
  $temp=$_FILES['file']['tmp_name'];
  // $caption1=$_POST['caption'];
  // $link=$_POST['link'];
  $fname = date("YmdHis").'_'.$name;
  $chk = $conn->query("SELECT * FROM  upload where name = '$name' ")->rowCount();
  if($chk){
    $i = 1;
    $c = 0;
	while($c == 0){
    	$i++;
    	$reversedParts = explode('.', strrev($name), 2);
    	$tname = (strrev($reversedParts[1]))."_".($i).'.'.(strrev($reversedParts[0]));
    // var_dump($tname);exit;
    	$chk2 = $conn->query("SELECT * FROM  upload where name = '$tname' ")->rowCount();
    	if($chk2 == 0){
    		$c = 1;
    		$name = $tname;
    	}
    }
}
 $move =  move_uploaded_file($temp,"upload/".$fname);
 if($move){
 	$query=$conn->query("insert into upload(name,fname)values('$name','$fname')");
	if($query){
	header("location:transparency-files.php");
	}
	else{
	die(mysql_error());
	}
 }
}
?>
<html>
    <head>
        <title>Transparency</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container" style="max-width: 50%;">

            <div class="text-center mt-5 mb-4">
                <img src="imagesv1/poro.png" style="height:100px"/>
                <h2>Search Barangay file Transparency</h2>
            </div>

            <input type="text" class="form-control" id="live_search" autocomplete="off"
            placeholder="Please enter your tracking number here">
        </div>

        <div id="searchresult"></div>

        <div class="row-fluid">
	        <div class="span12">
	            <div class="container">
		<br />
		<h1 style="text-align:center;font-size:20px;"><p>List of Barangay Transparency</p></h1>	
		<br />
		<br />
			
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
					<th width="90%" align="center">Files</th>
					<th align="center">Action</th>	
				</tr>
			</thead>
			<?php
			$query=$conn->query("select * from upload order by id desc");
			while($row=$query->fetch()){
				$name=$row['name'];
			?>
			<tr>
			
				<td>
					&nbsp;<?php echo $name ;?>
				</td>
				<td>
					<button class="alert-success"><a href="download.php?filename=<?php echo $name;?>&f=<?php echo $row['fname'] ?>">Download</a></button>
				</td>
			</tr>
			<?php }?>
		</table>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){

                $("#live_search").keyup(function(){
                    var input = $(this).val();
                    //alert(input);

                    if(input !=""){
                        $.ajax({
                            url:"live_search.php",
                            method:"POST",
                            data:{input:input},

                            success:function(data){
                                $("#searchresult").html(data);
                                $("#searchresult").css("display","block");
                            }
                        });
                    }else{
                        $("#searchresult").css("display","none");
                    }
                });

            });
        </script>

    </body>
</html>
