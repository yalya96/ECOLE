<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="formulaire.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    

<div class="container">
        <div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-4">
								<a href="#" class="active" id="login-form-link">Apprenant</a>
							</div>
							<div class="col-xs-4">
								<a href="#" id="register-form-link">Chambre</a>
							</div>
                            <div class="col-xs-4">
								<a href="#" id="register-form-links">Batiment</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
                                    <!-- FORMULAIRE AJOUT ET MODIFICATION ETUDIANTS -->
								<form id="login-form" action="verification.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="Matricule" id="Matricule" tabindex="1" class="form-control" placeholder="Matricule" value="">
									</div>
									<div class="form-group">
										<input type="Prénom" name="Prenom" id="Prénom" tabindex="2" class="form-control" placeholder="Prénom">
									</div>
									
									<div class="form-group">
										<input type="text" name="Nom" id="Nom" tabindex="1" class="form-control" placeholder="Nom" value="">
									</div>
									<div class="form-group">
										<input type="date" name="Date_De_Naissance" id="Date_De_Naissance" tabindex="2" class="form-control" placeholder="Date De Naissance">
									</div>
									<div class="form-group">
										<input type="text" name="Email" id="Email" tabindex="1" class="form-control" placeholder="Email" value="">
									</div>
									<div class="form-group">
										<input type="text" name="Numero" id="Numero" tabindex="2" class="form-control" placeholder="Numero">
									</div>

                                    <div class="row">
											<div class="col-sm-6 col-sm-offset-3">
                                                <label for="gogo">Boursier</label>
												<input type="checkbox" name="bourse" id="gogo" tabindex="" class="gspotb" value="oui" onclick="alpha();">
                                                <label for="fifi">NonBoursier</label>
                                                <input type="checkbox" name="bourse" id="fifi" tabindex="" class="gspotb" value="non" onclick="beta();">
											</div>
									</div>
                                    <fieldset id="Adresse" style="border: 0px; display: none;">
									<div class="form-group">
										<input type="text" name="adresse" id="" tabindex="2" class="form-control" placeholder="Adresse">
									</div>
                                    </fieldset>
                                    <fieldset id="Type_De_Bourse" style="border: 0px; display: none;">
                                    <div class="form-group">
                                    <select name="Type_De_Bourse" id="" class="form-control">
                                    <option value="DEMI">DEMI</option>
                                    <option value="ENTIERE">ENTIERE</option>
                                    </select>
									</div>
                                    <div class="form-group">
										<input type="number" name="montant" id="" tabindex="2" class="form-control" placeholder="MOONTANT">
									</div>

                                    <div class="row">
											<div class="col-sm-6 col-sm-offset-3">
                                                <label for="">Loger</label>
												<input type="checkbox" name="loge" id="login-submit" tabindex="4" class="gspota" value="oui" onclick="alpha1();">
                                                <label for="">NonLoger</label>
                                                <input type="checkbox" name="loge" id="login-submit" tabindex="4" class="gspota" value="non" onclick="beta1();">
											</div>
									</div>
                                    </fieldset>
                                    <fieldset id="Logement" style="border: 0px; display: none;" >
									<div class="form-group">
                                    <label for="">BATIMENT</label>
                                    <?php
                                                    $server="localhost";
                                                    $login="root";
                                                    $pass="WELCOME";
                                                    try {
                                                        $connexion = new PDO("mysql:host=$server;dbname=ECOLES",$login,$pass);
                                                        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                        $a=$connexion->prepare("SELECT * FROM batiment ");
                                                        $a->execute(array());
                                                        $all_select=$a->fetchAll();
                                                    ?>
                                                    <?php
                                                        echo"<select name='Batiment' id='01'class='form-control'>";
                                                        for ($i=0; $i <count($all_select);  $i++) 
                                                        { 
                                                            echo'<option value='.$all_select[$i]['id_bat'].'>'.$all_select[$i]['nom_bat'].'</option>';
                                                            
                                                        }
                                                        echo"</select>";
                                                        
                                                

                                                    }
                                                    catch (PDOException $e) {
                                                        echo"Erreur".$e->getMessage();
                                                    }
                                                    ?>
									</div>
									<div class="form-group">
                                    <label for="">CHAMBRES</label>
                                    <?php
                                                    $server="localhost";
                                                    $login="root";
                                                    $pass="WELCOME";
                                                    try {
                                                        $connexion = new PDO("mysql:host=$server;dbname=ECOLES",$login,$pass);
                                                        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                        $a=$connexion->prepare("SELECT * FROM chambre ");
                                                        $a->execute(array());
                                                        $all_select=$a->fetchAll();
                                                        
                                                    ?>
                                                    <?php
                                                        echo"<select name='Chambre' id='01'class='form-control'>";
                                                        for ($i=0; $i <count($all_select);  $i++) 
                                                        { 
                                                            echo'<option value='.$all_select[$i]['nom_cha'].'>'.$all_select[$i]['nom_cham'].'</option>';
                                                            
                                                        }
                                                        echo"</select>";
                                                        
                                                

                                                    }
                                                    catch (PDOException $e) {
                                                        echo"Erreur".$e->getMessage();
                                                    }
                                                    ?>
									</div>
                                    </fieldset>

                                    <fieldset id="Validation1" style="border: 0px; display: none;" >
                                    <!-- Button (Double) -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="save"></label>
                                        <div class="col-md-8">
                                            <button id="save" name="AjoutEtudiant" class="btn btn-success">Ajouter</button>
                                            <button id="clear" name="clear" class="btn btn-danger">Reset</button>
                                        </div>
                                    </div>
                                    </fieldset>

								</form>
                                <!-- FORMULAIRE AJOUT ET MODIFICATION CHAMBRE -->
								<form id="register-form" action="verification.php" method="post" role="form" style="display: none;">
                                <div class="row">
											<div class="col-sm-6 col-sm-offset-3">
                                                <label for="">Ajout</label>
												<input type="radio" name="login-submit" id="login-submit" tabindex="4" class="" onclick="alpha2();">
                                                <label for="">MODIFICATION</label>
                                                <input type="radio" name="login-submit" id="login-submit" tabindex="4" class="" onclick="beta2();">
											</div>
								</div>
                                <fieldset id="Nom_Chambre" style="border: 0px; display: none;">
                                <div class="form-group">
                                                <label for="01">Affiche les batiments</label>
                                                <br>
                                                
                                                <?php
                                                    $server="localhost";
                                                    $login="root";
                                                    $pass="WELCOME";
                                                    try {
                                                        $connexion = new PDO("mysql:host=$server;dbname=ECOLES",$login,$pass);
                                                        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                        $a=$connexion->prepare("SELECT * FROM batiment ");
                                                        $a->execute(array());
                                                        $all_select=$a->fetchAll();
                                                       // var_dump($all_select)
                                                    ?>
                                                    <?php
                                                        echo"<select name='bati' id='01'class='form-control'>";
                                                        for ($i=0; $i <count($all_select);  $i++) 
                                                        { 
                                                            echo'<option value='.$all_select[$i]['id_bat'].'>'.$all_select[$i]['nom_bat'].'</option>';
                                                            
                                                        }
                                                        echo"</select>";
                                                        
                                                

                                                    }
                                                    catch (PDOException $e) {
                                                        echo"Erreur".$e->getMessage();
                                                    }
                                                    ?>
								</div>
                                <div class="form-group">
										<input type="text" name="Nom_Chambre" id="" tabindex="" class="form-control" placeholder="Nom Chambre" value="">
								</div>
                                </fieldset>
                                

                                <fieldset id="Chambre_modif" style="border: 0px; display: none;">
                                <div class="form-group">
                                <label for="01">Affiche les CHAMBRE</label>
                                                <br>
                                                
                                                <?php
                                                    $server="localhost";
                                                    $login="root";
                                                    $pass="WELCOME";
                                                    try {
                                                        $connexion = new PDO("mysql:host=$server;dbname=ECOLES",$login,$pass);
                                                        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                        $a=$connexion->prepare("SELECT * FROM chambre ");
                                                        $a->execute(array());
                                                        $all_select=$a->fetchAll();
                                                        var_dump($all_select);
                                                    ?>
                                                    <?php
                                                        echo"<select name='cham' id='01'class='form-control'>";
                                                        for ($i=0; $i <count($all_select);  $i++) 
                                                        { 
                                                            echo'<option value='.$all_select[$i]['id_bat'].'>'.$all_select[$i]['nom_cham'].'</option>';
                                                            
                                                        }
                                                        echo"</select>";
                                                        
                                                

                                                    }
                                                    catch (PDOException $e) {
                                                        echo"Erreur".$e->getMessage();
                                                    }
                                                    ?>
								</div>
                                <div class="form-group">
										<input type="text" name="Chambre_modif" id="" tabindex="" class="form-control" placeholder="Chambre à modifier">
								</div>
                                </fieldset>

                                <fieldset id="Validation2" style="border: 0px; display: none;" >
                                    <!-- Button (Double) -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="save"></label>
                                        <div class="col-md-8">
                                            <button id="save" name="AjoutChambre" class="btn btn-success">Ajouter</button>
                                            <button id="clear" name="ModifChambre" class="btn btn-danger">Modifier</button>
                                        </div>
                                    </div>
                                </fieldset>					
								</form>

                                    <!-- FORMULAIRE AJOUT ET MODIFICATION BATIMENTS -->
                                    <form id="register-forms" action="verification.php" method="post" role="form" style="display: none;">
                                    <div class="row">
											<div class="col-sm-6 col-sm-offset-3">
                                                <label for="">Ajout</label>
												<input type="radio" name="login-submit" id="login-submit" tabindex="4" class="" onclick="alpha3();">
                                                <label for="">MODIFICATION</label>
                                                <input type="radio" name="login-submit" id="login-submit" tabindex="4" class="" onclick="beta3();">
											</div>
                                    </div>
                                    <fieldset id="Nom_Batiment" style="border: 0px; display: none;">
									<div class="form-group">
										<input type="text" name="Nom_Batiment" id="Nom_Batiment" tabindex="" class="form-control" placeholder="Nom Batiment">
									
									</div>
                                    </fieldset>
                                    <fieldset id="Batiment_modif" style="border: 0px; display: none;">
                                    <div class="form-group">
                                    <label for="01">Affiche les CHAMBRE</label>
                                                <br>
                                                
                                                <?php
                                                    $server="localhost";
                                                    $login="root";
                                                    $pass="WELCOME";
                                                    try {
                                                        $connexion = new PDO("mysql:host=$server;dbname=ECOLES",$login,$pass);
                                                        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                        $a=$connexion->prepare("SELECT * FROM batiment ");
                                                        $a->execute(array());
                                                        $all_select=$a->fetchAll();
                                                    ?>
                                                    <?php
                                                        echo"<select name='batiment' id='01'class='form-control'>";
                                                        for ($i=0; $i <count($all_select);  $i++) 
                                                        { 
                                                            echo'<option value='.$all_select[$i]['id_bat'].'>'.$all_select[$i]['nom_bat'].'</option>';
                                                            
                                                        }
                                                        echo"</select>";
                                                        
                                                

                                                    }
                                                    catch (PDOException $e) {
                                                        echo"Erreur".$e->getMessage();
                                                    }
                                                    ?>
								</div>
									<div class="form-group">
										<input type="text" name="Batiment_modif" id="Batiment_modif" tabindex="" class="form-control" placeholder="Batiment à modifier">
									</div>
                                    </fieldset>


                                    <fieldset id="Validation3" style="border: 0px; display: none;" >
                                                <!-- Button (Double) -->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="save"></label>
                                            <div class="col-md-8">
                                                <button id="save" name="AjoutBat" class="btn btn-success">Ajouter</button>
                                                <button id="clear" name="ModifBat" class="btn btn-danger">Modifier</button>
                                            </div>
                                        </div>
                                    </fieldset>
								</form>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<script>
