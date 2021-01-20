 #!/bin/bash
mapfile -t users < /var/lib/dhcp/dhcpd.leases

echo users();