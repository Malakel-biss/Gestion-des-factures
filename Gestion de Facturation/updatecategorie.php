<?php
include "dbConfig.php";
$NumCategorie = "";
$Annee = "";
$idLigneGSM = "";
$idConvention = "";
$idTypecategorie = "";
$Montant_Forfait = "";
$Montant_Dotation = "";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
        header("Location: http://localhost/dde/index.php?admin#");
        exit;
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM categorie WHERE idLigneGSM = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        header("Location: http://localhost/dde/index.php?admin#");
        exit;
    }
    $NumCategorie = $row["NumCategorie"];
    $Annee = $row["Annee"];
    $idLigneGSM = $row["idLigneGSM"];
    $idConvention = $row["idConvention"];
    $idTypecategorie = $row["idTypecategorie"];
    $Montant_Forfait = $row["Montant_Forfait"];
    $Montant_Dotation = $row["Montant_Dotation"];
} else {
    $id = $_POST["id"];
    $NumCategorie = $_POST["NumCategorie"];
    $Annee = $_POST["Annee"];
    $idLigneGSM = $_POST["idLigneGSM"];
    $idConvention = $_POST["idConvention"];
    $idTypecategorie = $_POST["idTypecategorie"];
    $Montant_Forfait = $_POST["Montant_Forfait"];
    $Montant_Dotation = $_POST["Montant_Dotation"];

    $sql = "UPDATE categorie SET NumCategorie = :NumCategorie, Annee = :Annee, idConvention = :idConvention, idTypecategorie = :idTypecategorie, Montant_Forfait = :Montant_Forfait, Montant_Dotation = :Montant_Dotation WHERE idLigneGSM = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':NumCategorie', $NumCategorie, PDO::PARAM_STR);
    $stmt->bindParam(':Annee', $Annee, PDO::PARAM_STR);
    $stmt->bindParam(':idConvention', $idConvention, PDO::PARAM_INT);
    $stmt->bindParam(':idTypecategorie', $idTypecategorie, PDO::PARAM_INT);
    $stmt->bindParam(':Montant_Forfait', $Montant_Forfait, PDO::PARAM_STR);
    $stmt->bindParam(':Montant_Dotation', $Montant_Dotation, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $success = "Data updated successfully.";
        header("Location: index.php?admin#");
        exit;
    } else {
        $error = "Error updating data.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modification Catégorie</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        .card-header {
            background-color: blue;
        }
        .form-label {
            background-color: #f0f0f0; 
            font-weight: bold; 
            padding: 5px 10px; 
            margin-bottom: 0; 
        }

        .form-group .form-control + .form-control {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="col-lg-6 m-auto">
        <form method="post">
            <br><br>
            <div class="card">
                <div class="card-header">
                    <h1 class="text-white text-center">Modifier la catégorie</h1>
                </div><br>

                <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"> <br>

                <label class="form-label">Numéro de catégorie:</label>
                <input type="text" name="NumCategorie" value="<?php echo $NumCategorie; ?>" class="form-control"> <br>

                <label class="form-label">Année:</label>
                <input type="text" name="Annee" value="<?php echo $Annee; ?>" class="form-control"> <br>

                <label class="form-label">Convention:</label>
                
                <select name="idConvention" class="form-control">
                    <option value="">Sélectionner une convention</option>
                    <?php
                   
                    $sql = "SELECT idConvention, Num_Convention FROM convention";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $conventions = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($conventions as $convention) {
                        $selected = ($convention['idConvention'] == $idConvention) ? 'selected' : '';
                        echo '<option value="' . $convention['idConvention'] . '" ' . $selected . '>' . $convention['Num_Convention'] . '</option>';
                    }
                    ?>
                </select>
                <label class="form-label">Type de catégorie:</label>
           
                <select name="idTypecategorie" class="form-control">
                    <option value="">Sélectionner un type de catégorie</option>
                    <?php
               
                    $sql = "SELECT idTypecategorie, Typecategorie FROM typecategorie";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $typecategories = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($typecategories as $typecategorie) {
                        $selected = ($typecategorie['idTypecategorie'] == $idTypecategorie) ? 'selected' : '';
                        echo '<option value="' . $typecategorie['idTypecategorie'] . '" ' . $selected . '>' . $typecategorie['Typecategorie'] . '</option>';
                    }
                    ?>
                </select>

                <label class="form-label">Montant Forfait:</label>
                <input type="text" name="Montant_Forfait" value="<?php echo $Montant_Forfait; ?>" class="form-control"> <br>

                <label class="form-label">Montant Dotation:</label>
                <input type="text" name="Montant_Dotation" value="<?php echo $Montant_Dotation; ?>" class="form-control"> <br>

                <button class="btn btn-success" type="submit" name="submit" href="index.php?admin#"> Enregistrer </button><br>
                <a class="btn btn-info" type="submit" name="cancel" href="index.php?admin#"> Annuler </a><br>

            </div>
        </form>
    </div>
</body>
</html>
<?php if (!empty($success)) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $success; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<script>
    $(document).ready(function() {
        $(".alert").delay(5000).slideUp(200, function() {
            $(this).alert('close');
        });
    });
</script>
