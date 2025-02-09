<?php
include "dbConfig.php";
$id = "";
$LigneGSM = "";
$Code_Pin = "";
$Code_Punk = "";
$idstatutligne="";

$error = "";
$success = "";


if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
        header("Location: http://localhost/dde/index.php?admin#");
        exit;
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM lignegsm WHERE idLigneGSM = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        header("Location: http://localhost/dde/index.php?admin#");
        exit;
    }
    $LigneGSM = $row["LigneGSM"];
    $Code_Pin = $row["Code_Pin"];
    $Code_Punk= $row["Code_Punk"];
    $idstatutligne= $row["idstatutligne"];
} else {
    $id = $_POST["id"];
    $LigneGSM = $_POST["LigneGSM"];
    $Code_Pin= $_POST["Code_Pin"];
    $Code_Punk= $_POST["Code_Punk"];
    $idstatutligne= $_POST["idstatutligne"];
    $sql = "UPDATE lignegsm SET LigneGSM= :LigneGSM,Code_Pin = :Code_Pin,Code_Punk = :Code_Punk,idstatutligne = :idstatutligne WHERE idLigneGSM = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':LigneGSM', $LigneGSM, PDO::PARAM_STR);
        $stmt->bindParam(':Code_Pin', $Code_Pin, PDO::PARAM_STR);
        $stmt->bindParam(':Code_Punk', $Code_Punk, PDO::PARAM_STR);
        $stmt->bindParam(':idstatutligne', $idstatutligne, PDO::PARAM_INT); 
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
    <title>Modification Ligne GSM</title>

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
    </style>
</head>
<body>
    <div class="col-lg-6 m-auto">
        <form method="post">
            <br><br>
            <div class="card">
                <div class="card-header">
                    <h1 class="text-white text-center">Modifier la ligne GSM</h1>
                </div><br>

                <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"> <br>

                <label class="form-label">LigneGSM:</label>
                <input type="text" name="LigneGSM" value="<?php echo $LigneGSM; ?>" class="form-control"> <br>

                <label class="form-label">Code_Pin:</label>
                <input type="text" name="Code_Pin" value="<?php echo $Code_Pin; ?>" class="form-control"> <br>

                <label class="form-label">Code_Punk:</label>
                <input type="text" name="Code_Punk" value="<?php echo $Code_Punk; ?>" class="form-control"> <br>

                <label class="form-label">Statut:</label>
                <select name="idstatutligne" class="form-control">
                    <option value="">Sélectionner un type</option>
                    <option value="1" <?php if ($idstatutligne == 1) echo "selected"; ?>>Actif</option>
                    <option value="2" <?php if ($idstatutligne == 2) echo "selected"; ?>>Désactivé</option>
                    <option value="3" <?php if ($idstatutligne == 3) echo "selected"; ?>>Résilié</option>
                    <option value="4" <?php if ($idstatutligne == 4) echo "selected"; ?>>Transféré</option>
                </select>
                <br>

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
