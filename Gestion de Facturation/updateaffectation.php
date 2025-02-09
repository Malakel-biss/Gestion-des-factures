<?php
include "dbConfig.php";
$idLigneGSM = "";
$DateDebut = "";
$DateFin = "";

$idFonctionnaireAssociated = "";
$LigneGSMAssociated = "";

$error = "";
$success = "";

function getNomFonctionnaire($conn, $idFonctionnaire)
{
    $sql = "SELECT Nom FROM fonctionnaire WHERE idFonctionnaire = :idFonctionnaire";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idFonctionnaire', $idFonctionnaire, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['Nom'] : '';
}

function getLigneGSM($conn, $idLigneGSM)
{
    $sql = "SELECT LigneGSM FROM lignegsm WHERE idLigneGSM = :idLigneGSM";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idLigneGSM', $idLigneGSM, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['LigneGSM'] : '';
}

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
        header("Location: http://localhost/dde/index.php?admin#");
        exit;
    }
    $idLigneGSM = $_GET['id'];
    $sql = "SELECT * FROM affectation_ligne WHERE idLigneGSM = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $idLigneGSM, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        header("Location: http://localhost/dde/index.php?admin#");
        exit;
    }
    $DateDebut = $row["Date_Debut"];
    $DateFin = $row["Date_Fin"];

    $idFonctionnaireAssociated = getNomFonctionnaire($conn, $row['idFonctionnaire']);
    $LigneGSMAssociated = getLigneGSM($conn, $idLigneGSM);
} else {
    $idLigneGSM = $_POST["id"];
    $DateDebut = $_POST["DateDebut"];
    $DateFin = $_POST["DateFin"];

    $sql = "UPDATE affectation_ligne SET Date_Debut = :DateDebut, Date_Fin = :DateFin WHERE idLigneGSM = :id";

    $stmt = $conn->prepare($sql);
    $params = array(
        ':DateDebut' => $DateDebut,
        ':DateFin' => $DateFin,
        ':id' => $idLigneGSM
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
    <title>Modifier l'affectation</title>

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
                    <h1 class="text-white text-center">Modifier l'affectation</h1>
                </div><br>

                <input type="hidden" name="id" value="<?php echo $idLigneGSM; ?>" class="form-control"> <br>
                 
                <label class="form-label">Fonctionnaire associé:</label>
                <input type="text" value="<?php echo $idFonctionnaireAssociated; ?>" class="form-control" readonly> <br>

                <label class="form-label">LigneGSM associé:</label>
                <input type="text" value="<?php echo $LigneGSMAssociated; ?>" class="form-control" readonly> <br>

                <label class="form-label">Date Début:</label>
                <input type="text" name="DateDebut" value="<?php echo $DateDebut; ?>" class="form-control"> <br>

                <label class="form-label">Date Fin:</label>
                <input type="text" name="DateFin" value="<?php echo $DateFin; ?>" class="form-control"> <br>

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
