<?php
require_once 'Facture.php';
$db = new Database();
if (isset($_POST['action']) && $_POST['action'] == 'create'){

    extract($_POST);
    $data = $db->checkfacture($Numpage);
    if($data == null){
      $db->create(  (int)$Numpage, (int)$Annee, (int)$Mois ,(float)$Comm_Nat_Mobiles_IAM,(float)$Comm_Nat_Fixes_IAM
    ,(float)$Comm_Nat_Autres_Mobiles,(float)$Comm_Nat_Autres_Fixes,(float)$Comm_Internationales,
    (float)$App_Info_Conso,(float)$Numeros_Speciaux,(float)$SMS_Mobiles_IAM,(float)$SMS_Autres_Mobiles,
    (float)$SMS_Internationaux,(float)$MMS_Mobiles_IAM,(float)$MMS_Email
    ,(float)$MMS_Internationaux,(float)$Roaming,(float)$Abonnement_Optimis,(float)$Option_IntraFlotteSMS
    ,(float)$Internet_Mobile
    ,(float)$Option_Plafonnement,(float)$Reduction_Frais_Abon,(float)$Remise_FM_Internet,
    (float)$Annulation_Frais_IntraFlotteSMS,(float)$Annulation_Frais_Plaf
    ,(float)$Montant_Facture);
    $db->insert_supp((int) $Numpage, (int) $idOption_Facture, (int) $Annee, (int) $Mois , (float) $Montant_DF,$Signe_DF);
    $db->insert_supp((int) $Numpage, (int) $idOption_Facture2, (int) $Annee, (int) $Mois,(float) $Montant_DF2,$Signe_DF2);
    $db->insert_supp((int) $Numpage, (int) $idOption_Facture3, (int) $Annee, (int) $Mois,(float) $Montant_DF3,$Signe_DF3);
    return true;
    }else{
      return false;
    }
    
    
}
//Ajouter une ligne GSM
if (isset($_POST['action']) && $_POST['action'] == 'ADDGSM'){

  extract($_POST);
  $db->insert_LigneGSM($LigneGSM, (int) $Code_Pin, (int) $Code_Punk , (int) $idstatutligne );  
  echo 'perfect';
  header("Location: index.php?admin#");
}
//searchGSM
if(isset($_POST['searchId'])){
  $searchId = (int)$_POST['searchId'];
  echo json_encode($db-> searchGSM($searchId));
  }

   //login
if (isset($_POST['action']) && $_POST['action'] == 'login'){
  extract($_POST);
  echo json_encode($db-> getUsers());
}

  //get fonction => fonctionnaire
if (isset($_POST['action']) && $_POST['action'] == 'Fonctionnaire'){
  extract($_POST);
  echo json_encode($db-> getFonction());
}
//get fonction => fonctionnaire
if (isset($_POST['action']) && $_POST['action'] == 'Optionfac'){
  extract($_POST);
  echo json_encode($db-> getOption());
}

  //get GSM => Page
  if (isset($_POST['action']) && $_POST['action'] == 'Page'){
    extract($_POST);
    $dataG = $db-> getGSM_NonPage();
    echo json_encode($dataG);
  }

  //get GSM => Affectation
  if (isset($_POST['action']) && $_POST['action'] == 'Affectation'){
    extract($_POST);
    $dataG = $db-> getGSM_NonAffecte();
    echo json_encode($dataG);
  }
   //get GSM => Categorie
   if (isset($_POST['action']) && $_POST['action'] == 'CategorieGSM'){
    extract($_POST);
    echo json_encode($db-> getGSM());
  }
  //get convention => Categorie
  if (isset($_POST['action']) && $_POST['action'] == 'CategorieConvention'){
    extract($_POST);
    echo json_encode($db-> getConvention());
  }
  //get Typecategorie => Categorie
  if (isset($_POST['action']) && $_POST['action'] == 'CategorieTypecat'){
    extract($_POST);
    echo json_encode($db-> getTypecategorie());
  }
  //get fonctionnaire => Affectation
  if (isset($_POST['action']) && $_POST['action'] == 'Affectation2'){
    extract($_POST);
    $dataF = $db-> getFonctionnaire_NonAffecte();
    echo json_encode($dataF);
  }
   //Ajouter une affectation ligne
