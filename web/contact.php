<!DOCTYPE HTML>
<html>

<head>
  <title>Rescue Movement</title>
  <meta name="description" content="rescue movement" />
  <meta name="keywords" content="rescue movement" />
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
          <li><a href="ambassadors.shtml">Ambassadors</a></li>
          <li><a href="merch.shtml">Merch</a></li>
          <li class="selected"><a href="contact.php">Contact Us</a></li>
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
		
                <!--#include file="Vrnav.html" -->
				
        </div>
      </div>
      <div class="content">
        <h1>Contact Us</h1>
<H2>Headquarters and Mailing Address</h2>

<p>National Equine Rescue Foundation, Inc.
<br>100 Prospect Ave.
<br>Hackensack, NJ 07601
</p>
        <?php
          $to = 'admin@rescuemovement.org';
          $subject = 'Inquiry from Rescue Movement';
          $contact_submitted = 'Thank you for contacting Rescue Movement.  Your message has been sent and we will respond to you as soon as possible.';


          function email_is_valid($email) {
            return preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i',$email);
          }
          if (!email_is_valid($to)) {
            echo '<p style="color: red;">You must set-up a valid email address before this page will work.</p>';
          }
          if (isset($_POST['contact_submitted'])) {
            $return = "\r";
            $youremail = trim(htmlspecialchars($_POST['your_email']));
            $yourname = stripslashes(strip_tags($_POST['your_name']));
            $yourmessage = stripslashes(strip_tags($_POST['your_message']));
            $contact_name = "Name: ".$yourname;
            $message_text = "Message: ".$yourmessage;
            $user_answer = trim(htmlspecialchars($_POST['user_answer']));
            $answer = trim(htmlspecialchars($_POST['answer']));
            $message = $contact_name . $return . $message_text;
            $headers = "From: ".$youremail;
            if (email_is_valid($youremail) && !eregi("\r",$youremail) && !eregi("\n",$youremail) && $yourname != "" && $yourmessage != "" && substr(md5($user_answer),5,10) === $answer) {
              mail($to,$subject,$message,$headers);
              $yourname = '';
              $youremail = '';
              $yourmessage = '';
              echo '<p style="color: blue;">'.$contact_submitted.'</p>';
            }
            else echo '<p style="color: red;">Please enter your name, a valid email address, your message and the answer to the simple math question before sending your message.</p>';
          }
          $number_1 = rand(1, 9);
          $number_2 = rand(1, 9);
          $answer = substr(md5($number_1+$number_2),5,10);
        ?>
        <form id="contact" action="contact.php" method="post">
          <div class="form_settings">
            <p><span>Name</span><input class="contact" type="text" name="your_name" value="<?php echo $yourname; ?>" /></p>
            <p><span>Email Address</span><input class="contact" type="text" name="your_email" value="<?php echo $youremail; ?>" /></p>
            <p><span>Message</span><textarea class="contact textarea" rows="5" cols="50" name="your_message"><?php echo $yourmessage; ?></textarea></p>
            <p style="line-height: 1.7em;">To help prevent spam, please answer this question:</p>
            <p><span><?php echo $number_1; ?> + <?php echo $number_2; ?> = ?</span><input type="text" name="user_answer" /><input type="hidden" name="answer" value="<?php echo $answer; ?>" /></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="send" /></p>
          </div>
        </form>
      </div>
    </div>
    <footer>
      <!--#include file="Vfooter.html" -->
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
