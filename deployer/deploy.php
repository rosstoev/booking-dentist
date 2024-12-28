<?php
namespace Deployer;

require 'recipe/symfony.php';

// Config

set('repository', 'git@github.com:rosstoev/booking-dentist.git');

// Number of releases to preserve in releases folder.
set('keep_releases', 3);

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('demo')
    ->setHostname('192.168.0.106')
    ->set('branch', 'develop')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '/var/www/bookingdentist');

// Tasks
task('database:create', function () {
    run("{{bin/console}} doctrine:database:create --if-not-exists");
});

// Hooks
before('database:migrate', 'database:create');
after('deploy:symlink', 'database:migrate');
after('deploy:failed', 'deploy:unlock');

