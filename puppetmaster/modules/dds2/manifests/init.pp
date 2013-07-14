# Puppet module for DDS2

class dds2 {

  $packages = ['apache2', 'php5', 'php-ldap', 'imagemagick', 'mysql-server']

  package { $packages: ensure => installed }

  service { 'apache2': ensure => running }

}
