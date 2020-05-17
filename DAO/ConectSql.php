<?php
class ConectSql {

    public function bddCo(){
        $bdd = new mysqli('localhost', 'adopteunanimal', '1234', 'adopteunanimal');
        return $bdd;
    }

  
}


?>
