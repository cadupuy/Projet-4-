
<?php $titre = 'Mon Blog';?>

<?php ob_start();?>
      <section class="about">
        <img class="fondabout1" src="https://cdn.pixabay.com/photo/2016/02/07/19/48/aurora-1185466_1280.jpg" alt="">

        <div class="blocAbout">
          <p class="texteSuperLong"><h2>L'ÉPOPÉE D'UNE VIE</h2>
            <p>Il est de notoriété publique que Jean Forteroche n'aime guère parler de lui, qui plus est à la troisième personne du singulier. <br><br>
            Seulement, dans la mesure où la page que vous parcourez s'intitule sobrement "Biographie", nous serions bien embêtés si je décidais de ne pas honorer le contrat qui vous a précisément amené ici. J'en suis tout à fait capable, n'en doutez pas, cher lecteur avisé. Et je pourrais continuer des heures durant à deviser sur le bien-fondé de ma pudeur, ou encore sur le fameux contrat qui m'oblige à temporairement la souiller. <br><br>
            C'est pour cette raison que je m'adresserai à vous comme je m'adresserais à un vieil ami. On a plus grand chose à cacher à un vieil ami, si ce n'est cette part de mystère qui vous rend irrésistiblement intéressant. Car celui qui aime parler de lui suscitera très vite le désintérêt, et celui qui ne dit rien, l'ennui. Distribuer avec minutie les parcelles de son histoire, c'est bien là tout l'art de l'écrivain. <br><br>
            Ainsi, mon vieil ami, il ne vous a pas échappé que je suis écrivain et qu'en qualité d'écrivain, j'écris des livres, dans lesquels je transpose mon goût pour l'absurde et les personnages pittoresques. Certains appelleront cela une signature, d'autres une façon de cacher l'angoisse de la médiocrité.
            Il est d'usage de citer les créations qui m'ont permis de vivre de ma plume, alors je me permettrais d'évoquer "Double meurtre à Doubleville" (1993), "L'homme qui parlait aux truites" (1997), "Le burn-out de l'épouvantail" (2008) et, plus récemment, "Billet simple pour l'Alaska", un roman dont vous pourrez suivre la progression en direct sur ce blog. <br><br>
            Bienvenue à toi, vieil ami, et bonne lecture.
            <br><br>
            Jean Forteroche</p>
        </div>

      </section>

<?php $contenu = ob_get_clean();?>

<?php require 'Vue/gabarit.php';?>
