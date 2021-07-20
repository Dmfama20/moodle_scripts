<?php
define('CLI_SCRIPT', 1);
require(__DIR__.'./../config.php');




/**
     * Retrieves plugin data based on type and contrib.
     *
     * @param object $pluginman
     * @param string $type
     * @param bool $all
     * @return array
     */
    function get_plugins_by_parameters($pluginman, $type = null, $all = false) {
        $plugins = array();
        $plugininfo = $pluginman->get_plugins();

        foreach ($plugininfo as $plugintype => $pluginnames) {
            foreach ($pluginnames as $pluginname => $plugin) {
                if ($all || ($plugin->type == $type && !$plugin->is_standard()) ||
                    (is_null($type) && !$plugin->is_standard())) {
                    $key = $plugintype . '_' . $pluginname;
                    $plugins[$key] = $plugin;
                }
            }
        }

        return $plugins;
    }

$pm = \core_plugin_manager::instance();
$types = $pm->get_plugin_types();

foreach ($types as $t => $path) {
    $plugins = get_plugins_by_parameters($pm , $t, false);
    //$plugins = $pm->get_installed_plugins($t);
    // echo "\n$t\n################\n";
    foreach ($plugins as $p => $version) {
        echo "$p \n";
    }
}


// foreach ($types as $t => $path) {
//     $plugins = $pm->get_installed_plugins($t);
//    // echo "\n$t\n################\n";
//     foreach ($plugins as $p => $version) {
//          echo "$t"; 
//          echo "_";
//         echo "$p \n";
//     }
// }
// foreach ($types as $t => $path) {
//     $plugins = $pm->get_installed_plugins($t);
//     echo "\n$t\n################\n";
//     foreach ($plugins as $p => $release) {
//         echo "$p ($release)\n";
//     }
// }