if (isset($_POST['action']) && $_POST['action'] == 'ADDAffectation'){

  extract($_POST);
  
  $db->insert_Affectation((int) $idLigneGSM_aff, (int) $idFonctionnaire_aff, (int) $Date_Debut, (int) $Date_Fin);
  
  echo 'perfect';
}
//Ajouter une Categorie
if (isset($_POST['action']) && $_POST['action'] == 'ADDCategorie'){

  extract($_POST);
  
  $db->insert_Categorie( $NumCategorie, (int) $Annee_cat, (int) $idLigneGSM_cat, (int) $idConvention, (int) $idTypecategorie, $Status, (float) $D_Abonnement_Optimis, (float) $D_Option_Plafonnement,
  (float) $D_Internet_Mobile, (float) $D_Option_IntraFlotteSMS, (float) $Montant_Dotation, (float) $R_Reduction_Frais_Abon, (float) $R_Annulation_Frais_Plaf, (float) $R_Remise_FM_Internet, (float) $R_Annulation_Frais_IntraFlotteSMS, (float) $Montant_Forfait);
  
  echo 'perfect';
}
  //Ajouter un fonctionnaire
if (isset($_POST['action']) && $_POST['action'] == 'ADDFonctionnaire'){

  extract($_POST);
  
  $db->insert_Fonctionnaire($Nom,$Prenom, (int) $idFonction);
  
  echo 'perfect';
}
//Ajouter une Page
if (isset($_POST['action']) && $_POST['action'] == 'ADDPage'){

  extract($_POST);
  
  $db->insert_Page((int) $Num_Page, (int) $Annee_Page, (int) $Ligne_GSM);
  
  echo 'perfect';

}
//Ajouter une Option facture
if (isset($_POST['action']) && $_POST['action'] == 'ADDOptionfac'){

  extract($_POST);
  
  $db->insert_Optionfacture( $Libelle_Option);
  
  echo 'perfect';
}


//Anomalies

