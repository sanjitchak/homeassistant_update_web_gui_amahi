<?php

exec('cd /var/hda/web-apps/hass/homeassistant; source bin/activate; python3 -m pip install homeassistant=='.$_REQUEST['HAVersion'].'; deactivate; systemctl restart homeassistant;', $output, $return_var);
echo $return_var;

?>
