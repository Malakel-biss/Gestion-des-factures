<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    <title>Gestion de Facturation</title>
    <style>
      a:hover {
       background-color: #5da8eb;
}
      .container{    max-width: 1300px;}
      h1 {  font-family: 'Raleway',sans-serif; font-size: 40px; font-weight: 600; line-height: 52px; margin: 0 0 0px; text-align: center; }
   
th {
  text-align: left;
  font-size: 15px;
}
.dataTables_filter, .dataTables_info{ display: none;}

    </style>
</head>
<body>
<header>
    
<nav class="navbar navbar-expand-lg  navbar-dark " style="background-color:#2381ff">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Gestion de factures GSM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse testdiv" id="navbarSupportedContent">
      
     
    </div>
      
      
  </div>
</nav>
</header>

<section class="container py-5">
    <div class="row">
        <div class="col-lg-8 col-sm mb-5 mx-auto">
            <h1 class=""> Gestion de Facturation </h1>
        </div>
    </div>
    <div class="dropdown-divider border-warning"></div>
    <div class="row">
        <div class="col-md-6">
             <h5 class="fw-bold mb-0">Liste des factures</h5>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary btn-sm me-3 ADD" data-bs-toggle="modal"  data-bs-target="#createModal"><i class="fas fa-folder-plus" ></i>Nouveau</button>
                <a href="/Gestion de Facturation/process.php?action=export" class="btn btn-success btn-sm me-3" id="export"><i class="fas fa-table"></i>Exporter</a>
                <button  class="btn btn-primary btn-sm me-3 " id="Globalfac" data-bs-toggle="modal"  data-bs-target="#GlobalfacModal"><i class="fas fa-info-circle" ></i>Facture Globale</button>
            </div>
        </div>
    </div>
    <div class="dropdown-divider border-warning"></div>
    <div class="row justify-content-md-center">
    <div class="col-md-2">
       </div>
      <div class="col-md-2">
        <label for=""> <u><b><i>Filtrer:</i></b></u></label>
      </div>
    <div class="col-md-3">
         <input type="text" class="form-control" id="search-annee" placeholder="Entrer l'année des factures">
      </div>
    
    <div class="col-md-2">
         <select class="form-control" id="search-mois">
         <option value="">Tous les mois</option>
              <option value="Janvier">Janvier</option>
              <option value="Février">Février</option>
              <option value="Mars">Mars</option>
              <option value="Avril">Avril</option>
              <option value="Mai">Mai</option>
              <option value="Juin">Juin</option>
              <option value="Juillet">Juillet</option>
              <option value="Août">Août</option>
              <option value="Septembre">Septembre</option>
              <option value="Octobre">Octobre</option>
              <option value="Novembre">Novembre</option>
              <option value="Décembre">Décembre</option>
         </select>
      </div>

     <div class="col-md-3">
        <input type="text" class="form-control" id="search-GSM" placeholder="Filtrer par N° GSM">
      </div>
      
    <div class="row">
        <div class="table-responsive" id="orderTable">
           <h3 class="text-success text-center">Chargement des factures...</h3>
        </div>
    </div>
</section>

<!-- Modal create-->
<div class="modal fade" id="createModal" role="dialog" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModalLabel">Nouvelle facture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="formOrder">

        <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray; color: white; padding: 5px 10px;"> LigneGSM:</legend>
            <div class="row ">
            <div class="col-md"> 
          <div class="input-group input-group-sm mb-3"> 
          <label class="input-group-text"  for="Numpage">N° Page: *</label>
            <input type="text" class="form-control" id="Numpage" name="Numpage" >
            
          </div>
          </div>
          
          
          <div class="col-md "> 
          <div class="input-group input-group-sm mb-3"> 
          <button  type="button" class="btn btn-secondary " id="searchGSM" name="searchGSM">search</button>
          </div>
          </div>
   
          <div class="col-md"> 
          <div class="input-group input-group-sm mb-3 "> 
          <label class="input-group-text"   for="NumGSM" >N° GSM:</label>
            <input type="text" class="form-control" id="NumGSM" name="NumGSM" readonly >
             
          </div>
          </div>
          <div class="col-md"> 
          <div class="input-group input-group-sm mb-3 "> 
          <label class="input-group-text"   for="Nom">Fonctionnaire:</label>
            <input type="text" class="form-control" id="Nom" name="Nom" readonly style="weight: 100%;">
             
          </div>
          </div>
          <div class="col-md"> 
          <div class="input-group input-group-sm mb-3 "> 
          <label class="input-group-text"   for="Numconvention">N° Convention:</label>
             <input type="text" class="form-control" id="Numconvention" readonly name="Numconvention" >
             
          </div>
          </div>
              </div>
              <div class="row">
              <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Annee">Année: *</label>
            <input type="text" class="form-control" id="Annee" name="Annee"  >
             
          </div>
          
            </div>
            
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Mois"> Mois: *</label>
            <select class="form-select " aria-label="Mois" name="Mois" id="Mois"  aria-describedby="inputGroup-sizing-sm" >
              <option value="">Sélectionner un mois</option>
              <option value="1">Janvier</option>
              <option value="2">Février</option>
              <option value="3">Mars</option>
              <option value="4">Avril</option>
              <option value="5">Mai</option>
              <option value="6">Juin</option>
              <option value="7">Juillet</option>
              <option value="8">Août</option>
              <option value="9">Septembre</option>
              <option value="10">Octobre</option>
              <option value="11">Novembre</option>
              <option value="12">Décembre</option>

            </select>
             
          </div>
            </div>
            <div class="col-md"> 
          <div class="input-group input-group-sm mb-3"> 
          <label class="input-group-text"  for="Categorie">Catégorie: </label>
          <input type="text" class="form-control" id="Categorie" name="Categorie" readonly >
            
          </div>
          </div>
          <div class="col-md"> 
          <div class="input-group input-group-sm mb-3"> 
          <label class="input-group-text"  for="typecat">Type Catégorie: </label>
          <input type="text" class="form-control" id="typecat" name="typecat" readonly >
            
          </div>
          </div>
            </div>
     
</fieldset>

        <ul class="nav nav-tabs" id="myTab">
        <li class="nav-item">
            <a href="#Dotation_add" class="nav-link active"  data-bs-toggle="tab">Dotation</a>
        </li>
        <li class="nav-item">
            <a href="#Communication" class="nav-link" data-bs-toggle="tab">Communication</a>
        </li>
        <li class="nav-item">
            <a href="#Remise" class="nav-link" data-bs-toggle="tab">Remise</a>
        </li>
        
        <li class="nav-item">
            <a href="#supp" class="nav-link" data-bs-toggle="tab">Détail Supplémentaire</a>
        </li>
    </ul>
    <div class="tab-content">
       
        <div class="tab-pane fade show active" id="Dotation_add">
        <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Dotations:</legend>
          <div class="row g-2">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Abonnement_Optimis">Abonnement Optimis:</label>
            <input type="text" class="form-control"  id="Abonnement_Optimis" name="Abonnement_Optimis">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label  class="input-group-text"  for="Option_Plafonnement">Option Plafonnement:</label>
            <input type="text" class="form-control" id="Option_Plafonnement" name="Option_Plafonnement">
             
          </div>
            </div>
            </div>
            <div class="row g-2">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Internet_Mobile">Internet Mobile:</label>
            <input type="text" class="form-control" id="Internet_Mobile" name="Internet_Mobile">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3  "> 
            <label class="input-group-text"  for="Option_IntraFlotteSMS">Option Intra Flotte SMS:</label>
            <input type="text" class="form-control" id="Option_IntraFlotteSMS" name="Option_IntraFlotteSMS">
            
          </div>
            </div>
             </div>
             </fieldset>
        </div>


        <div class="tab-pane fade" id="Remise">
        <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray; color: white; padding: 5px 10px;"> Remises:</legend>
             <div class="row g-2">
             <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Annulation_Frais_Plaf"> frais Plafonnement:</label>
            <input type="text" class="form-control"  id="Annulation_Frais_Plaf" name="Annulation_Frais_Plaf">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Reduction_Frais_Abon">frais d'Abonnement:</label>
            <input type="text" class="form-control" id="Reduction_Frais_Abon" name="Reduction_Frais_Abon">
             
          </div>
            </div>
            </div>
            <div class="row g-2">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Remise_FM_Internet"> frais Internet:</label>
            <input type="text" class="form-control" id="Remise_FM_Internet" name="Remise_FM_Internet">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label  class="input-group-text"  for="Annulation_Frais_IntraFlotteSMS"> frais Intra Flotte SMS:</label>
            <input type="text" class="form-control" id="Annulation_Frais_IntraFlotteSMS" name="Annulation_Frais_IntraFlotteSMS">
            
          </div>
            </div>
             </div>
             </fieldset>

        </div>
        <div class="tab-pane fade" id="Communication">
        <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Communications:</legend>
             <div class="row ">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Comm_Nat_Mobiles_IAM">vers Mobiles IAM:</label>
            <input type="text" class="form-control"  id="Comm_Nat_Mobiles_IAM" name="Comm_Nat_Mobiles_IAM">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Comm_Nat_Fixes_IAM">vers Fixes IAM:</label>
            <input type="text" class="form-control" id="Comm_Nat_Fixes_IAM" name="Comm_Nat_Fixes_IAM">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Comm_Nat_Autres_Mobiles">vers Autres Mobiles: </label>
            <input type="text" class="form-control" id="Comm_Nat_Autres_Mobiles" name="Comm_Nat_Autres_Mobiles">
            
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Comm_Nat_Autres_Fixes">vers Autres Fixes:</label>
            <input type="text" class="form-control" id="Comm_Nat_Autres_Fixes" name="Comm_Nat_Autres_Fixes">
            
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Comm_Internationales">Internationales:</label>
            <input type="text" class="form-control" id="Comm_Internationales" name="Comm_Internationales">
            
          </div>
            </div>
            
          </div>
          </fieldset>
           
          
          <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> SMS:</legend>
            
          <div class="row">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="SMS_Mobiles_IAM"> vers Mobiles IAM:</label>
            <input type="text" class="form-control" id="SMS_Mobiles_IAM" name="SMS_Mobiles_IAM">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="SMS_Autres_Mobiles">vers Autres Mobiles:</label>
            <input type="text" class="form-control" id="SMS_Autres_Mobiles" name="SMS_Autres_Mobiles">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="SMS_Internationaux"> vers international:</label>
            <input type="text" class="form-control" id="SMS_Internationaux" name="SMS_Internationaux">
             
          </div>
            </div>
            
            


          </div>
          </fieldset>
          <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;">MMS:</legend>

          <div class="row">
           
            
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="MMS_Mobiles_IAM"> vers Mobiles IAM:</label>
            <input type="text" class="form-control" id="MMS_Mobiles_IAM" name="MMS_Mobiles_IAM">
             
          </div>
            </div>
            
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="MMS_Email">vers Email:</label>
            <input type="text" class="form-control" id="MMS_Email" name="MMS_Email">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="MMS_Internationaux"> vers international:</label>
            <input type="text" class="form-control" id="MMS_Internationaux" name="MMS_Internationaux">
             
          </div>
            </div>
            


          </div>
          </fieldset>
          
          <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Details:</legend>
        <div class="row" >
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Numeros_Speciaux">Numéros Spéciaux:</label>
            <input type="text" class="form-control" id="Numeros_Speciaux" name="Numeros_Speciaux">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="App_Info_Conso"> info consommation :</label>
            <input type="text" class="form-control" id="App_Info_Conso" name="App_Info_Conso">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Roaming">Roaming:</label>
            <input type="text" class="form-control" id="Roaming" name="Roaming">
             
          </div>
            </div>
             </div>
        
          </fieldset>
        </div>
        
        

        <div class="tab-pane fade" id="supp">
        <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray; color: white; padding: 5px 10px;"> Détail supplémentaire:</legend>
             <div class="row g-2">
             <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
           
            <label class="input-group-text"  > Option:</label>
            <select class="form-select " aria-label="idOption_Facture" name="idOption_Facture" id="idOption_Facture"  aria-describedby="inputGroup-sizing-sm">
              <option value="">Sélectionner une Option</option>
            </select>
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Montant_DF">Montant:</label>
            <input type="text" class="form-control" id="Montant_DF" name="Montant_DF">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Signe_DF"> Signe :</label>
            <select class="form-control Signe_DF " aria-label="Signe_DF" name="Signe_DF" id="Signe_DF">
              <option value="">Sélectionner un signe</option>
              <option value="positif">+</option>
              <option value="négatif">-</option>
            </select>
             
          </div>
            </div>
            
             </div>
            
             <button style="margin-bottom:10px;" type="button" class="btn btn-secondary" id="toggle" name="toggle">Ajouter un champ</button>
        
          <div id="champsupp" style="display:none;">
          
          
          <div class="row g-2">
             <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
           
            <label class="input-group-text"  > Option:</label>
            <select class="form-select " aria-label="idOption_Facture2" name="idOption_Facture2" id="idOption_Facture2"  aria-describedby="inputGroup-sizing-sm">
              <option value="">Sélectionner une Option</option>
            </select>
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Montant_DF2">Montant:</label>
            <input type="text" class="form-control" id="Montant_DF2" name="Montant_DF2">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Signe_DF"> Signe :</label>
            <select class="form-control Signe_DF2 " aria-label="Signe_DF2" name="Signe_DF2" id="Signe_DF2">
              <option value="">Sélectionner un signe</option>
              <option value="positif">+</option>
              <option value="négatif">-</option>
            </select>
             
          </div>
            </div>
            
             </div>
             <button style="margin-bottom:10px;" type="button" class="btn btn-secondary" id="toggle2" name="toggle2">Ajouter un champ</button>
