<?php
class ServicePrevention {
    private $dao;

    public function __construct() {
        $this->dao = new DataAccessPrevention();
    }

    public function getAll() {
        $allPrevention = $this->dao->getAll();
        return $allPrevention;
    }
    

    public function getIndex() {
        $indexPrevention = $this->dao->getOneIndex();
        return $indexPrevention;
    }
    
    public function getId() {
        $listId = $this->dao->getId();
        return $listId;
        
    }

    public function getFirstPrev() {
        $listActu = $this->dao->getFirstPrev();
        return $listActu;
    }

    public function getPrevs() {
        $listActu = $this->dao->getPrevs();
        return $listActu;
    }

    public function getBySearch($offset) {
        $adminPreventionsBySearch = $this->dao->getBySearch("%$offset%");
        return $adminPreventionsBySearch;
    }

    public function majPreventions($array) {
        foreach ( $array as $post => $val )  {   
             if (!empty($val)) { 
                if($post=="majPreventions") {
                    $id = $val;
                }
             }	
         }
         $preventions = $this->dao->majPreventions($post, $val, $id);
         return $preventions;
     }
     public function delpreventions($array) {
        foreach ( $array as $post => $val )  {   
             if (!empty($val)) { 
                if($post=="delPreventions") {
                    $id = $val;
                }
             }	
         }
         $prev = $this->dao->delPreventions($id);
         return $prev;
     }

     public function addPrevention($array) {
        foreach ( $array as $post => $val )  {   
            if (!empty($val) && $val!="sendNewPreventions") {  
                $$post = $val;
            }	
            $photo_prevention = file_get_contents($_FILES['photo_prevention']['tmp_name']);
         }
         $addPrev = $this->dao->addPrevention($date_ajout_prevention, $nom_prevention, $photo_prevention, $texte_prevention);
         return $addPrev;
     }

}
?>