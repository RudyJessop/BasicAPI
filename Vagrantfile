# -*- mode: ruby -*-
# vi: set ft=ruby :

MAINVM = "virtualbox"
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  config.vm.box = "RudyJessop/corebox"
  config.vm.network "private_network", ip: "192.168.20.21"
  config.vm.hostname = "corebox"
  config.vm.synced_folder ".", "/var/www/", :owner=> 'www-data', :group=> 'www-data', :mount_options => ['dmode=775', 'fmode=775']
  config.vm.boot_timeout = 500

  config.ssh.insert_key = false

  config.vm.provider(MAINVM) do |v|
    v.name = "mobileAPI"
    #v.memory = 2048
    # v.cpus = 2
  end

#Basic Provisioning
  config.vm.provision 'shell', path: 'scripts/base.sh'

end

