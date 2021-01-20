#!/bin/bash
echo "host $1 { hardware ethernet $2; fixed-address $3; }" >> /etc/dhcp/dhcpd.conf

sudo service isc-dhcp-server restart