</div>

        
          <div id="champsupp2" style="display:none;">
          
          
          <div class="row g-2">
             <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
           
            <label class="input-group-text"  > Option:</label>
            <select class="form-select " aria-label="idOption_Facture3" name="idOption_Facture3" id="idOption_Facture3"  aria-describedby="inputGroup-sizing-sm">
              <option value="">Sélectionner une Option</option>
            </select>
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Montant_DF3">Montant:</label>
            <input type="text" class="form-control" id="Montant_DF3" name="Montant_DF3">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Signe_DF3"> Signe :</label>
            <select class="form-control Signe_DF2 " aria-label="Signe_DF3" name="Signe_DF3" id="Signe_DF3">
              <option value="">Sélectionner un signe</option>
              <option value="positif">+</option>
              <option value="négatif">-</option>
            </select>
             
          </div>
            </div>
            
             </div>
</div>


</fieldset>
        
        </div>
        
    </div>
    
       
      </div>
      <div class="modal-footer">
     
            <div class="row g-2">
      <div class="col-md">
      
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Montant_Facture"> Montant de la facture: *</label>
            <input type="text" class="form-control" id="Montant_Facture" name="Montant_Facture">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Somme">La Somme:</label>
            <input type="text" class="form-control" id="Somme" name="Somme" readonly>
             
          </div>
            </div>
            </div>
            <div class="col-md">
            <div class="form-floating mb-3"> 
            
          </div>
          
            </div>
         
            
            
            
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" id="create" name="create">Enregistrer <i class="fas fa-plus"></i></button>
      </div>
      </form>

    </div>
  </div>
</div>

<!-- Modal update -->
<div class="modal fade" id="updateModal" role="dialog" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Modifier facture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="formUpdateOrder">
        <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray; color: white; padding: 5px 10px;"> LigneGSM:</legend>
            <div class="row ">
            <div class="col-md"> 
          <div class="input-group input-group-sm mb-3"> 
          <label class="input-group-text"  for="NumpageUpdate">N° Page:</label>
            <input type="text" class="form-control" id="NumpageUpdate" name="NumpageUpdate" readonly >
          </div>
          </div>

          
          <div class="col-md"> 
          <div class="input-group input-group-sm mb-3 "> 
          <label class="input-group-text"   for="NumGSMUpdate" >N° GSM:</label>
            <input type="text" class="form-control" id="NumGSMUpdate" name="NumGSMUpdate" readonly >
             
          </div>
          </div>
          <div class="col-md"> 
          <div class="input-group input-group-sm mb-3 "> 
          <label class="input-group-text"   for="NomUpdate">Fonctionnaire:</label>
            <input type="text" class="form-control" id="NomUpdate" name="NomUpdate" readonly style="weight: 100%;">
             
          </div>
          </div>
          <div class="col-md"> 
          <div class="input-group input-group-sm mb-3 "> 
          <label class="input-group-text"   for="NumconventionUpdate">N° Convention:</label>
             <input type="text" class="form-control" id="NumconventionUpdate"  readonly name="NumconventionUpdate" >
             
          </div>
          </div>
              </div>
              <div class="row">
              <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="AnneeUpdate">Année:</label>
            <input type="text" class="form-control" id="AnneeUpdate" name="AnneeUpdate" >
             
          </div>
          
            </div>
            
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="MoisUpdate"> Mois:</label>
            <select class="form-select " aria-label="MoisUpdate" name="MoisUpdate" id="MoisUpdate"  aria-describedby="inputGroup-sizing-sm">
              <option value="">Sélectionner un mois</option>
              <option value="1">Janvier</option>
              <option value="2">Février</option>
              <option value="3">Mars</option>
              <option value="4">Avril</option>
              <option value="5">Mai</option>
              <option value="6">Juin</option>
              <option value="7">Juillet</option>
              <option value="8">Août</option>
              <option value="9">Septembre</option>
              <option value="10">Octobre</option>
              <option value="11">Novembre</option>
              <option value="12">Décembre</option>

            </select>
             
          </div>
            </div>
            <div class="col-md"> 
          <div class="input-group input-group-sm mb-3"> 
          <label class="input-group-text"  for="CategorieUpdate">Catégorie: </label>
          <input type="text" class="form-control" id="CategorieUpdate" readonly name="CategorieUpdate" >
            
          </div>
          </div>
          <div class="col-md"> 
          <div class="input-group input-group-sm mb-3"> 
          <label class="input-group-text"  for="typecatUpdate">Type Catégorie: </label>
          <input type="text" class="form-control" id="typecatUpdate" readonly name="typecatUpdate" >
            
          </div>
          </div>
            </div>

      
             