if( isset($_POST['searchMois'])  ){
  $searchMois = (int)$_POST['searchMois'];
  $searchAnnee = (int)$_POST['searchAnnee'];
   $factures= $db-> Anomalie($searchAnnee,$searchMois);
   $msg="";
   $c=0;

   for($x = 0; $x < count($factures); $x++)
   {
       if(isset($factures[$x]))
       {
           $Page = $factures[$x]->Numpage;
           //remises
           $Reduction_FA = $factures[$x]->Reduction_Frais_Abon;
           $Annulation_Frais_Plaf = $factures[$x]->Annulation_Frais_Plaf;
           $Remise_FM_Internet = $factures[$x]->Remise_FM_Internet;
           $Annulation_Frais_IntraFlotteSMS = $factures[$x]->Annulation_Frais_IntraFlotteSMS;
           //++
           $R_Reduction_FA = $factures[$x]->R_Reduction_Frais_Abon;
           $R_Annulation_Frais_Plaf = $factures[$x]->R_Annulation_Frais_Plaf;
           $R_Remise_FM_Internet = $factures[$x]->R_Remise_FM_Internet;
           $R_Annulation_Frais_IntraFlotteSMS = $factures[$x]->R_Annulation_Frais_IntraFlotteSMS;
            //dotation
           $Abonnement_Optimis = $factures[$x]->Abonnement_Optimis;
           $Option_Plafonnement = $factures[$x]->Option_Plafonnement;
           $Internet_Mobile = $factures[$x]->Internet_Mobile;
           $Option_IntraFlotteSMS = $factures[$x]->Option_IntraFlotteSMS;
            //++
           $D_Abonnement_Optimis = $factures[$x]->D_Abonnement_Optimis;
           $D_Option_Plafonnement = $factures[$x]->D_Option_Plafonnement;
           $D_Internet_Mobile = $factures[$x]->D_Internet_Mobile;
           $D_Option_IntraFlotteSMS = $factures[$x]->D_Option_IntraFlotteSMS;

            $cat = $factures[$x]->NumCategorie;


            if($Abonnement_Optimis != $D_Abonnement_Optimis){
           
              $msg .= "<h2 style =\"color : #424242\">Anomalie sur la facture <b>$Page</b>: </h2>
              <p><span style =\"color : red\"><u>Problème</u></span> : L'abonnement optimis <b>$Abonnement_Optimis</b> n'égale pas à : <b>$D_Abonnement_Optimis</b> selon <b>$cat</b>.</p> 
              <hr>";
              $c++;
  
             }
             if($Option_Plafonnement != $D_Option_Plafonnement){
           
              $msg .= "<h2 style =\"color : #424242\">Anomalie sur la facture <b>$Page</b>:</h2> 
              <p><span style =\"color : red\"><u>Problème</u></span> : l'Option Plafonnement <b>$Option_Plafonnement</b> n'égale pas à : <b>$D_Option_Plafonnement</b> selon <b>$cat</b>.</p> 
              <hr>";
              $c++;
  
             }
             if($Internet_Mobile != $D_Internet_Mobile){
           
              $msg .= "<h2 style =\"color : #424242\">Anomalie sur la facture <b>$Page</b>:</h2> 
              <p><span style =\"color : red\"><u>Problème</u></span> : L'internet Mobile <b>$Internet_Mobile</b> n'égale pas à : <b>$D_Internet_Mobile</b> selon <b>$cat</b>. </p>
              <hr>";
              $c++;
  
             }
             if($Option_IntraFlotteSMS != $D_Option_IntraFlotteSMS){
           
              $msg .= "<h2 style =\"color : #424242\">Anomalie sur la facture <b>$Page</b>:</h2> 
              <p><span style =\"color : red\"><u>Problème</u></span> : L'option Intra Flotte SMS <b>$Option_IntraFlotteSMS</b> n'égale pas à : <b>$D_Option_IntraFlotteSMS</b> selon <b>$cat</b>.</p> 
              <hr>";
              $c++;
  
             }

           if($Reduction_FA != $R_Reduction_FA){
            $msg .= "<h2 style =\"color : #424242\">Anomalie sur la facture <b>$Page</b>: </h2>
            <p><span style =\"color : red\"><u>Problème</u></span> : la reduction de frais d'abonnement <b>$Reduction_FA</b> n'égale pas à : <b>$R_Reduction_FA</b> selon <b>$cat</b>.</p> 
            <hr>";
            $c++;
           }
           if($Annulation_Frais_Plaf != $R_Annulation_Frais_Plaf){
            $msg .= "<h2 style =\"color : #424242\">Anomalie sur la facture <b>$Page</b>: </h2>
            <p><span style =\"color : red\"><u>Problème</u></span> : l'annulation de Frais Plafonnement <b>$Annulation_Frais_Plaf</b> n'égale pas à : <b>$R_Annulation_Frais_Plaf</b> selon <b>$cat</b>.</p> 
            <hr>";
            $c++;
           }
           if($Remise_FM_Internet != $R_Remise_FM_Internet){
            $msg .= "<h2 style =\"color : #424242\">Anomalie sur la facture <b>$Page</b>: </h2>
            <p><span style =\"color : red\"><u>Problème</u></span> : La Remise des frais mensuels d'internet <b>$Remise_FM_Internet</b> n'égale pas à : <b>$R_Remise_FM_Internet</b> selon <b>$cat</b>. </p>
            <hr>";
            $c++;
           }
           if($Annulation_Frais_IntraFlotteSMS != $R_Annulation_Frais_IntraFlotteSMS){
            $msg .= "<h2 style =\"color : #424242\">Anomalie sur la facture <b>$Page</b>: </h2>
            <p><span style =\"color : red\"><u>Problème</u></span> : L'Annulation des Frais Intra Flotte SMS <b>$Annulation_Frais_IntraFlotteSMS</b> n'égale pas à : <b>$R_Annulation_Frais_IntraFlotteSMS</b> selon <b>$cat</b>.</p> 
            <hr>";
            $c++;
           }
          
       } else {
        echo "data not found  
        <hr>";
       }
   }
   if($c == 0){
    echo $msg="Aucune Anomalie";
    
   }else {
    echo $msg;
    

   }
 
}  
//Controle de Dotation

