<?php
  /*
  Plugin Name: WordPress Simple Shell Script Exec
  Plugin URI: https://github.com/hiro345g/wp_simple_shell_script_exec
  Description: A plugin to exec a simple shell command
  Version: 0.1
  Author: Koyama Hiroshi
  Author URI: https://github.com/hiro345g
  License: GPLv2
  */

add_action('admin_menu', 's17u_WpSimpleShellScriptExecMenu');

function s17u_WpSimpleShellScriptExecMenu()
{
    add_menu_page('WordPress Simple Shell Script Exec Plugin','WP SSS Exec','administrator', __FILE__, 's17u_WpSimpleShellScriptExecPage' , 'dashicons-admin-plugins');
    add_action('admin_init', 's17u_RegisterPluginSettings');
}

function s17u_RegisterPluginSettings() {
    s17u_WpSimpleShellScriptExec();
}

function s17u_WpSimpleShellScriptExec()
{
    $script_file = __DIR__ . '/script.sh';
    if (!file_exists($script_file)) {
        $s = "echo hello";
        $create_sample_script_file_cmd = 'echo "' . $s . '" > ' . $script_file;
        exec($create_sample_script_file_cmd);
    }
    $cmd = 'sh ' . $script_file . ' > ' . __DIR__ . '/result.txt';
    exec($cmd);
}

function s17u_WpSimpleShellScriptExecPage() {
    $result = '';
    $filename = __DIR__ . '/result.txt';
    if (file_exists($filename)) {
        $result = file_get_contents($filename);
    }
?>
        <div class="wrap">
        <h1>WordPress Simple Shell Script Exec</h1>
        
        <form method='post'><input type='hidden' name='form-name' value='form 1' />
            <?php submit_button('Execute'); ?>
        </form>
<?php
    echo '<div><span style="font-weight:bold;">result.txt</span><br>';
    echo $result;
    echo '</div>';
}
