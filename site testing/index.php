<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>register index</title>
  <link rel="stylesheet" href="https://public.codepenassets.com/css/reset-2.0.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!-- multistep form -->
<form id="msform" method="POST" action="register.php">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Social Profiles</li>
    <li>Personal Details</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Create your account</h2>
    <h3 class="fs-subtitle">This is step 1</h3>
    <input type="text" name="pseudo" placeholder="pseudo" required />
    <input type="email" name="email" placeholder="Email" required />
  
    <input type="password" name="pass" placeholder="Password" required />
    <input type="password" name="cpass" placeholder="Confirm Password" required />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Social Profiles</h2>
    <h3 class="fs-subtitle">Your presence on the social network</h3>
    <input type="text" name="discord" placeholder="Discord" required />
    <input type="text" name="Instagrame" placeholder="Instagrame" />
    <input type="text" name="télégrame" placeholder="télégrame" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">We will never sell it</h3>
    <input type="text" name="fname" placeholder="First Name" required />
    <input type="text" name="lname" placeholder="Last Name" required />
    <input type="text" name="phone" placeholder="Phone" required />
    <a> date de naissance </a>
    <input type="date" name="birthdate" placeholder="date de naissance" required />
    <input type="submit" name="submit" class="submit action-button" value="Submit" />
    <!-- <a href="XXX" class="submit action-button" target="_top">Submit</a> -->
  </fieldset>
</form>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script><script  src="./script.js"></script>

</body>
</html>
