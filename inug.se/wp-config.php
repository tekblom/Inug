<?php
/**
 * Baskonfiguration för WordPress.
 *
 * Denna fil innehåller följande konfigurationer: Inställningar för MySQL,
 * Tabellprefix, Säkerhetsnycklar, WordPress-språk, och ABSPATH.
 * Mer information på {@link http://codex.wordpress.org/Editing_wp-config.php 
 * Editing wp-config.php}. MySQL-uppgifter får du från ditt webbhotell.
 *
 * Denna fil används av wp-config.php-genereringsskript under installationen.
 * Du behöver inte använda webbplatsen, du kan kopiera denna fil direkt till
 * "wp-config.php" och fylla i värdena.
 *
 * @package WordPress
 */

// ** MySQL-inställningar - MySQL-uppgifter får du från ditt webbhotell ** //
/** Namnet på databasen du vill använda för WordPress */
define('DB_NAME', 'inug.se');

/** MySQL-databasens användarnamn */
define('DB_USER', 'root');

/** MySQL-databasens lösenord */
define('DB_PASSWORD', 'cbe4e9rrm2UXZ4PH');

/** MySQL-server */
define('DB_HOST', 'localhost');

/** Teckenkodning för tabellerna i databasen. */
define('DB_CHARSET', 'utf8');

/** Kollationeringstyp för databasen. Ändra inte om du är osäker. */
define('DB_COLLATE', '');

/**#@+
 * Unika autentiseringsnycklar och salter.
 *
 * Ändra dessa till unika fraser!
 * Du kan generera nycklar med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan när som helst ändra dessa nycklar för att göra aktiva cookies obrukbara, vilket tvingar alla användare att logga in på nytt.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '{R5[k37WZR8}ot2_MjT+2Ia[9V7@Ud-DX$;Y (D>cCSvXphl6]zv%Zho&oV>35j%');
define('SECURE_AUTH_KEY',  'U=AL,>42dJ_Jlw47v_PXRZI)Sf;xgcQP>vZmk3hBhtP[YJ|8Sj(!EJG|5j6z^bwB');
define('LOGGED_IN_KEY',    'jSzLHGrsTffiYf>k1d0Sm}UHVP@fqnm{TqCCmIx+SfExGCZV:/sx{j]ww>(t;qxg');
define('NONCE_KEY',        'H1,ib<:?>O`]Z#mguM/qBo3!Kdvmm*rJZE 2n36ix%VKS;A$Sst+S|yeg8TV|rq:');
define('AUTH_SALT',        'W  Ax?zlkXNq[:r6nu@fDmb7R#(/JFma8oIi8BD5o7$` pAwt@y67=?o#slUO(Hd');
define('SECURE_AUTH_SALT', '8A`TMv*KmTy~$FM/(YG%*PAVp+79#DV031<hF.6ku-|>N}/{fJ%mK:G1^^#9=j3k');
define('LOGGED_IN_SALT',   'tlSiP1F@CC%H9{0(/oijG.9[}=i~}5+-H--dK/-Ern%D>`p S@1dvD|a47|>Zs{[');
define('NONCE_SALT',       'aoM.n(ed|Hkd!LQ^/4_{<AZ7$Ocb+zq`!a|%+}o;1cUgdDQ|Pr(5TrFyRtB<=3NU');

/**#@-*/

/**
 * Tabellprefix för WordPress Databasen.
 *
 * Du kan ha flera installationer i samma databas om du ger varje installation ett unikt
 * prefix. Endast siffror, bokstäver och understreck!
 */
$table_prefix  = 'wp_';

/**
 * WordPress-språk, förinställt för svenska.
 *
 * Du kan ändra detta för att ändra språk för WordPress.  En motsvarande .mo-fil
 * för det valda språket måste finnas i wp-content/languages. Exempel, lägg till
 * sv_SE.mo i wp-content/languages och ange WPLANG till 'sv_SE' för att få sidan
 * på svenska.
 */
define ('WPLANG', 'sv_SE');

/** 
 * För utvecklare: WordPress felsökningsläge. 
 * 
 * Ändra detta till true för att aktivera meddelanden under utveckling. 
 * Det är rekommderat att man som tilläggsskapare och temaskapare använder WP_DEBUG 
 * i sin utvecklingsmiljö. 
 */ 
define('WP_DEBUG', false);

define('WP_ALLOW_MULTISITE', true);

define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
$base = '/inug.se/';
define( 'DOMAIN_CURRENT_SITE', 'localhost' );
define( 'PATH_CURRENT_SITE', '/inug.se/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

/* Det var allt, sluta redigera här! Blogga på. */

/** Absoluta sökväg till WordPress-katalogen. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Anger WordPress-värden och inkluderade filer. */
require_once(ABSPATH . 'wp-settings.php');