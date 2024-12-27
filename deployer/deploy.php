<?php
namespace Deployer;

require 'recipe/symfony.php';

// Config

set('repository', 'git@github.com:rosstoev/booking-dentist.git');
//set('branch', 'master');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('127.0.0.1')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '/var/www/booking-dentist');

// Hooks

after('deploy:failed', 'deploy:unlock');
