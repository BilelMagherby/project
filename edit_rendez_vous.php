<?php require_once("partials/header.php"); ?>
<section id="hero" class="hero d-flex align-items-center">

<div class="container">
  <div class="row">
    <div class="col-lg-12 d-flex flex-column justify-content-center">
      <h1 data-aos="fade-up">Liste des rendez_vous</h1>
      <div data-aos="fade-up" data-aos-delay="600">
      <nav class="navbar navbar-light bg-light justify-content-between">
<a class="navbar-brand"></a>
</nav>
<?php
    require_once('connexion/connexion.php');

    if (isset($_GET['Id'])) {
        $id = $_GET['Id'];

        $sql = "SELECT * FROM rendez_vous WHERE Id = :Id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':Id', $id);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
            <form action="update_rendez_vous.php" method="POST">
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>Id</th>
                        <th>Date_de_rendez_vous</th>
                        <th>Heure_de_rendez_vous</th>
                        <th>Id_patient</th>
                        <th>Id_médecin</th>
                        <th>action </th>
                        
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="Id" value="<?php echo $row['Id']; ?>"></td>
                            <td><input type="date" name="Date_de_rendez_vous" value="<?php echo $row['Date_de_rendez_vous']; ?>"></td>
                            <td><input type="time" name="Heure_de_rendez_vous" value="<?php echo $row['Heure_de_rendez_vous']; ?>"></td>
                            <td><input type="text" name="Id_patient" value="<?php echo $row['Id_patient']; ?>"></td>
                            <td><input type="text" name="Id_médecin" value="<?php echo $row['Id_médecin']; ?>"></td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
<?php
        } else {
            echo "No rendez_vous information found with this ID.";
        }
    } else {
        echo "Identifiant de rendez_vous non spécifié.";
    }
?>
</div>
</div>
</div>
</div>
</section>