</fieldset>



        <ul class="nav nav-tabs" id="myTab">
        <li class="nav-item">
            <a href="#Dotation_Update" class="nav-link active"  data-bs-toggle="tab">Dotation</a>
        </li>
        <li class="nav-item">
            <a href="#Communication_Update" class="nav-link" data-bs-toggle="tab">Communication</a>
        </li>
        <li class="nav-item">
            <a href="#Remise_Update" class="nav-link" data-bs-toggle="tab">Remise</a>
        </li>
        
        <li class="nav-item">
            <a href="#supp_Update" class="nav-link" data-bs-toggle="tab">Détail Supplémentaire</a>
        </li>
    </ul>
    <div class="tab-content">
       

        <div class="tab-pane fade show active" id="Dotation_Update">
        <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Dotations:</legend>
          <div class="row g-2">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Abonnement_Optimis_Update">Abonnement Optimis:</label>
            <input type="text" class="form-control"  id="Abonnement_Optimis_Update" name="Abonnement_Optimis_Update">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label  class="input-group-text"  for="Option_Plafonnement_Update">Option Plafonnement:</label>
            <input type="text" class="form-control" id="Option_Plafonnement_Update" name="Option_Plafonnement_Update">
             
          </div>
            </div>
            </div>
            <div class="row g-2">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Internet_Mobile_Update">Internet Mobile:</label>
            <input type="text" class="form-control" id="Internet_Mobile_Update" name="Internet_Mobile_Update">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3  "> 
            <label class="input-group-text"  for="Option_IntraFlotteSMS_Update">Option Intra Flotte SMS:</label>
            <input type="text" class="form-control" id="Option_IntraFlotteSMS_Update" name="Option_IntraFlotteSMS_Update">
            
          </div>
            </div>
             </div>
             </fieldset>
        </div>


        <div class="tab-pane fade" id="Remise_Update">
        <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray; color: white; padding: 5px 10px;"> Remises:</legend>
             <div class="row g-2">
             <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Annulation_Frais_Plaf_Update"> frais Plafonnement:</label>
            <input type="text" class="form-control"  id="Annulation_Frais_Plaf_Update" name="Annulation_Frais_Plaf_Update">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Reduction_Frais_Abon_Update">frais d'Abonnement:</label>
            <input type="text" class="form-control" id="Reduction_Frais_Abon_Update" name="Reduction_Frais_Abon_Update">
             
          </div>
            </div>
            </div>
            <div class="row g-2">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Remise_FM_Internet_Update"> frais Internet:</label>
            <input type="text" class="form-control" id="Remise_FM_Internet_Update" name="Remise_FM_Internet_Update">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label  class="input-group-text"  for="Annulation_Frais_IntraFlotteSMS_Update"> frais Intra Flotte SMS:</label>
            <input type="text" class="form-control" id="Annulation_Frais_IntraFlotteSMS_Update" name="Annulation_Frais_IntraFlotteSMS_Update">
            
          </div>
            </div>
             </div>
             </fieldset>

        </div>
        <div class="tab-pane fade" id="Communication_Update">
        <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Communications:</legend>
             <div class="row ">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Comm_Nat_Mobiles_IAM_Update">vers Mobiles IAM:</label>
            <input type="text" class="form-control"  id="Comm_Nat_Mobiles_IAM_Update" name="Comm_Nat_Mobiles_IAM_Update">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Comm_Nat_Fixes_IAM_Update">vers Fixes IAM:</label>
            <input type="text" class="form-control" id="Comm_Nat_Fixes_IAM_Update" name="Comm_Nat_Fixes_IAM_Update">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Comm_Nat_Autres_Mobiles_Update">vers Autres Mobiles: </label>
            <input type="text" class="form-control" id="Comm_Nat_Autres_Mobiles_Update" name="Comm_Nat_Autres_Mobiles_Update">
            
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Comm_Nat_Autres_Fixes_Update">vers Autres Fixes:</label>
            <input type="text" class="form-control" id="Comm_Nat_Autres_Fixes_Update" name="Comm_Nat_Autres_Fixes_Update">
            
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Comm_Internationales_Update">Internationales:</label>
            <input type="text" class="form-control" id="Comm_Internationales_Update" name="Comm_Internationales_Update">
            
          </div>
            </div>
            
          </div>
          </fieldset>
           
          
          <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> SMS:</legend>
            
          <div class="row">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="SMS_Mobiles_IAM_Update"> vers Mobiles IAM:</label>
            <input type="text" class="form-control" id="SMS_Mobiles_IAM_Update" name="SMS_Mobiles_IAM_Update">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="SMS_Autres_Mobiles_Update">vers Autres Mobiles:</label>
            <input type="text" class="form-control" id="SMS_Autres_Mobiles_Update" name="SMS_Autres_Mobiles_Update">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="SMS_Internationaux_Update"> vers international:</label>
            <input type="text" class="form-control" id="SMS_Internationaux_Update" name="SMS_Internationaux_Update">
             
          </div>
            </div>
            
            


          </div>
          </fieldset>
          <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;">MMS:</legend>

          <div class="row">
           
            
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="MMS_Mobiles_IAM_Update"> vers Mobiles IAM:</label>
            <input type="text" class="form-control" id="MMS_Mobiles_IAM_Update" name="MMS_Mobiles_IAM_Update">
             
          </div>
            </div>
            
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="MMS_Email_Update">vers Email:</label>
            <input type="text" class="form-control" id="MMS_Email_Update" name="MMS_Email_Update">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="MMS_Internationaux_Update"> vers international:</label>
            <input type="text" class="form-control" id="MMS_Internationaux_Update" name="MMS_Internationaux_Update">
             
          </div>
            </div>
            


          </div>
          </fieldset>
          
          <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Details:</legend>
        <div class="row" >
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Numeros_Speciaux_Update">Numéros Spéciaux:</label>
            <input type="text" class="form-control" id="Numeros_Speciaux_Update" name="Numeros_Speciaux_Update">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="App_Info_Conso_Update"> info consommation :</label>
            <input type="text" class="form-control" id="App_Info_Conso_Update" name="App_Info_Conso_Update">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Roaming_Update">Roaming:</label>
            <input type="text" class="form-control" id="Roaming_Update" name="Roaming_Update">
             
          </div>
            </div>
             </div>
        
          </fieldset>
        </div>
        
        

        <div class="tab-pane fade" id="supp_Update">
        <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray; color: white; padding: 5px 10px;"> Détail supplémentaire:</legend>
             <div class="row g-2">
             <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Option_Facture_Update"> Option:</label>
            <select class="form-select " aria-label="Option_Facture_Update" name="Option_Facture_Update" id="Option_Facture_Update"  aria-describedby="inputGroup-sizing-sm">
              <option value="">Sélectionner une Option</option>
              <option value="1">Changement de carte SIM</option>
              <option value="2">Remise crédit supplémentaire OP</option>
              <option value="3">Annulation frais Numéros Illimités</option>
              <option value="4">SERVICES -Pass Controle Parental</option>
              <option value="5">Services MT FOOT</option>
              <option value="6">Portail multimédia mobile zone</option>

            </select>
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Montant_DF_Update">Montant:</label>
            <input type="text" class="form-control" id="Montant_DF_Update" name="Montant_DF_Update">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Signe_DF_Update"> Signe :</label>
            <select class="form-control Signe_DF_Update " aria-label="Signe_DF_Update" name="Signe_DF_Update" id="Signe_DF_Update">
              <option value="">Sélectionner un signe</option>
              <option value="positif">+</option>
              <option value="négatif">-</option>
            </select>
             
          </div>
            </div>
             </div>

             <div class="row g-2">
             <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Option_Facture_Update2"> Option:</label>
            <select class="form-select " aria-label="Option_Facture_Update2" name="Option_Facture_Update2" id="Option_Facture_Update2"  aria-describedby="inputGroup-sizing-sm">
              <option value="">Sélectionner une Option</option>
              <option value="1">Changement de carte SIM</option>
              <option value="2">Remise crédit supplémentaire OP</option>
              <option value="3">Annulation frais Numéros Illimités</option>
              <option value="4">SERVICES -Pass Controle Parental</option>
              <option value="5">Services MT FOOT</option>
              <option value="6">Portail multimédia mobile zone</option>

            </select>
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Montant_DF_Update2">Montant:</label>
            <input type="text" class="form-control" id="Montant_DF_Update2" name="Montant_DF_Update2">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Signe_DF_Update2"> Signe :</label>
            <select class="form-control Signe_DF_Update2 " aria-label="Signe_DF_Update2" name="Signe_DF_Update2" id="Signe_DF_Update2">
              <option value="">Sélectionner un signe</option>
              <option value="positif">+</option>
              <option value="négatif">-</option>
            </select>
             
          </div>
            </div>
             </div>
             <div class="row g-2">
             <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Option_Facture_Update3"> Option:</label>
            <select class="form-select " aria-label="Option_Facture_Update3" name="Option_Facture_Update3" id="Option_Facture_Update3"  aria-describedby="inputGroup-sizing-sm">
              <option value="">Sélectionner une Option</option>
              <option value="1">Changement de carte SIM</option>
              <option value="2">Remise crédit supplémentaire OP</option>
              <option value="3">Annulation frais Numéros Illimités</option>
              <option value="4">SERVICES -Pass Controle Parental</option>
              <option value="5">Services MT FOOT</option>
              <option value="6">Portail multimédia mobile zone</option>

            </select>
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Montant_DF_Update3">Montant:</label>
            <input type="text" class="form-control" id="Montant_DF_Update3" name="Montant_DF_Update3">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Signe_DF_Update3"> Signe :</label>
            <select class="form-control Signe_DF_Update3 " aria-label="Signe_DF_Update3" name="Signe_DF_Update3" id="Signe_DF_Update3">
              <option value="">Sélectionner un signe</option>
              <option value="positif">+</option>
              <option value="négatif">-</option>
            </select>
             
          </div>
            </div>
             </div>
             
        
      
</fieldset>
        
        </div>
        
    </div>
    
       
      </div>
      <div class="modal-footer">
     
            <div class="row g-2">
      <div class="col-md">
      
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Montant_Facture_Update"> Montant de la facture: *</label>
            <input type="text" class="form-control" id="Montant_Facture_Update" name="Montant_Facture_Update">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Somme_Update">La Somme:</label>
            <input type="text" class="form-control" id="Somme_Update" name="Somme_Update" readonly>
             
          </div>
            </div>
            </div>
            <div class="col-md">
            <div class="form-floating mb-3"> 
            
          </div>
          
            </div>
         
            
            
            
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" id="update" name="update">Enregistrer <i class="fas fa-plus"></i></button>
      </div>
      </form>

    </div>
  </div>
</div>


<!-- Modal LigneGsm -->

<div class="modal fade" id ="GSMModal"  aria-labelledby="GSMModalLabel" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="GSMModalLabel">Ligne GSM:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ADDModal">
          Ajouter
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UPDATEModal">
          Modifier
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#DELETEModal">
          Supprimer
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id ="ADDModal"  aria-labelledby="ADDModalLabel" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter une ligne GSM:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post" id="formGSMOrder">
      <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Entrer les données:</legend>

            <div class="row">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="LigneGSM">LigneGSM:</label>
            <input type="text" class="form-control" id="LigneGSM" name="LigneGSM" >
             
          </div>
            </div>
             </div>
             
             <div class="row">
              <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Code_Pin">Code Pin:</label>
            <input type="text" class="form-control" id="Code_Pin" name="Code_Pin" >
          </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Code_Punk">Code Punk:</label>
            <input type="text" class="form-control" id="Code_Punk" name="Code_Punk" >
             
          </div>
          
            </div>
             </div>
             <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="idstatutligne">Statut:</label>
            <select class="form-select " aria-label="idstatutligne" name="idstatutligne" id="idstatutligne"  aria-describedby="inputGroup-sizing-sm">
              <option value="">Sélectionner un type</option>  
              <option value="1">Actif</option> 
              <option value="2">Désactivé</option> 
              <option value="3">Résilié</option>  
              <option value="3">Transféré</option>             
            </select>
          </div>
            </div>
