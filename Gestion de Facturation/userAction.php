<?php
// Start session
if (!session_id()) {
    session_start();
}
require_once 'dbConfig.php';
$redirectURL = 'index.php?admin#';

if (isset($_REQUEST['action_type']) && !empty($_GET['id'])) {
    $idFonctionnaire = $_GET['id'];

    if ($_REQUEST['action_type'] == 'deletefonctionnaire') {
        try {
            // Vérifier s'il existe une association avec la table "affectation_ligne"
            $sqlCheckFonctionnaire = "SELECT COUNT(*) FROM affectation_ligne WHERE idFonctionnaire = ?";
            $queryCheckFonctionnaire = $conn->prepare($sqlCheckFonctionnaire);
            $queryCheckFonctionnaire->execute(array($idFonctionnaire));
            $countFonctionnaire = $queryCheckFonctionnaire->fetchColumn();

            if ($countFonctionnaire > 0) {
                // Le fonctionnaire est lié à une facture, impossible de le supprimer
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Impossible de supprimer le fonctionnaire car il est associé à une facture.';
            } else {
                // Supprimer le fonctionnaire car il n'est pas lié à une facture
                $sql = "DELETE FROM fonctionnaire WHERE idFonctionnaire = ?";
                $query = $conn->prepare($sql);
                $delete = $query->execute(array($idFonctionnaire));

                if ($delete) {
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'Le fonctionnaire a été supprimé avec succès.';
                    header("Location: index.php?admin#");
                } else {
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Erreur lors de la suppression du fonctionnaire.';
                }
            }
        } catch (PDOException $e) {
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Erreur lors de la suppression du fonctionnaire.';
        }
    }
}
if (isset($_REQUEST['action_type']) && !empty($_GET['id'])) {
    $idOptionFacture = $_GET['id'];

    if ($_REQUEST['action_type'] == 'deleteoption') {
        try {
            $sql = "DELETE FROM option_facture WHERE idOption_Facture = ?";
            $query = $conn->prepare($sql);
            $delete = $query->execute(array($idOptionFacture));

            if ($delete) {
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'L\'option a été supprimée avec succès.';
                header("Location: index.php?admin#");
            } else {
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Erreur lors de la suppression de l\'option.';
            }
        } catch (PDOException $e) {
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Erreur lors de la suppression de l\'option.';
        }
    }
}
if (isset($_REQUEST['action_type']) && !empty($_GET['id'])) {
    $idLigneGSM = $_GET['id'];

    if ($_REQUEST['action_type'] == 'deleteaffectation') {
        try {
            $sqlCheckFacture = "SELECT COUNT(*) FROM facture f
                                INNER JOIN page p on f.Numpage=p.Numpage
                                INNER JOIN affectation_ligne al ON p.idLigneGSM = al.idLigneGSM
                                WHERE al.idLigneGSM = ?";
            $queryCheckFacture = $conn->prepare($sqlCheckFacture);
            $queryCheckFacture->execute(array($idLigneGSM));
            $countFactures = $queryCheckFacture->fetchColumn();

            if ($countFactures > 0) {
                // L'affectation est associée à une facture, impossible de la supprimer
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Impossible de supprimer l\'affectation car elle est associée à une facture.';
            } else {
                // Supprimer l'affectation car elle n'est pas associée à une facture
                $sql = "DELETE FROM affectation_ligne WHERE idLigneGSM = ?";
                $query = $conn->prepare($sql);
                $delete = $query->execute(array($idLigneGSM));

                if ($delete) {
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'L\'affectation a été supprimée avec succès.';
                    header("Location: index.php?admin#"); // Rediriger vers la page d'administration ou une autre page appropriée
                } else {
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Erreur lors de la suppression.';
                }
            }
        } catch (PDOException $e) {
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Impossible de supprimer cette affectation car elle est associée à une facture.';
        }
    }
}


