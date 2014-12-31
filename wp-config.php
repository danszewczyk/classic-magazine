<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'thhsclas_wo9282');

/** MySQL database username */
define('DB_USER', 'thhsclas_wo9282');

/** MySQL database password */
define('DB_PASSWORD', 'Nwu4wDiLUUbs');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'g}=%fid!srhvyym;=<)QR}TlYk^$LiAjowLg%$X^+|ty<hWD?m[-[T^bpS</dIJJzO<XV%eAf[w;vUsPryKh=Aj-m&mZBl!-h>|q-EsVdyF%eDr=HQ(hy(;Q)+&Lr%P%');
define('SECURE_AUTH_KEY', 'jNOod>AZ^t?VYZsJW[GRLk>HrBSpTCYP?]-vt{W&GM}QH[^ku|>tKZtx+iz&jTu%v^Q|D|rWY=&fIT%R%?]dYv(-X[nXG>!nZO)(sjC;MytlPX]eJnbJ^wL!JI&{S>(u');
define('LOGGED_IN_KEY', ']QuY_e&*CnfuF=t(yVyWD&zx;dZw];-OkUa{wbzq}OP%)fSz>OLOD/jVZ}XuGonw)MKSkCW_+{FqaCyPIx@Ui*ZrMCy/*wRgJooIn-J=hBc(X{uraj<KFz$Df(DCzAug');
define('NONCE_KEY', 'RGS^V))l&{B_a)N%-c&Xd<BW&x+d*S*^FjzXLaMA_vVmHm])Y|kQMzmi&plblATT-+wVKQkSwQG]jUbVZe%*[)rV&C@|[?yAb)]bZicty{Ea(vb%G_DwkqPACLf)to}*');
define('AUTH_SALT', '/+/--rvj%w;w[VZiKPGsHquTsSV|H$gA|D-^aI_*gz>Vk<pB+CaS%Lt}n]sLCR+]^_r&M-$Tsc;%(wICCFq)n&*|I_iWW>gJN>(*;IOvV{KiYH&$$R/s&PumW(fe@d[+');
define('SECURE_AUTH_SALT', 'XADWU%CV&<?J=acre-_m)Uv}+s?d(F^NX*fJd%trT/%TEmJ[apuj{r@DhFp&SsY_{To!D[]ARlS!;uXkLlanf=x_|{CYWr(m|)<$uRx?M=$NRcH?tmJDWXB{B_OoH*q*');
define('LOGGED_IN_SALT', 'sQO!xX$U{//e(Pwh{_HlK[X!}oQ|cPx>!-%*d@}Piq-TPXb]}|GHcut/wwXo[AtKE^JXGwf[Pwh(A_i;tCIt>]GW=qPJ&*F&X][qMFst+KRmk$o](hASvShug!EQ/JXX');
define('NONCE_SALT', 'QdlhcbEsXBnV)Cw{LcwTJd[Lj-asBv;wh>XSA-nQc+q|ehF>LwU%|O!|RlrUn$k}^(FPvNPwjHPGiYQK=SL(a*O}(}_y<C{;Jp!H[mQ)KeI)AQgpqy/mL?XdyCm=}=Vo');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_ibnt_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}
