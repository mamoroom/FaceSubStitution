APATCH_USER_CONF_PATH="/etc/apache2/users"
APPLETON_CONF_PATH="$APATCH_USER_CONF_PATH/appleton.conf"

mkdir $APATCH_USER_CONF_PATH
cp appleton.conf $APPLETON_CONF_PATH
echo "Include $APATCH_USER_CONF_PATH/*.conf" >>  /etc/apache2/httpd.conf

sudo apachectl restart 
