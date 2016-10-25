#!/bin/bash  

#  only need to run this script with the command (do not type the #)
#  bash setup.sh



#commented out batch files are from another github site at https://github.com/hpssjellis/TensorFlow-Android-Camera-Demo-on-Cloud9
# or also at https://github.com/hpssjellis/my-google-magenta-installation
echo "Installs Magenta to a folder in your home directory called mymagenta"




mkdir /home/ubuntu/workspace

cd /home/ubuntu/workspace




echo "Now trying Bazel"




#sudo apt-get  -y install software-properties-common
#sudo add-apt-repository ppa:webupd8team/java
sudo apt-get update
#sudo apt-get -y install oracle-java8-installer pkg-config zip g++ zlib1g-dev unzip
sudo apt-get -y install  pkg-config zip g++ zlib1g-dev unzip

mkdir /home/ubuntu/workspace/bazel
cd /home/ubuntu/workspace/bazel

#wget https://github.com/bazelbuild/bazel/releases/download/0.2.3/bazel-0.2.3-installer-linux-x86_64.sh -O /home/ubuntu/workspace/bazel/bazel-0.2.3-installer-linux-x86_64.sh
wget https://github.com/bazelbuild/bazel/releases/download/0.3.1/bazel-0.3.1-installer-linux-x86_64.sh -O /home/ubuntu/workspace/bazel/bazel-0.3.1-installer-linux-x86_64.sh

#chmod +x bazel-0.2.3-installer-linux-x86_64.sh


echo "Presently these next two commands not working well. May have to do from the command line"


sudo bash bazel-0.3.1-installer-linux-x86_64.sh --user

#sudo bash bazel-0.2.3-installer-linux-x86_64.sh --user
#bash bazel-0.2.3-installer-linux-x86_64.sh --user --bin=${IDEDIR}/bin

#export PATH=$PATH:~/bin
export PATH="$PATH:~/bin"
#rm bazel-0.2.3-installer-linux-x86_64.sh

echo "Just test if bazel is working"

bazel -h



echo "Needed if you open a new terminal to reset the path to bazel"
printf "\n\nexport PATH=\$PATH:~/bin"  >> ~/.profile

#printf "\n\nsource ./bin/bazel-complete.bash"  >> ~/.profile
echo ""
echo "Did bazel install? Should see the bazel help info"
#echo "Press enter, if issues press ctrl-C and find out the mistake, probably the path in ~/.profile"
#read



cd /home/ubuntu/workspace


echo "----------------Bazel Done----------------------------------------------"
echo ". "


echo "Install a bunch of needed files"

sudo apt-get -y install python-pip python-dev python-virtualenv libblas-dev liblapack-dev libatlas-base-dev gfortran


echo "make the tensorflow environment"

virtualenv --system-site-packages ~/virtual-tf

echo "--------------------------------------------------------------"
echo ". "



echo "Activate the environment use deactivate to get your cursor back"
source ~/virtual-tf/bin/activate 

printf "\n\nsource ~/virtual-tf/bin/activate "  >> ~/.profile
printf "\necho 'enter   deactivate    to get out of the virtual enviroment'"  >> ~/.profile




echo "Now get TensorFlow"

cd /home/ubuntu/workspace

#sudo pip install --upgrade http://ci.tensorflow.org/view/Nightly/job/nightly-matrix-cpu/TF_BUILD_CONTAINER_TYPE=CPU,TF_BUILD_IS_OPT=OPT,TF_BUILD_IS_PIP=PIP,TF_BUILD_PYTHON_VERSION=PYTHON2,label=cpu-slave/lastSuccessfulBuild/artifact/pip_test/whl/tensorflow-0.8.0-cp27-none-linux_x86_64.whl

#git clone --recurse-submodules https://github.com/tensorflow/tensorflow /home/ubuntu/workspace/tensorflow/tensorflow

#sudo pip install --upgrade https://storage.googleapis.com/tensorflow/linux/cpu/tensorflow-0.8.0-cp27-none-linux_x86_64.whl


#new version 0.9 needed for magenta


#sudo pip install https://storage.googleapis.com/tensorflow/linux/cpu/tensorflow-0.9.0rc0-cp27-none-linux_x86_64.whl


sudo pip install --upgrade https://storage.googleapis.com/tensorflow/linux/cpu/tensorflow-0.10.0rc0-cp27-none-linux_x86_64.whl





#echo "Now download the image sets this was needed for my tensorflow repository"


#wget https://storage.googleapis.com/download.tensorflow.org/models/inception5h.zip -O /tmp/inception5h.zip

#unzip /tmp/inception5h.zip -d /home/ubuntu/workspace/tensorflow/tensorflow/examples/android/assets/


#rm /tmp/inception5h.zip



#echo "exporting the Path to my .bashrc file so other terminals have the path"



# ????????????????? was working without this, check that ist still works ??????????????????

#printf "\n\nexport TENSORFLOW_HOME=/home/ubuntu/workspace/tensorflow/tensorflow\nexport PATH=\$PATH:\$TENSORFLOW_HOME/bin"  >> ~/.profile


#echo "exporting the path for this terminal so that commands work"


#export TENSORFLOW_HOME=/home/ubuntu/workspace/tensorflow/tensorflow
#export PATH=$PATH:$TENSORFLOW_HOME/bin





echo "-------------DONE TENSORFLOW-------------------------------------------------"
echo ". "






cd /home/ubuntu/workspace/

git clone https://github.com/hpssjellis/char-rnn-tensorflow-music-3dprinting.git

