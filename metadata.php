<?php

/**
 * Module information
 */
$aModule = array(
    'id' => 'article_moretabs',
    'title' => 'More Tabs',
    'author'       => 'Marten Seemann',
    'url'          => 'http://shop.oxid-responsive.com',
    'version'      => '3.0',
    'description' => array(
        'de' => 'mehrere Tabs auf der Artikel-Detailsseite anzeigen',
        'en' => 'show multiple tabs on the product detail page',
        ),
    'blocks'       => array(
        array("template" => "page/details/inc/tabs.tpl", "block" => "details_tabs_longdescription", "file" => "/views/blocks/tabs_description.tpl"),
        array("template" => "page/details/inc/tabs.tpl", "block" => "details_tabs_attributes", "file" => "/views/blocks/tabs_attributes.tpl"),
        array("template" => "page/details/inc/tabs.tpl", "block" => "details_tabs_pricealarm", "file" => "/views/blocks/tabs_pricealarm.tpl"),
        array("template" => "page/details/inc/tabs.tpl", "block" => "details_tabs_tags", "file" => "/views/blocks/tabs_tags.tpl"),
        array("template" => "page/details/inc/tabs.tpl", "block" => "details_tabs_media", "file" => "/views/blocks/tabs_media.tpl"),
    ),
    'extend' => array(
        'article_moretabs' => 'article_moretabs/controllers/article_moretabs_ext',
        'oxarticle' => 'article_moretabs/models/oxarticle_ext',
        'oxlang' => 'article_moretabs/models/oxlang_ext',
    ),
    'files' => array(
        'article_moretabs' => 'article_moretabs/admin/article_moretabs.php',
    ),
    'templates' => array(
        'article_moretabs.tpl' => 'article_moretabs/views/blocks/admin/article_moretabs.tpl',
    )
);
