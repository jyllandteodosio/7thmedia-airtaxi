<?php
/**
 *
 * 
 *
 * @package 
 * @author  
 * @license GPL-2.0+
 * @link    
 */

do_action( 'genesis_doctype' );
do_action( 'genesis_title' );
do_action( 'genesis_meta' );

wp_head(); //* we need this for plugins
?>
<style type="text/css">

.page-template-page-membership #aircraft-fleet { background: #fff !important; }

.page-template-page-membership .detail-capacity .dashicons {
    font-size: 16px;
    color: #333;
    margin-top: 5px;
    margin-left: -5px;
}

#wpsm-table-1 thead th:nth-child(2) .mperks-emerald-header { background-color: #397f55; }
#wpsm-table-1 thead th:nth-child(2) { border: 2px solid #397f55 !important; }
#wpsm-table-1 tbody tr:nth-child(-n+8) td:nth-child(2) {
    border-left: 2px solid #397f55 !important;
    border-right: 2px solid #397f55 !important;
}
#wpsm-table-1 tbody td:nth-child(2) .mperks-emerald { color: #397f55; }
#wpsm-table-1 tbody tr:nth-child(8) td:nth-child(2) { border-bottom: 2px solid #397f55 !important; }
</style>


</head>
<?php
genesis_markup( array(
	'html5'   => '<body %s>',
	'xhtml'   => sprintf( '<body class="%s">', implode( ' ', get_body_class() ) ),
	'context' => 'body',
) );
do_action( 'genesis_before' );

genesis_markup( array(
	'html5'   => '<div %s>',
	'xhtml'   => '<div id="wrap">',
	'context' => 'site-container',
) );

do_action( 'genesis_before_header' );
do_action( 'genesis_header' );
do_action( 'genesis_after_header' );

genesis_markup( array(
	'html5'   => '<div %s>',
	'xhtml'   => '<div id="inner">',
	'context' => 'site-inner',
) );
genesis_structural_wrap( 'site-inner' );
?>
