# Puppet module for DDS2

class dds2-client {

  $packages = [
    'apache2',
    'php5',
    'php5-ldap',
    'imagemagick',
    'mysql-server',
    'php5-mysql',
    'php5-pgsql',
    'libapache2-mod-php5'
  ]
  package { $packages: ensure => installed }

  $services = [
    'apache2', 
    'mysql'
  ]
  service { $services: ensure => running }

  Package['apache2'] -> Service['apache2']
  Package['mysql-server'] -> Service['mysql']

}
