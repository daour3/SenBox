#!/bin/bash
old=$(sudo cat /etc/dhcp/dhcpd.conf)
old_line= $(sudo grep "range" /etc/dhcp/dhcpd.conf)
new="range $1 $2"
echo $old
#echo $old_line
echo $new
sudo sed -i -e 's/$old_line/$new/g' /etc/dhcp/dhcpd.conf
