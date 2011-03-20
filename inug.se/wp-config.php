<?php
/**
 * Baskonfiguration f�r WordPress.
 *
 * Denna fil inneh�ller f�ljande konfigurationer: Inst�llningar f�r MySQL,
 * Tabellprefix, S�kerhetsnycklar, WordPress-spr�k, och ABSPATH.
 * Mer information p� {@link http://codex.wordpress.org/Editing_wp-config.php 
 * Editing wp-config.php}. MySQL-uppgifter f�r du fr�n ditt webbhotell.
 *
 * Denna fil anv�nds av wp-config.php-genereringsskript under installationen.
 * Du beh�ver inte anv�nda webbplatsen, du kan kopiera denna fil direkt till
 * "wp-config.php" och fylla i v�rdena.
 *
 * @package WordPress
 */

// ** MySQL-inst�llningar - MySQL-uppgifter f�r du fr�n ditt webbhotell ** //
/** Namnet p� databasen du vill anv�nda f�r WordPress */
define('DB_NAME', 'inug.se');

/** MySQL-databasens anv�ndarnamn */
define('DB_USER', 'root');

/** MySQL-databasens l�senord */
define('DB_PASSWORD', 'cbe4e9rrm2UXZ4PH');

/** MySQL-server */
define('DB_HOST', 'localhost');

/** Teckenkodning f�r tabellerna i databasen. */
define('DB_CHARSET', 'utf8');

/** Kollationeringstyp f�r databasen. �ndra inte om du �r os�ker. */
define('DB_COLLATE', '');

/**#@+
 * Unika autentiseringsnycklar och salter.
 *
 * �ndra dessa till unika fraser!
 * Du kan generera nycklar med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan n�r som helst �ndra dessa nycklar f�r att g�ra aktiva cookies obrukbara, vilket tvingar alla anv�ndare att logga in p� nytt.
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
 * Tabellprefix f�r WordPress Databasen.
 *
 * Du kan ha flera installationer i samma databas om du ger varje installation ett unikt
 * prefix. Endast siffror, bokst�ver och understreck!
 */
$table_prefix  = 'wp_';

/**
 * WordPress-spr�k, f�rinst�llt f�r svenska.
 *
 * Du kan �ndra detta f�r att �ndra spr�k f�r WordPress.  En motsvarande .mo-fil
 * f�r det valda spr�ket m�ste finnas i wp-content/languages. Exempel, l�gg till
 * sv_SE.mo i wp-content/languages och ange WPLANG till 'sv_SE' f�r att f� sidan
 * p� svenska.
 */
define ('WPLANG', 'sv_SE');

/** 
 * F�r utvecklare: WordPress fels�kningsl�ge. 
 * 
 * �ndra detta till true f�r att aktivera meddelanden under utveckling. 
 * Det �r rekommderat att man som till�ggsskapare och temaskapare anv�nder WP_DEBUG 
 * i sin utvecklingsmilj�. 
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

/* Det var allt, sluta redigera h�r! Blogga p�. */

/** Absoluta s�kv�g till WordPress-katalogen. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Anger WordPress-v�rden och inkluderade filer. */
require_once(ABSPATH . 'wp-settings.php');