#!/bin/bash
#Assign existing hostname to $hostn
#hostn=$(cat /etc/hostname)

#Display existing hostname
#echo "hostname existant : $hostn"

sudo echo ''$1'' > /etc/hostname

sudo echo '
127.0.0.1	localhost
127.0.1.1       '$1'

# The following lines are desirable for IPv6 capable hosts
::1     localhost ip6-localhost ip6-loopback
ff02::1 ip6-allnodes
ff02::2 ip6-allrouters' > /etc/hosts

/bin/sh -c > /dev/null 2>&1 &
#newhost=$1

#change hostname in /etc/hosts & /etc/hostname
#sudo sed -i "s/$hostn/$newhost/g" /etc/hosts
#sudo sed -i "s/$hostn/$newhost/g" /etc/hostname

#display new hostname
#echo "nouveau hostname $newhost"


