#!/bin/bash
#!/usr/bin/php
#
/usr/bin/php get_plugin_names.php > addons.txt;
echo 'Add-on listing: ';
cat ./addons.txt;
echo '---------------------';
for i in `cat ./addons.txt`
do
   # echo "Addon in que: $i";
moosh -n plugin-list |grep $i|grep -v 3.11
done
