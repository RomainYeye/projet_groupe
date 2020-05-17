<?php
		
        include __DIR__."/header.php";//NAVBAR
        
        ?>
		
    <section class="row justify-content-center mt-5 paddingBotom borderBotom">
             <div class="col-12">
              <div class="row justify-content-center mb-5">
                  <div class="col-lg-8 col-md-10 col-sm-12">
                      <div class="row justify-content-center">
                        <h1>Les façons de devenir bénévole</h1>
                      </div>
                  </div>
              </div>
                <div class="row justify-content-center text-center">
                    <a class="col-5 border border-secondary tuile_benevoles text-decoration-none text-dark" href="benevoles.php?choice=1 #ancre">Aider au refuge</a>
                    <a class="col-5 border border-secondary ml-5 tuile_benevoles text-decoration-none text-dark" href="benevoles.php?choice=2 #ancre">Devenir famille d'accueil</a>
                </div>
                <div class="row justify-content-center text-center">
                    <a class="col-5 border border-secondary tuile_benevoles text-decoration-none text-dark" href="benevoles.php?choice=3 #ancre">Participer aux collectes</a>
                    <a class="col-5 border border-secondary ml-5 tuile_benevoles text-decoration-none text-dark" href="benevoles.php?choice=4 #ancre">Suivis d'adoption</a>
                    
                </div>
                <div class="row" id="ancre">
                    </div>
               </div>
    </section>
    

          
          <?php

              $titre1 = "Aider au refuge";
              $titre2 = "Devenir famille d'accueil";
              $titre3 = "Participer aux collectes";
              $titre4 = "Suivis d'adoption";

              $chapo1 = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium.";
              $chapo2 = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis p";
              $chapo3 = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridicul";
              $chapo4 = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies ne";

              $contenu1 = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Do";
              $contenu2 = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidu";
              $contenu3 = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum";
              $contenu4 = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Na";


  
                    if(!isset($_GET["choice"]) || $_GET["choice"] == 2) {
                        $titre = $titre2;
                        $chapo = $chapo2;
                        $contenu = $contenu2; 
                      } elseif ($_GET["choice"] == 1) {
                          $titre = $titre1;
                          $chapo = $chapo1;
                          $contenu = $contenu1; 
                      } elseif ($_GET["choice"] == 3) {
                        $titre = $titre3;
                        $chapo = $chapo3;
                        $contenu = $contenu3; 
                      } elseif ($_GET["choice"] == 4) {
                        $titre = $titre4;
                        $chapo = $chapo4;
                        $contenu = $contenu4; 
                      }
                      echo '<section class="row justify-content-between borderBotom">
                      
                      <div class="row justify-content-center w-100">
                        <div class="col-lg-10 text-center">
                            <h1 class="m-5">'.$titre.'</h1>
                        </div>
                      </div>
                      <div class="row w-100 justify-content-between ml-0">
                        <div class="col-lg-12 text-justify mb-3">
                            <h5 class="text-secondary ml-5">'.$chapo.'</h5>
                        </div>
                      

                            <div class="col-lg-5">
                               
                                <p class="ml-5">'.$contenu.'</p>
                            </div>
                            <div class="col-lg-6 pr-0 pl-0">
                                <img src="IMG/gizmo.png" class="photo-cover" alt="...">
                            </div>
                      </div>

                        </section>';




                  
              
          ?>
  </div>

  



  <?php
		include __DIR__."/footer.php";
	?>
	
	
		</div>
    </body>
</html>