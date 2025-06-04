<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Inscription Multistep</title>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Montserrat);
    * { margin: 0; padding: 0; }
    html {
      height: 100%;
     
      background: #333 url(https://th.bing.com/th/id/R.b5fd3fbe984103e08b9482471484394b?rik=wp0%2fR3Q4EQpPuw&pid=ImgRaw&r=0) no-repeat center center fixed;
      background-size: cover;
        
      margin: 0;
      padding: 0;
    }
    body { font-family: montserrat, arial, verdana; }
    #msform {
      width: 400px;
      margin: 50px auto;
      text-align: center;
      position: relative;
    }
    #msform fieldset {
    	background:rgb(21, 52, 56);
      border: 0;
      border-radius: 3px;
      box-shadow: 0 0 15px 1px rgba(247, 247, 247, 0.4);
      padding: 20px 30px;
      box-sizing: border-box;
      width: 80%;
      margin: 0 10%;
      position: relative;
    }
    #msform fieldset:not(:first-of-type) { display: none; }
    #msform input, #msform textarea {
      padding: 15px;
      border: 1px solid #ccc;
      border-radius: 3px;
      margin-bottom: 10px;
      width: 100%;
      box-sizing: border-box;
      font-family: montserrat;
      color: #2C3E50;
      font-size: 13px;
    }
    #msform .action-button {
      width: 100px;
      background:rgb(204, 24, 24);
      font-weight: bold;
      color: white;
      border: 0;
      border-radius: 1px;
      cursor: pointer;
      padding: 10px;
      margin: 10px 5px;
      text-decoration: none;
      font-size: 14px;
    }
    #msform .action-button:hover, #msform .action-button:focus {
      box-shadow: 0 0 0 2px white, 0 0 0 3pxrgb(223, 49, 43);
    }
    .fs-title {
      font-size: 15px;
      text-transform: uppercase;
      color:rgb(10, 10, 10);
      margin-bottom: 10px;
    }
    .fs-subtitle {
      font-weight: normal;
      font-size: 13px;
      color: #666;
      margin-bottom: 20px;
    }
    #progressbar {
      margin-bottom: 30px;
      overflow: hidden;
      counter-reset: step;
    }
    #progressbar li {
      list-style-type: none;
      color:rgb(248, 246, 246);
      text-transform: uppercase;
      font-size: 9px;
      width: 33.33%;
      float: left;
      position: relative;
    }
    #progressbar li:before {
      content: counter(step);
      counter-increment: step;
      width: 20px;
      line-height: 20px;
      display: block;
      font-size: 10px;
      color:rgb(214, 33, 33);
      background:rgb(5, 5, 5); 
      border-radius: 3px;
      margin: 0 auto 5px auto;
    }
    #progressbar li:after {
      content: '';
      width: 100%;
      height: 2px;
      background:rgb(250, 248, 248);
      position: absolute;
      left: -50%;
      top: 9px;
      z-index: -1;
    }
    #progressbar li:first-child:after { content: none; }
    #progressbar li.active:before, #progressbar li.active:after {
      background:rgb(204, 24, 24);
      color: white;
    }
  </style>
</head>
<body>

<form id="msform" method="POST" action="submit.php">
  <ul id="progressbar">
    <li class="active">Compte</li>
    <li>Profils sociaux</li>
    <li>Détails persos</li>
  </ul>

  <!-- Step 1 -->
  <fieldset>
    <h2 class="fs-title">Créer un compte</h2>
    <h3 class="fs-subtitle">Étape 1</h3>
    <input type="text" name="pseudo" placeholder="Pseudo" required />
    <input type="email" name="email" placeholder="Email" required />
    <input type="password" name="pass" placeholder="Mot de passe" required />
    <input type="password" name="cpass" placeholder="Confirmez le mot de passe" required />
    <input type="button" name="next" class="next action-button" value="Suivant" />
  </fieldset>

  <!-- Step 2 -->
  <fieldset>
    <h2 class="fs-title">Profils sociaux</h2>
    <h3 class="fs-subtitle">Votre présence en ligne</h3>
    <input type="text" name="discord" placeholder="Discord" required />
    <input type="text" name="Instagram" placeholder="Instagram" />
    <input type="text" name="telegram" placeholder="Telegram" />
    <input type="button" name="previous" class="previous action-button" value="Précédent" />
    <input type="button" name="next" class="next action-button" value="Suivant" />
  </fieldset>

  <!-- Step 3 -->
  <fieldset>
    <h2 class="fs-title">Détails personnels</h2>
    <h3 class="fs-subtitle">Nous ne les vendrons jamais.</h3>
    <input type="text" name="fname" placeholder="Prénom" required />
    <input type="text" name="lname" placeholder="Nom" required />
    <input type="tel" name="phone" placeholder="+33 6 12 34 56 78" required
       pattern="^\+33\s?[1-9](?:\s?\d{2}){4}$" />
    <script>
    document.querySelector('form').addEventListener('submit', function(e) {
      const phoneInput = document.querySelector('input[name="phone"]');
      const regex = /^\+33\s?[1-9](?:\s?\d{2}){4}$/;

      if (!regex.test(phoneInput.value)) {
      alert("Numéro invalide. Utilise le format : +33 6 00 00 00 00");
      e.preventDefault();
      }
    });
    </script>

    <input type="date" name="birthdate" placeholder="Date de naissance" required />
    <input type="button" name="previous" class="previous action-button" value="Précédent" />
    <input type="submit" name="submit" class="submit action-button" value="Valider" />
  </fieldset>
</form>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script>
  var current_fs, next_fs, previous_fs;
  var left, opacity, scale;
  var animating;

  $(".next").click(function(){
    if(animating) return false;
    animating = true;

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    next_fs.show();
    current_fs.animate({opacity: 0}, {
      step: function(now, mx) {
        scale = 1 - (1 - now) * 0.2;
        left = (now * 50)+"%";
        opacity = 1 - now;
        current_fs.css({'transform': 'scale('+scale+')','position': 'absolute'});
        next_fs.css({'left': left, 'opacity': opacity});
      },
      duration: 800,
      complete: function(){
        current_fs.hide();
        animating = false;
      },
      easing: 'easeInOutBack'
    });
  });

  $(".previous").click(function(){
    if(animating) return false;
    animating = true;

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    previous_fs.show();
    current_fs.animate({opacity: 0}, {
      step: function(now, mx) {
        scale = 0.8 + (1 - now) * 0.2;
        left = ((1-now) * 50)+"%";
        opacity = 1 - now;
        current_fs.css({'left': left});
        previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
      },
      duration: 800,
      complete: function(){
        current_fs.hide();
        animating = false;
      },
      easing: 'easeInOutBack'
    });
  });
</script>

</body>
</html>