$(function() {

$('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
     $("#register-form").fadeOut(100);
     $("#register-forms").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $('#register-form-links').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
});
$('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
     $("#login-form").fadeOut(100);
     $("#register-forms").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $('#register-form-links').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
});
$('#register-form-links').click(function(e) {
    $("#register-forms").delay(100).fadeIn(100);
     $("#login-form").fadeOut(100);
     $("#register-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
});

});

function alpha() {
        
        var a=document.getElementById('Type_De_Bourse');
        a.style.display="block";
        var c=document.getElementById('Adresse');
        c.style.display="none";
        var d=document.getElementById('Logement');
        d.style.display="none";
        var f=document.getElementById('Validation1');
        f.style.display="none";
    }
function beta() {
        var a=document.getElementById('Type_De_Bourse');
        var c=document.getElementById('Adresse');
        var d=document.getElementById('Logement');
        d.style.display="none";
        c.style.display="block";
        a.style.display="none";
        var f=document.getElementById('Validation1');
        f.style.display="block";
    }

    function alpha1() {
        
        var a=document.getElementById('Logement');
        a.style.display="block";
        var f=document.getElementById('Validation1');
        f.style.display="block";
    }
    function beta1() {
        
        var a=document.getElementById('Logement');
        a.style.display="none";
        var f=document.getElementById('Validation1');
        f.style.display="block";
    }
    function alpha2() {
        
        var a=document.getElementById('Nom_Chambre');
        a.style.display="block";
        var b=document.getElementById('Chambre_modif');
        b.style.display="none";
        var f=document.getElementById('Validation2');
        f.style.display="block";
    }
    function beta2() {
        
        var a=document.getElementById('Chambre_modif');
        a.style.display="block";
        var b=document.getElementById('Nom_Chambre');
        b.style.display="none";
        var f=document.getElementById('Validation2');
        f.style.display="block";
    }
    function alpha3() {
        
        var a=document.getElementById('Nom_Batiment');
        a.style.display="block";
        var b=document.getElementById('Batiment_modif');
        b.style.display="none";
        var f=document.getElementById('Validation3');
        f.style.display="block";
    }
    function beta3() {
        
        var a=document.getElementById('Batiment_modif');
        a.style.display="block";
        var b=document.getElementById('Nom_Batiment');
        b.style.display="none";
        var f=document.getElementById('Validation3');
        f.style.display="block";
    }

