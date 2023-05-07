<?php
    include("functions.php");

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Notification System in PHP and MySql</title>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <style>
    
    .gcash{
        width:80%;
        margin:auto;
        text-align:center;
        padding-top:50px;
    }
    .gcash img{
        width:75%;
    }
    .gcash-col{
        flex-basis:30%;
        border-radius:15px;
        margin-bottom:30px;
        position: relative;
        overflow:hidden;
    }
  </style>

  <body>
  <?php
 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "notifications";
 $conn = mysqli_connect($servername,$username,$password,$dbname);
?>


<?php
$query = "SELECT invoiceid FROM notif ORDER BY invoiceid DESC";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$lastid = $row['invoiceid'];
if(empty($lastid))
{
    $number = "Agsirb-E-0000001";
}
else
{
    $idd = str_replace("Agsirb-E-", "", $lastid);
    $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
    $number = 'Agsirb-E-'.$id;
}
?>

<?php
 
if($_SERVER["REQUEST_METHOD"]== "POST")
{
    $invoiceid = $_POST['invoiceid'];
    $name = $_POST['name'];
    $prodname = $_POST['prodname'];
    $price = $_POST['price'];
    
 
    if(!$conn)
    {
        die("connection failed " . mysqli_connect_error());
    }
    else
    {
        $sql = "insert into notif(invoiceid,name,prodname,price,status1)VALUES('".$invoiceid."','".$name."','".$prodname."','".$price."','pending') ";
        if(mysqli_query($conn,$sql))
        {
            $query = "SELECT invoiceid FROM notif ORDER BY invoiceid DESC";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_array($result);
            $lastid = $row['invoiceid'];
 
            if(empty($lastid))
            {
                $number = "Agsirb-E-0000001";
            }
            else
            {
                $idd = str_replace("Agsirb-E-", "", $lastid);
                $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
                $number = 'Agsirb-E-'.$id;
            }
 
        }
        else
        {
            echo "Record Faileddd";
        }
    }
}
    ?>
 

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Request Document</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

         
    </main>
    <!-- /.container -->
 
        <!--notification-->
          <?php
          
          if(isset($_POST['like'])){
              $name = $_POST['name'];
              $purpose = $_POST['purpose'];
              $dop = $_POST['dop'];
              $refid= $_POST['refId'];
              $pay= $_POST['pay'];
              $query ="INSERT INTO `notifications` (`invoiceid`,`prodname`,`price`,`status1`,`purpose`,`dop`,`id`, `name`, `type`, `message`, `status`, `date`,`refid`,`pay`) VALUES ('$invoiceid', '$prodname','$price','pending','$purpose','$dop', NULL, '$name', 'like', '', 'unread', CURRENT_TIMESTAMP,'$refid','$pay')";
              if(performQuery($query)){
                  header("location:indexnotif.php");
              }
          }
          
          ?>
   
      </div>
    </nav>

    <main role="main" class="container">

      <div class="starter-template">
        <h1>.</h1>
        <p class="lead">.</p>
      </div>

      <div class="row">


    <div class="col-sm-4">
        <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="post">
            <div align="left">
                <h3>Request Form </h3>
            </div>
 
            <div align="left">
             
            </div>
            </br>
            </div>
        </form>
    </div>
 
</div>

      <div>     
        <form method="post" >
        <label>Tracking Number</label>
                <input type="text" class="form-control" name="invoiceid" id="invoiceid" style=" font-size: 16px; color: blue; font-weight: bold; "  value="<?php echo $number; ?>" readonly >
              <br>
              <label>Full name</label>
              <input name="name" class="form-control mr-sm-2" type="text" placeholder="Name" id="name" required>
              <br>
            <div align="left">
                <label>Address</label>
                <input type="text" class="form-control" name="prodname" id="prodname" placeholder="Address" required>
                <br>
           <label>Purpose</label>
                <input type="text" class="form-control" name="purpose" id="purpose" placeholder="Purpose" required>
                <br>           
                <label>Date of pickup</label>
                <input type="date" class="form-control" name="dop" id="dop"  required>
            </div>
            <br>

            <div align="left">
                <label>Type of Document</label>
                <select name="price"  class="form-control">
                    <option value="">--</option>
                    <option value="Barangay Indigency Cert" id="Barangay Clearance">Barangay Clearance</option>
                    <option value="Barangay Indigency Cert" id="Business Permit">Business Permit</option>
                    <option value="Barangay Residency Cert" id="Barangay Residency">Barangay Residency Cert</option>
                    <option value="Barangay Indigency Cert" id="Barangay Indigency">Barangay Indigency Cert</option>
                </select>
            </div>
            <div align="left">
                <label class="col1">Select Payment Method</label>
                <select name="pay"  class="form-control">
                    <option value="">--</option>
                    <option value="Gcash" id="gcash">Gcash</option>
                    <option value="Cash on Pickup" id="Business Permit">Cash on Pickup</option>
                </select>
            </div>
            <div align="left">
                <label>Reference No.(For Gcash payment only</label>
                <input type="text" class="form-control" name="refId" id="refId" placeholder="Reference Number">
              <br>
          <br>
          <button name="like" class="btn btn-outline-success my-2 my-sm-0" type="submit" id="submit">Submit  </button>
        </form>
      </div>
      <!---- payment instruction ---->
      <section class="gcash">
        <h1>for Gcash Payment</h1>
        <div class="row">
            <div class="gcash-col">
                <img src="images/gcash.jpg"/>
            </div>
            <div class="gcash-col">
                <img src="images/gcash1.jpg"/>
            </div>
           
            <div class="gcash-col">
                <img src="images/gcash2.jpg"/>
            </div>
        </div>

      </section>
    
<!-- JS -->
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
        $("#submit").click(function(){

            var name = $("#name").val();
            var prodname = $("#prodname").val();
            var price = $("#price").val();
            var purpose = $("#purpose").val();
            
           if(name == '' || prodname == ''|| price =='' || purpose ==''){

            swal({
                title: "Fields Empty",
                text: "Check the missing fields",
                icon: "warning",
                button: "Ok",
                });

           }else{

            swal({
                title: "Success!!",
                text: "Your request has been submitted",
                icon: "success",
                button: "Ok",
                });
           }
        });
    </script>

  </body>
</html>
