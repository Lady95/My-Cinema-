<?php
  while($term_find = $select_term->fetch())
  {
      if (empty($_GET['terme'])){
          echo " Aucune liste corresponde à votre recherche.";
          break; 
      } else {
          echo "<div><h2> Prénom : ".$term_find['prenom']."</h2><h2> Nom : ".$term_find['nom']."</h2>
          <p> type d'abonnement : " .$term_find['abo']."</p><div>";
      }
  }
  $select_term->closeCursor();
   ?>