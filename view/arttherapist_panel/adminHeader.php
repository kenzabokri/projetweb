<?php
   session_start();
   include_once "./config.php";

?>
       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #3B3131;">
    
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="./assets/images/logo.png" width="80" height="80" alt="Swiss Collection">
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
    <?php           
        if(isset($_SESSION['user_id'])){
          ?>
          <a href="../../index.html" style="text-decoration:none;">
            <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
         </a>
          <?php
        } else {
            ?>
            <a href="../logout.php" style="text-decoration:none;">
                    <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>

            <?php
        } ?>
    </div> 
    <div class="translate" id="google_translate_element"></div>

<script type="text/javascript">
    function googleTranslateElementInit() {  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
</nav>
