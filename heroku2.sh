#!/bin/bash  

#  only need to run this script with the command (do not type the #)
#  heroku run bash heroku2.sh


sudo apt-get update

sudo apt-get -y install  pkg-config zip g++ zlib1g-dev unzip


sudo apt-get -y install python-pip python-dev python-virtualenv libblas-dev liblapack-dev libatlas-base-dev gfortran




virtualenv --system-site-packages ~/virtual-tf





source ~/virtual-tf/bin/activate 

printf "\n\nsource ~/virtual-tf/bin/activate "  >> ~/.profile
printf "\necho 'enter   deactivate    to get out of the virtual enviroment'"  >> ~/.profile




echo "Now get TensorFlow"



sudo pip install --upgrade https://storage.googleapis.com/tensorflow/linux/cpu/tensorflow-0.10.0rc0-cp27-none-linux_x86_64.whl


#new version 0.11 tensorflow not working yet with this code
#sudo pip install --upgrade https://storage.googleapis.com/tensorflow/linux/cpu/tensorflow-0.11.0rc0-cp27-none-linux_x86_64.whl






echo "-------------DONE TENSORFLOW-------------------------------------------------"
echo ". "





echo "Start Apache2 for php"
sudo /etc/init.d/apache2 start