</script>
<script>
var aGspot = document.querySelectorAll('[class^="gspot"]'), iNb = aGspot.length;
for(var i = 0; i< iNb;i++){
  //Assignation de l'écouteur sur chaque checkbox
  aGspot[i].addEventListener("click", checkboxToRadio);  
}//for

function checkboxToRadio(oEvent){ 
  console.log("checkboxToRadio");
  var oEl = oEvent.target, sClass = oEl.className,
      bHasOldCheck = (typeof(window[sClass]) != "undefined" && window[sClass] != null);
  if(bHasOldCheck==false){
    //si il y a un checkbox sélectionné
    if(oEl.defaultChecked == true){
      // checkbox sélectionné par défaut
      oEl.checked = true  
    }
  }else{
    if(window[sClass] != oEl){
      //si il y a un checkbox sélectionné en cours dans window[sClass] 
      // je le decoche sauf si c'est le checkbox qui vient d'être cliqué
      window[sClass].checked = false;
    }else{ 
      //si il y a un checkbox sélectionné en cours dans window[sClass] 
      // et c'est le checkbox qui vient d'être cliqué je le coche 
      window[sClass].checked = true;
    }
  } 
  //J'ai traité le checkbox anciennement sélectionné
  //je mets window[sClass] = null
  window[sClass] = null;
  if(oEl.checked==true){
    // si je suis sélectionné, je stocke me dans window[sClass] 
    window[sClass] = oEl; 
  }//if
}//fct
</script>
</body>
</html>