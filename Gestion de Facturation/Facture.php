<?php
 
class Database{
  
   private $host = "sqlsrv:Server=SIEGE-HOURA\SQLEXPRESS;Database=dde";
   private $user = "";
   private $pswd = "";
 
   
   public function getconnexion(){
    try{
        return new PDO($this->host, $this->user, $this->pswd);
    } catch(PDOException $e){
        die('Erreur:'. $e->getMessage() );
    }
   }
   
   public function insert_supp(int $Numpage, int $idOption_Facture, int $Annee, int $Mois , float $Montant_DF, String $Signe_DF){
       $q = $this ->getconnexion()->prepare(" INSERT into details_facture (Numpage, idOption_Facture, Annee, Mois, Montant_DF, Signe_DF)
       VALUES (:Numpage, :idOption_Facture, :Annee, :Mois, :Montant_DF, :Signe_DF)");
       return $q->execute([
        'Numpage' => $Numpage,
        'idOption_Facture' => $idOption_Facture,
        'Annee' => $Annee,
        'Mois' => $Mois,  
        'Montant_DF' => $Montant_DF,
        'Signe_DF' => $Signe_DF,
        
    ]);

  }

  public function insert_LigneGSM( String $LigneGSM, int $Code_Pin, int $Code_Punk ,int $idstatutligne){
    $q = $this ->getconnexion()->prepare(" insert into lignegsm ( LigneGSM, Code_Pin, Code_Punk, idstatutligne)
    VALUES ( :LigneGSM, :Code_Pin, :Code_Punk , :idstatutligne)");
    return $q->execute([
     
     'LigneGSM' => $LigneGSM,
     'Code_Pin' => $Code_Pin,
     'Code_Punk' => $Code_Punk, 
     'idstatutligne' => $idstatutligne, 
     
     
 ]);

}
public function insert_Fonctionnaire( String $Nom, String $Prenom, int $idFonction){
  $q = $this ->getconnexion()->prepare(" insert into fonctionnaire (Nom, Prenom, idFonction)
  VALUES ( :Nom, :Prenom, :idFonction)");
  return $q->execute([
   'Nom' => $Nom,
   'Prenom' => $Prenom,
   'idFonction' => $idFonction,  
   
   
]);

}
public function insert_Page( int $Num_Page, int $Annee_Page, int $Ligne_GSM){
  $q = $this ->getconnexion()->prepare(" insert into Page (Numpage, Annee, idLigneGSM)
  VALUES ( :Numpage, :Annee, :idLigneGSM)");
  return $q->execute([
   'Numpage' => $Num_Page,
   'Annee' => $Annee_Page,
   'idLigneGSM' => $Ligne_GSM,  
   
   
]);

}
public function insert_Optionfacture(  String $Libelle_Option){
  $q = $this ->getconnexion()->prepare(" insert into option_facture (Libelle_Option_Facture)
  VALUES ( :Libelle_Option_Facture)");
  return $q->execute([
   'Libelle_Option_Facture' => $Libelle_Option,
]);

}

public function insert_Affectation(int $idLigneGSM_aff, int $idFonctionnaire_aff, int $Date_Debut, int $Date_Fin){
  $q = $this ->getconnexion()->prepare(" insert into affectation_ligne (idLigneGSM, idFonctionnaire, Date_Debut, Date_Fin)
  VALUES (:idLigneGSM, :idFonctionnaire, :Date_Debut, :Date_Fin)");
  return $q->execute([
   'idLigneGSM' => $idLigneGSM_aff,
   'idFonctionnaire' => $idFonctionnaire_aff,
   'Date_Debut' => $Date_Debut,
   'Date_Fin' => $Date_Fin,  
   
   
]);
}

public function insert_Categorie(String $NumCategorie, int $Annee_cat, int $idLigneGSM_cat, int $idConvention, int $idTypecategorie,String $Status, float $D_Abonnement_Optimis, float $D_Option_Plafonnement,
float $D_Internet_Mobile, float $D_Option_IntraFlotteSMS, float $Montant_Dotation, float $R_Reduction_Frais_Abon, float $R_Annulation_Frais_Plaf, float $R_Remise_FM_Internet, float $R_Annulation_Frais_IntraFlotteSMS, float $Montant_Forfait){
  $q = $this ->getconnexion()->prepare(" insert into categorie (NumCategorie, Annee, idLigneGSM, idConvention,idTypecategorie , Status, D_Abonnement_Optimis, D_Option_Plafonnement,
  D_Internet_Mobile,D_Option_IntraFlotteSMS, Montant_Dotation, R_Reduction_Frais_Abon, R_Annulation_Frais_Plaf, R_Remise_FM_Internet,
   R_Annulation_Frais_IntraFlotteSMS, Montant_Forfait)
  VALUES (:NumCategorie, :Annee, :idLigneGSM, :idConvention, :idTypecategorie , :Status, :D_Abonnement_Optimis, :D_Option_Plafonnement,
  :D_Internet_Mobile,:D_Option_IntraFlotteSMS, :Montant_Dotation, :R_Reduction_Frais_Abon, :R_Annulation_Frais_Plaf, :R_Remise_FM_Internet,
   :R_Annulation_Frais_IntraFlotteSMS, :Montant_Forfait)");
  return $q->execute([
   'NumCategorie' => $NumCategorie,
   'Annee' => $Annee_cat,
   'idLigneGSM' => $idLigneGSM_cat,
   'idConvention' => $idConvention, 
   'idTypecategorie' => $idTypecategorie,
   'Status' => $Status,
   'D_Abonnement_Optimis' => $D_Abonnement_Optimis,
   'D_Option_Plafonnement' => $D_Option_Plafonnement,
   'D_Internet_Mobile' => $D_Internet_Mobile,
   'D_Option_IntraFlotteSMS' => $D_Option_IntraFlotteSMS,
   'Montant_Dotation' => $Montant_Dotation,
   'R_Reduction_Frais_Abon' => $R_Reduction_Frais_Abon,
   'R_Annulation_Frais_Plaf' => $R_Annulation_Frais_Plaf,
   'R_Remise_FM_Internet' => $R_Remise_FM_Internet,
   'R_Annulation_Frais_IntraFlotteSMS' => $R_Annulation_Frais_IntraFlotteSMS,
   'Montant_Forfait' => $Montant_Forfait,

   
   
]);

}


public function create( int $Numpage, int $Annee, int $Mois, float $Comm_Nat_Mobiles_IAM,
 float $Comm_Nat_Fixes_IAM, float $Comm_Nat_Autres_Mobiles,float $Comm_Nat_Autres_Fixes,
float $Comm_Internationales, float $App_Info_Conso,float $Numeros_Speciaux,float $SMS_Mobiles_IAM,
float $SMS_Autres_Mobiles,float $SMS_Internationaux,float $MMS_Mobiles_IAM,
float $MMS_Email,float $MMS_Internationaux,float $Roaming,float $Abonnement_Optimis,float $Option_IntraFlotteSMS
,float $Internet_Mobile,float $Option_Plafonnement,float $Reduction_Frais_Abon,float $Remise_FM_Internet,
float $Annulation_Frais_IntraFlotteSMS,float $Annulation_Frais_Plaf,float $Montant_Facture){
    $q = $this->getconnexion()->prepare("insert INTO facture (Numpage, Annee, Mois, Comm_Nat_Mobiles_IAM,
     Comm_Nat_Fixes_IAM, Comm_Nat_Autres_Mobiles, Comm_Nat_Autres_Fixes, Comm_Internationales, 
     App_Info_Conso, Numeros_Speciaux, SMS_Mobiles_IAM, SMS_Autres_Mobiles, SMS_Internationaux, MMS_Mobiles_IAM,
     MMS_Email, MMS_Internationaux,
     Roaming, Abonnement_Optimis, Option_IntraFlotteSMS, Internet_Mobile, Option_Plafonnement, Reduction_Frais_Abon,
     Remise_FM_Internet, Annulation_Frais_IntraFlotteSMS, Annulation_Frais_Plaf, Montant_Facture
    ) 
    VALUES( :Numpage, :Annee, :Mois, :Comm_Nat_Mobiles_IAM,
     :Comm_Nat_Fixes_IAM, :Comm_Nat_Autres_Mobiles, :Comm_Nat_Autres_Fixes, :Comm_Internationales, 
     :App_Info_Conso, :Numeros_Speciaux, :SMS_Mobiles_IAM, :SMS_Autres_Mobiles, :SMS_Internationaux, :MMS_Mobiles_IAM,
     :MMS_Email,:MMS_Internationaux,
     :Roaming, :Abonnement_Optimis, :Option_IntraFlotteSMS, :Internet_Mobile, :Option_Plafonnement, :Reduction_Frais_Abon,
     :Remise_FM_Internet, :Annulation_Frais_IntraFlotteSMS, :Annulation_Frais_Plaf, :Montant_Facture)");
    return $q->execute([
        'Numpage' => $Numpage,
        'Annee' => $Annee,
        'Mois' => $Mois,
        'Comm_Nat_Mobiles_IAM' => $Comm_Nat_Mobiles_IAM,
        'Comm_Nat_Fixes_IAM' => $Comm_Nat_Fixes_IAM,
        'Comm_Nat_Autres_Mobiles' => $Comm_Nat_Autres_Mobiles,
        'Comm_Nat_Autres_Fixes' => $Comm_Nat_Autres_Fixes,
        'Comm_Internationales' => $Comm_Internationales,
        'App_Info_Conso' => $App_Info_Conso,
        'Numeros_Speciaux' => $Numeros_Speciaux,
        'SMS_Mobiles_IAM' => $SMS_Mobiles_IAM,
        'SMS_Autres_Mobiles' => $SMS_Autres_Mobiles,
        'SMS_Internationaux' => $SMS_Internationaux,
        'MMS_Mobiles_IAM' => $MMS_Mobiles_IAM,
        'MMS_Email' => $MMS_Email,
        'MMS_Internationaux' => $MMS_Internationaux,
        'Roaming' => $Roaming,
        'Abonnement_Optimis' => $Abonnement_Optimis,
        'Option_IntraFlotteSMS' => $Option_IntraFlotteSMS,
        'Internet_Mobile' => $Internet_Mobile,
        'Option_Plafonnement' => $Option_Plafonnement,
        'Reduction_Frais_Abon' => $Reduction_Frais_Abon,
        'Remise_FM_Internet' => $Remise_FM_Internet,
        'Annulation_Frais_IntraFlotteSMS' => $Annulation_Frais_IntraFlotteSMS,
        'Annulation_Frais_Plaf' => $Annulation_Frais_Plaf,
        'Montant_Facture' => $Montant_Facture,
        

    ]);

}
public function checkfacture(int $id){
  $q = $this -> getconnexion()->prepare("select * from facture WHERE facture.Numpage = :id");
  $q->execute(['id' => $id]);
  return $q->fetch(PDO::FETCH_OBJ);
 }
 public function read(){
   return $this->getconnexion()->query("select * from facture,page,lignegsm where facture.Numpage = page.Numpage and page.idLigneGSM = lignegsm.idLigneGSM ORDER BY facture.Numpage")->fetchAll(PDO::FETCH_OBJ);
 }

   public function countBills(): int {

    return (int)$this->getconnexion()->query("select COUNT(Numpage) as count from facture")->fetch()[0];
   }
   public function Anomalie(int $Annee, int $Mois) {
    $q = $this->getconnexion()->prepare("select * from facture, page, lignegsm, categorie where facture.Numpage = page.Numpage and page.idLigneGSM = lignegsm.idLigneGSM and lignegsm.idLigneGSM = categorie.idLigneGSM AND facture.Mois = :Mois AND facture.Annee = :Annee");
    $q->execute(['Annee' => $Annee,'Mois' => $Mois] );
    return $q->fetchAll(PDO::FETCH_OBJ);
  }
  public function Dotation(int $Annee, int $Mois) {
    $q = $this->getconnexion()->prepare("select * from facture, page, lignegsm, categorie where facture.Numpage = page.Numpage and page.idLigneGSM = lignegsm.idLigneGSM and lignegsm.idLigneGSM = categorie.idLigneGSM AND facture.Mois = :Mois AND facture.Annee = :Annee");
    $q->execute(['Annee' => $Annee,'Mois' => $Mois] );
    return $q->fetchAll(PDO::FETCH_OBJ);
  }
  public function TotalFacture(int $Annee, int $Mois) {
    $q = $this->getconnexion()->prepare("select Count(Numpage) as Numpage,SUM([Comm_Nat_Mobiles_IAM])as[Comm_Nat_Mobiles_IAM] ,SUM([Comm_Nat_Fixes_IAM]) as [Comm_Nat_Fixes_IAM],SUM([Comm_Nat_Autres_Mobiles])as [Comm_Nat_Autres_Mobiles]
    ,SUM([Comm_Nat_Autres_Fixes]) as [Comm_Nat_Autres_Fixes],SUM([Comm_Internationales])as [Comm_Internationales],SUM([App_Info_Conso]) as [App_Info_Conso],SUM([SMS_Mobiles_IAM])as [SMS_Mobiles_IAM]
    ,SUM([SMS_Autres_Mobiles])as [SMS_Autres_Mobiles],SUM([SMS_Internationaux]) as [SMS_Internationaux],SUM([MMS_Mobiles_IAM]) as [MMS_Mobiles_IAM],SUM([MMS_Email])as [MMS_Email],SUM([MMS_Internationaux])as [MMS_Internationaux]
    ,SUM([Roaming])as [Roaming],SUM([Numeros_Speciaux]) as [Numeros_Speciaux],SUM([Abonnement_Optimis])as [Abonnement_Optimis],SUM([Option_IntraFlotteSMS])as [Option_IntraFlotteSMS],SUM([Internet_Mobile])as [Internet_Mobile],SUM([Option_Plafonnement])as [Option_Plafonnement],SUM([Reduction_Frais_Abon])as [Reduction_Frais_Abon]
    ,SUM([Remise_FM_Internet])as [Remise_FM_Internet],SUM([Annulation_Frais_IntraFlotteSMS]) as [Annulation_Frais_IntraFlotteSMS],SUM([Annulation_Frais_Plaf]) as [Annulation_Frais_Plaf],SUM([Montant_Facture]) as [Montant_Facture]
    from facture where Mois = :Mois and Annee = :Annee");
    $q->execute(['Annee' => $Annee,'Mois' => $Mois] );
    return $q->fetchAll(PDO::FETCH_OBJ);
  }
  public function getFonction(){
    return $this->getconnexion()->query("select * from fonction")->fetchAll(PDO::FETCH_OBJ);
  }
  public function getUsers(){
    return $this->getconnexion()->query("select * from users")->fetchAll(PDO::FETCH_OBJ);
  }
  public function getOption(){
    return $this->getconnexion()->query("select * from option_facture")->fetchAll(PDO::FETCH_OBJ);
  }
  public function getGSM(){
    return $this->getconnexion()->query("select * from lignegsm ")->fetchAll(PDO::FETCH_OBJ);
  }
  public function getGSM_NonAffecte(){
    return $this->getconnexion()->query("select * from lignegsm where idLigneGSM not in (select idLigneGSM from affectation_ligne) ")->fetchAll(PDO::FETCH_OBJ);
  }
  public function getGSM_NonPage(){
    return $this->getconnexion()->query("select * from lignegsm where idLigneGSM not in (select idLigneGSM from page)  ")->fetchAll(PDO::FETCH_OBJ);
  }
  public function getFonctionnaire(){
    return $this->getconnexion()->query("select * from fonctionnaire where idFonctionnaire in (select idFonctionnaire from affectation_ligne)")->fetchAll(PDO::FETCH_OBJ);
  }
  public function getFonctionnaire_NonAffecte(){
    return $this->getconnexion()->query("select * from fonctionnaire where idFonctionnaire not in (select idFonctionnaire from affectation_ligne) ")->fetchAll(PDO::FETCH_OBJ);
  }
  public function getConvention(){
    return $this->getconnexion()->query("select * from convention")->fetchAll(PDO::FETCH_OBJ);
  }
  public function getTypecategorie(){
    return $this->getconnexion()->query("select * from typecategorie")->fetchAll(PDO::FETCH_OBJ);
  }
   public function searchGSM(int $id){
    $q = $this -> getconnexion()->prepare("select * from page, categorie, lignegsm , typecategorie, convention, affectation_ligne, fonctionnaire WHERE page.idLigneGSM = lignegsm.idLigneGSM AND lignegsm.idLigneGSM = categorie.idLigneGSM and categorie.idConvention = convention.idConvention and categorie.idTypecategorie = typecategorie.idTypecategorie AND lignegsm.idLigneGSM = affectation_ligne.idLigneGSM AND affectation_ligne.idFonctionnaire = fonctionnaire.idFonctionnaire AND page.Numpage = :id AND lignegsm.idstatutligne=1
    ");
    $q->execute(['id' => $id]);
    return $q->fetch(PDO::FETCH_OBJ);
   }
   
   public function getSingleBill(int $id){
    $q = $this -> getconnexion()->prepare("select * from facture,page, categorie, lignegsm , typecategorie, convention, affectation_ligne, fonctionnaire WHERE facture.Numpage = page.Numpage AND page.idLigneGSM = lignegsm.idLigneGSM AND lignegsm.idLigneGSM = categorie.idLigneGSM and categorie.idConvention = convention.idConvention and categorie.idTypecategorie = typecategorie.idTypecategorie AND lignegsm.idLigneGSM = affectation_ligne.idLigneGSM AND affectation_ligne.idFonctionnaire = fonctionnaire.idFonctionnaire AND  facture.Numpage = :id");
    $q->execute(['id' => $id]);
    return $q->fetch(PDO::FETCH_OBJ);
   }
   public function getSingleBillDetailsfacture(int $id){
    $q = $this -> getconnexion()->prepare("select * from page,details_facture,option_facture WHERE page.Numpage = details_facture.Numpage AND details_facture.idOption_Facture = option_facture.idOption_Facture AND page.Numpage = :id");
    $q->execute(['id' => $id]);
    return $q->fetch(PDO::FETCH_OBJ);
   }

     public function update( int $NumpageUpdate, int $AnneeUpdate, int $MoisUpdate, float $Comm_Nat_Mobiles_IAM_Update,
     float $Comm_Nat_Fixes_IAM_Update, float $Comm_Nat_Autres_Mobiles_Update,float $Comm_Nat_Autres_Fixes_Update,
    float $Comm_Internationales_Update, float $App_Info_Conso_Update,float $Numeros_Speciaux_Update,float $SMS_Mobiles_IAM_Update,
    float $SMS_Autres_Mobiles_Update,float $SMS_Internationaux_Update,float $MMS_Mobiles_IAM_Update,
    float $MMS_Email_Update,float $MMS_Internationaux_Update,float $Roaming_Update,float $Abonnement_Optimis_Update,float $Option_IntraFlotteSMS_Update
    ,float $Internet_Mobile_Update,float $Option_Plafonnement_Update,float $Reduction_Frais_Abon_Update,float $Remise_FM_Internet_Update,
    float $Annulation_Frais_IntraFlotteSMS_Update,float $Annulation_Frais_Plaf_Update,float $Montant_Facture_Update){
        $q = $this->getconnexion()->prepare("UPDATE facture SET Annee = :Annee, Mois = :Mois, Comm_Nat_Mobiles_IAM =:Comm_Nat_Mobiles_IAM,
         Comm_Nat_Fixes_IAM =:Comm_Nat_Fixes_IAM, Comm_Nat_Autres_Mobiles =:Comm_Nat_Autres_Mobiles, Comm_Nat_Autres_Fixes =:Comm_Nat_Autres_Fixes, Comm_Internationales =:Comm_Internationales, 
         App_Info_Conso =:App_Info_Conso, Numeros_Speciaux =:Numeros_Speciaux, SMS_Mobiles_IAM =:SMS_Mobiles_IAM, SMS_Autres_Mobiles =:SMS_Autres_Mobiles, SMS_Internationaux =:SMS_Internationaux, MMS_Mobiles_IAM =:MMS_Mobiles_IAM,
         MMS_Email =:MMS_Email, MMS_Internationaux =:MMS_Internationaux,
         Roaming =:Roaming, Abonnement_Optimis =:Abonnement_Optimis, Option_IntraFlotteSMS =:Option_IntraFlotteSMS, Internet_Mobile =:Internet_Mobile, Option_Plafonnement =:Option_Plafonnement, Reduction_Frais_Abon =:Reduction_Frais_Abon,
         Remise_FM_Internet =:Remise_FM_Internet, Annulation_Frais_IntraFlotteSMS =:Annulation_Frais_IntraFlotteSMS, Annulation_Frais_Plaf =:Annulation_Frais_Plaf, Montant_Facture =:Montant_Facture WHERE Numpage = :Numpage
        ");
        return $q->execute([
            'Numpage' => $NumpageUpdate,
            'Annee' => $AnneeUpdate,
            'Mois' => $MoisUpdate,
            'Comm_Nat_Mobiles_IAM' => $Comm_Nat_Mobiles_IAM_Update,
            'Comm_Nat_Fixes_IAM' => $Comm_Nat_Fixes_IAM_Update,
            'Comm_Nat_Autres_Mobiles' => $Comm_Nat_Autres_Mobiles_Update,
            'Comm_Nat_Autres_Fixes' => $Comm_Nat_Autres_Fixes_Update,
            'Comm_Internationales' => $Comm_Internationales_Update,
            'App_Info_Conso' => $App_Info_Conso_Update,
            'Numeros_Speciaux' => $Numeros_Speciaux_Update,
            'SMS_Mobiles_IAM' => $SMS_Mobiles_IAM_Update,
            'SMS_Autres_Mobiles' => $SMS_Autres_Mobiles_Update,
            'SMS_Internationaux' => $SMS_Internationaux_Update,
            'MMS_Mobiles_IAM' => $MMS_Mobiles_IAM_Update,
            'MMS_Email' => $MMS_Email_Update,
            'MMS_Internationaux' => $MMS_Internationaux_Update,
            'Roaming' => $Roaming_Update,
            'Abonnement_Optimis' => $Abonnement_Optimis_Update,
            'Option_IntraFlotteSMS' => $Option_IntraFlotteSMS_Update,
            'Internet_Mobile' => $Internet_Mobile_Update,
            'Option_Plafonnement' => $Option_Plafonnement_Update,
            'Reduction_Frais_Abon' => $Reduction_Frais_Abon_Update,
            'Remise_FM_Internet' => $Remise_FM_Internet_Update,
            'Annulation_Frais_IntraFlotteSMS' => $Annulation_Frais_IntraFlotteSMS_Update,
            'Annulation_Frais_Plaf' => $Annulation_Frais_Plaf_Update,
            'Montant_Facture' => $Montant_Facture_Update,
            
    
        ]);
    
    }
    
    
    
    public function updatesupp(int $NumpageUpdate, int $Option_Facture_Update, int $AnneeUpdate, int $MoisUpdate, float $Montant_DF_Update, string $Signe_DF_Update)
{
    $q = $this->getconnexion()->prepare("UPDATE details_facture SET idOption_Facture = :idOption_Facture, Annee = :Annee, Mois = :Mois, Montant_DF = :Montant_DF, Signe_DF = :Signe_DF WHERE Numpage = :Numpage");
    $q->execute([
        'Numpage' => $NumpageUpdate,
        'idOption_Facture' => $Option_Facture_Update,
        'Annee' => $AnneeUpdate,
        'Mois' => $MoisUpdate,
        'Montant_DF' => $Montant_DF_Update,
        'Signe_DF' => $Signe_DF_Update,
    ]);

    
    $q2 = $this->getconnexion()->prepare("UPDATE page SET annee = :Annee WHERE Numpage = :Numpage");
    $q2->execute([
        'Annee' => $AnneeUpdate,
        'Numpage' => $NumpageUpdate,
    ]);

    return true;
}

public function delete(int $id): bool {
  
  $getCurrentNumpage = $this->getconnexion()->prepare("SELECT Numpage FROM facture WHERE Numpage = :id");
  $getCurrentNumpage->execute(['id' => $id]);
  $currentNumpage = $getCurrentNumpage->fetchColumn();


  $deleteQuery = $this->getconnexion()->prepare("DELETE FROM facture WHERE Numpage = :id");
  $deleteResult = $deleteQuery->execute(['id' => $id]);

  
  if ($deleteResult) {
      $deletePageQuery = $this->getconnexion()->prepare("DELETE FROM page WHERE Numpage = :currentNumpage");
      $deletePageQuery->execute(['currentNumpage' => $currentNumpage]);

      $updatePageQuery = $this->getconnexion()->prepare("UPDATE page SET Numpage = Numpage - 1 WHERE Numpage > :currentNumpage");
      $updatePageQuery->execute(['currentNumpage' => $currentNumpage]);
  }

  return $deleteResult;
}



     public function deletesupp(int $id): bool { 
      $q = $this->getconnexion()->prepare("delete from details_facture where Numpage = :id");
      return $q->execute(['id' => $id ]);
    }
}

?>