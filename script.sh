#!/bin/sh
HOST='ftp.cluster021.hosting.ovh.net'
USER=$1
PASSWD=$2

ftp -n -p -v $HOST 21<<END_SCRIPT
quote USER $USER
quote PASS $PASSWD
cd www
bin
mput mail.php sitemap.xml robots.txt siteweb/index.html siteweb/approach.html siteweb/contact.html  siteweb/data.html siteweb/expertise.html siteweb/mentionslegales.html siteweb/privacy.html siteweb/software.html siteweb/sport.html siteweb/terms.html siteweb/cgv_service.pdf
quit
END_SCRIPT
exit 0