	<?php
		include __DIR__."/header.php";//NAVBAR
		include_once __DIR__."/Services/ServiceRace.php";
		include_once __DIR__."/Services/ServiceEspece.php";
		include_once __DIR__."/Services/ServiceRefuge.php";
		include_once __DIR__."/DAO/DataAccessRace.php";
		include_once __DIR__."/DAO/DataAccessEspece.php";
		include_once __DIR__."/DAO/DataAccessRefuge.php";
	
	?>
	<section class="row MVIEW  justify-content-center borderBotom">
        <div class="col-lg-10">  
            <!-- menu de recherche -->
            <div class="row justify-content-between w-100 p-3 borderBotom">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="row justify-content-around">
                        
						<?php
							$dAOEspece=new DataAccessEspece();
							$dAORace=new DataAccessRace();
							$dAORefuge=new DataAccessRefuge();
							$especeList = new ServiceEspece($dAOEspece);
							$raceList = new ServiceRace($dAORace);
							$refugeList = new ServiceRefuge($dAORefuge);
							$listAllEspeces = $especeList->selectAll();
							$listAllRaces = $raceList->selectAll();
                            $listAllRefuges = $refugeList->selectAll();
                            


							//select especes
							echo ''	;
						?>
                      
                        <div class="col-lg-2">
                            <select class="form-control form-control-sm listeAnimaux" id="select-espece" name="espece" placeholder="Especes">
                            </select>
						</div>
                        <div class="col-lg-2">                    
                            <select class="form-control form-control-sm" id="select-race" name="race" placeholder="Races">
                                <option id="all" selected="selected">Race</option>
                            </select>
						</div>
						<div class="col-lg-2">                    
                            <select id="sexe" name="sexe" class="form-control form-control-sm"  placeholder="Sexe">
                                <option id="Sexe" selected="selected">Sexe</option>
                                <option id="Mâle" name="M">Mâle</option>
                                <option id="Femelle" name="F">Femelle</option>
                            </select>
						</div>
						<div class="col-lg-2">                    
                            <select id="handicap" name="handicap" class="form-control form-control-sm">
                                <option id="HandicapNon" selected="selected">Handicap</option>
                                <option id="Handicap" name="1">Oui</option>
                                <option id="HandicapNon" name ="0">Non</option>
                            </select>
						</div>
						<div class="col-lg-2">                    
                            <select id="age" name="age" class="form-control form-control-sm">
                                <option id="Age max" selected="selected">Âge max</option>
                                <option id="age1" name="1">1</option>
								<option id="age2" name="5">5</option>
								<option id="age3" name="10">10</option>
								<option id="age4" name="15">15</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <select id="select-refuge" name="refuge" class="form-control form-control-sm">
                            </select>
                        </div>
                        <div class="col-lg-2 mt-3">
                            <a class="btn btn-warning btn-sm form-control form-control-sm resetTags">Reset</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>
        
            <!-- Nuage de tags -->
            <div class="row justify-content-center w-100 borderBotom">
                <div class="col-lg-12">
                    <div class="row justify-content-center w-100 ">
                        <div class="col-lg-10">
                            <div class="row w-100" id="rowTags">
                             
                            </div>
                        </div>
                    </div>
                    
                </div>    
            </div>
            
            <!-- profil liste -->
            <div class="row justify-content-center w-100">
                <div class="col-lg-12" id="ListeAnimaux">
		  
				<!-- Affichage des profils -->
                </div>



            </div>

            <div class="modal" style="display: none">
                <div class="modal_contents">
                    <div class="modal_close-bar">
                        <span><i class="fas fa-times"></i></span>
                    </div>
                    Vous devez être connecté pour ajouter des favoris.
                </div>
            </div>

        </div> 
	</section>
	<?php
		include __DIR__."/footer.php";
	?>
	
	
