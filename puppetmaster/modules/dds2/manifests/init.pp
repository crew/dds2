# Puppet module for DDS2

class dds2-client ( {

  $packages = ['apache2', 'php5', 'php-ldap', 'imagemagick', 'mysql-server', 'php5-mysql']

  package { $packages: ensure => installed }

  service { 'apache2': ensure => running }

}