</fieldset>

      
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="CreateGSM" name="CreateGSM">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="UpdateModal" aria-labelledby="UpdateModalLabel" aria-hidden="true" tabindex="-1">
<?php 
 
 
 // Retrieve session data 
 $sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
  
 // Get status message from session 
 if(!empty($sessData['status']['msg'])){ 
     $statusMsg = $sessData['status']['msg']; 
     $statusMsgType = $sessData['status']['type']; 
     unset($_SESSION['sessData']['status']); 
 } 
  
 // Include database configuration file 
 require_once 'dbConfig.php'; 
  
 // Fetch the data from SQL server 
 $sql = "SELECT * FROM lignegsm "; 
 $query = $conn->prepare($sql); 
 $query->execute(); 
 $lignegsm = $query->fetchAll(PDO::FETCH_ASSOC); 
  
 ?>
 <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Supprimer une ligne GSM:</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
             <table class="table table-striped table-bordered">
                     <thead class="thead-dark">
                         <tr>
                             <th>#</th>
                             <th>LigneGSM</th>
                             <th>Code Pin</th>
                             <th>Code Punk</th>
                             <th>Statut</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php if(!empty($lignegsm)){ $count = 0; foreach($lignegsm as $row){ $count++; ?>
                         <tr>
                             <td><?php echo $count; ?></td>
                             <td><?php echo $row['LigneGSM']; ?></td>
                             <td><?php echo $row['Code_Pin']; ?></td>
                             <td><?php echo $row['Code_Punk']; ?></td>
                             <td><?php echo $row['idstatutligne']; ?></td>
                             <td>
                                 <a href="addEdit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">edit</a>
                                 <a href="userAction.php?action_type=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?');">delete</a>
                             </td>
                         </tr>
                         <?php } }else{ ?>
                         <tr><td colspan="7">Aucune ligne GSM...</td></tr>
                         <?php } ?>
                     </tbody>
                 </table>
           
     </div>
 </div>
 </div>
</div>
<div class="modal fade" id="UPDATEModal" aria-labelledby="UPDATEModalLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier une ligne GSM :</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md">
                        <div class="input-group input-group-sm mb-3">
                            <label class="input-group-text" for="filterInputUpdate">Entrer la ligne GSM:</label>
                            <!-- Add the ID attribute to the input field for targeting in JavaScript -->
                            <input type="text" class="form-control filterInputUpdate" id="filterInputUpdate">
                        </div>
                    </div>
                </div>
                <form action="" method="post" id="formDeleteGSMOrder">
                    <fieldset style="border: 0.5px solid gray; padding: 0px 10px 0px 10px;">
                        <legend style="font-size: 15px; background-color: gray; color: white; padding: 5px 10px;">Les lignes existantes :</legend>
                        <table class="table table-striped table-bordered" id="ligneGSMTableUpdate">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>LigneGSM</th>
                                    <th>Code Pin</th>
                                    <th>Code Punk</th>
                                    <th>Statut</th>
                                    <th>Action</th> <!-- Added a missing "th" for the action column -->
                                </tr>
                            </thead>
                            <tbody>
    <?php
    if (!empty($lignegsm)) {
        $count = 0;
        foreach ($lignegsm as $row) {
            $count++;
            $status = "";
            if ($row['idstatutligne'] == 1) {
                $status = "Actif";
            } elseif ($row['idstatutligne'] == 2) {
                $status = "Désactivé";
            } elseif ($row['idstatutligne'] == 3) {
                $status = "Résilié";
            } elseif ($row['idstatutligne'] == 4) {
                $status = "Transféré";
            }
    ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $row['LigneGSM']; ?></td>
                <td><?php echo $row['Code_Pin']; ?></td>
                <td><?php echo $row['Code_Punk']; ?></td>
                <td><?php echo $status; ?></td>
                <td>
                    <a href="addEdit.php?id=<?php echo $row['idLigneGSM']; ?>" class="btn btn-success">Modifier</a>
                </td>
            </tr>
    <?php
        }
    } else {
    ?>
        <tr>
            <td colspan="6">Aucune ligne GSM...</td>
        </tr>
    <?php
    }
    ?>
