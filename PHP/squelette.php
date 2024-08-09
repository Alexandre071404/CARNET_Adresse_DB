<!doctype html>
<html lang="fr">
<head>
  <title>Liste d'acteurs</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="Formulaire/form.css"  type="text/css" >
</head>
<body>
  <h1>Acteurs</h1>
  <hr>
  <table class="tabM" style="background-color: #95c589 ;">
  <tr>
    <td class="tdM"><?php  echo $zonePrincipale; ?>  </td>
    <td style="background-color:silver;">
      <p>
		<a href="index.php">Accueil</a><br>
        <a href="index.php?action=insert">Ajouter un acteur</a><br>
        <a href="index.php?action=liste">Liste d'acteur(s)</a><br>
        <a href="index.php?action=propos">À propos</a><br >

      </p>
    </td>
  </tr>
  </table>
  <hr>
</body>
</html>
