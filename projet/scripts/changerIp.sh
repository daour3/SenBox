 
#!/bin/bash 

echo 'auto lo
iface lo inet loopback

auto eth0
iface eth0 inet dhcp

auto eth1
iface eth1 inet static
address '$1'
netmask 255.255.255.0

'> /etc/network/interfaces

sudo ip addr flush dev eth1
sudo /etc/init.d/networking restart
