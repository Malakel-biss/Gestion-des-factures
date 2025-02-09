<?php

if (!session_id()) {
    session_start();
}

if (!isset($_SESSION['sessData'])) {
    $_SESSION['sessData'] = array();
}

require_once 'dbConfig.php';
$redirectURL = 'index.php?admin#';

$idFonctionnaire = "";
$Nom = "";
$Prenom = "";
$idFonction = "";
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
        header("Location: $redirectURL");
        exit;
    }
    $idFonctionnaire = $_GET['id'];
    $sql = "SELECT * FROM fonctionnaire WHERE idFonctionnaire = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $idFonctionnaire, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        header("Location: $redirectURL");
        exit;
    }
    $Nom = $row["Nom"];
    $Prenom = $row["Prenom"];
    $idFonction = $row["idFonction"];
} else {
    $idFonctionnaire = $_POST["idFonctionnaire"];
    $Nom = $_POST["Nom"];
    $Prenom = $_POST["Prenom"];
    $idFonction = $_POST["idFonction"];

    $sql = "UPDATE fonctionnaire SET Nom = :Nom, Prenom = :Prenom, idFonction = :idFonction WHERE idFonctionnaire = :idFonctionnaire";

    $stmt = $conn->prepare($sql);
    $params = array(
        ':Nom' => $Nom,
        ':Prenom' => $Prenom,
        ':idFonction' => $idFonction,
        ':idFonctionnaire' => $idFonctionnaire
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
    <title>Modification Fonctionnaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h1>Modifier un fonctionnaire</h1>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <input type="hidden" name="idFonctionnaire" value="<?php echo $idFonctionnaire; ?>" class="form-control">

                            <div class="form-group">
                                <label class="form-label">Nom:</label>
                                <input type="text" name="Nom" value="<?php echo $Nom; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Prénom:</label>
                                <input type="text" name="Prenom" value="<?php echo $Prenom; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Fonction:</label>
                                <!-- Assuming you have a function to fetch the list of functions from the database -->
                                <select name="idFonction" class="form-control">
                                    <?php
                                    $sql = "SELECT * FROM fonction";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    $fonctions = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($fonctions as $fonction) {
                                        $selected = ($fonction['idFonction'] == $idFonction) ? 'selected' : '';
                                        echo '<option value="' . $fonction['idFonction'] . '" ' . $selected . '>' . $fonction['Libelle_Fonction'] . '</option>';
                                    }
                                    ?>
                                </select>
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
