<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Transparency</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->

<section class="header">

   <a href="index.php" class="logo">Agsirb - E</a>

   <nav class="navbar">
      <a href="index.php">home</a>
      <a href="about.php">about</a>
      <a href="rresident_login.php">Resident LogIn</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>

<!-- header section ends -->

<!-- home section starts  -->


<!-- services section starts  -->

<section class="services">

   <h1 class="heading-title"> Barangays in City of San Fernando </h1>
   <h2 style="font-size:20px; text-align:center;">Please select your Barangay</h2>

   <div class="box-container">
      <div class="box">
         <img src="imagesv1/catbangen.png" alt="">
         <h3><a href="catbangen_transparency/catbangen_transparency.php" target="_blank" class="nav__link">Barangay Catbangen File transparency</a></h3>
      </div>
      <div class="box">
         <img src="imagesv1/poro.png" alt="">
         <h3><a href="poro_transparency/poro_transparency.php" target="_blank" class="nav__link">Barangay Poro File transparency</a></h3>
      </div>
   </div>
   <br>


</section>

<!-- services section ends -->


<!-- footer section starts  -->
<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "106601702263530");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v15.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>quick links</h3>
         <a href="index.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="resident_login.php"> <i class="fas fa-angle-right"></i> Resident Log In</a>
         <a href="admin_login.php"> <i class="fas fa-angle-right"></i> Brgy. Admin Log In</a>
         <a href="superadmin/login.php"> <i class="fas fa-angle-right"></i> City Log In</a>
      </div>

      <div class="box">
         <h3>extra links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> ask questions</a>
         <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
         <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
         <a href="#"> <i class="fas fa-angle-right"></i> terms of use</a>
      </div>

      <div class="box">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> +6390-202-5050 </a>
         <a href="#"> <i class="fas fa-envelope"></i> admin@gmail.com </a>
         <a href="#"> <i class="fas fa-map"></i> City of San Fernando, La Union </a>
      </div>

      <div class="box">
         <h3>follow us</h3>
         <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
         <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>

   </div>

   <div class="credit"> created by <span>Team Agsirb-E</span> | all rights reserved! </div>

</section>

<!-- footer section ends -->









<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>