if( isset($_POST['searchMoisdot'])  ){
  $searchMois = (int)$_POST['searchMoisdot'];
  $searchAnnee = (int)$_POST['searchAnneedot'];
   $factures= $db-> Dotation($searchAnnee,$searchMois);
   $msg="";
   $c=0;

   for($x = 0; $x < count($factures); $x++)
   {
       if(isset($factures[$x]))
       {
           $Page = $factures[$x]->Numpage;
           //remises
           $Reduction_FA = $factures[$x]->Reduction_Frais_Abon;
           $Annulation_Frais_Plaf = $factures[$x]->Annulation_Frais_Plaf;
           $Remise_FM_Internet = $factures[$x]->Remise_FM_Internet;
           $Annulation_Frais_IntraFlotteSMS = $factures[$x]->Annulation_Frais_IntraFlotteSMS;
           //++
           $R_Reduction_FA = $factures[$x]->R_Reduction_Frais_Abon;
           $R_Annulation_Frais_Plaf = $factures[$x]->R_Annulation_Frais_Plaf;
           $R_Remise_FM_Internet = $factures[$x]->R_Remise_FM_Internet;
           $R_Annulation_Frais_IntraFlotteSMS = $factures[$x]->R_Annulation_Frais_IntraFlotteSMS;
            //dotation
           $Abonnement_Optimis = $factures[$x]->Abonnement_Optimis;
           $Option_Plafonnement = $factures[$x]->Option_Plafonnement;
           $Internet_Mobile = $factures[$x]->Internet_Mobile;
           $Option_IntraFlotteSMS = $factures[$x]->Option_IntraFlotteSMS;
            //++
           $D_Abonnement_Optimis = $factures[$x]->D_Abonnement_Optimis;
           $D_Option_Plafonnement = $factures[$x]->D_Option_Plafonnement;
           $D_Internet_Mobile = $factures[$x]->D_Internet_Mobile;
           $D_Option_IntraFlotteSMS = $factures[$x]->D_Option_IntraFlotteSMS;

            $cat = $factures[$x]->NumCategorie;
            $Montant_Dotation = $factures[$x]->Montant_Dotation;
            $Montant_Facture = $factures[$x]->Montant_Facture;


            if($Montant_Dotation < $Montant_Facture){
           
              $msg .= "<h4 style =\"color : #424242\">Anomalie sur la facture <b>$Page</b>: </h4>
              <p><span style =\"color : red\"><u>Problème</u></span> : Le montant de la dotation <b>$Montant_Dotation</b> est inferieur au montant de la facture: <b>$Montant_Facture</b> selon <b>$cat</b>.</p> 
              <hr>";
              $c++;
  
             }
            
          
       } else {
        echo "data not found  
        <hr>";
       }
   }
   if($c == 0){
    echo $msg="Aucune Anomalie";
    
   }else {
    echo $msg;
    

   }
 
}  

//Globale facture