</tbody>

                        </table>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // JavaScript/jQuery for filtering the table rows based on LigneGSM in the UPDATEModal
        $("#filterInputUpdate").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#ligneGSMTableUpdate tbody tr").filter(function() {
                $(this).toggle($(this).find("td:nth-child(2)").text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<style>
    /* CSS for the filter input in the UPDATEModal */
    #filterInputUpdate {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* CSS to highlight the matched rows */
    .highlight {
        background-color: #ffe4e4; /* Light red color for highlighting */
    }
</style>

<div class="modal fade" id="DELETEModal" aria-labelledby="DELETEModalLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supprimer une ligne GSM :</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md">
                        <div class="input-group input-group-sm mb-3">
                            <label class="input-group-text" for="filterInput">Entrer la ligne GSM:</label>
                            <!-- Add the ID attribute to the input field for targeting in JavaScript -->
                            <input type="text" class="form-control filterInput" id="filterInput">
                        </div>
                    </div>
                </div>
                <form action="" method="post" id="formUpdateGSMOrder">
                    <fieldset style="border: 0.5px solid gray; padding: 0px 10px 0px 10px;">
                        <legend style="font-size: 15px; background-color: gray; color: white; padding: 5px 10px;">Les lignes existantes :</legend>
                        <table class="table table-striped table-bordered" id="ligneGSMTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>LigneGSM</th>
                                    <th>Code Pin</th>
                                    <th>Code Punk</th>
                                    <th>Statut</th>
                                    <th>Action</th> <!-- Added a missing "th" for the action column -->
                                </tr>
                            </thead>
                            <tbody>
                    
                                <?php if (!empty($lignegsm)) { $count = 0; foreach ($lignegsm as $row) { $count++; ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $row['LigneGSM']; ?></td>
                                        <td><?php echo $row['Code_Pin']; ?></td>
                                        <td><?php echo $row['Code_Punk']; ?></td>
                                        <td><?php echo $row['idstatutligne']; ?></td>
                                        <td>
                                            <a href="userAction.php?action_type=delete&id=<?php echo $row['idLigneGSM']; ?>" class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer cette ligne?');">Supprimer</a>
                                        </td>
                                    </tr>
                                <?php } } else { ?>
                                    <tr><td colspan="6">Aucune ligne GSM...</td></tr> <!-- Changed the colspan to 6 for the correct number of columns -->
                                <?php } ?>
                            </tbody>
                        </table>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript/jQuery for filtering the table rows based on LigneGSM
    $(document).ready(function() {
        $("#filterInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#ligneGSMTable tbody tr").filter(function() {
                $(this).toggle($(this).find("td:nth-child(2)").text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<style>
    /* CSS for the filter input */
    #filterInput {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* CSS to highlight the matched rows */
    .highlight {
        background-color: #ffe4e4; /* Light red color for highlighting */
    }
</style>

<!-- Modal Page -->

<div class="modal fade" id ="PageModal"  aria-labelledby="PageModalLabel" aria-hidden="true" tabindex="-1">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PageModalLabel">Page:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ADDPage">
          Ajouter
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UPDATEPage">
          Modifier
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#DELETEPage">
          Supprimer
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id ="ADDPage"  aria-labelledby="ADDPageLabel" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter une Page:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post" id="formPageOrder">
      <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Entrer les Données:</legend>

              
            <div class="row">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Num_Page">Numero de la Page:</label>
            <input type="text" class="form-control" id="Num_Page" name="Num_Page" >
             
          </div>
          
            </div>
             </div>

             <div class="row">
              <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Annee_Page"> Année :</label>
            <input type="text" class="form-control" id="Annee_Page" name="Annee_Page" >
          </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Ligne_GSM"> Ligne GSM:</label>
            <select class="form-select " aria-label="Ligne_GSM" name="Ligne_GSM" id="Ligne_GSM"  aria-describedby="inputGroup-sizing-sm">
              <option value="">Sélectionner une Ligne GSM</option>
              

            </select>
             
          </div>
            </div>
             </div>
</fieldset>
      
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="CreatePage" name="CreatePage">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="UPDATEPage" aria-labelledby="UPDATEPageLabel" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modifier une page:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md">
            <div class="input-group input-group-sm mb-3">
              <label class="input-group-text" for="filterInputPageUpdate">Entrer la ligne GSM:</label>
              <input type="text" class="form-control filterInputPageUpdate" id="filterInputPageUpdate">
            </div>
          </div>
        </div>

        <form action="" method="post" id="formUpdatePageOrder">
          <fieldset style="border: 0.5px solid gray; padding: 0px 10px 0px 10px;">
            <legend style="font-size: 15px; background-color: gray; color: white; padding: 5px 10px;">Les pages existantes :</legend>
            <table class="table table-striped table-bordered" id="pageTableUpdate">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Ligne GSM</th>
                  <th>Numéro de la page</th>
                  <th>Année</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "dbConfig.php";

                function getLigneGSMNamePage($conn, $idLigneGSM)
                {
                  $sql = "SELECT LigneGSM FROM lignegsm WHERE idLigneGSM = :idLigneGSM";
                  $stmt = $conn->prepare($sql);
                  $stmt->bindParam(':idLigneGSM', $idLigneGSM, PDO::PARAM_INT);
                  $stmt->execute();
                  $result = $stmt->fetch(PDO::FETCH_ASSOC);
                  return $result['LigneGSM'];
                }

                $sql = "SELECT * FROM page";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $page = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (!empty($page)) {
                  $count = 0;
                  foreach ($page as $row) {
                    $count++;
                    ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo getLigneGSMNamePage($conn, $row['idLigneGSM']); ?></td>
                      <td><?php echo $row['Numpage']; ?></td>
                      <td><?php echo $row['Annee']; ?></td>
                      <td>
                        <a href="updatepage.php?id=<?php echo $row['idLigneGSM']; ?>" class="btn btn-success">Modifier</a>
                      </td>
                    </tr>
                    <?php
                  }
                } else {
                  ?>
                  <tr>
                    <td colspan="8">Aucune page...</td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    function filterPageTableUpdate() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("filterInputPageUpdate");
      filter = input.value.toUpperCase();
      table = document.getElementById("pageTableUpdate");
      tr = table.getElementsByTagName("tr");

      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Index 1 is the column for "Ligne GSM"
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    $("#filterInputPageUpdate").on("keyup", function() {
      filterPageTableUpdate();
    });
  });
</script>

</div>

<div class="modal fade" id="DELETEPage" aria-labelledby="DELETEPageLabel" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Supprimer une page:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md">
            <div class="input-group input-group-sm mb-3">
              <label class="input-group-text" for="filterInputDeletePage">Entrer la ligne GSM:</label>
              <input type="text" class="form-control filterInputDeletePage" id="filterInputDeletePage">
            </div>
          </div>
        </div>

        <form action="" method="post" id="formDELETEPageOrder">
          <fieldset style="border: 0.5px solid gray; padding: 0px 10px 0px 10px;">
            <legend style="font-size: 15px; background-color: gray; color: white; padding: 5px 10px;">Les pages existantes :</legend>
            <table class="table table-striped table-bordered" id="pageTableDelete">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Ligne GSM</th>
                  <th>Numéro de la page</th>
                  <th>Année</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "dbConfig.php";

                function getLigneGSMNamePage2($conn, $idLigneGSM)
                {
                  $sql = "SELECT LigneGSM FROM lignegsm WHERE idLigneGSM = :idLigneGSM";
                  $stmt = $conn->prepare($sql);
                  $stmt->bindParam(':idLigneGSM', $idLigneGSM, PDO::PARAM_INT);
                  $stmt->execute();
                  $result = $stmt->fetch(PDO::FETCH_ASSOC);
                  return $result['LigneGSM'];
                }

                $sql = "SELECT * FROM page";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $page = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (!empty($page)) {
                  $count = 0;
                  foreach ($page as $row) {
                    $count++;
                    ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo getLigneGSMNamePage2($conn, $row['idLigneGSM']); ?></td>
                      <td><?php echo $row['Numpage']; ?></td>
                      <td><?php echo $row['Annee']; ?></td>
                      <td>
                        <a href="userAction.php?action_type=deletepage&id=<?php echo $row['idLigneGSM']; ?>" class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer cette page?');">Supprimer</a>
                      </td>
                    </tr>
                    <?php
                  }
                } else {
                  ?>
                  <tr>
                    <td colspan="8">Aucune page...</td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    function filterDeletePageTable() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("filterInputDeletePage");
      filter = input.value.toUpperCase();
      table = document.getElementById("pageTableDelete");
      tr = table.getElementsByTagName("tr");

      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Index 1 is the column for "Ligne GSM"
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    $("#filterInputDeletePage").on("keyup", function() {
      filterDeletePageTable();
    });
  });
</script>

<!-- Modal Option facture -->

<div class="modal fade" id ="OptionfacModal"  aria-labelledby="PageModalLabel" aria-hidden="true" tabindex="-1">
  <<div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="OptionfacModal">Option de la facture:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ADDOption">
          Ajouter
  </button>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UpdateOption">
          Modifier
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#DELETEOption">
          Supprimer
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id ="ADDOption"  aria-labelledby="ADDOptionLabel" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter une Option d'une facture:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post" id="formOptionfacOrder">
      <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Entrer les Données:</legend>

              
            <div class="row">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Libelle_Option">Libelle:</label>
            <input type="text" class="form-control" id="Libelle_Option" name="Libelle_Option" >
             
          </div>
          
            </div>
             </div>       
</fieldset>     
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="CreateOptionfac" name="CreateOptionfac">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="UpdateOption" aria-labelledby="UpdateOptionLabel" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modifier une option de facture :</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="formUpdateOption">
          <fieldset style="border: 0.5px solid gray; padding: 0px 10px 0px 10px;">
            <legend style="font-size: 15px; background-color: gray; color: white; padding: 5px 10px;">Les options de facture existantes :</legend>
            <table class="table table-striped table-bordered" id="optionTableUpdate">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Libellé de l'option</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "dbConfig.php";

                $sql = "SELECT * FROM option_facture";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $options = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if (!empty($options)) {
                  $count = 0;
                  foreach ($options as $row) {
                    $count++;
                ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $row['Libelle_Option_Facture']; ?></td>
                     
                      <td>
                        <a href="updateoption.php?id=<?php echo $row['idOption_Facture']; ?>" class="btn btn-success">Modifier</a>
                      </td>
                    </tr>
                <?php
                  }
                } else {
                ?>
                  <tr>
                    <td colspan="2">Aucune option de facture...</td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="DELETEOption" aria-labelledby="DELETEOptionLabel" aria-hidden="true" tabindex="-1">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Supprimer une option de la facture :</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="formDeleteOption">
          <fieldset style="border: 0.5px solid gray; padding: 0px 10px 0px 10px;">
            <legend style="font-size: 15px; background-color: gray; color: white; padding: 5px 10px;">Les options de facture existantes :</legend>
            <table class="table table-striped table-bordered" id="optionTableDelete">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Libellé de l'option</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "dbConfig.php";

                $sql = "SELECT * FROM option_facture";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $options = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if (!empty($options)) {
                  $count = 0;
                  foreach ($options as $row) {
                    $count++;
                ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $row['Libelle_Option_Facture']; ?></td>
                     
                      <td>
                      <a href="userAction.php?action_type=deleteoption&id=<?php echo $row['idOption_Facture']; ?>" class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer cette option?');">Supprimer</a>
                      </td>
                    </tr>
                <?php
                  }
                } else {
                ?>
                  <tr>
                    <td colspan="2">Aucune option de facture...</td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id ="FonctionnaireModal"  aria-labelledby="FonctionnaireModalLabel" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="FonctionnaireModal">Fonctionnaire:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ADDFonctionnaire">
          Ajouter
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UpdateFonctionnaire">
          Modifier
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#DELETEFonctionnaire">
          Supprimer
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id ="ADDFonctionnaire"  aria-labelledby="ADDFonctionnaireLabel" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter un Fonctionnaire:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post" id="formFonctionnaireOrder">
      <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Entrer les Données:</legend>

              
            <div class="row">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Nom">Nom:</label>
            <input type="text" class="form-control" id="Nom" name="Nom" >
             
          </div>
          
            </div>
             </div>

             <div class="row">
              <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Prenom"> Prenom:</label>
            <input type="text" class="form-control" id="Prenom" name="Prenom" >
          </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="idFonction"> Fonction:</label>
            <select class="form-select " aria-label="idFonction" name="idFonction" id="idFonction"  aria-describedby="inputGroup-sizing-sm">
              <option value="">Sélectionner une Fonction</option>
              

            </select>
             
          </div>
            </div>
             </div>
</fieldset>
      
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="CreateFonctionnaire" name="CreateFonctionnaire">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="UpdateFonctionnaire" aria-labelledby="UpdateFonctionnaireLabel" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modifier un fonctionnaire:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md">
            <div class="input-group input-group-sm mb-3">
              <label class="input-group-text" for="filterInputFonctionnaireUpdate">Entrer le nom du fonctionnaire:</label>
              <input type="text" class="form-control filterInputFonctionnaireUpdate" id="filterInputFonctionnaireUpdate">
            </div>
          </div>
        </div>

        <form action="" method="post" id="formUpdateFonctionnaire">
          <fieldset style="border: 0.5px solid gray; padding: 0px 10px 0px 10px;">
            <legend style="font-size: 15px; background-color: gray; color: white; padding: 5px 10px;">Les fonctionnaires existants :</legend>
            <table class="table table-striped table-bordered" id="fonctionnaireTableUpdate">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Fonction</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "dbConfig.php";

                function getFonctionName($conn, $idFonction)
                {
                  $sql = "SELECT Libelle_Fonction FROM fonction WHERE idFonction = :idFonction";
                  $stmt = $conn->prepare($sql);
                  $stmt->bindParam(':idFonction', $idFonction, PDO::PARAM_INT);
                  $stmt->execute();
                  $result = $stmt->fetch(PDO::FETCH_ASSOC);
                  return $result['Libelle_Fonction'];
                }

                $sql = "SELECT * FROM fonctionnaire";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $fonctionnaires = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (!empty($fonctionnaires)) {
                  $count = 0;
                  foreach ($fonctionnaires as $fonctionnaire) {
                    $count++;
                    ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $fonctionnaire['Nom']; ?></td>
                      <td><?php echo $fonctionnaire['Prenom']; ?></td>
                      <td><?php echo getFonctionName($conn, $fonctionnaire['idFonction']); ?></td>
                      <td>
                        <a href="updatefonctionnaire.php?id=<?php echo $fonctionnaire['idFonctionnaire']; ?>" class="btn btn-success">Modifier</a>
                      </td>
                    </tr>
                    <?php
                  }
                } else {
                  ?>
                  <tr>
                    <td colspan="5">Aucun fonctionnaire...</td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $(".filterInputFonctionnaireUpdate").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#fonctionnaireTableUpdate tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
    });
  });
</script>

<div class="modal fade" id="DELETEFonctionnaire" aria-labelledby="DELETEFonctionnaireLabel" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Supprimer un fonctionnaire:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md">
            <div class="input-group input-group-sm mb-3">
              <label class="input-group-text" for="filterInputFonctionnaireDelete">Entrer le nom du fonctionnaire:</label>
              <input type="text" class="form-control filterInputFonctionnaireDelete" id="filterInputFonctionnaireDelete">
            </div>
          </div>
        </div>

        <form action="" method="post" id="formDeleteFonctionnaire">
          <fieldset style="border: 0.5px solid gray; padding: 0px 10px 0px 10px;">
            <legend style="font-size: 15px; background-color: gray; color: white; padding: 5px 10px;">Les fonctionnaires existants :</legend>
            <table class="table table-striped table-bordered" id="fonctionnaireTableDelete">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Fonction</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "dbConfig.php";

                function getFonctionName2($conn, $idFonction)
                {
                  $sql = "SELECT Libelle_Fonction FROM fonction WHERE idFonction = :idFonction";
                  $stmt = $conn->prepare($sql);
                  $stmt->bindParam(':idFonction', $idFonction, PDO::PARAM_INT);
                  $stmt->execute();
                  $result = $stmt->fetch(PDO::FETCH_ASSOC);
                  return $result['Libelle_Fonction'];
                }

                $sql = "SELECT * FROM fonctionnaire";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $fonctionnaires = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (!empty($fonctionnaires)) {
                  $count = 0;
                  foreach ($fonctionnaires as $fonctionnaire) {
                    $count++;
                    ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $fonctionnaire['Nom']; ?></td>
                      <td><?php echo $fonctionnaire['Prenom']; ?></td>
                      <td><?php echo getFonctionName($conn, $fonctionnaire['idFonction']); ?></td>
                      <td>
                      <a href="userAction.php?action_type=deletefonctionnaire&id=<?php echo $fonctionnaire['idFonctionnaire']; ?>" class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer ce fonctionnaire?');">Supprimer</a>
                      </td>
                    </tr>
                    <?php
                  }
                } else {
                  ?>
                  <tr>
                    <td colspan="5">Aucun fonctionnaire...</td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $(".filterInputFonctionnaireDelete").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#fonctionnaireTableDelete tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
    });
  });
</script>
<!-- Modal Affectation Ligne -->

