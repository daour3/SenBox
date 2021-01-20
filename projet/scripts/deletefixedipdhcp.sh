#!/bin/bash

host=$(echo "host $1 { hardware ethernet $2; fixed-address $3; }")
vide=""
sudo sed -i -e "s/$host/$vide/g" /etc/dhcp/dhcpd.conf
service isc-dhcp-server restart
