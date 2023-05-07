
<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

 ?>
 

 <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!--========== LINK REL ==========-->
        <link rel="stylesheet" href="./fontawesome-free-5/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="assets/css/styles.css">
        <script type="text/javascript" src="jassets/css/main.js"></script>
        

        <title>Agsirb - E</title>
    </head>
    <body>
        <!--========== HEADER ==========-->
        <header class="header">
            <div class="header__container">
                <a href="home.php" class="header__img"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 0.82);transform: ;msFilter:;"><path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path></svg></a>

                <a href="home.php" class="header__logo">Welcome Resident!</a>
    
                <div class="header__search">
                    <input type="search" placeholder="Search" class="header__input">
                    <i class='bx bx-search header__icon'></i>
                </div>
    
                <div class="header__toggle">
                    <i class='bx bx-menu' id="header-toggle"></i>
                </div>
            </div>
        </header>

        <!--========== NAV ==========-->
        <div class="nav" id="navbar">
            <nav class="nav__container">
                <div>
                    <a href="dashboard1.php" class="nav__link nav__logo">
                        <i class='bx bx-book-open nav__icon' ></i>
                        <span class="nav__logo-name">Barangay Catbangen</span>
                    </a>
    
                    <div class="nav__list">
                        <div class="nav__items">
                            <h3 class="nav__subtitle">Profile</h3>
    
                            <a href="dashboard1.php" class="nav__link active">
                                <i class='bx bx-home nav__icon' ></i>
                                <span class="nav__name">Home</span>
                            </a>
                            
                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-user nav__icon' ></i>
                                    <span class="nav__name"><?php echo $_SESSION['email']; ?></span>
                                </a>
                            </div>

                            

                           
                            
                        <div class="nav__items">
                            <h3 class="nav__subtitle">Menu</h3>

                         

                             
                    
                            </div>
                            <a href="indexnotif.php" target="_blank" class="nav__link">
                                <i class='bx bx-calendar nav__icon' ></i>
                                <span class="nav__name">Schedule an Request</span>
                            </a>
                            <a href="searchbox/trackindex.php" target="_blank" class="nav__link">
                                <i class='bx bx-search nav__icon' ></i>
                                <span class="nav__name">Track your request</span>
                            </a>
                            <a href="change-password.php" class="nav__link">
                                <i class='bx bx-cog nav__icon' ></i>
                                <span class="nav__name">Settings & Privacy</span>
                            </a>
                             <a href="#" class="nav__link">
                                <i class='bx bx-moon nav__icon' id="theme_button" ></i>
                                <span class="nav__name">Night Mode</span>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="logout.php" class="nav__link nav__logout">
                   <i class='bx bx-log-out nav__icon'></i>
                    <span class="nav__name" id="log_out">Logout</a></span>
                </a>
            </nav>
        </div>

        <!--========== CONTENTS ==========-->
        <?php include 'admin/server/server1.php' ?>
        <main>
            <section>
              <div class="center">
                <div class="main-panel">
                  <div class="col-md-2">
                      <h1>Important</h1>
                      <table class="table table-bordered table-hover" border="4">
                        <thead>
                           <tr>
                          
                              <th>Announcment</th>
                              <th></th>
                  
                           </tr>
                        </thead>
                           <?php
                              include_once 'functions.php';
                                $result = mysqli_query($conn,"SELECT * FROM tblbrgy_info");
                                    $i=0;
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr class="<?php if(isset($classname)) echo $classname;?>">
                                    <td style="text-align: center; vertical-align: middle; font-size=30;"><?php echo $row["text"]; ?></td>
                               
                                    </tr>
                                    <tr>
                                      <td style="text-align: center; vertical-align: middle;">
                                       <img src="images/catba.png" alt="agsirbe logo" width="150" height="150">
                                       <td>
                                    </tr>
                                  <?php
                                  $i++;
                                  }
                             ?>
                      </table
                    </div>            
                 </div>
              </div>
             </section>
       </main>
        

    <!-- CONTACT US -->

    <div class="wrapper">
    <div class="button">
    <div class="icon">
    <i class="fab fa-facebook-messenger"></i>

    </div>
    <span onclick="window.location.href='www.messenger.com/t/10475705577352/';"><a href="https://www.messenger.com/t/104757055773529/">Message Us</a></span>
    </div>
    </div>

<script>
    const wrapper = document.querySelector(".wrapper"),
    header = wrapper.querySelector("span");
    i = wrapper.querySelector("i");
    function onDrag({movementX, movementY}){
      let getStyle = window.getComputedStyle(wrapper);
      let leftVal = parseInt(getStyle.left);
      let topVal = parseInt(getStyle.top);
      wrapper.style.left = `${leftVal + movementX}px`;
      wrapper.style.top = `${topVal + movementY}px`;
    }
    header.addEventListener("mousedown", ()=>{
      header.classList.add("active");
      header.addEventListener("mousemove", onDrag);
    });
    i.addEventListener("mousedown", ()=>{
      i.classList.add("active");
      i.addEventListener("mousemove", onDrag);
    });
    document.addEventListener("mouseup", ()=>{
      header.classList.remove("active");
      header.removeEventListener("mousemove", onDrag);
    });
    document.addEventListener("mouseup", ()=>{
      i.classList.remove("active");
      i.removeEventListener("mousemove", onDrag);
    });
  </script>

    <style type="text/css">
        /* Contact Us */

.wrapper{
  position: fixed;
  bottom: 2%;
  right: 0%;
  height: 60px;
  width: 40px;
  border-radius: 50px;
  transform: translate(-50%, -50%);
  cursor: pointer;
}
.wrapper i{

  height: 60px;
  width: 60px;
  font-size: 5em;
  border-radius: 50%;
  display: inline-block;
  align-items: center;
}
.wrapper i.active{
  cursor: move;
  user-select: none;
}

.wrapper .button{
  display: inline-block;
  height: 60px;
  width: 60px;
  float: right;
  margin: 0 5px;
  overflow: hidden;
  background: #0099ff;
  color: #fff;
  border-radius: 50px;
  cursor: pointer;
  box-shadow: 0px 10px 10px rgba(0,0,0,0.1);
  transition: all 0.3s ease-out;
}
.wrapper .button:hover{
  width: 200px;
}
.wrapper .button .icon{
  display: inline-block;
  height: 60px;
  width: 60px;
  text-align: center;
  border-radius: 50px;
  box-sizing: border-box;
  line-height: 60px;
  transition: all 0.3s ease-out;
}
.wrapper .button:nth-child(1):hover .icon{
  background: #fff;
}

.wrapper .button .icon i{
  font-size: 25px;
  line-height: 60px;
  transition: all 0.3s ease-out;
}
.wrapper .button:hover .icon i{
  color: #0099ff;
}
.wrapper .button span{
  font-size: 20px;
  font-weight: 500;
  line-height: 60px;
  margin-left: 10px;
  transition: all 0.3s ease-out;
}
.wrapper .button:nth-child(1) span{
  color: #fff;
}

/* */
    </style>

        <!--========== MAIN JS ==========-->
        <script src="assets/js/mainjs.js"></script>
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
    </body>
    
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>