<div class="modal fade" id ="AffectationModal"  aria-labelledby="AffectationModalLabel" aria-hidden="true" tabindex="-1">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AffectationModalLabel">Affectation ligne:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ADDAffectation">
          Ajouter
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UPDATEAffectation">
          Modifier
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#DELETEAffectation">
          Supprimer
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id ="ADDAffectation"  aria-labelledby="ADDAffectationLabel" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Affecter une ligne GSM:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post" id="formAffectationOrder">
      <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Entrer les Données:</legend>

            <div class="row"> 
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="idLigneGSM_aff">Ligne GSM non affectée:</label>
            <select class="form-select " aria-label="idLigneGSM_aff" name="idLigneGSM_aff" id="idLigneGSM_aff"  aria-describedby="inputGroup-sizing-sm">
              <option value="">Sélectionner une Ligne GSM</option>
              
            </select>
          </div>
            </div>
             </div>
             <div class="row"> 
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="idFonctionnaire_aff">Fonctionnaire non affecté:</label>
            <select class="form-select " aria-label="idFonctionnaire_aff" name="idFonctionnaire_aff" id="idFonctionnaire_aff"  aria-describedby="inputGroup-sizing-sm">
              <option value="">Sélectionner un Fonctionnaire</option>
              
            </select>
          </div>
            </div>
             </div>
            <div class="row">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Date_Debut"> Date début d'affectation:</label>
            <input type="text" class="form-control" id="Date_Debut" name="Date_Debut" >
          </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Date_Fin"> Date fin d'affectation:</label>
            <input type="text" class="form-control" id="Date_Fin" name="Date_Fin" >
          </div>
            </div>
             </div>

             
</fieldset>
      
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="CreateAffectation" name="CreateAffectation">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="UPDATEAffectation" aria-labelledby="UPDATEAffectationLabel" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modifier une affectation :</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md">
            <div class="input-group input-group-sm mb-3">
              <label class="input-group-text" for="filterInputAffectationUpdate">Entrer la ligne GSM :</label>
              <input type="text" class="form-control filterInputAffectationUpdate" id="filterInputAffectationUpdate">
            </div>
          </div>
        </div>

        <form action="" method="post" id="formUpdateAffectationOrder">
          <fieldset style="border: 0.5px solid gray; padding: 0px 10px 0px 10px;">
            <legend style="font-size: 15px; background-color: gray; color: white; padding: 5px 10px;">Les affectations existantes :</legend>
            <table class="table table-striped table-bordered" id="affectationTableUpdate">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Ligne GSM</th>
                  <th>Fonctionnaire</th>
                  <th>Date Début</th>
                  <th>Date Fin</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "dbConfig.php";

                
                function getLigneGSMNameAffectation($conn, $idLigneGSM)
                        {
                          $sql = "SELECT LigneGSM FROM lignegsm WHERE idLigneGSM = :idLigneGSM";
                          $stmt = $conn->prepare($sql);
                          $stmt->bindParam(':idLigneGSM', $idLigneGSM, PDO::PARAM_INT);
                          $stmt->execute();
                          $result = $stmt->fetch(PDO::FETCH_ASSOC);
                          return $result['LigneGSM'];
                        }
                        function getFonctionnaireName($conn, $idFonctionnaire)
                        {
                          $sql = "SELECT Nom FROM fonctionnaire WHERE idFonctionnaire = :idFonctionnaire";
                          $stmt = $conn->prepare($sql);
                          $stmt->bindParam(':idFonctionnaire', $idFonctionnaire, PDO::PARAM_INT);
                          $stmt->execute();
                          $result = $stmt->fetch(PDO::FETCH_ASSOC);
                          return $result['Nom'];
                        }
                        
                $sql = "SELECT * FROM affectation_ligne";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $affectations = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (!empty($affectations)) {
                  $count = 0;
                  foreach ($affectations as $row) {
                    $count++;
                    ?>
                  <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo getLigneGSMNameAffectation($conn, $row['idLigneGSM']); ?></td>
                        <td><?php echo getFonctionnaireName($conn, $row['idFonctionnaire']); ?></td>
                        <td><?php echo $row['Date_Debut']; ?></td>
                        <td><?php echo $row['Date_Fin']; ?></td>
                      <td>
                        <a href="updateaffectation.php?id=<?php echo $row['idLigneGSM']; ?>" class="btn btn-success">Modifier</a>
                      </td>
                    </tr>
                    <?php
                  }
                } else {
                  ?>
                  <tr>
                    <td colspan="8">Aucune affectation...</td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    function filterAffectationTableUpdate() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("filterInputAffectationUpdate");
      filter = input.value.toUpperCase();
      table = document.getElementById("affectationTableUpdate");
      tr = table.getElementsByTagName("tr");

      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Index 1 is the column for "Ligne GSM"
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    $("#filterInputAffectationUpdate").on("keyup", function() {
      filterAffectationTableUpdate();
    });
  });
</script>

<div class="modal fade" id ="DELETEAffectation"  aria-labelledby="DELETEAffectationLabel" aria-hidden="true" tabindex="-1">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Supprimer une affectation :</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="formDeleteAffectation">
        <div class="modal-body">
          <div class="row">
            <div class="col-md">
              <div class="input-group input-group-sm mb-3">
                <label class="input-group-text" for="filterInputAffectationDelete">Filtrer par ligne GSM :</label>
                <input type="text" class="form-control filterInputAffectationDelete" id="filterInputAffectationDelete">
              </div>
            </div>
          </div>
          <form action="" method="post" id="formDeleteAffectationOrder">
          <fieldset style="border: 0.5px solid gray; padding: 0px 10px 0px 10px;">
            <legend style="font-size: 15px; background-color: gray; color: white; padding: 5px 10px;">Les affectations existantes :</legend>
            <table class="table table-striped table-bordered" id="affectationTableDelete">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Ligne GSM</th>
                  <th>Fonctionnaire</th>
                  <th>Date Début</th>
                  <th>Date Fin</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "dbConfig.php";
                function getLigneGSMNameAffectation2($conn, $idLigneGSM)
                        {
                          $sql = "SELECT LigneGSM FROM lignegsm WHERE idLigneGSM = :idLigneGSM";
                          $stmt = $conn->prepare($sql);
                          $stmt->bindParam(':idLigneGSM', $idLigneGSM, PDO::PARAM_INT);
                          $stmt->execute();
                          $result = $stmt->fetch(PDO::FETCH_ASSOC);
                          return $result['LigneGSM'];
                        }
                        function getFonctionnaireName2($conn, $idFonctionnaire)
                        {
                          $sql = "SELECT Nom FROM fonctionnaire WHERE idFonctionnaire = :idFonctionnaire";
                          $stmt = $conn->prepare($sql);
                          $stmt->bindParam(':idFonctionnaire', $idFonctionnaire, PDO::PARAM_INT);
                          $stmt->execute();
                          $result = $stmt->fetch(PDO::FETCH_ASSOC);
                          return $result['Nom'];
                        }
                        
                $sql = "SELECT * FROM affectation_ligne";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $affectations = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (!empty($affectations)) {
                  $count = 0;
                  foreach ($affectations as $row) {
                    $count++;
                    ?>
                  <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo getLigneGSMNameAffectation2($conn, $row['idLigneGSM']); ?></td>
                        <td><?php echo getFonctionnaireName2($conn, $row['idFonctionnaire']); ?></td>
                        <td><?php echo $row['Date_Debut']; ?></td>
                        <td><?php echo $row['Date_Fin']; ?></td>
                      <td>
                      <a href="userAction.php?action_type=deleteaffectation&id=<?php echo $row['idLigneGSM']; ?>" class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer cette affectation?');">Supprimer</a>
                      </td>
                    </tr>
                    <?php
                  }
                } else {
                  ?>
                  <tr>
                    <td colspan="8">Aucune affectation...</td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    function filterAffectationTableDelete() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("filterInputAffectationDelete");
      filter = input.value.toUpperCase();
      table = document.getElementById("affectationTableDelete");
      tr = table.getElementsByTagName("tr");

      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Index 1 is the column for "Ligne GSM"
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }

    $("#filterInputAffectationDelete").on("keyup", function() {
      filterAffectationTableDelete();
    });
  });
</script>
</div>
<!-- Modal Categorie -->
<div class="modal fade" id ="CategorieModal"  aria-labelledby="CategorieModalLabel" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="CategorieModal">Catégorie:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ADDCategorie">
          Ajouter
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UpdateCategorie">
          Modifier
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#DELETECategorie">
          Supprimer
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id ="ADDCategorie"  aria-labelledby="ADDCategorieLabel" aria-hidden="true" tabindex="-1">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter une Catégorie:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post" id="formCategorieOrder">
      <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Entrer les données:</legend>

            <div class="row">
              <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="NumCategorie">Numéro de la Catégorie:</label>
            <input type="text" class="form-control" id="NumCategorie" name="NumCategorie" >
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Annee_cat">Année du Catégorie:</label>
            <input type="text" class="form-control" id="Annee_cat" name="Annee_cat" >
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="idTypecategorie">Type de la Catégorie:</label>
            <select class="form-select " aria-label="idTypecategorie" name="idTypecategorie" id="idTypecategorie"  aria-describedby="inputGroup-sizing-sm">
              <option value="">Sélectionner un type</option>
            </select>
          </div>
            </div>

            
            </div>
             <div class="row">
             <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="idLigneGSM_cat">Ligne GSM:</label>
            <select class="form-select " aria-label="idLigneGSM_cat" name="idLigneGSM_cat" id="idLigneGSM_cat"  aria-describedby="inputGroup-sizing-sm">
              <option value="">Sélectionner une Ligne GSM</option>
            </select>
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="idConvention">Convention:</label>
            <select class="form-select " aria-label="idConvention" name="idConvention" id="idConvention"  aria-describedby="inputGroup-sizing-sm">
              <option value="">Sélectionner une Convention</option>
            </select>
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Status">Status:</label>
            <select class="form-select " aria-label="Status" name="Status" id="Status"  aria-describedby="inputGroup-sizing-sm">
              <option value="Actif">Actif</option>
              <option value="Inactif">Inactif</option>
            </select>
          </div>
            </div>
            </div>
            <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Dotation:</legend>
            <div class="row">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="D_Abonnement_Optimis">Abonnement Optimis:</label>
            <input type="text" class="form-control" id="D_Abonnement_Optimis" name="D_Abonnement_Optimis" >
          </div>  
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="D_Option_Plafonnement">Option Plafonnement:</label>
            <input type="text" class="form-control" id="D_Option_Plafonnement" name="D_Option_Plafonnement" >
          </div>  
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="D_Internet_Mobile">Internet Mobile:</label>
            <input type="text" class="form-control" id="D_Internet_Mobile" name="D_Internet_Mobile" >
          </div>  
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="D_Option_IntraFlotteSMS">Option IntraFlotteSMS:</label>
            <input type="text" class="form-control" id="D_Option_IntraFlotteSMS" name="D_Option_IntraFlotteSMS" >
          </div>  
            </div>
             </div>
