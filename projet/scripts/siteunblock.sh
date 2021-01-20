#!/bin/bash
old=$(sudo cat /etc/hosts|grep $1)
vide=''
sudo sed -i -e "s/$old/$vide/g" /etc/hosts
