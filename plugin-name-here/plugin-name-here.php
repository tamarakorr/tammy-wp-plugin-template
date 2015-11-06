<?php
/**
 * Plugin Name: [TODO Plugin Name Here]
 * Plugin URI: http://www.tammyorrtech.com/[TODO plugin-name-here]
 * Description: [TODO Plugin description - appears in WordPress at wp-admin/plugins.php]
 * Version: 1.0.0
 * Author: Tammy Orr
 * Author URI: http://www.tammyorrtech.com/
 * Text Domain: Optional. Plugin's text domain for localization. Example: mytextdomain
 * Domain Path: Optional. Plugin's relative directory path to .mo files. Example: /locale/
 * Network: Optional. Whether the plugin can only be activated network wide. Example: true
 * License: MIT
 */

/*  Copyright 2015  TAMMY ORR  (email : tamarakorr@gmail.com)

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in
    all copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
    THE SOFTWARE.
*/

/* plugin-update-checker requires the following copyright and license notice:

Copyright (c) 2014 Jānis Elsts

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Check for plugin updates
require 'plugin-updates/plugin-update-checker.php';
$MyUpdateChecker = PucFactory::buildUpdateChecker(
    'http://www.tammyorrtech.com/files/todo-plugin-slug/info.json',
    __FILE__
);

include_once( plugin_dir_path( __FILE__ ) . 'admin.php' );
$adminObject = new todo_admin(); 

// Create the DB / Options / Defaults         
function tot_giveaways_install() {
  // TODO
}

// Run the install scripts upon plugin activation
register_activation_hook(__FILE__,'tot_giveaways_install');
