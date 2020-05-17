<?php
class ServiceStatistiques {
    private $dao;

    public function __construct() {
        $this->dao = new DataAccessStatistiques();
    }

    public function getIndex(int $limit) {
        $indexStats = $this->dao->getIndex($limit);
        return $indexStats;
    }

    public function getAll() {
        $adminStats = $this->dao->getAll();
        return $adminStats;
    }

    public function getNombre() {
        $adminStatsNombre = $this->dao->getNombre();
        foreach($adminStatsNombre as $key) {
            return $key["0"];
        }
        //return $adminStatsNombre;
    }
    public function getNombreSearch($offset) {
        $adminStatsNombreSearch = $this->dao->getNombreSearch("%$offset%");
        foreach($adminStatsNombreSearch as $key) {
            return $key["0"];
        }
        //return $adminStatsNombre;
    }

    public function getByPage($premiere, $nombreParPage) {
        $adminStatsByPage = $this->dao->getByPage($premiere, $nombreParPage);
        return $adminStatsByPage;
    }

    public function getBySearch($offset) {
        $adminStatsBySearch = $this->dao->getBySearch("%$offset%");
        return $adminStatsBySearch;
    }

    public function addStats($array) {
       foreach ( $array as $post => $val )  {   
            if (!empty($val) && $val!="sendNewStat") {  
                $$post = $val;
             
            }	
        }
        $addStats = $this->dao->addStats($derniere_edition_statistique, $nom_statistique, $chiffres_statistique, $type_gestion_statistique, $afficher_stats);
        return $addStats;
    }
    public function majStats($array) {
        foreach ( $array as $post => $val )  {   
             if (!empty($val)) { 
                if($post=="majStats") {
                    $id = $val;
                }
             }	
         }
         $Stats = $this->dao->majStats($post, $val, $id);
         return $Stats;
     }
     public function delStats($array) {
        foreach ( $array as $post => $val )  {   
             if (!empty($val)) { 
                if($post=="delStats") {
                    $id = $val;
                }
             }	
         }
         $Stats = $this->dao->delStats($id);
         return $Stats;
     }



}
?>