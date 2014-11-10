<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "admin@rescuemovement.org";
 
    $email_subject = "Potential Ambassador";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 


 
    // validation expected data exists
 
    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email']) ||
		
		!isset($_POST['age']) ||
		
		!isset($_POST['location']) ||
		
		!isset($_POST['horses']) ||
		
		!isset($_POST['show']) ||
		
		!isset($_POST['trainers']) ||
 
        !isset($_POST['influences']) ||
 
        !isset($_POST['bio'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');      
 
    }
 
     
 
    $first_name = $_POST['first_name']; // required
     $last_name = $_POST['last_name']; // required
     $email_from = $_POST['email']; // required
	 $age = $_POST['age']; // required
	 $location = $_POST['location']; // required
	 $horses = $_POST['horses']; // required
	 $show = $_POST['show']; // required
	 $trainers = $_POST['trainers']; // required
     $influences = $_POST['influences']; // required
     $bio = $_POST['bio']; // required
 
  
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($age) < 1) {
 
    $error_message .= 'The Age you entered does not appear to be valid.<br />';
 
  } 
 
   if(strlen($location) < 2) {
 
    $error_message .= 'The Location you entered does not appear to be valid.<br />';
 
  }
 
    if(strlen($horses) < 1) {
 
    $error_message .= 'Pleaes enter valid information.<br />';
 
  }
 
    if(strlen($show) < 2) {
 
    $error_message .= 'Please enter valid information.<br />';
 
  }
  
  if(strlen($trainers) < 2) {
 
    $error_message .= 'Please enter valid information.<br />';
 
  }
 
   if(strlen($influences) < 2) {
 
    $error_message .= 'Please enter valid information.<br />';
 
  }
  
    if(strlen($bio) < 2) {
 
    $error_message .= 'Please enter valid information.<br />';
 
  }
  
   if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 

 
    $email_message = "Potential Ambassador.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
	
	$email_message .= "Age: ".clean_string($age)."\n";
	
	$email_message .= "Location: ".clean_string($location)."\n";
	
	$email_message .= "Horses: " .clean_string($horses)."\n";
	
	$email_message .= "Most successful show results: ".clean_string($show)."\n";
	
	$email_message .= "Trainers: ".clean_string($trainers)."\n";
 
    $email_message .= "What influences you to Ride for Rescue Movement: ".clean_string($influences)."\n\n";
 
    $email_message .= "Self bio: ".clean_string($bio)."\n";
 

     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers); 
 
?>
 
 
 
<!-- include your own success html here -->
 
 
<!DOCTYPE HTML>
<html>

<head>
  <title>Rescue Movement, National Equine Rescue Foundation, Inc.</title>
  <meta name="description" content="Rescue Movement Helping the animals you love is Black &amp; White But, taking action is Golden! Become an Ambassador" />
  <meta name="keywords" content="rescue movement, ride for rescue movement, become an ambasssador, ambassador, horse, horse rescue, rescue, National Equine Rescue Foundation" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
</head>

<body>
  <div id="main">
    <header>
      <div id="logo"><div id="logo_text"><img src="images/HeaderImageLogo.jpg" width="940" height="102" alt="" border="0"></div></div>
      <nav>
        <ul class="sf-menu" id="nav">
          <li><a href="index.shtml">Home</a></li>
		  <li><a href="donation.shtml">Donate</a>
		  <ul>
				 <li><a href="friends.shtml">Sponsors</a></li>
				 </ul>
          <li><a href="about.shtml">About us</a>
		  	<ul>
			  <li><a href="secret.shtml">Meet Secret</a></li>
              <li><a href="fyra.shtml">Meet Fyra w/ foal</a></li>
			</ul>
		  </li>
          <li class="selected"><a href="ambassadors.shtml">Ambassadors</a></li>
          <li><a href="merch.shtml">Merch</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </nav>
    </header>
    <div id="site_content">
      <ul id="images">
        <li><a href="rfrm.shtml"><img src="images/1.jpg" width="600" height="300" alt="one" border="0" /></a></li>
        <li><img src="images/2.jpg" width="600" height="300" alt="two" /></li>
        <li><img src="images/3.jpg" width="600" height="300" alt="three" /></li>
        <li><img src="images/4.jpg" width="600" height="300" alt="four" /></li>
        <li><img src="images/5.jpg" width="600" height="300" alt="five" /></li>
        <li><img src="images/6.jpg" width="600" height="300" alt="six" /></li>
      </ul>
      <div id="sidebar_container">
        <div class="sidebar">
          
 <h3><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="Z36JEUGSKADUE">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form></h3>
		  		  <a href="rfrm.shtml"><img src="images/RFRM.jpg" width="183" height="78" alt="" border="0"></a><br><br>
          <h4>Donate Now</h4>
		  <hr>
          <p>If you prefer to <a href="donation.shtml#bymail">send a check</a>, simply mail it along with a note outlining the purpose of the gift.<Br /><a href="donation.shtml"><img src="images/i_right_arrow.gif" width="9" height="9" alt="" border="0">&nbsp;Read more</a></p>

          <h4>Newsletters</h4>
		  <hr>
          <h5>May Contest: Foal Naming!</h5>
		  <h5><img src="images/i_right_arrow.gif" width="9" height="9" alt="" border="0">&nbsp;<a href="Newsletter0514.pdf" target="_blank">download the newsletter</a></h5>
          <p>We thought we would introduce subjects of interest in the Equine world. To begin, especially since we are having a “Foal Naming Contest,” you might like to know the thinking behind how to achieve a certain breed. <br /><a href="Newsletter0514.pdf" target="_blank"><img src="images/i_right_arrow.gif" width="9" height="9" alt="" border="0">&nbsp;Read more</a></p>


          <h4>Donation Progress!</h4>
		  		  <hr>
<div style="text-align:center;"><a href="donation.shtml" alt="Fundraising Thermometer"><img border="0" src="http://thermometer.fund-raising-ideas-center.com/thermometer.php?currency=dollar&goal=1000000&current=250&color=red&size=medium"></a><p style="font-size:.8em; color:#999"></div>
	  
        </div>
      </div>
      <div class="content">
        <h1>Ambassadors</h1>
<p>Thank you for contacting us! We will be in touch shortly.
		
      </div>
    </div>
    <footer>
      <p>Copyright &copy; 2014 | <a href="#">design from Dineen Group</a></p>
    </footer>
  </div>
  <p>&nbsp;</p>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript" src="js/jquery.kwicks-1.5.1.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#images').kwicks({
        max : 600,
        spacing : 2
      });
      $('ul.sf-menu').sooperfish();
    });
  </script>
</p>
      </div>
    </div>
    <footer>
		<p>Copyright &copy; 2014 | <a href="#">design from Dineen Group</a></p>
    </footer>
  </div>
  <p>&nbsp;</p>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript" src="js/jquery.kwicks-1.5.1.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#images').kwicks({
        max : 600,
        spacing : 2
      });
      $('ul.sf-menu').sooperfish();
    });
  </script>
</body>
</html>

 
 
<?php
 
}
 
?>