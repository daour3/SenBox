#!/bin/bash
sed -i -e 's/host '$1' {\nhardware ethernet '$2';\nfixed-address '$3';\n}/host '$1' {\nhardware ethernet '$2';\nfixed-address '$4';\n}/g' /etc/dhcp/dhcpd.conf

service isc-dhcp-server restart
