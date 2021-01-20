#!/bin/bash
old=$(grep "range" /etc/dhcp/dhcpd.conf)

sudo grep "range" /etc/dhcp/dhcpd.conf | sed "s/$old/range '$1' '$2'/"


sudo systemctl restart isc-dhcp-server.service

#!/bin/bash

sudo echo '
ddns-update-style none;

default-lease-time 600;
authoritative;
log-facility local7;

subnet 192.168.1.0 netmask 255.255.255.0 {
  range '$1' '$2';
  option domain-name-servers 8.8.8.8;
  option subnet-mask 255.255.255.224;
  #option routers '\''$1'\'';
  option broadcast-address 192.168.1.255;
  default-lease-time 600;
  max-lease-time 7200;
}


' > /etc/dhcp/dhcpd.conf


sudo systemctl restart isc-dhcp-server.service

