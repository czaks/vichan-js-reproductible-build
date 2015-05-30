<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
define('TINYBOARD', true);
require 'inc/template.php';

function buildJavascript() {
        global $config;

        $stylesheets = array();
        foreach ($config['stylesheets'] as $name => $uri) {
                $stylesheets[] = array(
                        'name' => addslashes($name),
                        'uri' => addslashes((!empty($uri) ? $config['uri_stylesheets'] : '') . $uri));
        }

        $script = Element('main.js', array(
                'config' => $config,
                'stylesheets' => $stylesheets
        ));

        // Check if we have translation for the javascripts; if yes, we add it to additional javascripts
        list($pure_locale) = explode(".", $config['locale']);
        if (file_exists ($jsloc = "inc/locale/$pure_locale/LC_MESSAGES/javascript.js")) {
                $script = file_get_contents($jsloc) . "\n\n" . $script;
        }

        if ($config['additional_javascript_compile']) {
                foreach ($config['additional_javascript'] as $file) {
                        $script .= file_get_contents($file);
                }
        }

        if ($config['minify_js']) {
                require_once 'inc/lib/minify/JSMin.php';
                $script = JSMin::minify($script);
        }

        //file_write($config['file_script'], $script);
	echo $script;
}


$config['post_date'] = '%Y-%m-%d (%a) %H:%M:%S';

$config['dir']['template'] = 'templates/';
$config['max_images'] = 4;
$config['locale'] = 'pl_PL.UTF-8';

$config['uri_stylesheets'] = '/stylesheets/';

$config['genpassword_chars'] = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+';

$config['debug'] = true;

$config['cookies']['js'] = 'serv';

$config['minify_js'] = true;
$config['minify_html'] = true;
$config['additional_javascript_compile'] = true;

$config['google_analytics'] = 'UA-9118263-2';
$config['google_analytics_domain'] = 'vichan.net';


