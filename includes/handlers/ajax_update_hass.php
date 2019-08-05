<?php

exec('cd /var/hda/web-apps/hass/homeassistant; source bin/activate; python3 -m pip install --upgrade homeassistant; deactivate; systemctl restart homeassistant;', $output, $return_var);

echo $return_var;

?>
