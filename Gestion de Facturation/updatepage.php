<?php
include "dbConfig.php";
$Numpage = "";
$Annee = "";
$idLigneGSM = "";
$idLigneGSM_associated = ""; 

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
        header("Location: http://localhost/dde/index.php?admin#");
        exit;
    }
    $id = $_GET['id'];
    $sql = "SELECT p.*, l.LigneGSM FROM page p
            LEFT JOIN lignegsm l ON p.idLigneGSM = l.idLigneGSM
            WHERE p.idLigneGSM = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        header("Location: http://localhost/dde/index.php?admin#");
        exit;
    }
    $Numpage = $row["Numpage"];
    $Annee = $row["Annee"];
    $idLigneGSM = $row["idLigneGSM"];
    $idLigneGSM_associated = $row["LigneGSM"]; // Storing the associated LigneGSM
} else {
    $id = $_POST["id"];
    $Numpage = $_POST["Numpage"];
    $Annee = $_POST["Annee"];
    $idLigneGSM = isset($_POST["idLigneGSM"]) ? $_POST["idLigneGSM"] : '';

    $sql = "UPDATE page SET Numpage = :Numpage, Annee = :Annee WHERE idLigneGSM = :id";

    $stmt = $conn->prepare($sql);
    $params = array(
        ':Numpage' => $Numpage,
        ':Annee' => $Annee,
        ':id' => $id
    );

    if ($stmt->execute($params)) {
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
    <title>Modification Page</title>

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
                    <h1 class="text-white text-center">Modifier la page</h1>
                </div><br>

                <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"> <br>

                <label class="form-label">Numéro de page:</label>
                <input type="text" name="Numpage" value="<?php echo $Numpage; ?>" class="form-control"> <br>

                <label class="form-label">Année:</label>
                <input type="text" name="Annee" value="<?php echo $Annee; ?>" class="form-control"> <br>

                <label class="form-label">LigneGSM associé:</label>
                <input type="text" value="<?php echo $idLigneGSM_associated; ?>" class="form-control" readonly> <br>

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