</fieldset>
<fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Remise:</legend>
            <div class="row">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="R_Reduction_Frais_Abon">Frais Abonnement:</label>
            <input type="text" class="form-control" id="R_Reduction_Frais_Abon" name="R_Reduction_Frais_Abon" >
          </div>  
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="R_Annulation_Frais_Plaf">Frais Plafonnement:</label>
            <input type="text" class="form-control" id="R_Annulation_Frais_Plaf" name="R_Annulation_Frais_Plaf" >
          </div>  
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="R_Remise_FM_Internet">FM Internet:</label>
            <input type="text" class="form-control" id="R_Remise_FM_Internet" name="R_Remise_FM_Internet" >
          </div>  
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="R_Annulation_Frais_IntraFlotteSMS">Frais IntraFlotteSMS:</label>
            <input type="text" class="form-control" id="R_Annulation_Frais_IntraFlotteSMS" name="R_Annulation_Frais_IntraFlotteSMS" >
          </div>  
            </div>
             </div>
</fieldset>
              <div class="row" style="padding-top:20px;">
              <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Montant_Dotation">Montant Dotation:</label>
            <input type="text" class="form-control" id="Montant_Dotation" name="Montant_Dotation" >
          </div>  
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Montant_Forfait">Montant Forfait:</label>
            <input type="text" class="form-control" id="Montant_Forfait" name="Montant_Forfait" >
          </div>  
            </div>
             </div>
</fieldset>
      
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="CreateCategorie" name="CreateCategorie">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<div class="modal fade" id="UpdateCategorie" aria-labelledby="UpdateCategorieLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier une catégorie :</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                <div class="col-md">
                        <div class="input-group input-group-sm mb-3">
                            <label class="input-group-text" for="filterInputCategorieUpdate">Entrer la ligne GSM:</label>
                            
                            <input type="text" class="form-control filterInputCategorieUpdate" id="filterInputCategorieUpdate">
                        </div>
                    </div>
                </div>
                
                <fieldset style="border: 0.5px solid gray; padding: 0px 10px 0px 10px;">
                    <legend style="font-size: 15px; background-color: gray; color: white; padding: 5px 10px;">Les catégories existantes :</legend>
                    <table class="table table-striped table-bordered" id="categorieTableUpdate">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Numéro de la catégorie</th>
                                <th>Année</th>
                                <th>Ligne GSM</th>
                                <th>Convention</th>
                                <th>Type</th> 
                                <th>Montant Forfait</th>
                                <th>Montant Dotation</th>
                                <th>Actions</th> 
                            </tr>
                        </thead>
                        <tbody>
                        <?php

include "dbConfig.php";


function getLigneGSMName($conn, $idLigneGSM)
{
    $sql = "SELECT LigneGSM FROM lignegsm WHERE idLigneGSM = :idLigneGSM";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idLigneGSM', $idLigneGSM, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['LigneGSM'];
}

function getConventionName($conn, $idConvention)
{
    $sql = "SELECT Num_Convention FROM convention WHERE idConvention = :idConvention";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idConvention', $idConvention, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['Num_Convention'];
}


function getTypeCategorieName($conn, $idTypecategorie)
{
    $sql = "SELECT Typecategorie FROM typecategorie WHERE idTypecategorie = :idTypecategorie";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idTypecategorie', $idTypecategorie, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['Typecategorie'];
}


$sql = "SELECT NumCategorie, Annee, idLigneGSM, idConvention, idTypecategorie, Montant_Forfait, Montant_Dotation FROM categorie";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categorie = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<tbody>
    <?php
    if (!empty($categorie)) {
        $count = 0;
        foreach ($categorie as $row) {
            $count++;
    ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $row['NumCategorie']; ?></td>
                <td><?php echo $row['Annee']; ?></td>
                <td><?php echo getLigneGSMName($conn, $row['idLigneGSM']); ?></td>
                <td><?php echo getConventionName($conn, $row['idConvention']); ?></td>
                <td><?php echo getTypeCategorieName($conn, $row['idTypecategorie']); ?></td>
                <td><?php echo $row['Montant_Forfait']; ?></td>
                <td><?php echo $row['Montant_Dotation']; ?></td>
                <td>
                    
                    <a href="updatecategorie.php?id=<?php echo $row['idLigneGSM']; ?>" class="btn btn-success">Modifier</a>
                </td>
            </tr>
    <?php
        }
    } else {
    ?>
        <tr>
            <td colspan="8">Aucune catégorie...</td>
        </tr>
    <?php
    }
    ?>
 </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        function filterCategorieTableUpdate() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("filterInputCategorieUpdate");
            filter = input.value.toUpperCase();
            table = document.getElementById("categorieTableUpdate");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3]; 
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        $("#filterInputCategorieUpdate").on("keyup", function() {
            filterCategorieTableUpdate();
        });
    });
</script>

<div class="modal fade" id="DELETECategorie" aria-labelledby="DELETECategorieLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supprimer la catégorie :</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                <div class="col-md">
                        <div class="input-group input-group-sm mb-3">
                            <label class="input-group-text" for="filterInputCategorieDelete">Entrer la ligne GSM:</label>
                            
                            <input type="text" class="form-control filterInputCategorieDelete" id="filterInputCategorieDelete">
                        </div>
                    </div>
                </div>
          
        
            
                <fieldset style="border: 0.5px solid gray; padding: 0px 10px 0px 10px;">
                    <legend style="font-size: 15px; background-color: gray; color: white; padding: 5px 10px;">Les catégories existantes :</legend>
                    <table class="table table-striped table-bordered" id="categorieTableDelete">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Numéro de la catégorie</th>
                                <th>Année</th>
                                <th>Ligne GSM</th>
                                <th>Convention</th>
                                <th>Type</th> 
                                <th>Montant Forfait</th>
                                <th>Montant Dotation</th>
                                <th>Actions</th> 
                            </tr>
                        </thead>
                        <tbody>
                        <?php

include "dbConfig.php";

function getLigneGSMName2($conn, $idLigneGSM)
{
    $sql = "SELECT LigneGSM FROM lignegsm WHERE idLigneGSM = :idLigneGSM";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idLigneGSM', $idLigneGSM, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['LigneGSM'];
}


function getConventionName2($conn, $idConvention)
{
    $sql = "SELECT Num_Convention FROM convention WHERE idConvention = :idConvention";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idConvention', $idConvention, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['Num_Convention'];
}


function getTypeCategorieName2($conn, $idTypecategorie)
{
    $sql = "SELECT Typecategorie FROM typecategorie WHERE idTypecategorie = :idTypecategorie";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idTypecategorie', $idTypecategorie, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['Typecategorie'];
}


$sql = "SELECT NumCategorie, Annee, idLigneGSM, idConvention, idTypecategorie, Montant_Forfait, Montant_Dotation FROM categorie";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categorie = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<tbody>
    <?php
    if (!empty($categorie)) {
        $count = 0;
        foreach ($categorie as $row) {
            $count++;
    ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $row['NumCategorie']; ?></td>
                <td><?php echo $row['Annee']; ?></td>
                <td><?php echo getLigneGSMName2($conn, $row['idLigneGSM']); ?></td>
                <td><?php echo getConventionName2($conn, $row['idConvention']); ?></td>
                <td><?php echo getTypeCategorieName2($conn, $row['idTypecategorie']); ?></td>
                <td><?php echo $row['Montant_Forfait']; ?></td>
                <td><?php echo $row['Montant_Dotation']; ?></td>
                <td>
                 
                    <a href="userAction.php?action_type=deletecategorie&id=<?php echo $row['idLigneGSM']; ?>" class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer cette catégorie?');">Supprimer</a>
                </td>
            </tr>
    <?php
        }
    } else {
    ?>
        <tr>
            <td colspan="8">Aucune catégorie...</td>
        </tr>
    <?php
    }
    ?>
     </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        function filterCategorieTableDelete() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("filterInputCategorieDelete");
            filter = input.value.toUpperCase();
            table = document.getElementById("categorieTableDelete");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3]; 
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        $("#filterInputCategorieDelete").on("keyup", function() {
            filterCategorieTableDelete();
        });
    });
</script>
<!-- Modal Anomaly -->

<div class="modal fade" id ="anomalyModal" tabindex="-1"  aria-labelledby="anomalyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Les Anomalies</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post" id="formAnomalyOrder">
      <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Entrer la date de la facture:</legend>

            <div class="row">
              <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Anneefac">Année:</label>
            <input type="text" class="form-control" id="Anneefac" name="Anneefac" >
             
          </div>
          
            </div>

            
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Moisfac"> Mois:</label>
            <select class="form-select " aria-label="Moisfac" name="Moisfac" id="Moisfac"  aria-describedby="inputGroup-sizing-sm">
              <option value="">Sélectionner un mois</option>
              <option value="1">Janvier</option>
              <option value="2">Février</option>
              <option value="3">Mars</option>
              <option value="4">Avril</option>
              <option value="5">Mai</option>
              <option value="6">Juin</option>
              <option value="7">Juillet</option>
              <option value="8">Août</option>
              <option value="9">Septembre</option>
              <option value="10">Octobre</option>
              <option value="11">Novembre</option>
              <option value="12">Décembre</option>

            </select>
             
          </div>
            </div>
             
            
           
             </div>
</fieldset>


</form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="SearchAnomaly" name="SearchAnomaly">Chercher</button>
      
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal controle Dotation  -->

<div class="modal fade" id ="dotationModal" tabindex="-1"  aria-labelledby="dotationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Controle de Dotation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post" id="formDotationOrder">
      <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Entrer la date de la facture:</legend>

            <div class="row">
              <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Anneedot">Année:</label>
            <input type="text" class="form-control" id="Anneedot" name="Anneedot" >
             
          </div>
          
            </div>

            
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Moisdot"> Mois:</label>
            <select class="form-select " aria-label="Moisdot" name="Moisdot" id="Moisdot"  aria-describedby="inputGroup-sizing-sm">
              <option value="">Sélectionner un mois</option>
              <option value="1">Janvier</option>
              <option value="2">Février</option>
              <option value="3">Mars</option>
              <option value="4">Avril</option>
              <option value="5">Mai</option>
              <option value="6">Juin</option>
              <option value="7">Juillet</option>
              <option value="8">Août</option>
              <option value="9">Septembre</option>
              <option value="10">Octobre</option>
              <option value="11">Novembre</option>
              <option value="12">Décembre</option>

            </select>
             
          </div>
            </div>
             
            
           
             </div>
