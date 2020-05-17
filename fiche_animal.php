<?php
		
include __DIR__."/header.php";//NAVBAR

include_once("Model/Animal.php");
include_once("Services/ServiceAnimaux.php");
include_once("DAO/DataAccessAnimaux.php");
include_once("fonctions/fonctions.php");

        

if(isset($_GET["animal"]) && !empty($_GET["animal"])) {
    $dAOAnimal = new DataAccessAnimaux();  
    $serviceAnimal = new ServiceAnimaux($dAOAnimal);
    $array = array('id_animal' => $_GET["animal"]);
    $animal = $serviceAnimal->getBySearch($array);
    $style = "radius-top";
    foreach($animal as $key ) {
        foreach($key as $animalInfo => $val ) {
            $$animalInfo = $val ;
        }
    }
  
  ?>
    
    

            <section class="row part-top-animal mt-5 justify-content-center">
                <div class="col-lg-8">
                    <div class="row justify-content-center">
                        <h1 class="text-center mb-5"><?php echo "$nom_animal"; ?></h1>
                    </div>
                    <div class="row pic-animal mb-5">
                        <?php echo renderImage($photo_animal , $style) ?>
                    </div>
                    <div class="row descriptif-animal border border-secondary mb-5">
                        <div class="col-12">
                            <div class="row attributs mx-auto">
                                <div class="col-12 caracteristiques border-bottom pb-3">
                                    <div class="row part-descriptif d-flex justify-content-between mb-2 mt-3">
                                        <div class="col-lg-4 col-md-5 col-12 mb-lg-0 mb-md-0 mb-sm-2 mb-2">
                                            Nom : <?php echo $nom_animal; ?>
                                        </div>
                                        <div class="col-lg-4 col-md-5 col-12 text-left">
                                            Espèce : <?php echo $espece; ?>
                                        </div>
                                    </div>
                                    <div class="row part-descriptif d-flex justify-content-between mb-2">
                                        <div class="col-lg-4 col-md-5 col-12 text-left mb-lg-0 mb-md-0 mb-sm-2 mb-2">
                                            Race/Apparence : <?php echo $race; ?>
                                        </div>
                                        <div class="col-lg-4 col-md-5 col-12 text-left">
                                            Sexe : <?php echo $sexe_animal; ?>
                                        </div>
                                    </div>
                                    <div class="row part-descriptif d-flex justify-content-between mb-2">
                                        <div class="col-lg-4 col-md-5 col-12 text-left mb-lg-0 mb-md-0 mb-sm-2 mb-2">
                                            Date de naissance : <?php echo "$date_naissance_animal ( $age_animal ans ) "; ?> 
                                        </div>
                                        <div class="col-lg-4 col-md-5 col-12 text-left">
                                            Refuge : <?php echo $nom_refuge; ?>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <div class="row texte-descriptif mb-3 pt-3 mx-auto">
                                <div class="col-12">
                                    <div class="row mx-auto">
                                        <p class="text-justify"><?php echo $description_animal; ?></p>
                                    </div>  
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <aside class="to-adopt mb-5">
                <div class="col-lg-6 col-md-9 col-sm-12 mx-auto">
                    <div class="row justify-content-center mb-3" id="question">
                    </div>
                    <div class="row justify-content-center">
                        <button id="btn-form-une-question"type="button" class="btn btn-success">> Une question ?</button>
                    </div>
                </div>
            </aside>

            <section id="form-une-question"class="row justify-content-center mb-5" style="display: none">
                <div class="col-lg-8 border border-secondary">
                    <div class="row m-3">
                        <div class="col-lg-5 col-md-6 col-sm-12 mb-5"  id="nousEcrire">
                            <h1 class="mb-5">Poser votre question</h1>
                            <form id="contactForm" method="post" action="">
										<input id="nomContact" name="nom" type="text" class="form-control mt-3" placeholder="Nom" />
										<div id="nom-feedback" class="invalid-feedback"></div>
										<input id="prenomContact" name="prenom" type="text" class="form-control mt-3" placeholder="Prénom" />
										<div id="prenom-feedback" class="invalid-feedback"></div>
										<input id="emailContact" name="email" type="email" class="form-control mt-3" placeholder="Votre@adresse.mail" />
										<div id="email-feedback" class="invalid-feedback"></div>
										<input id="sujetContact" name="sujet" type="hidden" class="form-control mt-3" placeholder="Sujet" value="Une question sur <?php echo $nom_animal; ?>"/>
										<textarea id="messageContact" name="message" rows="6" class="form-control mt-3" placeholder="Message"></textarea>
										<div id="message-feedback" class="invalid-feedback"></div>
										<div class="row justify-content-center">
											<div class="col-12">
												<button id="contactBTN" name="contactBTN" type="submit" class="btn btn-primary mt-3">Envoyer</button>
											</div>	
										</div>
									</form>
                        </div>
                        <div class="col-lg-6 offset-lg-1 col-md-1 col-sm-12 mb-5">
                            <h1 class="mb-5">Questions fréquentes</h1>
                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium.</p>
                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla v</p>
                                <p class="text-justify">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium.</p>
                                <p class="text-justify mb-0">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec.</p>
                        </div>
                    </div>
                </div>    
                                    
            </section>
                            

            <section class="row mb-5 justify-content-center">
                <div class="col-lg-8 col-md-12 p-0 border border-secondary">
                    <div class="row m-4">
                        <div class="col-lg-6 col-md-7 col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <h1 class="text-lg-left text-md-left text-center mb-5">Les modalités d'adoption</h1>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur rid</p>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur rid</p>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 offset-lg-2 col-md-4 offset-md-1 col-12 min-vw-60 h-auto">
                            <div class="row h-auto border border-dark">
                                <div class="col-12">
                                    <div class="row h-auto">
                                        <div class="col-12 border-bottom border-dark">
                                            <div class="row">
                                                <h4 class="text-left m-3">Participation :</h4>
                                            </div>
                                            <div class="row">
                                                <p class="ml-3">
                                                Prix : 150 € 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row h-auto">
                                        <div class="col-12">
                                            <div class="row">
                                                <h4 class="text-left m-3">Pièces à apporter :</h4>
                                            </div>
                                            <div class="row">
                                                <p class="ml-3">
                                               Un justificatif de domicile à votre nom
                                                </p>
                                            </div>
                                            <div class="row">
                                                <p class="ml-3">
                                                Une piece d'identité
                                                </p>
                                            </div>
                                            <div class="row">
                                                <p class="ml-3">
                                                Atestation d'hebergement + justificatif + Piece d'identitée de l'hebergeur(si justificatif de domicil sous un autre nom)
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="row mb-5 justify-content-center">
                <div class="col-lg-10 border border-secondary">
                <div class="row justify-content-center borderBotom paddingBotom slide d-none d-sm-block">
                    <div class="col">
                        <h1 class="text-center mt-5">Parce que vous avez regardé <?php echo $nom_animal; ?></h1>
                        <!--carousel LG-->
                        <div id="carouselDA" class=" col-12 text-dark carousel w-100" data-ride="carousel" data-interval="3000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="row justify-content-around TuileUrgence-slide mt-5 mb-2">
                                            
                                        
                                            <?php
                                            
                                            $dAOAnimal = new DataAccessAnimaux();
                                            $arrivants = new ServiceAnimaux($dAOAnimal);
                                            $offset = "where animal.sexe_animal = '$sexe_animal' and race.race = '$race'ORDER BY id_animal DESC LIMIT 4 OFFSET 1";
                                            $cnt = 1;
                                            $style = "radius-all";
                                            $lastFirst = $arrivants->getCarouselIndex($offset);
                                            foreach($lastFirst as $key) {
                                                                                               
                                                    
                                                    echo '<div class="col-2 TuileUrgence px-0 w-100"><a href="fiche_animal.php?animal='.$key["id_animal"].'" class="tip">
                                                    <span>'.$key["nom_animal"].' est un '.$key["race"].' de '.$key["age_animal"].' ans qui est arrivé chez nous le '.$key["date_entree"].'</span>
                                                                 '.renderImage($key["photo_animal"], $style).'
                                                            </a></div>	';
                                                            
                                            
                                                }
                                                ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="row justify-content-around TuileUrgence-slide mt-5 mb-2">
                                            
                                        <?php

                                            $dAOAnimal = new DataAccessAnimaux();
                                            $arrivants = new ServiceAnimaux($dAOAnimal);
                                            $offset = "where animal.sexe_animal = '$sexe_animal' and race.race = '$race'ORDER BY id_animal DESC LIMIT 4 OFFSET 1";
                                            $cnt = 1;
                                            $style = "radius-all";
                                            $lastFirst = $arrivants->getCarouselIndex($offset);
                                            foreach($lastFirst as $key) {

                                                echo '	<div class="col-2 TuileUrgence px-0 w-100"><a href="fiche_animal.php?animal='.$key["id_animal"].'" class="tip">
                                                <span>'.$key["nom_animal"].' est un '.$key["race"].' de '.$key["age_animal"].' ans qui est arrivé chez nous le '.$key["date_entree"].'</span>
                                                             '.renderImage($key["photo_animal"], $style).'
                                                        </a></div>	';
                                                        
                                        
                                            }
                                        
                                        ?>
                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                     
                    </div>
                            </div>
                
                </div>
                        
                        <!--carousel xs-->
   
            </section>
        

  



  <?php
  } else {
    echo'<section class="row MVIEW part-top-animal mt-5 justify-content-center">
    <div class="col-lg-8">
        <div class="row justify-content-center">
            <h1 class="text-center mb-5">Une erreur est survenue</h1>
        </div>
    </div>
    </section>';


  }
		include __DIR__."/footer.php";
	?>
	
	
		