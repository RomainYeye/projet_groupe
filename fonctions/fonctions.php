<?php

function displayHeaderFormDisconnected() {

    echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Connexion</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
										<form class="px-4 py-3" id="connexion" name="connexion" method="post" action="header.php">
											<div id="divemailconnexionheader" class="form-group">
												<label for="exampleDropdownFormEmail1">Email</label>
													<input type="email" name="email" class="form-control" id="emailconnexionheader" maxlength="50" placeholder="email@example.com" required>
											</div>
											<div id="divpassconnexionheader" class="form-group">
												<label for="exampleDropdownFormPassword1">Mot de passe</label>
													<input type="password" name="password" class="form-control" id="passconnexionheader" maxlength="25" placeholder="Password" required>
											</div>
											<div class="form-group">
												<div class="form-check">
													<input type="checkbox" class="form-check-input" id="dropdownCheck">
													<label class="form-check-label" for="dropdownCheck">
														Rester connecté
													</label>
												</div>
											</div>
											<button id="btnconnexionheader" name="connexion" type="submit" class="btn btn-primary">Connexion</button>
										</form>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item text-dark" href="inscriptions.php">S'. "'" . 'inscrire</a>
                                        <a class="dropdown-item text-dark" href="resetpass.php">Mot de passe oublié ?</a>
                                    </div>';
}

function displayHeaderFormConnected() {

    echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mon compte</a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <div class="row justify-content-center px-4 py-3 mx-auto">
                                            <div class="col-12">
                                                <div class="row mb-3">
                                                    <a class="text-decoration-none text-dark" href="monCompte.php">Gérer mon compte</a>
                                                </div>
                                                <div class="row mb-3">
                                                    <a class="text-decoration-none text-dark" href="mesFavoris.php">Mes favoris</a>
                                                </div>
                                                <div class="row mb-3">
                                                    <a class="text-decoration-none text-dark" href="monTemoignage.php">Mon témoignage</a>
                                                </div>
                                                <form method="post" action="header.php">
                                                    <div class="row">
                                                        <button name="deconnexion" id="deconnexion" type="submit" class="btn btn-danger text-left">Déconnexion</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>';
}

function displayHeaderAdminDrop() {
    echo'
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administration</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <!-- LINKS ANCRES A PLACER ROMAIN -->
            <a class="dropdown-item" href="adminListeUsers.php">Les Utilisateurs</a>
            <a class="dropdown-item" href="adminListeAnimaux.php">Les Animaux</a>
            <a class="dropdown-item" href="adminListeStatistiques.php">Les Statistiques</a>
            <a class="dropdown-item" href="adminListePrevention.php">Les Préventions</a>
            <a class="dropdown-item" href="adminListeTemoignages.php">Les Témoignages</a>
            <a class="dropdown-item" href="adminAssociation.php">L\'Association</a>
        </li>
    ';
}

function renderImage($photo_animal, $style = null) {
    $rawPhoto = "data:image/png;base64," . base64_encode($photo_animal);
    return " <img class=\"photo-cover $style\" src=$rawPhoto >";
}

function renderImageParticularRedim($photo_animal)
{
    $rawPhoto = "data:image/png;base64," . base64_encode($photo_animal);
    $maxWidth = 100;
    $maxHeight = 55;
    # Passage des paramètres dans la table : imageinfo
    $imageinfo= getimagesize("$rawPhoto");
    $iw=$imageinfo[0];
    $ih=$imageinfo[1];
    # Calcul des rapport de Largeur et de Hauteur
    $widthscale = $iw/$maxWidth;
    $heightscale = $ih/$maxHeight;
    $rapport = $ih/$widthscale;
    # Calul des rapports Largeur et Hauteur à afficher
    if($rapport < $maxHeight){
        
        $nwidth = $maxWidth;
    }else{
        $nwidth = $iw/$heightscale;
    }if($rapport < $maxHeight){
        $nheight = $rapport;
    }else{
        $nheight = $maxHeight;
    }
    # Affichage
    return " <img class=\"rounded img-fluid\" src=$rawPhoto width=\"$nwidth\" height=\"$nheight\" >";
}

?>