if( isset($_POST['GFMois'])  ){
  $Mois = (int)$_POST['GFMois'];
  $Annee = (int)$_POST['GFAnnee'];
  $Fraisdab = (float)$_POST['GFFraisdab']; 
  $Volume_consommation = (float)$_POST['Volume_consommation']; 
  $Total_HT = (float)$_POST['Total_HT']; 
  $TVA = (float)$_POST['TVA']; 
  $Total_TTC = (float)$_POST['Total_TTC']; 
  $achat_play = (float)$_POST['achat_play']; 
  $Montant_paye = (float)$_POST['Montant_paye']; 
  $Fais_ponctuels = (float)$_POST['Fais_ponctuels']; 
  $Easyfact = (float)$_POST['Easyfact']; 
  $Complement_reduction = (float)$_POST['Complement_reduction']; 
  $Annulation_frais_Easyfact = (float)$_POST['Annulation_frais_Easyfact']; 
  $Reduction_frais_dab = (float)$_POST['Reduction_frais_dab']; 
  $Remise_frais_dab = (float)$_POST['Remise_frais_dab'];
  $Portail = (float)$_POST['Portail'];
  $Pass_Controle = (float)$_POST['Pass_Controle'];
  $Live_TV = (float)$_POST['Live_TV'];
  $A_GHANY = (float)$_POST['A_GHANY']; 
  $Digster = (float)$_POST['Digster'];
  $STARZ_Play = (float)$_POST['STARZ_Play']; 
  $Achat_playstore = (float)$_POST['Achat_playstore']; 
  $MT_foot = (float)$_POST['MT_foot']; 
  $MT_Lecture_kids = (float)$_POST['MT_Lecture_kids'];
  $Comm_Nat_Mobiles_IAM2 = (float)$_POST['Comm_Nat_Mobiles_IAM2']; 
  $Comm_Nat_Fixes_IAM2 = (float)$_POST['Comm_Nat_Fixes_IAM2']; 
  $Comm_Nat_Autres_Mobiles2 = (float)$_POST['Comm_Nat_Autres_Mobiles2'];
  $Comm_Nat_Autres_Fixes2 = (float)$_POST['Comm_Nat_Autres_Fixes2']; 
  $Comm_Internationales2 = (float)$_POST['Comm_Internationales2']; 
  $SMS_Mobiles_IAM2 = (float)$_POST['SMS_Mobiles_IAM2']; 
  $SMS_Autres_Mobiles2 = (float)$_POST['SMS_Autres_Mobiles2']; 
  $SMS_Internationaux2 = (float)$_POST['SMS_Internationaux2']; 
  $MMS_Mobiles_IAM2 = (float)$_POST['MMS_Mobiles_IAM2']; 
  $MMS_Email2 = (float)$_POST['MMS_Email2']; 
  $MMS_Internationaux2 = (float)$_POST['MMS_Internationaux2']; 
  $Numeros_Speciaux2 = (float)$_POST['Numeros_Speciaux2'];
  $App_Info_Conso2 = (float)$_POST['App_Info_Conso2']; 
  $Roaming2 = (float)$_POST['Roaming2'];
   $factures= $db-> TotalFacture($Annee,$Mois);
   $msg="";
   $c=0;

   for($x = 0; $x < count($factures); $x++)
   {
       if(isset($factures[$x]))
       {
          $NumPage = $factures[$x]->Numpage;
          //communication 
          $Comm_Nat_Mobiles_IAM = $factures[$x]->Comm_Nat_Mobiles_IAM;
          $Comm_Nat_Fixes_IAM = $factures[$x]->Comm_Nat_Fixes_IAM;
          $Comm_Nat_Autres_Mobiles = $factures[$x]->Comm_Nat_Autres_Mobiles;
          $Comm_Nat_Autres_Fixes = $factures[$x]->Comm_Nat_Autres_Fixes;
          $Comm_Internationales = $factures[$x]->Comm_Internationales;
          $App_Info_Conso = $factures[$x]->App_Info_Conso;
          $Numeros_Speciaux = $factures[$x]->Numeros_Speciaux;
          $SMS_Mobiles_IAM = $factures[$x]->SMS_Mobiles_IAM;
          $SMS_Autres_Mobiles = $factures[$x]->SMS_Autres_Mobiles;
          $SMS_Internationaux = $factures[$x]->SMS_Internationaux;
          $MMS_Mobiles_IAM = $factures[$x]->MMS_Mobiles_IAM;
          $MMS_Email = $factures[$x]->MMS_Email;
          $MMS_Internationaux = $factures[$x]->MMS_Internationaux;
          $Roaming = $factures[$x]->Roaming;
          //++ 
          $volumeconsommation = $Comm_Nat_Mobiles_IAM +$Comm_Nat_Fixes_IAM +$Comm_Nat_Autres_Mobiles +$Comm_Nat_Autres_Fixes +$Comm_Internationales
          +$App_Info_Conso +$Numeros_Speciaux +$SMS_Mobiles_IAM+ $SMS_Autres_Mobiles +$SMS_Internationaux +$MMS_Mobiles_IAM+$MMS_Email +$MMS_Internationaux +$Roaming ;
          
           //remises
           $Reduction_Frais_Abon = $factures[$x]->Reduction_Frais_Abon;
           $Annulation_Frais_Plaf = $factures[$x]->Annulation_Frais_Plaf;
           $Remise_FM_Internet = $factures[$x]->Remise_FM_Internet;
           $Annulation_Frais_IntraFlotteSMS = $factures[$x]->Annulation_Frais_IntraFlotteSMS;
           //++ 
           $fraisponctuels = $Annulation_Frais_Plaf + $Remise_FM_Internet + $Annulation_Frais_IntraFlotteSMS;
           $Easyfact = 50.00;
           $AnnulationEasyfact = -50.00;
           //dotation
           $Abonnement_Optimis = $factures[$x]->Abonnement_Optimis;
           $Option_Plafonnement = $factures[$x]->Option_Plafonnement;
           $Internet_Mobile = $factures[$x]->Internet_Mobile;
           $Option_IntraFlotteSMS = $factures[$x]->Option_IntraFlotteSMS;
           //++ 
           $fraisabonetservice = $Abonnement_Optimis + $Option_Plafonnement + $Internet_Mobile + $Option_IntraFlotteSMS;

           
            $Montant_Facture = $factures[$x]->Montant_Facture+$Total_HT+$TVA+$Total_TTC+$achat_play;


            if( $Montant_Facture != 0){
           
              $msg .= "<table style=\" border: 1px solid black;width:100%;
              border-collapse: collapse;
              text-align: center;\">
              <tr>
                <th></th>
                <th>$Mois/$Annee Facturé IAM</th>
                <th>$Mois/$Annee Certifié</th>
              </tr>
              <tr>
              <td><b>Frais d'abonnement et de services</b></td>
              <td>$Fraisdab</td>
              <td>$fraisabonetservice</td>
            </tr>
              <tr>
                <td><b> Vers mobiles IAM</b></td>
                <td>$Comm_Nat_Mobiles_IAM2 </td>
                <td>$Comm_Nat_Mobiles_IAM</td>
              </tr>
              <tr>
                <td><b> Vers Fixe</b></td>
                <td>$Comm_Nat_Fixes_IAM2</td>
                <td>$Comm_Nat_Fixes_IAM</td>
              </tr>
              <tr>
                <td><b>Vers autres mobiles</b> 
                </td>
                <td>$Comm_Nat_Autres_Mobiles2</td>
                <td>$Comm_Nat_Autres_Mobiles</td>
              </tr>
              <tr>
                <td><b>Vers autres Fixes</b> 
                </td>
                <td>$Comm_Nat_Autres_Fixes2</td>
                <td>$Comm_Nat_Autres_Fixes</td>
              </tr>
              <tr>
                <td><b>Appels info-conso</b> 
                </td>
                <td>$App_Info_Conso2</td>
                <td>$App_Info_Conso</td>
              </tr>
              <tr>
                <td><b>Communications internationales</b> 
                </td>
                <td>$Comm_Internationales2</td>
                <td>$Comm_Internationales</td>
              </tr>
              <tr>
                <td><b>SMS vers Mobiles IAM</b> 
                </td>
                <td>$SMS_Mobiles_IAM2</td>
                <td>$SMS_Mobiles_IAM</td>
              </tr>
              <tr>
                <td><b>SMS vers autres mobiles</b> 
                </td>
                <td>$SMS_Autres_Mobiles2</td>
                <td>$SMS_Autres_Mobiles</td>
              </tr>
              <tr>
                <td><b>SMS Vers International</b> 
                </td>
                <td>$SMS_Internationaux2</td>
                <td>$SMS_Internationaux</td>
              </tr>
              <tr>
                <td><b>MMS vers mobiles IAM</b> 
                </td>
                <td>$MMS_Mobiles_IAM2</td>
                <td>$MMS_Mobiles_IAM</td>
              </tr>
              <tr>
                <td><b> MMS vers Email</b>
                </td>
                <td>$MMS_Email2</td>
                <td>$MMS_Email</td>
              </tr>
              <tr>
                <td><b>MMS vers internationnal</b> 
                </td>
                <td>$MMS_Internationaux2</td>
                <td>$MMS_Internationaux</td>
              </tr>
              <tr>
                <td><b>Numéros Spéciaux</b> 
                </td>
                <td>$Numeros_Speciaux2</td>
                <td>$Numeros_Speciaux</td>
              </tr>
              <tr>
                <td><b>Roaming International</b> 
                </td>
                <td>$Roaming2</td>
                <td>$Roaming</td>
              </tr>
              <tr>
                <td><b>Portail multimédia/mobile Zone</b> 
                </td>
                <td>$Portail</td>
                <td>$Portail</td>
              </tr>
              <tr>
                <td><b>Pass Contrôle Parental</b> 
                </td>
                <td>$Pass_Controle</td>
                <td>$Pass_Controle</td>
              </tr>
              <tr>
                <td><b> Live TV</b>
                </td>
                <td>$Live_TV</td>
                <td>$Live_TV</td>
              </tr>
              <tr>
                <td><b> A-GHANY</b>
                </td>
                <td>$A_GHANY</td>
                <td>$A_GHANY</td>
              </tr>
              <tr>
                <td><b>Digster</b> 
                </td>
                <td>$Digster</td>
                <td>$Digster</td>
              </tr>
              <tr>
                <td><b> STARZ Play</b>
                </td>
                <td>$STARZ_Play</td>
                <td>$STARZ_Play</td>
              </tr>
              <tr>
                <td><b> Achat play store</b>
                </td>
                <td>$Achat_playstore</td>
                <td>$Achat_playstore</td>
              </tr>
              <tr>
                <td><b>MT foot</b> 
                </td>
                <td>$MT_foot</td>
                <td>$MT_foot</td>
              </tr>
              <tr>
                <td><b>MT Lecture Kids</b> 
                </td>
                <td>$MT_Lecture_kids</td>
                <td>$MT_Lecture_kids</td>
              </tr>
              <tr>
                <td><b>Volume consommation</b> 
                </td>
                <td>$Volume_consommation</td>
                <td>$volumeconsommation</td>
              </tr>
              <tr>
                <td><b> Frais ponctuels liés au contrat</b>
                </td>
                <td>$Fais_ponctuels</td>
                <td>$fraisponctuels</td>
              </tr>
              <tr>
                <td><b>Easyfact</b> 
                </td>
                <td>$Easyfact</td>
                <td>$Easyfact</td>
              </tr>
              <tr>
                <td><b>Complément réduction </b> 
                </td>
                <td>$Complement_reduction</td>
                <td>00</td>
              </tr>
              <tr>
                <td><b>Annulation frais Easy fact</b> 
                </td>
                <td>$Annulation_frais_Easyfact</td>
                <td>$Annulation_frais_Easyfact</td>
              </tr>
              <tr>
                <td><b>Réduction frais d'abonnement</b> 
                </td>
                <td>$Reduction_frais_dab</td>
                <td>$Reduction_Frais_Abon</td>
              </tr>
              <tr>
                <td><b>Remise frais d'abonnement</b> 
                </td>
                <td>$Remise_frais_dab</td>
                <td>00</td>
              </tr>
              <tr>
                <td><b>Total HT</b> 
                </td>
                <td>$Total_HT</td>
                <td>$Total_HT</td>
              </tr>
              <tr>
                <td><b>TVA</b> 
                </td>
                <td>$TVA</td>
                <td>$TVA</td>
              </tr>
              <tr>
                <td><b>Total TTC</b> 
                </td>
                <td>$Total_TTC</td>
                <td>$Total_TTC</td>
              </tr>
              <tr>
                <td><b>achat play store (TTC)</b> 
                </td>
                <td>$achat_play</td>
                <td>$achat_play</td>
              </tr>
              <tr>
                <td><b>Montant à payé: </b> 
                </td>
                <td>$Montant_paye</td>
                <td>$Montant_Facture</td>
              </tr>
            
            
            </table>";
              $c++;
  
             }
            
          
       } else {
        echo "data not found  
        <hr>";
       }
   }
   if($c == 0){
    echo $msg="Aucune Facture";
    
   }else {
    echo $msg;
   }
 
}  

 

