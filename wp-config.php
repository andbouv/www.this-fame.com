<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'thisfame');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'thisfame');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'KpnE8yjTdWxzHMZq');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'MV/f:+[la^]dpAe1Wq-Hxj6&(OKfva@bGUdU3u:Y992mKbR{?AV;85$ZEsdDT(eb');
define('SECURE_AUTH_KEY',  'ku3Y2WJ=uy-l_!Pw:Z>2Z#Qp3:k)|{%Q$S|+?-wh9OL1$V!3o6n8SoW_`rp z)e ');
define('LOGGED_IN_KEY',    ']^b9y=]I^%lEHI`7nKEC,+Q6#Bj5R%Oi|A[c[C%i?]W#f.&]r[+$<]EOn*)yt%X$');
define('NONCE_KEY',        'B.Rf2D_t;_cY{eRT=aVx. 6rU<o r;4Kiw#PN9y)WK=(%iL/{l^A|kH`wY:<~{f;');
define('AUTH_SALT',        '<;}@-HGTLG@9jDDh`F!U@X|ec!sJo^ien[1t&]rN3Xw=iOE59~BPc5cOCRXu]ZwK');
define('SECURE_AUTH_SALT', '8H{n|x:zxda+_I%8_`!f+2Ya[d*u}nLY/2jBt7[lIA6{2Ml>R$J=?@9mui<9`P1G');
define('LOGGED_IN_SALT',   'SkJH{,,j9lmUZfq@xL>DzenC}9rYk;}# $&_~o$ :n%X<Uk#W/O#v.jk+{]~;JL ');
define('NONCE_SALT',       'W3(4gc6@[[5*IhG)jUsiRxN`iVw+h*oMDd}h/U:BA}k^`Gmz79u)&@^q&yu**4o=');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
