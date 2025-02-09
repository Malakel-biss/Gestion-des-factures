
$(function(){
    var type_user = window.location.search.substring(1);
      if(type_user == "admin"){
        $(".testdiv").append(`<ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item ">
            <a class="nav-link active" href="#" id ="Categoriebtn" data-bs-toggle="modal"  data-bs-target="#CategorieModal">Categorie</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link active" href="#" id="GSM" data-bs-toggle="modal"  data-bs-target="#GSMModal" >LigneGSM</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link active" href="#" id="Page" data-bs-toggle="modal"  data-bs-target="#PageModal" >Page</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link active" href="#" id="Optionfac" data-bs-toggle="modal"  data-bs-target="#OptionfacModal" >Option facture</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link active"href="#" id="Fonctionnairebtn" data-bs-toggle="modal"  data-bs-target="#FonctionnaireModal">Fonctionnaire</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link active"href="#" id="Affectationbtn" data-bs-toggle="modal"  data-bs-target="#AffectationModal">Affectation Ligne</a>
        </li>
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Les Anomalies
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" id="Anomalie" data-bs-toggle="modal"  data-bs-target="#anomalyModal">Anomalie des factures</a></li>
            <li><a class="dropdown-item" id="Dotation" data-bs-toggle="modal"  data-bs-target="#dotationModal">Controle de Dotation</a></li>
          </ul>
        </li>
        
          
      </ul>
      <span> <img style="height:60px;width: 200px;" src="logo.png" > </span>`)
      }
      else if(type_user == "user"){
        $(".testdiv").append(`<ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item ">
            <a class="nav-link active" href="#" id ="Categoriebtn" data-bs-toggle="modal"  data-bs-target="#CategorieModal">Categorie</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link active" href="#" id="GSM" data-bs-toggle="modal"  data-bs-target="#GSMModal" >LigneGSM</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link active" href="#" id="Page" data-bs-toggle="modal"  data-bs-target="#PageModal" >Page</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link active" href="#" id="Optionfac" data-bs-toggle="modal"  data-bs-target="#OptionfacModal" >Option facture</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link active"href="#" id="Fonctionnairebtn" data-bs-toggle="modal"  data-bs-target="#FonctionnaireModal">Fonctionnaire</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link active"href="#" id="Affectationbtn" data-bs-toggle="modal"  data-bs-target="#AffectationModal">Affectation Ligne</a>
        </li>
        
        
          
      </ul>
      <span> <img style="height:60px;width: 200px;" src="logo.png" > </span>`)
      }
      

 
    function CreatePDFfromHTML( response, mois , annee) {
       
        var doc = new jsPDF("p", "pt", "a4", true);
         doc.setFontSize(22);
         doc.setFont("times");
         doc.setFontType("bold");
       doc.text("Les Anomalies",200, 50);


         doc.fromHTML(response, 20, 80);
          doc.save('Anomalies'+'-'+mois+'-'+annee+'.pdf');
    
}
function CreatePDFfromHTML_TABLE( response, mois , annee) {
       
    var doc = new jsPDF("p", "pt", "a4", true);
     doc.setFontSize(22);
     doc.setFont("times");
     doc.setFontType("bold");
   doc.text("Justification de paiment",200, 50);


     doc.fromHTML(response, 20, 80);
      doc.save('FactureGlobale'+'-'+mois+'-'+annee+'.pdf');

}

//autocalclule 
       $(function(){

        $('#Abonnement_Optimis').val(0); $('#Option_Plafonnement').val(0); $('#Internet_Mobile').val(0);
        $('#Option_IntraFlotteSMS').val(0);$('#Comm_Nat_Mobiles_IAM').val(0);$('#Comm_Nat_Fixes_IAM').val(0);
        $('#Comm_Nat_Autres_Mobiles').val(0);$('#Comm_Nat_Autres_Fixes').val(0); $('#Comm_Internationales').val(0);
        $('#SMS_Mobiles_IAM').val(0);$('#SMS_Autres_Mobiles').val(0);$('#Numeros_Speciaux').val(0);
        $('#App_Info_Conso').val(0);$('#MMS_Mobiles_IAM').val(0);$('#MMS_Email').val(0);$('#MMS_Internationaux').val(0);
        $('#Annulation_Frais_Plaf').val(0);$('#Remise_FM_Internet').val(0);$('#Annulation_Frais_IntraFlotteSMS').val(0);
        $('#Reduction_Frais_Abon').val(0);$('#Roaming').val(0);$('#SMS_Internationaux').val(0);$('#Montant_DF').val(0);$('#Montant_DF2').val(0);$('#Montant_DF3').val(0); 
        $('#Somme').val(0);  
        $('.form-control').blur(function(){
            var somme = 0;         
            $('.form-control').each(function(){
                if( $(this).val() != '' ){
                    somme =  parseFloat( $('#Abonnement_Optimis').val()) + parseFloat( $('#Option_Plafonnement').val()) + parseFloat( $('#Internet_Mobile').val())
                    + parseFloat( $('#Option_IntraFlotteSMS').val())+ parseFloat( $('#Comm_Nat_Mobiles_IAM').val())+ parseFloat( $('#Comm_Nat_Fixes_IAM').val())
                    + parseFloat( $('#Comm_Nat_Autres_Mobiles').val())+ parseFloat( $('#Comm_Nat_Autres_Fixes').val())+ parseFloat( $('#Comm_Internationales').val())
                    + parseFloat( $('#SMS_Mobiles_IAM').val())+ parseFloat( $('#SMS_Autres_Mobiles').val())+ parseFloat( $('#Numeros_Speciaux').val())
                    + parseFloat( $('#App_Info_Conso').val())+ parseFloat( $('#MMS_Mobiles_IAM').val())+ parseFloat( $('#MMS_Email').val())+ parseFloat( $('#MMS_Internationaux').val())
                    + parseFloat( $('#Annulation_Frais_Plaf').val())+ parseFloat( $('#Remise_FM_Internet').val())+ parseFloat( $('#Annulation_Frais_IntraFlotteSMS').val())
                    + parseFloat( $('#Reduction_Frais_Abon').val())+ parseFloat( $('#Roaming').val())+ parseFloat( $('#SMS_Internationaux').val())
                    + parseFloat( $('#Montant_DF').val())+ parseFloat( $('#Montant_DF2').val())+ parseFloat( $('#Montant_DF3').val());                      
                }
            })
            if(!isNaN(somme)){
                $('#Somme').val(somme.toFixed(2));
            }else{
                $('#Somme').val("Merci de remplir les champs manquants");
            }
            
            
        })

       })

       //autocalclule Update
       $(function(){
              
        $('.form-control').blur(function(){
            
            var somme2 = 0;
            $montant_dfU =  $('#Montant_DF_Update').val();
                if (($montant_dfU == null ) || ($montant_dfU == '') ){
                    $montant_dfU = 0;
                }
            $('.form-control').each(function(){
                if( $(this).val() != '' ){
                    somme2 =  parseFloat( $('#Abonnement_Optimis_Update').val()) + parseFloat( $('#Option_Plafonnement_Update').val()) + parseFloat( $('#Internet_Mobile_Update').val())
                    + parseFloat( $('#Option_IntraFlotteSMS_Update').val())+ parseFloat( $('#Comm_Nat_Mobiles_IAM_Update').val())+ parseFloat( $('#Comm_Nat_Fixes_IAM_Update').val())
                    + parseFloat( $('#Comm_Nat_Autres_Mobiles_Update').val())+ parseFloat( $('#Comm_Nat_Autres_Fixes_Update').val())+ parseFloat( $('#Comm_Internationales_Update').val())
                    + parseFloat( $('#SMS_Mobiles_IAM_Update').val())+ parseFloat( $('#SMS_Autres_Mobiles_Update').val())+ parseFloat( $('#Numeros_Speciaux_Update').val())
                    + parseFloat( $('#App_Info_Conso_Update').val())+ parseFloat( $('#MMS_Mobiles_IAM_Update').val())+ parseFloat( $('#MMS_Email_Update').val())+ parseFloat( $('#MMS_Internationaux_Update').val())
                    + parseFloat( $('#Annulation_Frais_Plaf_Update').val())+ parseFloat( $('#Remise_FM_Internet_Update').val())+ parseFloat( $('#Annulation_Frais_IntraFlotteSMS_Update').val())
                    + parseFloat( $('#Reduction_Frais_Abon_Update').val())+ parseFloat( $('#Roaming_Update').val())+ parseFloat( $('#SMS_Internationaux_Update').val()) + parseFloat($montant_dfU)
                    ;
                   
                }
            })
            if(!isNaN(somme2)){
                $('#Somme_Update').val(somme2.toFixed(2));
            }else{
                $('#Somme_Update').val("Merci de remplir les champs manquants");
            }
        })

       })


        //create 
        $('#create').on('click',function(e){
            let formOrder = $('#formOrder');

            if (formOrder[0].checkValidity()){
                e.preventDefault();
                
                var Total =  $('#Montant_Facture').val();
                var somme =  parseFloat( $('#Abonnement_Optimis').val()) + parseFloat( $('#Option_Plafonnement').val()) + parseFloat( $('#Internet_Mobile').val())
                + parseFloat( $('#Option_IntraFlotteSMS').val())+ parseFloat( $('#Comm_Nat_Mobiles_IAM').val())+ parseFloat( $('#Comm_Nat_Fixes_IAM').val())
                + parseFloat( $('#Comm_Nat_Autres_Mobiles').val())+ parseFloat( $('#Comm_Nat_Autres_Fixes').val())+ parseFloat( $('#Comm_Internationales').val())
                + parseFloat( $('#SMS_Mobiles_IAM').val())+ parseFloat( $('#SMS_Autres_Mobiles').val())+ parseFloat( $('#Numeros_Speciaux').val())
                + parseFloat( $('#App_Info_Conso').val())+ parseFloat( $('#MMS_Mobiles_IAM').val())+ parseFloat( $('#MMS_Email').val())+ parseFloat( $('#MMS_Internationaux').val())
                + parseFloat( $('#Annulation_Frais_Plaf').val())+ parseFloat( $('#Remise_FM_Internet').val())+ parseFloat( $('#Annulation_Frais_IntraFlotteSMS').val())
                + parseFloat( $('#Reduction_Frais_Abon').val())+ parseFloat( $('#Roaming').val())+ parseFloat( $('#SMS_Internationaux').val())+ parseFloat( $('#Montant_DF').val())
                + parseFloat( $('#Montant_DF2').val())+ parseFloat( $('#Montant_DF3').val());
                
                       
                if ( somme.toFixed(2) ==  Total){

                $.ajax({
                    url: 'process.php',
                    type: 'post', 
                    data: formOrder.serialize() + '&action=create',
                    success: function(response){
                        $('#createModal').modal('hide');
                        if(response == false){
                            Swal.fire({
                                icon: 'error',
                                title: 'La ligne existe déja',
                            }) 
                        }else{
                            Swal.fire({
                                icon: 'success',
                                title: 'Succés',
                            })
                        }
                        
                        formOrder[0].reset();
                        getBills()
                        
                     
                        
                    },
                    error: function() {
                        alert("Il y a eu une erreur. Réessayez s’il vous plaît!");
                      }

                })}
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: "Le montant total n'est pas égal au montant de la facture! " + somme.toFixed(2),
                    })

                  }
            }
        })


      

  //champ supplémentaire
  $('#toggle').on('click',function(e){
    let formOrder = $('#formOrder')
    if (formOrder[0].checkValidity()){
        e.preventDefault();
        $("#champsupp").toggle();
        
    
    }})
    //champ supplémentaire2
  $('#toggle2').on('click',function(e){
    let formOrder = $('#formOrder')
    if (formOrder[0].checkValidity()){
        e.preventDefault();
        $("#champsupp2").toggle();
    
    }})
        
  
        //recupérer 
        getBills();
        function getBills(){
            $.ajax({
                url: 'process.php',
                type: 'post',
                data:{ action:'fetch'},
                success: function (response){
                $('#orderTable').html(response);
                
                oTable = $('table').DataTable({lengthMenu:[50,100,200],order : [0, 'desc'],});
                $('#search-annee').keyup( function(){
                    oTable.column(1).search(this.value).draw();
                })
                $('#search-GSM').keyup( function(){
                    oTable.column(3).search(this.value).draw();
                })
                $('#search-mois').on('change', function(){
                    oTable.column(2).search(this.value).draw();
                })

                }
            })
        }
            
              //SearchAnomaly

          $('#SearchAnomaly').on('click',function(e){
            let formOrder = $('#formAnomalyOrder');
            var mois =  $('#Moisfac').val();
            var annee =  $('#Anneefac').val();
            if (formOrder[0].checkValidity()){
            
            e.preventDefault();
            $.ajax({
                url: 'process.php',
                type: 'post', 
                data: {searchMois: mois,searchAnnee: annee}
                ,
                success: function(response){
                    
                    CreatePDFfromHTML(response,mois,annee)
                    
                    $('#anomalyModal').modal('hide');
                   
                    Swal.fire({
                        title: '<strong><i>Les Anomalies :</i></strong>',
                        icon: 'warning',
                       
                        html:
                        response
                       ,
                      showCloseButton: true,
                      focusConfirm: false,
                      confirmButtonText:
                        'Fermer!',
                      confirmButtonAriaLabel: 'Thumbs up, great!',
                    })
                    formOrder[0].reset();
                    
                   
                }

            })}
        
    })  
    

      

              //Controle de dotation

              $('#SearchDotation').on('click',function(e){
                let formOrder = $('#formDotationOrder');
                var mois =  $('#Moisdot').val();
                var annee =  $('#Anneedot').val();
                if (formOrder[0].checkValidity()){
                
                e.preventDefault();
                $.ajax({
                    url: 'process.php',
                    type: 'post', 
                    data: {searchMoisdot: mois,searchAnneedot: annee}
                    ,
                    success: function(response){
                        
                        
                        
                        $('#dotationModal').modal('hide');
                       
                        Swal.fire({
                            title: '<strong><i>Les Anomalies :</i></strong>',
                            icon: 'warning',
                           
                            html:
                            response
                           ,
                          showCloseButton: true,
                          focusConfirm: false,
                          confirmButtonText:
                            'Fermer!',
                          confirmButtonAriaLabel: 'Thumbs up, great!',
                        })
                        formOrder[0].reset();
                        
                       
                    }
    
                })}
            
        })   
    
  //Globale facture

  $('#CreateGlobalfac').on('click',function(e){
    let formOrder = $('#formGlobalfacOrder');
    var mois =  $('#MoisGF').val();
    var annee =  $('#AnneeGF').val();
    var Fraisdab =  $('#Fraisdab').val();
    var Volume_consommation =  $('#Volume_consommation').val();
    var Total_HT =  $('#Total_HT').val();
    var TVA =  $('#TVA').val();
    var Total_TTC =  $('#Total_TTC').val();
    var achat_play =  $('#achat_play').val();
    var Montant_paye =  $('#Montant_paye').val();
    var Fais_ponctuels =  $('#Fais_ponctuels').val();
    var Easyfact =  $('#Easyfact').val();
    var Complement_reduction =  $('#Complement_reduction').val();
    var Annulation_frais_Easyfact =  $('#Annulation_frais_Easyfact').val();
    var Reduction_frais_dab =  $('#Reduction_frais_dab').val();
    var Remise_frais_dab =  $('#Remise_frais_dab').val();
    var Portail =  $('#Portail').val();
    var Pass_Controle =  $('#Pass_Controle').val();
    var Live_TV =  $('#Live_TV').val();
    var A_GHANY =  $('#A_GHANY').val();
    var Digster =  $('#Digster').val();
    var STARZ_Play =  $('#STARZ_Play').val();
    var Achat_playstore =  $('#Achat_playstore').val();
    var MT_foot =  $('#MT_foot').val();
    var MT_Lecture_kids =  $('#MT_Lecture_kids').val();
    var Comm_Nat_Mobiles_IAM2 =  $('#Comm_Nat_Mobiles_IAM2').val();
    var Comm_Nat_Fixes_IAM2 =  $('#Comm_Nat_Fixes_IAM2').val();
    var Comm_Nat_Autres_Mobiles2 =  $('#Comm_Nat_Autres_Mobiles2').val();
    var Comm_Nat_Autres_Fixes2 =  $('#Comm_Nat_Autres_Fixes2').val();
    var Comm_Internationales2 =  $('#Comm_Internationales2').val();
    var SMS_Mobiles_IAM2 =  $('#SMS_Mobiles_IAM2').val();
    var SMS_Autres_Mobiles2 =  $('#SMS_Autres_Mobiles2').val();
    var SMS_Internationaux2 =  $('#SMS_Internationaux2').val();
    var MMS_Mobiles_IAM2 =  $('#MMS_Mobiles_IAM2').val();
    var MMS_Email2 =  $('#MMS_Email2').val();
    var MMS_Internationaux2 =  $('#MMS_Internationaux2').val();
    var Numeros_Speciaux2 =  $('#Numeros_Speciaux2').val();
    var App_Info_Conso2 =  $('#App_Info_Conso2').val();
    var Roaming2 =  $('#Roaming2').val();
    

    if (formOrder[0].checkValidity()){
    
    e.preventDefault();
    $.ajax({
        url: 'process.php',
        type: 'post', 
        data: {GFMois: mois,GFAnnee: annee, GFFraisdab: Fraisdab,Volume_consommation : Volume_consommation,Total_HT :Total_HT , 
            TVA : TVA, 
            Total_TTC : Total_TTC ,  
            achat_play : achat_play, 
            Montant_paye : Montant_paye, 
            Fais_ponctuels :Fais_ponctuels , 
            Easyfact :Easyfact , 
            Complement_reduction :Complement_reduction ,  
            Annulation_frais_Easyfact:Annulation_frais_Easyfact ,  
            Reduction_frais_dab : Reduction_frais_dab, 
            Remise_frais_dab:Remise_frais_dab , 
            Portail: Portail, 
            Pass_Controle : Pass_Controle, 
            Live_TV:Live_TV , 
            A_GHANY :A_GHANY , 
            Digster : Digster, 
            STARZ_Play : STARZ_Play, 
            Achat_playstore :Achat_playstore ,  
            MT_foot :MT_foot , 
            MT_Lecture_kids : MT_Lecture_kids , 
            Comm_Nat_Mobiles_IAM2 :Comm_Nat_Mobiles_IAM2 ,  
            Comm_Nat_Fixes_IAM2 :Comm_Nat_Fixes_IAM2 , 
            Comm_Nat_Autres_Mobiles2 :Comm_Nat_Autres_Mobiles2 , 
            Comm_Nat_Autres_Fixes2 : Comm_Nat_Autres_Fixes2, 
            Comm_Internationales2 :Comm_Internationales2 , 
            SMS_Mobiles_IAM2 : SMS_Mobiles_IAM2, 
            SMS_Autres_Mobiles2 :SMS_Autres_Mobiles2 , 
            SMS_Internationaux2 :SMS_Internationaux2 , 
            MMS_Mobiles_IAM2 : MMS_Mobiles_IAM2, 
            MMS_Email2 :MMS_Email2 , 
            MMS_Internationaux2 :MMS_Internationaux2 ,  
            Numeros_Speciaux2 : Numeros_Speciaux2, 
            App_Info_Conso2 :App_Info_Conso2 , 
            Roaming2 :Roaming2 
        }
        ,
        success: function(response){
            
            CreatePDFfromHTML_TABLE(response,mois,annee)
            
            $('#GlobalfacModal').modal('hide');
           
            Swal.fire({
                title: '<strong><i>Les Anomalies :</i></strong>',
                icon: 'warning',
               
                html:
                response
               ,
              showCloseButton: true,
              focusConfirm: false,
              confirmButtonText:
                'Fermer!',
              confirmButtonAriaLabel: 'Thumbs up, great!',
            })
            formOrder[0].reset();
            
           
        }

    })}

})  





  //searchGSM
  $('#searchGSM').on('click',function(e){
    let formOrder = $('#formOrder');
    var page =  $('#Numpage').val();
    if (formOrder[0].checkValidity()){
        e.preventDefault();
        $.ajax({
            url: 'process.php',
            type: 'post', 
            data: {searchId: page},
            success: function(response){
                let Numinfo = JSON.parse(response);
                var currentYear = (new Date).getFullYear();
                var fonctionnaire = Numinfo.Nom +' '+ Numinfo.Prenom;


                $('#NumGSM').val(Numinfo.LigneGSM);
                $('#Annee').val(currentYear);
                $('#Categorie').val(Numinfo.NumCategorie);
                $('#typecat').val(Numinfo.Typecategorie);
                $('#Abonnement_Optimis').val(Numinfo.D_Abonnement_Optimis);
                    $('#Option_Plafonnement').val(Numinfo.D_Option_Plafonnement);
                    $('#Internet_Mobile').val(Numinfo.D_Internet_Mobile);
                    $('#Option_IntraFlotteSMS').val(Numinfo.D_Option_IntraFlotteSMS);    
                    $('#Annulation_Frais_Plaf').val(Numinfo.R_Annulation_Frais_Plaf);
                    $('#Remise_FM_Internet').val(Numinfo.R_Remise_FM_Internet);
                    $('#Annulation_Frais_IntraFlotteSMS').val(Numinfo.R_Annulation_Frais_IntraFlotteSMS);
                    $('#Reduction_Frais_Abon').val(Numinfo.R_Reduction_Frais_Abon);
                    $('#Numconvention').val(Numinfo.Num_Convention);
                    $('#Nom').val(fonctionnaire);
                    

                    
        $('#Comm_Nat_Mobiles_IAM').val(0);$('#Comm_Nat_Fixes_IAM').val(0);
        $('#Comm_Nat_Autres_Mobiles').val(0);$('#Comm_Nat_Autres_Fixes').val(0); $('#Comm_Internationales').val(0);
        $('#SMS_Mobiles_IAM').val(0);$('#SMS_Autres_Mobiles').val(0);$('#Numeros_Speciaux').val(0);
        $('#App_Info_Conso').val(0);$('#MMS_Mobiles_IAM').val(0);$('#MMS_Email').val(0);$('#MMS_Internationaux').val(0);
        
       $('#Roaming').val(0);$('#SMS_Internationaux').val(0);$('#Montant_DF').val(0),$('#Montant_DF2').val(0),$('#Montant_DF3').val(0); 
    

              
                
               
            }

        })
    
    }})

    //create Ligne GSM
    $('#CreateGSM').on('click',function(e){
        let formOrder = $('#formGSMOrder');

        if (formOrder[0].checkValidity()){
            e.preventDefault();
            Swal.fire({
                title: 'Voulez vous vraiment créer cette ligne GSM?',
                text: "Cette action est irreversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, j\'en suis sur!'
              }).then((result) => {
                if (result.isConfirmed) {
            $.ajax({
                url: 'process.php',
                type: 'post', 
                data: formOrder.serialize() + '&action=ADDGSM',
                success: function(response){
                    $('#GSMModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Succés',
                    })
                    formOrder[0].reset();
                    
                }
            })}
            })}
        })

                 //get Fonction => Fonctionnaire
    $('#Fonctionnairebtn').on('click',function(e){
        $('#idFonction').find("option").remove().end();
        var optionStringG = '<option value=""> Selectionner une Fonction</option>';  
        
            e.preventDefault();
            $.ajax({
                url: 'process.php',
                type: 'post', 
                data: '&action=Fonctionnaire',
                success: function(response){      
                    let infoFonction = JSON.parse(response);
                    infoFonction.forEach(function(infoFonction){
                        optionStringG += '<option value="'+ infoFonction.idFonction + '">' + infoFonction.Libelle_Fonction + '</option>';
                    });
                    $('#idFonction').append(optionStringG);
                    
                    
                }

            })})

                     //get GSM => Affectation
    $('#Affectationbtn').on('click',function(e){
        $('#idLigneGSM_aff').find("option").remove().end();
        var optionStringG = '<option value=""> Selectionner une Ligne GSM</option>';    
        
            e.preventDefault();
            $.ajax({
                url: 'process.php',
                type: 'post', 
                data: '&action=Affectation',
                success: function(response){      
                    let infoAffectation = JSON.parse(response);
                    infoAffectation.forEach(function(infoAffectation){
                        optionStringG += '<option value="'+ infoAffectation.idLigneGSM + '">' + infoAffectation.LigneGSM + '</option>';
                    });
                    $('#idLigneGSM_aff').append(optionStringG);
                    
                    
                }

            })})

                           //get GSM => Page
                                  
    $('#Page').on('click',function(e){
        $('#Ligne_GSM').find("option").remove().end();
        var optionStringG = '<option value=""> Selectionner une Ligne GSM</option>';    
     
            e.preventDefault();
            $.ajax({
                url: 'process.php',
                type: 'post', 
                data: '&action=Page',
                success: function( response){
                    let infoAffectation = JSON.parse(response);
                    infoAffectation.forEach(function(infoAffectation){
                        optionStringG += '<option value="'+ infoAffectation.idLigneGSM + '">' + infoAffectation.LigneGSM + '</option>';
                    });
                        
                        $('#Ligne_GSM').append(optionStringG);
                    
                    
                    
                    
                }

            })})
              //Get Option facture => l'Ajout
            $('.ADD').on('click',function(e){
                $('#idOption_Facture').find("option").remove().end();
                $('#idOption_Facture2').find("option").remove().end();
                $('#idOption_Facture3').find("option").remove().end();
                var optionStringG = '<option value=""> Selectionner une Option</option>';    
             
                    e.preventDefault();
                    $.ajax({
                        url: 'process.php',
                        type: 'post', 
                        data: '&action=Optionfac',
                        success: function( response){
                            let infoAffectation = JSON.parse(response);
                            infoAffectation.forEach(function(infoAffectation){
                                optionStringG += '<option value="'+ infoAffectation.idOption_Facture + '">' + infoAffectation.Libelle_Option_Facture + '</option>';
                            });
                                
                                $('#idOption_Facture').append(optionStringG);
                                $('#idOption_Facture2').append(optionStringG);
                                $('#idOption_Facture3').append(optionStringG);
                                 
                            
                        }
        
                    })})

             //get GSM => Categorie
    $('#Categoriebtn').on('click',function(e){

        $('#idLigneGSM_cat').find("option").remove().end();
        var optionStringG = '<option value=""> Selectionner une Ligne GSM</option>';    
            e.preventDefault();
            $.ajax({
                url: 'process.php',
                type: 'post', 
                data: '&action=CategorieGSM',
                success: function(response){      
                    let info = JSON.parse(response);
                    info.forEach(function(info){
                        optionStringG += '<option value="'+ info.idLigneGSM + '">' + info.LigneGSM + '</option>';
                    });
                    $('#idLigneGSM_cat').append(optionStringG);
                    
                    
                }

            })})
            
             //get Convention => Categorie
    $('#Categoriebtn').on('click',function(e){

        $('#idConvention').find("option").remove().end();
        var optionStringG = '<option value=""> Selectionner une Convention</option>';    
            e.preventDefault();
            $.ajax({
                url: 'process.php',
                type: 'post', 
                data: '&action=CategorieConvention',
                success: function(response){      
                    let info = JSON.parse(response);
                    info.forEach(function(info){
                        optionStringG += '<option value="'+ info.idConvention + '">' + info.Num_Convention + '</option>';
                    });
                    $('#idConvention').append(optionStringG);
                    
                    
                }

            })})

             //get Typecategorie => Categorie
    $('#Categoriebtn').on('click',function(e){

        $('#idTypecategorie').find("option").remove().end();
        var optionStringG = '<option value=""> Selectionner un type de Categorie</option>';    
            e.preventDefault();
            $.ajax({
                url: 'process.php',
                type: 'post', 
                data: '&action=CategorieTypecat',
                success: function(response){      
                    let info = JSON.parse(response);
                    info.forEach(function(info){
                        optionStringG += '<option value="'+ info.idTypecategorie + '">' + info.Typecategorie + '</option>';
                    });
                    $('#idTypecategorie').append(optionStringG);
                    
                    
                }

            })})
            //get Fonctionnaire=> Affectation
    $('#Affectationbtn').on('click',function(e){
       
        $('#idFonctionnaire_aff').find("option").remove().end();
        var optionStringF = '<option value=""> Selectionner un Fonctionnaire</option>';    
            e.preventDefault();
            $.ajax({
                url: 'process.php',
                type: 'post', 
                data: '&action=Affectation2',
                success: function(response){      
                    let infoAffectation = JSON.parse(response);
                    infoAffectation.forEach(function(infoAffectation){
                        optionStringF += '<option value="'+ infoAffectation.idFonctionnaire + '">' + infoAffectation.Nom + ' ' + infoAffectation.Prenom + '</option>';

                    });
                    $('#idFonctionnaire_aff').append(optionStringF);
                    
                }

            })})



             //créer un fonctionnaire
    $('#CreateFonctionnaire').on('click',function(e){
        let formOrder = $('#formFonctionnaireOrder');

        if (formOrder[0].checkValidity()){
            e.preventDefault();
            Swal.fire({
                title: 'Voulez vous vraiment créer ce fonctionnaire?',
                text: "Cette action est irreversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, j\'en suis sur!'
              }).then((result) => {
                if (result.isConfirmed) {
            $.ajax({
                url: 'process.php',
                type: 'post', 
                data: formOrder.serialize() + '&action=ADDFonctionnaire',
                success: function(response){
                    
                    $('#FonctionnaireModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Succés',
                    })
                    formOrder[0].reset();
                    
                }

            })}
        })}
        })
             //créer une Page
    $('#CreatePage').on('click',function(e){
        let formOrder = $('#formPageOrder');

        if (formOrder[0].checkValidity()){
            e.preventDefault();
            Swal.fire({
                title: 'Voulez vous vraiment créer cette page?',
                text: "Cette action est irreversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, j\'en suis sur!'
              }).then((result) => {
                if (result.isConfirmed) {
            $.ajax({
                url: 'process.php',
                type: 'post', 
                data: formOrder.serialize() + '&action=ADDPage',
                success: function(response){
                    
                    $('#PageModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Succés',
                    })
                    formOrder[0].reset();
                    
                }

            })}
        })}
        })

                      //créer une Option facture
    $('#CreateOptionfac').on('click',function(e){
        let formOrder = $('#formOptionfacOrder');

        if (formOrder[0].checkValidity()){
            e.preventDefault();
            Swal.fire({
                title: 'Voulez vous vraiment créer cette option?',
                text: "Cette action est irreversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, j\'en suis sur!'
              }).then((result) => {
                if (result.isConfirmed) {
            $.ajax({
                url: 'process.php',
                type: 'post', 
                data: formOrder.serialize() + '&action=ADDOptionfac',
                success: function(response){
                    
                    $('#OptionfacModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Succés',
                    })
                    formOrder[0].reset();
                    
                }

            })}
        })}
        })
               //créer une affectation ligne
    $('#CreateAffectation').on('click',function(e){
        let formOrder = $('#formAffectationOrder');

        if (formOrder[0].checkValidity()){
            e.preventDefault();
            Swal.fire({
                title: 'Voulez vous vraiment affecter cette ligne?',
                text: "Cette action est irreversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, j\'en suis sur!'
              }).then((result) => {
                if (result.isConfirmed) {
            $.ajax({
                url: 'process.php',
                type: 'post', 
                data: formOrder.serialize() + '&action=ADDAffectation',
                success: function(response){
                    
                    $('#AffectationModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Succés',
                    })
                    formOrder[0].reset();
                    
                }

            })}
        })}
        })

              //créer une Categorie
    $('#CreateCategorie').on('click',function(e){
        let formOrder = $('#formCategorieOrder');

        if (formOrder[0].checkValidity()){
            e.preventDefault();
            Swal.fire({
                title: 'Voulez vous vraiment créer cette catégorie?',
                text: "Cette action est irreversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, j\'en suis sur!'
              }).then((result) => {
                if (result.isConfirmed) {
            $.ajax({
                url: 'process.php',
                type: 'post', 
                data: formOrder.serialize() + '&action=ADDCategorie',
                success: function(response){
                    
                    $('#CategorieModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Succés',
                    })
                    formOrder[0].reset();
                    
                }

            })}
        })}
        })







        //recupérer un seul facture avec modification
        $('body').on('click','.editBtn', function(e){
            e.preventDefault();
            
            $.ajax({
                url: 'process.php',
                type: 'post',
                data: {workingId: this.dataset.id },
                success: function(response){
                    let billInfo = JSON.parse(response);
                    $('#NumpageUpdate').val(billInfo.Numpage);
                    $('#AnneeUpdate').val(billInfo.Annee);
                    $('#MoisUpdate').val(billInfo.Mois);
                    $('#Comm_Nat_Mobiles_IAM_Update').val(billInfo.Comm_Nat_Mobiles_IAM);
                    $('#Comm_Nat_Fixes_IAM_Update').val(billInfo.Comm_Nat_Fixes_IAM);
                    $('#Comm_Nat_Autres_Mobiles_Update').val(billInfo.Comm_Nat_Autres_Mobiles);
                    $('#Comm_Nat_Autres_Fixes_Update').val(billInfo.Comm_Nat_Autres_Fixes);
                    $('#Comm_Internationales_Update').val(billInfo.Comm_Internationales);
                    $('#App_Info_Conso_Update').val(billInfo.App_Info_Conso);
                    $('#Numeros_Speciaux_Update').val(billInfo.Numeros_Speciaux);
                    $('#SMS_Mobiles_IAM_Update').val(billInfo.SMS_Mobiles_IAM);
                    $('#SMS_Autres_Mobiles_Update').val(billInfo.SMS_Autres_Mobiles);
                    $('#SMS_Internationaux_Update').val(billInfo.SMS_Internationaux);
                    $('#MMS_Mobiles_IAM_Update').val(billInfo.MMS_Mobiles_IAM);
                    $('#MMS_Email_Update').val(billInfo.MMS_Email);
                    $('#MMS_Internationaux_Update').val(billInfo.MMS_Internationaux);
                    $('#Roaming_Update').val(billInfo.Roaming);
                    $('#Abonnement_Optimis_Update').val(billInfo.Abonnement_Optimis);
                    $('#Option_IntraFlotteSMS_Update').val(billInfo.Option_IntraFlotteSMS);
                    $('#Internet_Mobile_Update').val(billInfo.Internet_Mobile);
                    $('#Option_Plafonnement_Update').val(billInfo.Option_Plafonnement);
                    $('#Reduction_Frais_Abon_Update').val(billInfo.Reduction_Frais_Abon);
                    $('#Remise_FM_Internet_Update').val(billInfo.Remise_FM_Internet);
                    $('#Annulation_Frais_IntraFlotteSMS_Update').val(billInfo.Annulation_Frais_IntraFlotteSMS);
                    $('#Annulation_Frais_Plaf_Update').val(billInfo.Annulation_Frais_Plaf);
                    $('#Montant_Facture_Update').val(billInfo.Montant_Facture);
                    $('#Somme_Update').val(billInfo.Montant_Facture);
                    $('#CategorieUpdate').val(billInfo.NumCategorie);
                    $('#NumGSMUpdate').val(billInfo.LigneGSM);
                    $('#NumconventionUpdate').val(billInfo.Num_Convention);
                    $('#typecatUpdate').val(billInfo.Typecategorie);
                    $('#NomUpdate').val(billInfo.Nom+ " " + billInfo.Prenom);
                    
                    
                    
                }
            })

        })
         //recupérer un seul facture avec modification
         $('body').on('click','.editBtn', function(e){
            e.preventDefault();
            
            $.ajax({
                url: 'process.php',
                type: 'post',
                data: {workingId2: this.dataset.id},
                success: function(response){
                    let billInfo = JSON.parse(response);
                 
                    $('#Option_Facture_Update').val(billInfo.idOption_Facture);
                    $('#Montant_DF_Update').val(billInfo.Montant_DF);
                    $('#Signe_DF_Update').val(billInfo.Signe_DF);
                    
                    
                    
                }
            })

        })
       

         //update 
         $('#update').on('click',function(e){

            let formOrder = $('#formUpdateOrder')
            if (formOrder[0].checkValidity()){
                e.preventDefault();

                $montant_df =  $('#Montant_DF_Update').val();
                if (($montant_df == null ) || ($montant_df == '') ){
                    $montant_df = 0;
                }
                var Total =  $('#Montant_Facture_Update').val();
                var somme =  parseFloat( $('#Abonnement_Optimis_Update').val()) + parseFloat( $('#Option_Plafonnement_Update').val()) + parseFloat( $('#Internet_Mobile_Update').val())
                + parseFloat( $('#Option_IntraFlotteSMS_Update').val())+ parseFloat( $('#Comm_Nat_Mobiles_IAM_Update').val())+ parseFloat( $('#Comm_Nat_Fixes_IAM_Update').val())
                + parseFloat( $('#Comm_Nat_Autres_Mobiles_Update').val())+ parseFloat( $('#Comm_Nat_Autres_Fixes_Update').val())+ parseFloat( $('#Comm_Internationales_Update').val())
                + parseFloat( $('#SMS_Mobiles_IAM_Update').val())+ parseFloat( $('#SMS_Autres_Mobiles_Update').val())+ parseFloat( $('#Numeros_Speciaux_Update').val())
                + parseFloat( $('#App_Info_Conso_Update').val())+ parseFloat( $('#MMS_Mobiles_IAM_Update').val())+ parseFloat( $('#MMS_Email_Update').val())+ parseFloat( $('#MMS_Internationaux_Update').val())
                + parseFloat( $('#Annulation_Frais_Plaf_Update').val())+ parseFloat( $('#Remise_FM_Internet_Update').val())+ parseFloat( $('#Annulation_Frais_IntraFlotteSMS_Update').val())
                + parseFloat( $('#Reduction_Frais_Abon_Update').val())+ parseFloat( $('#Roaming_Update').val())+ parseFloat( $('#SMS_Internationaux_Update').val()) + parseFloat($montant_df) ;
                
                       
                if ( somme.toFixed(2) ==  Total){

                $.ajax({
                    url: 'process.php',
                    type: 'post', 
                    data: formOrder.serialize() + '&action=update',
                    success: function(response){
                        $('#updateModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Succés',
                        })
                        formOrder[0].reset();
                        getBills()
                        
                     
                        
                    }

                })}
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: "Le montant total n'est pas égal au montant de la facture! " + somme.toFixed(2),
                    })

                  }
            }
        })

       
        

        //infomationshow
        $('body').on('click','.infoBtn', function(e){
            e.preventDefault();
            $.ajax({
                url:'process.php',
                type:'post',
                data: {informationId: this.dataset.id},
                success: function(response){
                    let informations = JSON.parse(response);
                    Swal.fire({
                        title: `<strong>Information de la facture N: ${informations.Numpage}</strong>`,
                        icon: 'info',
                        html:
                          `Numero de la Page: <b>${informations.Numpage}.</b><br>
                          Année: <b>${informations.Annee}.</b><br>
                          Mois: <b>${informations.Mois}.</b><br>
                          Option optimis: <b>${informations.Abonnement_Optimis}.</b><br>
                          Option plafonnement: <b>${informations.Option_Plafonnement}.</b><br> 
                          Communication Nat vers Mobiles IAM: <b>${informations.Comm_Nat_Mobiles_IAM}.</b><br>
                          Internet Mobile MAX: <b>${informations.Internet_Mobile}gb</b><br>
                          SMS vers Mobile IAM: <b>${informations.SMS_Mobiles_IAM}.</b><br>
                          Option intra flotte: <b>${informations.Option_IntraFlotteSMS}.</b><br>
                          Annulation frais 3G: <b>${informations.Remise_FM_Internet}.</b><br>
                          Annulation frais SMS: <b>${informations.Annulation_Frais_IntraFlotteSMS}.</b><br>
                          Reduction FA: <b>${informations.Reduction_Frais_Abon}.</b><br>
                          le MontantFacture: <b>${informations.Montant_Facture} DH</b><br>
                          
                          `,
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                          '<i class="fa fa-thumbs-up"></i> Super!',
                        confirmButtonAriaLabel: 'Thumbs up, great!',
                      })
                }
            })

        })

        //delete 
         $('body').on('click','.deleteBtn', function(e){
            e.preventDefault();
                Swal.fire({
                title: 'Vous allez supprimer la facture N°' + this.dataset.id + ' du mois '+ this.dataset.mois + ' ' + this.dataset.date,
                text: "Cette action est irreversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, j\'en suis sur!'
              }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'process.php',
                        type: 'post', 
                        data: { deletionId: this.dataset.id},
                        success: function(response){
                            if ( response == 1){
                                Swal.fire(
                                    'Suppression!',
                                    'Opération réussie.',
                                    'success'
                                  )
                                  getBills();
                            }
                        }
                    })
                 
                }
              })
           

         })

          //Login
  $('#login').on('click',function(e){
    var username =  $('#Username').val();
    var password =  $('#Password').val();
        e.preventDefault();
        $.ajax({
            url: 'process.php',
            type: 'post', 
            data: '&action=login',
            success: function(response){
                let logs = JSON.parse(response);
                for (var i = 0; i < logs.length; i++) {
                     if(logs[i].username == username && logs[i].password == password){
                    window.location.href='index.php?'+ logs[i].type_user;
                    break;
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        text: "Nom d'utilisateur ou Mot de passe incorrect.",
                    })
                }
                  }

               

                
               
                
               
            }

        })
    
    })

        
       

        

})