installation:
 -----------------

 •sudo vim /etc/apache2/httpd.conf
  ===========

  #DocumentRoot "/Library/WebServer/Documents"
  DocumentRoot "/*****/FaceSubStitution"

  ===========
  ※***はインストールdir名

 •cd patch && sudo sh httpd_patch.sh
   permissionを許可する

