<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<title><?php echo $lang['title'] ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--Styles-->
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("img.jpg");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    
                <a href="index.php?lang=en"><?php echo $lang['engl']; ?></a>
                
                | <a href="index.php?lang=ru"> <?php echo $lang['ruski']; ?> </a>

                | <a href="index.php?lang=tur"> <?php echo $lang['turkish']; ?> </a>
            
        
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="#" class="w3-bar-item w3-button"><?php echo $lang['Home']?></a>
      <a href="#team" class="w3-bar-item w3-button"><i class="fa fa-user"></i><?php echo $lang['team']; ?></a>
      <a href="#about_product" class="w3-bar-item w3-button"><i class="fa fa-th"></i><?php echo $lang['About']; ?></a>
      <a href="#about" class="w3-bar-item w3-button"><i class="fa fa-usd"></i> <?php echo $lang['features']; ?></a>
      <a href="#contact" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> <?php echo $lang['Contacts']; ?></a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button"></i><?php echo $lang['Home']; ?></a>
  <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button"></i><?php echo $lang['team']; ?></a>
  <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button"></i><?php echo $lang['About']; ?></a>
  <a href="#pricing" onclick="w3_close()" class="w3-bar-item w3-button"></i><?php echo $lang['features']; ?></a>
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button"></i><?php echo $lang['Contacts']; ?></a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-left w3-text-white" style="padding:48px">
    <span class="w3-jumbo w3-hide-small"><?php echo $lang['title']; ?></span><br>
    <span class="w3-xxlarge w3-hide-large w3-hide-medium"><?php echo $lang['title']; ?></span><br>
    <span class="w3-large"><?php echo $lang['Description']; ?></span>
    <p><a href="https://github.com/AruzhanAmankossova/Plagiarism-Checker" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off"><?php echo $lang['github']; ?></a></p>
  </div> 
  <div class="w3-display-bottomleft w3-text-grey w3-large" style="padding:24px 48px">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
</header>

<!-- Our Features Section -->
<div class="w3-container" style="padding:128px 16px" id="about">
  <h3 class="w3-center"><?php echo $lang['features']; ?></h3>
  <p class="w3-center w3-large"><?php echo $lang['paragraph_features'] ?></p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large"><?php echo $lang['easy_to_use']; ?></p>
      <p><?php echo $lang['easy_text']; ?></p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-book w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large"><?php echo $lang['multilingual']; ?></p>
      <p><?php echo $lang['multilingual_text']; ?></p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-diamond w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large"><?php echo $lang['multiple_docs']; ?></p>
      <p><?php echo $lang['multiple_docs_text']; ?></p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-cog w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large"><?php echo $lang['num_detect']; ?></p>
      <p><?php echo $lang['num_detect_text']; ?></p>
    </div>
  </div>
</div>


  <div class="w3-container w3-light-grey" style="padding:128px 16px" id="about_product">
  <div class="w3-row-padding">
    <div class="w3-center">
      <h3 style="font-weight: bold;"><?php echo $lang['title1'] ?></h3>
      <p style="font-style: italic;"><?php echo $lang['text_about'] ?></p>
    
    </div>
  </div>
</div>

<!-- Team Section -->
<div class="w3-container" style="padding:128px 16px" id="team">
  <h3 class="w3-center" style="font-weight: bold;"><?php echo $lang['team'] ?></h3>
  <p class="w3-center w3-large" style="font-style: italic;"><?php echo $lang['team_text'] ?></p>
  <div class="w3-row-padding " style="margin-top:64px">
    <div class="w3-col l4 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="photo4049335093141022633.jpg" alt="" style="width:100%">
        <div class="w3-container">
          <h3>Birzhan Moldagaliyev</h3>
          <p class="w3-opacity"><?php echo $lang['mentor'] ?></p>
          <!--<p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>-->
          <p id="contact"><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> <a href="https://t.me/birzhanimo"> Contact</a></button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l4 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="aru.jpg" alt="" style="width:100%">
        <div class="w3-container">
          <h3>Aruzhan Amankossova</h3>
          <p class="w3-opacity"><?php echo $lang['python'] ?></p>
          <!--<p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>-->
          <p id="contact"><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> <a href="https://t.me/nsraru"> Contact</a></button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l4 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="men.jpg" alt="" style="width:100%">
        <div class="w3-container">
          <h3>Tair Uralov</h3>
          <p class="w3-opacity"><?php echo $lang['dev'] ?></p>
          <!--<p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>-->
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> <a href="https://t.me/uralovv"> Contact</a></button></p>
        </div>
      </div>
    </div>
    
  </div>
</div>


 

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i><?php echo $lang['to_the_top']?></a>
  <div class="w3-xlarge w3-section">
    
  <p><?php echo $lang['all_rights'] ?></p>
</footer>
 
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>
