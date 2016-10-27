#!/bin/bash  

#  only need to run this script with the command (do not type the #)
#  heroku run bash heroku2.sh


apt-get update

apt-get -y install  pkg-config zip g++ zlib1g-dev unzip


apt-get -y install python-pip python-dev python-virtualenv libblas-dev liblapack-dev libatlas-base-dev gfortran




echo "Now get TensorFlow"



pip install --upgrade https://storage.googleapis.com/tensorflow/linux/cpu/tensorflow-0.10.0rc0-cp27-none-linux_x86_64.whl






echo "-------------DONE TENSORFLOW-------------------------------------------------"
echo ". "





echo "Start Apache2 for php"
/etc/init.d/apache2 start