if (isset($_REQUEST['action_type']) && !empty($_GET['id'])) {
    $idLigneGSM = $_GET['id'];

    if ($_REQUEST['action_type'] == 'deletepage') {
        $sqlCheckLigneGSM = "SELECT COUNT(*) FROM facture WHERE Numpage = ?";
        $queryCheckLigneGSM = $conn->prepare($sqlCheckLigneGSM);
        $queryCheckLigneGSM->execute(array($idLigneGSM));
        $countLigneGSM = $queryCheckLigneGSM->fetchColumn();
        if ($countLigneGSM > 0) {
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Impossible de supprimer la page car elle est associée à une facture.';
        } else {
            try {
               
                $sql = "DELETE FROM page WHERE idLigneGSM = ?";
                $query = $conn->prepare($sql);
                $delete = $query->execute(array($idLigneGSM));

                if ($delete) {
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'La page a été supprimée avec succès.';
                    header("Location: index.php?admin#"); 
                } else {
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Erreur lors de la suppression.';
                }
            } catch (PDOException $e) {
                
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Impossible de supprimer la page car elle est associée à une facture.';
            }}}}
if (isset($_REQUEST['action_type']) && !empty($_GET['id'])) {
    $idLigneGSM = $_GET['id'];

    if ($_REQUEST['action_type'] == 'deletecategorie') {
        
        $sqlCheckLigneGSM = "SELECT COUNT(*) FROM facture f
                                INNER JOIN page p on f.Numpage = p.Numpage
                                INNER JOIN categorie c ON p.idLigneGSM = c.idLigneGSM
                                WHERE c.idLigneGSM = ?";
        $queryCheckLigneGSM = $conn->prepare($sqlCheckLigneGSM);
        $queryCheckLigneGSM->execute(array($idLigneGSM));
        $countLigneGSM = $queryCheckLigneGSM->fetchColumn();

        if ($countLigneGSM > 0) {
           
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Impossible de supprimer la catégorie car elle est associée à une facture.';
        } else {
            try {
                
                $sql = "DELETE FROM categorie WHERE idLigneGSM = ?";
                $query = $conn->prepare($sql);
                $delete = $query->execute(array($idLigneGSM));

                if ($delete) {
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'La categorie a été supprimée avec succès.';
                    header("Location: index.php?admin#"); 
                } else {
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Erreur lors de la suppression.';
                }
            } catch (PDOException $e) {
               
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Impossible de supprimer la catégorie. Veuillez vérifier s\'il y a des dépendances.';
            }}}}
if (($_REQUEST['action_type'] == 'delete') && !empty($_GET['id'])) {
    $idLigneGSM = $_GET['id'];
    try {

        $sql = "DELETE FROM lignegsm WHERE idLigneGSM = ?";
        $query = $conn->prepare($sql);
        $delete = $query->execute(array($idLigneGSM));
        if ($delete) {
            $sessData['status']['type'] = 'success';
            $sessData['status']['msg'] = 'LigneGSM a été supprimé avec succès.';
            header("Location: index.php?admin#");
        } else {
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Erreur lors de la suppression.';
        }
    } catch (PDOException $e) {
      
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Impossible de supprimer la ligne GSM. Veuillez vérifier s\'il y a des dépendances.';
    }

}

$_SESSION['sessData'] = $sessData;
?>



<?php

if (isset($sessData['status']['type']) && $sessData['status']['type'] == 'error') {
    echo '<div class="error-message">' . $sessData['status']['msg'] . '<span class="close-button" onclick="closeErrorMessage()">&times;</span></div>';
}
?>

<style>
    .error-message {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #f44336;
        color: white;
        padding: 20px;
        font-size: 24px;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 9999;
    }

    .close-button {
        float: right;
        font-size: 30px;
        font-weight: bold;
        cursor: pointer;
    }
</style>

<script>
    function closeErrorMessage() {
        
        window.location.href = 'index.php?admin#';
    }
</script>




