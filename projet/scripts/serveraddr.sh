#!/bin/bash
addr=$(ifconfig eth1 | awk -F ' *|:' '/inet addr/{print $4}')
echo $addr