$config['stylesheets'] = array();
        $config['stylesheets']['Yotsuba B'] = ''; // Default; there is no additional/custom stylesheet for this.
        $config['stylesheets']['Yotsuba'] = 'yotsuba.css';
        $config['stylesheets']['Dark'] = 'dark.css';
        $config['stylesheets']['Roach'] = 'roach.css';
        $config['stylesheets']['Dark Roach'] = 'dark_roach.css';
        $config['stylesheets']['Yotsuba'] = 'yotsuba.css';
        $config['stylesheets']['Yotsuba B'] = ''; // default
        $config['stylesheets']['Futaba'] = 'futaba.css';
        $config['stylesheets']['Testorange'] = 'testorange.css';
        $config['stylesheets']['Jungle'] = 'jungle.css';
        $config['stylesheets']['Miku'] = 'miku.css';
        $config['stylesheets']['Luna'] = 'luna.css';
        $config['stylesheets']['Piwnichan'] = 'piwnichan.css';
        $config['stylesheets']['Ferus'] = 'ferus.css';
        $config['stylesheets']['Rugby'] = 'rugby.css';
        $config['stylesheets']['Photon'] = 'photon.css'; //jakiś slepy anonek o to prosił
        $config['stylesheets']['Wasabi'] = 'wasabi.css';
        $config['stylesheets']['Caffe'] = 'caffe.css';
        $config['stylesheets']['Burichan'] = 'burichan.css';
        $config['stylesheets']['Confraria'] = 'confraria.css';
        $config['stylesheets']['Favela'] = 'favela.css';
        $config['stylesheets']['Nigrachan'] = 'nigrachan.css';
        $config['stylesheets']['Novo Jungle'] = 'novo_jungle.css';
        $config['stylesheets']['Notsuba'] = 'notsuba.css';
        $config['stylesheets']['Futaba+vichan'] = 'futaba+vichan.css';
        $config['stylesheets']['Futaba Light'] = 'futaba-light.css';
        $config['stylesheets']['Szalet'] = 'szalet.css';
        $config['stylesheets']['Stripes'] = 'stripes.css';
        //$config['stylesheets']['Terminal'] = 'terminal.css';
        $config['stylesheets']['Terminal-2'] = 'terminal2.css';
        //$config['stylesheets']['Majus'] = 'majus.css';
        $config['stylesheets']['Gentoochan'] = 'gentoochan.css';
        $config['stylesheets']['Ricechan'] = 'ricechan.css';
        $config['default_stylesheet'] = array('Futaba+vichan', $config['stylesheets']['Futaba+vichan']);



        $config['additional_javascript'] = array();  
        $config['additional_javascript'][] = 'js/jquery.min.js';  
        $config['additional_javascript'][] = 'js/mobile-style.js';  
        $config['additional_javascript'][] = 'js/options.js';  
        $config['additional_javascript'][] = 'js/style-select.js';  
        $config['additional_javascript'][] = 'js/options/general.js';  
        $config['additional_javascript'][] = 'js/options/user-css.js';  
        $config['additional_javascript'][] = 'js/options/user-js.js';  
        $config['additional_javascript'][] = 'js/strftime.min.js';  
        $config['additional_javascript'][] = 'js/jquery-ui.custom.min.js';  
        $config['additional_javascript'][] = 'js/local-time.js';  
        $config['additional_javascript'][] = 'js_more/jquery.jplayer.min.js';  # JS not in repo
        $config['additional_javascript'][] = 'js/titlebar-notifications.js';  
        $config['additional_javascript'][] = 'js/auto-reload.js';  
        $config['additional_javascript'][] = 'js/quote-selection.js';  
        $config['additional_javascript'][] = 'js/post-hover.js';  
        $config['additional_javascript'][] = 'js/forced-anon.js';  
        $config['additional_javascript'][] = 'js/show-backlinks.js';  
        $config['additional_javascript'][] = 'js/smartphone-spoiler.js';  
        $config['additional_javascript'][] = 'js/show-op.js';  
        $config['additional_javascript'][] = 'js/inline-expanding.js';  
        $config['additional_javascript'][] = 'js/expand.js';  
        $config['additional_javascript'][] = 'js/live-index.js';  
        $config['additional_javascript'][] = 'js/expand-too-long.js';  
        $config['additional_javascript'][] = 'js/quick-reply.js';  
        $config['additional_javascript'][] = 'js/fix-report-delete-submit.js';  
        $config['additional_javascript'][] = 'js/quick-post-controls.js';  
        $config['additional_javascript'][] = 'js/hide-threads.js';  
        $config['additional_javascript'][] = 'js/toggle-locked-threads.js';  
        $config['additional_javascript'][] = 'js/youtube.js';  
        $config['additional_javascript'][] = 'js/toggle-images.js';  
        $config['additional_javascript'][] = 'js/expand-all-images.js';  
        $config['additional_javascript'][] = 'js/hide-images.js';  
        $config['additional_javascript'][] = 'js/download-original.js';  
        $config['additional_javascript'][] = 'js/compact-boardlist.js';  
        $config['additional_javascript'][] = 'js/watch.js';  
        $config['additional_javascript'][] = 'js/inline-expanding-filename.js';  
        $config['additional_javascript'][] = 'js/ajax.js';  
        $config['additional_javascript'][] = 'js/ajax-post-controls.js';  
        $config['additional_javascript'][] = 'js_more/8ch.js'; // 'js/wPaint/8ch.js';  # JS harder to obtain
        $config['additional_javascript'][] = 'js/wpaint.js';  
        $config['additional_javascript'][] = 'js/own-board.js';  
        $config['additional_javascript'][] = 'js/upload-selection.js';  
        $config['additional_javascript'][] = 'js/catalog-link.js';  
        $config['additional_javascript'][] = 'js_more/cyrillic-xlit.js';  # JS not in repo
$config['additional_javascript'][] = 'js/no-animated-gif.js';  
$config['additional_javascript'][] = 'js/file-selector.js';  
$config['additional_javascript'][] = 'js/gallery-view.js';  
    $config['additional_javascript'][] = 'js/webm-settings.js';  
    $config['additional_javascript'][] = 'js/expand-video.js';  
    $config['additional_javascript'][] = 'js/treeview.js';  
    $config['additional_javascript'][] = 'js/jquery.mixitup.min.js';  
    $config['additional_javascript'][] = 'js/catalog.js';  
    $config['additional_javascript'][] = 'js/catalog-search.js';  
    $config['additional_javascript'][] = 'js/infinite-scroll.js';  
    $config['additional_javascript'][] = 'js/inline.js';  
    $config['additional_javascript'][] = 'js/show-own-posts.js';  
        $config['additional_javascript'][] = 'js_more/radioplayer.js';  # JS not in repo
        $config['additional_javascript'][] = 'js_more/regulamin.js';  # JS not in repo


buildJavascript();
