<?php

use \system\classes\Core;
use \system\classes\Configuration;


// get vscode hostname
$vscode_hostname = Core::getSetting('visual_studio_code/hostname', 'vscode');
if(strlen($vscode_hostname) < 2){
    $vscode_hostname = Core::getBrowserHostname();
}
// get port (if any)
$vscode_port = Core::getSetting('visual_studio_code/port', 'vscode');
$vscode_port = ($vscode_port == "0")? "" : sprintf(":%s", ltrim($vscode_port, ":"));

// get path (if any)
$vscode_path = Core::getSetting('visual_studio_code/path', 'vscode');
$vscode_path = (strlen(trim($vscode_path)) <= 0)? "" : sprintf("/%s", ltrim($vscode_path, "/"));

// compile URL
$vscode_url = sprintf(
    'http://%s%s/?folder=%s',
    $vscode_hostname,
    $vscode_port,
    $vscode_path
);
?>

<style type="text/css">
    #page_container{
      min-width: 100%;
    }

    ._ctheme_content {
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        border-top: 1px solid black;
        border-left: 1px solid black;
    }

    #vscode_iframe {
        width: 100%;
        height: 100%;
        position: absolute;
        bottom: 0;
        top: 0;
        left: 0;
        right: 0;
    }
</style>

<iframe
  id="vscode_iframe"
  src="<?php echo $vscode_url ?>"
  frameborder="0"
  scrolling="yes"
></iframe>

