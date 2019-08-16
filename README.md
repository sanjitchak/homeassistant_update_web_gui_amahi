# homeassistant_update_web_gui_amahi. Used ajax to call shell commands in php  

## Dependencies required:-  
1. Install php

## Add this to automations.yaml file for update notifications :-  
```
 - alias: Update notifications
   trigger:
         platform: state
         entity_id: updater.updater
   action:
         service: persistent_notification.create
         data:
                message: "You have a new update. Update from side panel"
                title: "Update Available"


EOF
```

## Add this to configuration.yaml :-   
```
updater:  
panel_iframe: 
 updater_hass:
    title: Updater
    icon: mdi:update
    url:  http://IP_ADDRESS:50999
```

## Steps to start:-  
Execute:-  
cd ```/path/to/repo/  ```
php -S 0.0.0.0:50999  

Now, go to your homeassitant and check updater in sidepanel.  

## To add service to start after restart:-    
change in ```update_interface.sh``` file:- 
change ```cd /var/hda/web-apps/hass/homeassistant_update_web_gui_amahi-master ``` to ```cd /path/to/REPO  ```
 
Execute:-  
chmod 755 path/to/update_interface.sh    

#Hass Update web
cat > hass-update.service << SVC
[Unit]
Description=Hass Update web
After=network-online.target

[Service]
Type=simple
User=root
ExecStart=/usr/bin/bash ```/path/to/repo```

[Install]
WantedBy=multi-user.target
SVC   

sudo install hass-update.service /usr/lib/systemd/system;  

sudo systemctl --system daemon-reload;  

sudo systemctl enable hass-update;   

sudo systemctl start hass-update;  
