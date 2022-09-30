#!/bin/bash

rm -f /etc/systemd/system/php_network_scanner.service

cat << EOF > /etc/systemd/system/php_network_scanner.service
[Unit]
Description=php_network_scanner
Documentation=
After=network.target

[Service]
WorkingDirectory=$PWD
ExecStart=/bin/bash start_dev_server.sh
User=$USER
Group=$USER
KillMode=process
Restart=on-failure
RestartPreventExitStatus=255
Type=notify

[Install]
WantedBy=multi-user.target
Alias=php_network_scanner.service
EOF

echo "[+] installed: php_network_scanner.service"
echo "[+] path: /etc/systemd/system/php_network_scanner.service"

systemctl daemon-reload
systemctl start php_network_scanner.service
systemctl enable php_network_scanner.service
systemctl status php_network_scanner.service