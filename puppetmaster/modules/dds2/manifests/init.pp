# Puppet module for DDS2

class dds2-client (
  $slides = undef
) {

  $packages = [
    'apache2',
    'php5',
    'php5-ldap',
    'imagemagick',
    'mysql-server',
    'php5-mysql',
    'php5-pgsql',
    'libapache2-mod-php5',
    'libyaml-dev',
    'php-pear',
    'php5-dev',
   ]

  package { $packages: ensure => installed }

  $services = [
    'apache2',
    'mysql'
  ]
  service { $services: ensure => running }

  file { '/var/www/':
    ensure => directory,
    recurse => true,
    links => follow,
    source => "puppet:///modules/dds2-client/www",
    before => File['/var/www/slides/']
  }

  file { '/var/www/slides/':
    ensure => directory,
    links => follow,
    #source => "puppet:///modules/dds2-client/slides",
  }

  if($slides == undef) {
    fail("Where's your slides, bro? $slides")
  } else {
    each($slides) |$x| {
      file { "/var/www/slides/$x":
        ensure => directory,
        recurse => true,
        links => follow,
        require => File['/var/www/slides'],
        source => "puppet:///modules/dds2-client/slides/$x",
      }
    }
  }


  File['/var/www/'] -> File['/var/www/slides/']
  Package['apache2'] -> Service['apache2']
  Package['mysql-server'] -> Service['mysql']



}
