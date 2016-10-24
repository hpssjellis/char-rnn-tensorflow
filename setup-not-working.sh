#!/bin/bash  

#  only need to run this script with the command (do not type the #)
#  bash setup.sh

# for error checking really good to run (without the # comment)
#bash setup.sh 2>&1 | tee x-output-errors.txt


sudo apt-get update



sudo apt-get -y install python-pip python-dev python-virtualenv libblas-dev liblapack-dev libatlas-base-dev gfortran




echo "--------------------------------------------------------------"
echo ". "

echo "make the tensorflow environment"

virtualenv --system-site-packages ~/virtual-tf

echo "--------------------------------------------------------------"
echo ". "







echo "Activate the environemtn use deactivate to get your cursor back"
source ~/virtual-tf/bin/activate 

printf "\n\nsource ~/virtual-tf/bin/activate "  >> ~/.profile
printf "\necho 'enter   deactivate    to get out of the virtual enviroment'"  >> ~/.profile























echo "Installing a few extra packages"


#note still having issues with numpy not installing from pip and building from scratch
#tried several methods, perhaps try
#should  Install dask, numpy, and pandas
#pip install dask[dataframe]




#pip install Wand

#pip install numpy

#pip install scipy

#pip install matplotlib

#pip install pymatbridge

#pip install scikit-learn

#pip install pandas


#pip install keras






echo "Now intall tensorFlow into the enviroment"



#May 13, 2016, nightly build version 0.8.? tensorflow
# this is needed for some skflow examples but causes weird behaviour with numpy and panadas
#sudo pip install --upgrade http://ci.tensorflow.org/view/Nightly/job/nightly-matrix-cpu/TF_BUILD_CONTAINER_TYPE=CPU,TF_BUILD_IS_OPT=OPT,TF_BUILD_IS_PIP=PIP,TF_BUILD_PYTHON_VERSION=PYTHON2,label=cpu-slave/lastSuccessfulBuild/artifact/pip_test/whl/tensorflow-0.8.0-cp27-none-linux_x86_64.whl


sudo pip install --upgrade https://storage.googleapis.com/tensorflow/linux/cpu/tensorflow-0.11.0rc0-cp27-none-linux_x86_64.whl




echo "Make a link to the actual installed pip tensorflow"

ln -s /home/ubuntu//v-rnn/lib/python2.7/site-packages/tensorflow /home/ubuntu/workspace/pip-tensorflow-link














#Just incase you want ipython Notebook

#pip install --upgrade ipython
#pip install --upgrade jupyter

#jupyter notebook --ip=0.0.0.0 --port=8080 --no-browser
#jupyter notebook --ip $IP --port $PORT --no-browser


