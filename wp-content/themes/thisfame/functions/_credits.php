<?
/*------------------------------------------------------------*\
    Intégration des crédits Hiboost
\*------------------------------------------------------------*/

// do_shortcode('[credits-hiboost]');


add_shortcode( 'credits-hiboost', 'credits_func' );
function credits_func() {
    $idPage = substr(get_the_ID(), -1);
    switch ($idPage) {
        case '0':
        $lien = '<a href="http://www.hiboost.fr/offre/creation-site-internet/" target="_blank" id="creditagence">Création site internet</a>';
            break;
         case '1':
        $lien = '<a href="http://www.hiboost.fr/offre/creation-site-internet/" target="_blank"  id="creditagence">Création site internet Rennes</a>';
            break;
         case '2':
        $lien = '<a href="http://www.hiboost.fr/offre/referencement-naturel/" target="_blank"  id="creditagence">Agence Référencement Rennes</a>';
            break;
         case '3':
        $lien = '<a href="http://www.hiboost.fr/offre/webmarketing/" target="_blank"  id="creditagence">Webmarketing Rennes</a>';
            break;
         case '4':
        $lien = '<a href="http://www.hiboost.fr/offre/referencement-naturel/" target="_blank"  id="creditagence">Agence marketing Rennes</a>';
            break;
         case '5':
        $lien = '<a href="http://www.hiboost.fr/" target="_blank"  id="creditagence">Agence Marketing Rennes</a>';
            break;
         case '6':
        $lien = '<a href="http://www.hiboost.fr/offre/webmarketing/" target="_blank"  id="creditagence">Marketing opérationnel Rennes</a>';
            break;
         case '7':
        $lien = '<a href="http://www.hiboost.fr/realisations/" target="_blank"  id="creditagence">Création site Responsive rennes</a>';
            break;
         case '8':
        $lien = '<a href="http://www.hiboost.fr/realisations/" target="_blank"  id="creditagence">Création site e-commerce rennes</a>';
            break;
         case '9':
        $lien = '<a href="http://www.hiboost.fr/" target="_blank"  id="creditagence">Agence Web Rennes</a>';
            break;
        default:
            $lien = '<a href="http://www.hiboost.fr/" target="_blank"  id="creditagence">Agence Web Rennes</a>';
            break;
    }
   return $lien;
}

