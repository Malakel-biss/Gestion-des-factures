<?php

if (!session_id()) {
    session_start();
}

if (!isset($_SESSION['sessData'])) {
    $_SESSION['sessData'] = array();
}

require_once 'dbConfig.php';
$redirectURL = 'index.php?admin#';

$LibelleOption = "";
$idOptionFacture = "";
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
        header("Location: $redirectURL");
        exit;
    }
    $idOptionFacture = $_GET['id'];
    $sql = "SELECT * FROM option_facture WHERE idOption_Facture = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $idOptionFacture, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        header("Location: $redirectURL");
        exit;
    }
    $LibelleOption = $row["Libelle_Option_Facture"];
} else {
    $idOptionFacture = $_POST["idOptionFacture"];
    $LibelleOption = $_POST["LibelleOption"];

    $sql = "UPDATE option_facture SET Libelle_Option_Facture = :LibelleOption WHERE idOption_Facture = :idOptionFacture";

    $stmt = $conn->prepare($sql);
    $params = array(
        ':LibelleOption' => $LibelleOption,
        ':idOptionFacture' => $idOptionFacture
    );

    if ($stmt->execute($params)) {
        $success = "Données mises à jour avec succès.";
        header("Location: $redirectURL");
        exit;
    } else {
        $error = "Erreur lors de la mise à jour des données.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modification Option Facture</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h1>Modifier l'option de facture</h1>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <input type="hidden" name="idOptionFacture" value="<?php echo $idOptionFacture; ?>" class="form-control">

                            <div class="form-group">
                                <label class="form-label">Libellé de l'option:</label>
                                <input type="text" name="LibelleOption" value="<?php echo $LibelleOption; ?>" class="form-control">
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-success" type="submit" name="submit">Enregistrer</button>
                                <a class="btn btn-info" href="<?php echo $redirectURL; ?>">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (!empty($success)) { ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <?php echo $success; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

