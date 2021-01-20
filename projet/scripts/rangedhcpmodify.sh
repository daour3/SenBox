#!/bin/bash
old=$(grep range /etc/dhcp/dhcpd.conf)
new="range $1 $2;"
sudo sed -i -e "s/$old/$new/g" /etc/dhcp/dhcpd.conf 
