<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
        <?php wp_head(); ?>
        <link rel="shortcut icon" href="/wp-content/themes/tgc_wp_theme/favicon.ico"/>
        <script type="text/javascript">
            window.addEvent('domready', function() {
                var modules = ['rt-block'];
                var header = ['h3','h2','h1'];
                GantryBuildSpans(modules, header);
            });
            InputsExclusion.push('.content_vote')
        </script>
        <style type="text/css" id="mti_stylesheet_b4d79af0-aa00-413b-915f-48995b00b46b">.button{font-family:'Eurostile Next W02 Semi Bd Ext';}
            /*fout specific code:*/
            .mti-loading .button{visibility:hidden;}
            .mti-active .button, .mti-inactive .button{visibility: visible;}
            .date-block{font-family:'Eurostile Next W02 Light Ext';}
            /*fout specific code:*/
            .mti-loading .date-block{visibility:hidden;}
            .mti-active .date-block, .mti-inactive .date-block{visibility: visible;}
            .menu{font-family:'Eurostile Next W02 Semi Bd Ext';}
            /*fout specific code:*/
            .mti-loading .menu{visibility:hidden;}
            .mti-active .menu, .mti-inactive .menu{visibility: visible;}
            .readon{font-family:'Eurostile Next W02 Regular Ext';}
            /*fout specific code:*/
            .mti-loading .readon{visibility:hidden;}
            .mti-active .readon, .mti-inactive .readon{visibility: visible;}
            .rt-container{font-family:'Eurostile Next W02 Regular Ext';}
            /*fout specific code:*/
            .mti-loading .rt-container{visibility:hidden;}
            .mti-active .rt-container, .mti-inactive .rt-container{visibility: visible;}
            .rt-desc{font-family:'Eurostile Next W02 Light Ext';}
            /*fout specific code:*/
            .mti-loading .rt-desc{visibility:hidden;}
            .mti-active .rt-desc, .mti-inactive .rt-desc{visibility: visible;}
            body{font-family:'Eurostile Next W02 Regular Ext';}
            /*fout specific code:*/
            .mti-loading body{visibility:hidden;}
            .mti-active body, .mti-inactive body{visibility: visible;}
            h2{font-family:'Eurostile Next W02 Semi Bd Ext';}
            /*fout specific code:*/
            .mti-loading h2{visibility:hidden;}
            .mti-active h2, .mti-inactive h2{visibility: visible;}
            p{font-family:'Eurostile Next W02 Regular Ext';}
            /*fout specific code:*/
            .mti-loading p{visibility:hidden;}
            .mti-active p, .mti-inactive p{visibility: visible;}
        </style>
        <style type="text/css" id="mti_fontface_b4d79af0-aa00-413b-915f-48995b00b46b">@font-face{font-family:'Eurostile Next W02 Light Ext';src:url('http://fast.fonts.com/d/f41c1d19-414c-45cc-b6a0-a0c05320ef5e.ttf?d44f19a684109620e4841471a190e818536c57ad1479c3b4e3b02c0f40101bcf0fa0ae0e5921e4f264f03c23854cf5f9db941273324fd3acea7cf88c6d838b20d1dcfbcef3e46b8cd1de5ca9372f02bbd753949acb5a&projectId=b4d79af0-aa00-413b-915f-48995b00b46b') format('truetype');}
            @font-face{font-family:'Eurostile Next W02 Regular Ext';src:url('http://fast.fonts.com/d/aae2bcac-511d-436d-bb81-acb6407c75df.ttf?d44f19a684109620e4841471a190e818536c57ad1479c3b4e3b02c0f40101bcf0fa0ae0e5921e4f264f03c23854cf5f9db941273324fd3acea7cf88c6d838b20d1dcfbcef3e46b8cd1de5ca9372f02bbd753949acb5a&projectId=b4d79af0-aa00-413b-915f-48995b00b46b') format('truetype');}
            @font-face{font-family:'Eurostile Next W02 Semi Bd Ext';src:url('http://fast.fonts.com/d/dc0eec5a-907e-44ac-a97c-936e665db0d3.ttf?d44f19a684109620e4841471a190e818536c57ad1479c3b4e3b02c0f40101bcf0fa0ae0e5921e4f264f03c23854cf5f9db941273324fd3acea7cf88c6d838b20d1dcfbcef3e46b8cd1de5ca9372f02bbd753949acb5a&projectId=b4d79af0-aa00-413b-915f-48995b00b46b') format('truetype');}
        </style>
        <script type="text/javascript" src="http://fast.fonts.com/jsapi/b4d79af0-aa00-413b-915f-48995b00b46b.js"></script>
    </head>

    <body <?php body_class(); ?>>
        <div id="header" class="exterior">
            <div class="interior clearfix">
                <div id="menu">
                    <?php wp_nav_menu(array('theme_location' => 'header-menu','menu_class' => 'sf-menu')); ?>
                </div>
            </div>
        </div>
		
		<div class="versionBeta"></div>