//creation des factures

if (isset($_POST['action']) && $_POST['action'] == 'fetch'){
    $bills = $db->read();
    $output ='';
   if ($db->countBills() > 0){
    $output .= '
        
    <table class="table table-striped ">
    <thead style="text-align: center;">
      <tr>
        <th scope="col">Page</th>
        <th scope="col">Année</th>
        <th scope="col">Mois</th>
        <th scope="col">LigneGSM</th>
        <th scope="col">Abonnement Optimis</th>
        <th scope="col">Option Plafonnement</th>
        <th scope="col">Internet Mobile</th>
        <th scope="col">Option IF SMS</th>
        <th scope="col">Réduction FA</th>
        <th scope="col">Annulation FP</th>
        <th scope="col">Remise Internet</th>
        <th scope="col">Total</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    
    ';
    foreach ($bills as $bill ){
      $Months = array('','Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
      $monthName = $Months[$bill->Mois];
    $output .="
    
    <tr>
      <th scope=\"row\">$bill->Numpage</th>
      <td>$bill->Annee</td>
      <td>$monthName</td>
      <td>$bill->LigneGSM</td>
      <td>$bill->Abonnement_Optimis</td>
      <td>$bill->Option_Plafonnement</td>
      <td>$bill->Internet_Mobile</td>
      <td>$bill->Option_IntraFlotteSMS</td>
      <td>$bill->Reduction_Frais_Abon</td>
      <td>$bill->Annulation_Frais_Plaf</td>
      <td>$bill->Remise_FM_Internet</td>
      <td>$bill->Montant_Facture</td>
      
      <td>
          <a href=\"#\" class=\"text-primary me-2 editBtn\" title=\"Modifier\"  data-id=\"$bill->Numpage\"><i class=\"fas fa-edit\" data-bs-toggle='modal' data-bs-target='#updateModal'></i></a>
          <a href=\"#\" class=\"text-danger me-2 deleteBtn\" title=\"Supprimer\"  data-mois=\"$monthName\" data-date=\"$bill->Annee\" data-id=\"$bill->Numpage\"><i class=\"fas fa-trash-alt\"></i></a>
        </td>
    </tr>
    ";
    }
    $output .= "</tbody></table>";
    echo $output;

   } else{
     echo"<h2>Aucune facture pour le moment</h2>";
   }
}

//info pour detail de facture
if(isset($_POST['workingId'])){
$workingId = (int)$_POST['workingId'];
$var = $db-> getSingleBill($workingId);
echo json_encode($var);
}
//info pour detail de facture
if(isset($_POST['workingId2'])){
  $workingId2 = (int)$_POST['workingId2'];
   $var = $db->getSingleBillDetailsfacture($workingId2);
  echo json_encode($var);
  }

  //update des factures
if (isset($_POST['action']) && $_POST['action'] == 'update'){
  extract($_POST); 
  $db->update( (int)$NumpageUpdate, (int)$AnneeUpdate, (int)$MoisUpdate ,(float)$Comm_Nat_Mobiles_IAM_Update,(float)$Comm_Nat_Fixes_IAM_Update
    ,(float)$Comm_Nat_Autres_Mobiles_Update,(float)$Comm_Nat_Autres_Fixes_Update,(float)$Comm_Internationales_Update,
    (float)$App_Info_Conso_Update,(float)$Numeros_Speciaux_Update,(float)$SMS_Mobiles_IAM_Update,(float)$SMS_Autres_Mobiles_Update,
    (float)$SMS_Internationaux_Update,(float)$MMS_Mobiles_IAM_Update,(float)$MMS_Email_Update
    ,(float)$MMS_Internationaux_Update,(float)$Roaming_Update,(float)$Abonnement_Optimis_Update,(float)$Option_IntraFlotteSMS_Update
    ,(float)$Internet_Mobile_Update
    ,(float)$Option_Plafonnement_Update,(float)$Reduction_Frais_Abon_Update,(float)$Remise_FM_Internet_Update,
    (float)$Annulation_Frais_IntraFlotteSMS_Update,(float)$Annulation_Frais_Plaf_Update
    ,(float)$Montant_Facture_Update);

    $db-> updatesupp( (int) $NumpageUpdate,(int) $Option_Facture_Update, (int) $AnneeUpdate, (int) $MoisUpdate, 
    (float) $Montant_DF_Update, $Signe_DF_Update);
    $db->insert_supp( (int) $NumpageUpdate,(int) $Option_Facture_Update, (int) $AnneeUpdate, (int) $MoisUpdate, 
    (float) $Montant_DF_Update, $Signe_DF_Update);
  echo 'perfect';
}

//info pour detail de facture
if(isset($_POST['informationId'])){
  $informationId = (int)$_POST['informationId'];
  echo json_encode($db-> getSingleBill($informationId));
  
  }

  //suppression
if(isset($_POST['deletionId'])){
  $deletionId = (int)$_POST['deletionId'];
  $db-> deletesupp($deletionId);
  echo $db-> delete($deletionId);

  }

  
  //exportation
  if (isset($_GET['action']) && $_GET['action'] == 'export'){
    

   $excelFileAnnee = "Factures".date('YmdHis').'.xls';
   header("Content-Type: application/vnd.ms-excel");
   header("Content-Disposition: attachment; fileAnnee=$excelFileAnnee");

   $columnAnnee = [ 'Page' , 'Année' ,'Mois','Optimis','Option Plafonnement','Internet Mobile Max','Option Intra Flotte','Communication Nat vers Mobile IAM','Communication Nat vers Fix IAM','Communication Nat vers autre Mobile','Communication Nat vers autre FIX','SMS vers Mobile IAM','SMS vers autre Mobile','Numeros Speciaux','Roaming','Annulation frais plafonnement','Annulation frais 3G','Annulation frais SMS','Reduction FA','Total' ];

    $data = implode("\t", array_values($columnAnnee)) . "\n";
    if ($db->countBills() > 0){
      $bills = $db->read();
      foreach($bills as $bill){
        $excelData  = [$bill->Numpage , $bill->Annee,$bill->Mois, $bill->Abonnement_Optimis, $bill->Option_Plafonnement, $bill->Internet_Mobile, $bill->Option_IntraFlotteSMS, $bill->Comm_Nat_Mobiles_IAM, $bill->Comm_Nat_Fixes_IAM, $bill->Comm_Nat_Autres_Mobiles, $bill->Comm_Nat_Autres_Fixes, $bill->SMS_Mobiles_IAM, $bill->SMS_Autres_Mobiles, $bill->Numeros_Speciaux, $bill->Roaming, $bill->Annulation_Frais_Plaf, $bill->Reduction_Frais_Abon, $bill->Annulation_Frais_IntraFlotteSMS, $bill->Reduction_Frais_Abon, $bill->Montant_Facture];
        $data .= implode( "\t" , $excelData). "\n";
      }
    }
      else{
        $data = " Aucune facture trouvée..." . "\n";
      }
      echo $data;
      die();
    }


  

    
?>