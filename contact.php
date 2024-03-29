<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Joshua Hunter</title>

  
  <link rel="stylesheet" href="styles/foundation.css">
  

  <script src="js/vendor/custom.modernizr.js"></script>

</head>

	<body>
<? $cur_page = "contact"; ?>
<? include "includes/nav.php" ?>
<? include "includes/header.php" ?>
 
 <form name="contactemail" method="post" action="mailto:hunter.joshua18@gmail.com">
  <fieldset>
    <legend>Contact Me Web Form</legend>

    <div class="row">
      <div class="large-12 columns">
        <label>Name:</label>
        <input type="text" placeholder="Your Name" title="name">
      </div>
    </div>

    <div class="row">
      <div class="large-4 columns">
        <label>Company(if applicable):</label>
        <input type="text" placeholder="Your Company's Name" title="company">
      </div>
      <div class="large-4 columns">
        <label>Date/Time:</label>
        <input type="datetime-local" title="datetime">
      </div>
      <div class="large-4 columns">
        <div class="row collapse">
          <label>Email:</label>
          <div class="small-9 columns">
            <input type="text" placeholder="Your Email" title="email">
          </div>
          <div class="small-3 columns">
            <span class="postfix">.com</span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="large-12 columns">
        <label>Message</label>
        <textarea placeholder="Enter your message here" title="message"></textarea>
      </div>
    </div>
<div class="row">
      <div class="large-4 columns">
        <label>Select a Color that coordinates to the urgency of this message:</label>
        <input type="color" title="color">
      </div>
      <div class="large-4 columns">
        <label>Are you a robot?:</label>
        <label for="radio1"><input name="radio1" type="radio" id="radio1"><span class="custom radio checked"></span> Yes</label>
      <label for="radio2"><input name="radio2" type="radio" id="radio2"><span class="custom radio"></span> No </label>
      </div>
      <div class="large-4 columns">
        <div class="row collapse">
          <div class="small-9 columns">
            <label for="customDropdown1">What is this Message regarding?</label>
      <select id="customDropdown1" class="medium">
							<option>Education</option>
							<option>Work</option>
							<option>Job Opportunity</option>
							<option>Spam (I am a robot or Nigerian Royalty)</option>
							<option>Other (Please specify in message)</option>
      </select>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <input type="submit" name="submit" id="submit" value="Submit" class="small button success"/>
        <input type="reset" name="reset" id="reset" value="Reset" class="small button alert"/>
       </div>
  </fieldset>
</form>
<? include "includes/footer.php" ?>
<script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>');
  </script>
  
  <script src="js/foundation.min.js"></script>
  <!--
  
  <script src="js/foundation/foundation.js"></script>
  
  <script src="js/foundation/foundation.alerts.js"></script>
  
  <script src="js/foundation/foundation.clearing.js"></script>
  
  <script src="js/foundation/foundation.cookie.js"></script>
  
  <script src="js/foundation/foundation.dropdown.js"></script>
  
  <script src="js/foundation/foundation.forms.js"></script>
  
  <script src="js/foundation/foundation.joyride.js"></script>
  
  <script src="js/foundation/foundation.magellan.js"></script>
  
  <script src="js/foundation/foundation.orbit.js"></script>
  
  <script src="js/foundation/foundation.reveal.js"></script>
  
  <script src="js/foundation/foundation.section.js"></script>
  
  <script src="js/foundation/foundation.tooltips.js"></script>
  
  <script src="js/foundation/foundation.topbar.js"></script>
  
  <script src="js/foundation/foundation.interchange.js"></script>
  
  <script src="js/foundation/foundation.placeholder.js"></script>
  
  <script src="js/foundation/foundation.abide.js"></script>
  
  -->
  
  <script>
    $(document).foundation();
  </script>
</body>
</html>
