# Puppet module for DDS2

class dds2 {

  package { 'apache2': ensure => installed }
  package { 'php5': ensure => installed }
  package { 'imagemagick': ensure => installed }

  service { 'apache2': ensure => running }

}
