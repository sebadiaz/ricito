#!/bin/sh
HOST='ftp.cluster021.hosting.ovh.net'
USER=$1
PASSWD=$2

ftp -n -p -v $HOST 21<<END_SCRIPT
quote USER $USER
quote PASS $PASSWD
cd www
bin
mput index.php mail.php sitemap.xml robots.txt
quit
END_SCRIPT
exit 0