</fieldset>


</form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="SearchDotation" name="SearchDotation">Chercher</button>
      
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal Facture Globale -->

<div class="modal fade" id ="GlobalfacModal"  aria-labelledby="GlobalfacModalLabel" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Données de la facture Globale:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post" id="formGlobalfacOrder">
      <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Entrer les données:</legend>

            <div class="row">
              <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="AnneeGF">Année:</label>
            <input type="text" class="form-control" id="AnneeGF" name="AnneeGF" >
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="MoisGF">Mois:</label>
            <select class="form-select " aria-label="MoisGF" name="MoisGF" id="MoisGF"  aria-describedby="inputGroup-sizing-sm">
              <option value="">Sélectionner un mois</option>
              <option value="1">Janvier</option>
              <option value="2">Février</option>
              <option value="3">Mars</option>
              <option value="4">Avril</option>
              <option value="5">Mai</option>
              <option value="6">Juin</option>
              <option value="7">Juillet</option>
              <option value="8">Août</option>
              <option value="9">Septembre</option>
              <option value="10">Octobre</option>
              <option value="11">Novembre</option>
              <option value="12">Décembre</option>

            </select>
          </div>
            </div>
            </div>
           
            <ul class="nav nav-tabs" id="myTab">
        <li class="nav-item">
            <a href="#Dotation2" class="nav-link active"  data-bs-toggle="tab">Dotation</a>
        </li>
        <li class="nav-item">
            <a href="#Communication2" class="nav-link" data-bs-toggle="tab">Communication</a>
        </li>
        <li class="nav-item">
            <a href="#detailsupp2" class="nav-link" data-bs-toggle="tab">Détail Supplémentaire</a>
        </li>
        <li class="nav-item">
            <a href="#Remise2" class="nav-link" data-bs-toggle="tab">Remise</a>
        </li>
        <li class="nav-item">
            <a href="#Total2" class="nav-link" data-bs-toggle="tab">Total</a>
        </li>
    </ul>
    <div class="tab-content">
       

        <div class="tab-pane fade show active" id="Dotation2">
        <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Dotations:</legend>
          <div class="row g-2">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Fraisdab">Frais d'abonnement et de services:</label>
            <input type="text" class="form-control"  id="Fraisdab" name="Fraisdab">
             
          </div>
            </div>
             </div>
             </fieldset>
        </div>
        
        <div class="tab-pane fade" id="Total2">
        <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Total:</legend>
          <div class="row g-2">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Volume_consommation">Volume consommation:</label>
            <input type="text" class="form-control"  id="Volume_consommation" name="Volume_consommation">
          </div>
            </div>
             </div>
             <div class="row g-2">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Total_HT">Total HT:</label>
            <input type="text" class="form-control"  id="Total_HT" name="Total_HT">
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="TVA">TVA:</label>
            <input type="text" class="form-control"  id="TVA" name="TVA">
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Total_TTC">Total TTC:</label>
            <input type="text" class="form-control"  id="Total_TTC" name="Total_TTC">
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="achat_play">achat play store (TTC):</label>
            <input type="text" class="form-control"  id="achat_play" name="achat_play">
          </div>
            </div>
             </div>
             <div class="row g-2">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Montant_paye"> Montant à payé:</label>
            <input type="text" class="form-control"  id="Montant_paye" name="Montant_paye">
          </div>
            </div>
             </div>
             </fieldset>
        </div>


        <div class="tab-pane fade" id="Remise2">
        <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray; color: white; padding: 5px 10px;"> Remises:</legend>
             <div class="row g-2">
             <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Fais_ponctuels"> Fais ponctuels liés au contrat:</label>
            <input type="text" class="form-control"  id="Fais_ponctuels" name="Fais_ponctuels">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Easyfact">Easyfact:</label>
            <input type="text" class="form-control" id="Easyfact" name="Easyfact">
             
          </div>
            </div>
            </div>
            <div class="row g-2">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Complement_reduction">Complément réduction:</label>
            <input type="text" class="form-control" id="Complement_reduction" name="Complement_reduction">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label  class="input-group-text"  for="Annulation_frais_Easyfact">Annulation frais Easy fact:</label>
            <input type="text" class="form-control" id="Annulation_frais_Easyfact" name="Annulation_frais_Easyfact">
            
          </div>
            </div>
             </div>
             <div class="row g-2">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Reduction_frais_dab">Réduction frais d'abonnement:</label>
            <input type="text" class="form-control" id="Reduction_frais_dab" name="Reduction_frais_dab">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label  class="input-group-text"  for="Remise_frais_dab">Remise frais d'abonnement:</label>
            <input type="text" class="form-control" id="Remise_frais_dab" name="Remise_frais_dab">
            
          </div>
            </div>
             </div>
             </fieldset>

        </div>
        <div class="tab-pane fade" id="detailsupp2">
        <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray; color: white; padding: 5px 10px;"> Détail Supplémentaire:</legend>
             <div class="row g-2">
             <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Portail"> Portail multimédia/mobile Zone:</label>
            <input type="text" class="form-control"  id="Portail" name="Portail">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Pass_Controle">Pass Controle Parental:</label>
            <input type="text" class="form-control" id="Pass_Controle" name="Pass_Controle">
             
          </div>
            </div>
            </div>
            <div class="row g-2">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Live_TV">Live TV:</label>
            <input type="text" class="form-control" id="Live_TV" name="Live_TV">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label  class="input-group-text"  for="A_GHANY">A-GHANY:</label>
            <input type="text" class="form-control" id="A_GHANY" name="A_GHANY">
            
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Digster">Digster:</label>
            <input type="text" class="form-control" id="Digster" name="Digster">
             
          </div>
            </div>
             </div>
             <div class="row g-2">
           
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label  class="input-group-text"  for="STARZ_Play">STARZ Play:</label>
            <input type="text" class="form-control" id="STARZ_Play" name="STARZ_Play">
            
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label  class="input-group-text"  for="Achat_playstore">Achat play store:</label>
            <input type="text" class="form-control" id="Achat_playstore" name="Achat_playstore">
             
          </div>
            </div>
             </div>
             <div class="row g-2">
           
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label  class="input-group-text"  for="MT_foot">MT foot:</label>
            <input type="text" class="form-control" id="MT_foot" name="MT_foot">
            
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label  class="input-group-text"  for="MT_Lecture_kids">MT Lecture Kids:</label>
            <input type="text" class="form-control" id="MT_Lecture_kids" name="MT_Lecture_kids">
            
          </div>
            </div>
             </div>
             </fieldset>

        </div>
        <div class="tab-pane fade" id="Communication2">
        <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Communications:</legend>
             <div class="row ">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Comm_Nat_Mobiles_IAM2">vers Mobiles IAM:</label>
            <input type="text" class="form-control"  id="Comm_Nat_Mobiles_IAM2" name="Comm_Nat_Mobiles_IAM2">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Comm_Nat_Fixes_IAM2">vers Fixes IAM:</label>
            <input type="text" class="form-control" id="Comm_Nat_Fixes_IAM2" name="Comm_Nat_Fixes_IAM2">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Comm_Nat_Autres_Mobiles2">vers Autres Mobiles: </label>
            <input type="text" class="form-control" id="Comm_Nat_Autres_Mobiles2" name="Comm_Nat_Autres_Mobiles2">
            
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Comm_Nat_Autres_Fixes2">vers Autres Fixes:</label>
            <input type="text" class="form-control" id="Comm_Nat_Autres_Fixes2" name="Comm_Nat_Autres_Fixes2">
            
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Comm_Internationales2">Internationales:</label>
            <input type="text" class="form-control" id="Comm_Internationales2" name="Comm_Internationales2">
            
          </div>
            </div>
            
          </div>
          </fieldset>
           
          
          <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> SMS:</legend>
            
          <div class="row">
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="SMS_Mobiles_IAM2"> vers Mobiles IAM:</label>
            <input type="text" class="form-control" id="SMS_Mobiles_IAM2" name="SMS_Mobiles_IAM2">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="SMS_Autres_Mobiles2">vers Autres Mobiles:</label>
            <input type="text" class="form-control" id="SMS_Autres_Mobiles2" name="SMS_Autres_Mobiles2">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="SMS_Internationaux2"> vers international:</label>
            <input type="text" class="form-control" id="SMS_Internationaux2" name="SMS_Internationaux2">
             
          </div>
            </div>
            
            


          </div>
          </fieldset>
          <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;">MMS:</legend>

          <div class="row">
           
            
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="MMS_Mobiles_IAM2"> vers Mobiles IAM:</label>
            <input type="text" class="form-control" id="MMS_Mobiles_IAM2" name="MMS_Mobiles_IAM2">
             
          </div>
            </div>
            
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="MMS_Email2">vers Email:</label>
            <input type="text" class="form-control" id="MMS_Email2" name="MMS_Email2">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="MMS_Internationaux2"> vers international:</label>
            <input type="text" class="form-control" id="MMS_Internationaux2" name="MMS_Internationaux2">
             
          </div>
            </div>
            


          </div>
          </fieldset>
          
          <fieldset style=" border: 0.5px solid gray;padding:0px 10px 0px 10px;">
            <legend style="font-size:15px; background-color: gray;color: white;padding: 5px 10px;"> Details:</legend>
        <div class="row" >
            <div class="col-md">
            <div class="input-group input-group-sm mb-3"> 
            <label class="input-group-text"  for="Numeros_Speciaux2">Numéros Spéciaux:</label>
            <input type="text" class="form-control" id="Numeros_Speciaux2" name="Numeros_Speciaux2">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="App_Info_Conso2"> info consommation :</label>
            <input type="text" class="form-control" id="App_Info_Conso2" name="App_Info_Conso2">
             
          </div>
            </div>
            <div class="col-md">
            <div class="input-group input-group-sm mb-3 "> 
            <label class="input-group-text"  for="Roaming2">Roaming:</label>
            <input type="text" class="form-control" id="Roaming2" name="Roaming2">
             
          </div>
            </div>
             </div>
        
          </fieldset>
        </div>
        </div>
        
        <div class="row" style="padding-top:20px;">
              <div class="col-md">
              </div>
        </div>


</fieldset>
      
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="CreateGlobalfac" name="CreateGlobalfac">Entrer</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="process.js"></script>
</body>
</html>
