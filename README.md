# Workshop: "DTOs & Serialization"

## Getting started

You don't need much to run the code in this project: just PHP 7 and composer. Run:

    composer install

Run the (unit) tests:

    vendor/bin/phpunit

If you don't want to install PHP 7 on your machine, you could also run:

    vagrant up

This will set up a Vagrant box for development. Afterwards you can run:

    vagrant ssh
    cd /vagrant

Then run the tests (see above).