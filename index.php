<?php session_start();
 include 'includes/database.php';


        if (isset($_POST['submit'])) {
          
            extract($_POST);

            if (!empty($email)){
                
                $requser = $dbco->prepare("SELECT * FROM clients WHERE email = ?");
                $requser->execute(array($email));
                $userexist = $requser->rowCount();
                if ($userexist == true) {
                    
                    $userinfo = $requser->fetch();
                    $_SESSION['id'] = $userinfo['id'];
                    $_SESSION['nom'] = $userinfo['Nom'];
                    $_SESSION['prenom'] = $userinfo['prenom'];
                    $_SESSION['ville'] = $userinfo['Ville'];
                    $_SESSION['phone'] = $userinfo['Phone'];
                    $_SESSION['email'] = $userinfo['Email'];                        
                    $_SESSION['typeDossier'] = $userinfo['TypeDossier'];
                    $_SESSION['notaireChoisi'] = $userinfo['NotaireChoisi'];
                    $_SESSION['DateInscription'] = $userinfo['DateInscription'];
                    header("Location: utilisateur/session.php?email=".$_SESSION['email']);

                }else{
                    $erreur = "C'est mail n'existe pas ";
                }

            }else {
                $erreur = "Votre mail ou numéro du dossier est faux";
            }

            if (!empty($email)){

                $requser = $dbco->prepare("SELECT * FROM notaires WHERE email = ?");
                $requser->execute(array($email));
                $userexist = $requser->rowCount();
                if ($userexist == true) {

                     $userinfo = $requser->fetch();
                    $_SESSION['id'] = $userinfo['id'];
                    $_SESSION['nom'] = $userinfo['Nom'];
                    $_SESSION['prenom'] = $userinfo['prenom'];
                    $_SESSION['ville'] = $userinfo['Ville'];
                    $_SESSION['phone'] = $userinfo['Phone'];
                    $_SESSION['email'] = $userinfo['Email'];                        
                    $_SESSION['typeDossier'] = $userinfo['TypeDossier'];
                    $_SESSION['notaireChoisi'] = $userinfo['NotaireChoisi'];
                    $_SESSION['DateInscription'] = $userinfo['DateInscription'];
                    header("Location: partie_notaire_notaruim/index.php?email=".$_SESSION['email']);
                    
                }else{
                    $erreur = "C'est mail n'existe pas ";
                }

            }else {
                $erreur = "Votre mail ou numéro du dossier est faux";
            }

        }


?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Metas -->
    <title>Notarium</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="description" content="Notre site web Notarium, aide les notaires qui veulent accroitre leur valeur ajoutée en atteignant un large public et en modernisant leurs services à offrir aux entreprises et aux particuliers des services en ligne.">
    <meta name="author" content="Daddy 2lb, Gabriella, Sady, Sabrina et l'equipe Notarium">



    <!-- Site Icons -->
    <link rel="icon" type="images/png" href="images/logo Notarium Modifier 2.png" />
    <link rel="apple-touch-icon" href="#" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="css/pogo-slider.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <img src="images/loader.gif" alt="lecture" />
        </div>
    </div>
    <!-- end loader -->
    <!-- END LOADER -->

    <?php include 'includes/headerAceuil.php';?>
    
    <!-- Start Banner -->
    <div class="ulockd-home-slider">
        <div class="container-fluid">
            <div class="row">
                <div class="pogoSlider" id="js-main-slider">
                    <div class="" style="background-image:url(images/slide_img.png);">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slide_text ">
                                        <h3 align='center'><strong>Le service notarial en ligne</strong><br>Entrez en relation avec votre Notaire.</h3>
                                      
                                        <div id="client">
                                            <div class="bloc-a">
                                                <div class="texte-d">Demander les services d'un Notaire</div>
                                                <div class="b-validation">
                                                <a class="demande" href="information-du-client.php">Créez un compte</a>
                                                </div>
                                            </div>

                                            <div class="bloc-b">   
                                                <div class="texte-ev">Suivre l'évolution de votre dossier</div>
                                                <div class="form-numero">
                                                    <form action="#" method="POST" name="numero">
                                                        <input type="text" class="numero" name="email" placeholder="Votre email ou numéro de téléphone" required/>
                                                        <input type="text" class="securmdp" name="mdp" placeholder="Votre mot de passe" required/>
                                                        <input type="submit" name="submit" value="Ouvrir" class="b-ouvrire"/>
                                                    </form>
                                                    <div align="center">
                                                    <?php
                                                        if (isset($erreur)) {
                                                            echo '<font color="red">'.$erreur."</font>";
                                                         } 
                                                    ?>
                                                    </div>
                                                    <div class="oublie">Vous avez oublié votre adresse e-mail? <br/><a href="https://accounts.google.com/signup/v2/webcreateaccount?flowName=GlifWebSignIn&flowEntry=SignUp" target="_blank"><span>cliquez ici</span></a></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
                <!-- .pogoSlider -->
            </div>
        </div>
    </div>
    <!-- End Banner -->
    
    <?php include 'includes/Section_plateforme.php';?>
	
    <?php include 'includes/Section_Domaines.php';?>

    <?php include 'includes/Section_succession.php';?>

	<?php include 'includes/Section_immobilier.php';?>
	
    <?php include 'includes/Section_kiosque.php';?>
        
    <!-- end section -->
   <?php include 'includes/FooterAceuil.php';?>

    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="crp">© Copyrights 2019 Notarium</p>
                </div>
            </div>
        </div>
    </div>

    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.pogo-slider.min.js"></script>
    <script src="js/slider-index.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/custom.js"></script>
	<script>
	/* counter js */

(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});
	</script>
</body>

</html>