#!/usr/bin/env bash

sudo adduser vagrant --disabled-password --gecos "Vagrant User"
sudo usermod -aG sudo vagrant
sudo echo "vagrant ALL=NOPASSWD: ALL" >> /etc/sudoers
mkdir /home/vagrant/.ssh
chgrp -R vagrant /home/vagrant/.ssh
chown -R vagrant /home/vagrant/.ssh

sudo apt-get install python -y