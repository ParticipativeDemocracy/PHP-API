########################################################################################################################
## Vagrant Configuration File
########################################################################################################################

########################################################################################################################
## Bootstrapping / Requirements
########################################################################################################################
Vagrant.require_version ">= 1.9.0"

unless Vagrant.has_plugin?("vagrant-hostsupdater")
  raise 'vagrant-hostsupdater is not installed! Run "vagrant plugin install vagrant-hostsupdater"'
end

Vagrant.configure("2") do |config|

    ####################################################################################################################
    ## Shared Ansible Configuration Method
    ####################################################################################################################
    def shared_ansible_config(ansible)
        ansible.playbook = "ansible/playbook.yml"
        ansible.host_key_checking = true
        ansible.sudo = true
    end
    
    ####################################################################################################################
    ## dev-api.government.local (resolves to local connection)
    ####################################################################################################################
        
    config.vm.define "dev" do |dev|
        dev.vm.network "private_network", ip: "172.28.128.100"
        dev.vm.hostname = "api.government.local"
        dev.hostsupdater.aliases = [
            "assets.government.local"
        ]

        dev.vm.box = "bento/ubuntu-16.10"
        dev.vm.synced_folder ".", "/vagrant", owner: "www-data", group: "www-data", mount_options: ["dmode=775,fmode=775"]

        dev.vm.provider :virtualbox do |vb|
            vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
            vb.customize ["modifyvm", :id, "--natdnsproxy1", "on"]
            vb.customize ["modifyvm", :id, "--ostype", "Ubuntu_64"]
            vb.customize ["guestproperty", "set", :id, "/VirtualBox/GuestAdd/VBoxService/--timesync-set-threshold", 10000]
            
            vb.memory = 2048
            vb.name = "Government_API"
        end
        
        dev.vm.provision "ansible" do |ansible|
            shared_ansible_config ansible
            ansible.host_key_checking = false ## override for local
            ansible.extra_vars = {
                server_name: dev.vm.hostname,
                server_env: "development",
                notification_email: "dev@pomeloproductions.com"
            }
        end
    end
    
end