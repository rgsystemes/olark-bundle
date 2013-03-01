Introduction
============

Easily integrate [Olark](http://www.olark.com) into your Symfony2 projects.

Installation
============

  1. Add this bundle to your vendor/ dir using the vendors script:

    Add the following lines in your ``deps`` file:

        [RGOlarkBundle]
            git=git://github.com/rgsystemes/OlarkBundle.git
            target=/bundles/RG/OlarkBundle

    and run the vendors script:

        ./bin/vendors install

    **Or** add the following to your `composer.json`:

        "rgsystemes/olark-bundle": "dev-master"

    and run:

        php composer.phar install

    The bundle is compatible with Symfony 2.0 upwards.


  2. If you're not using Composer, add the RG namespace to your autoloader:

        // app/autoload.php
        $loader->registerNamespaces(array(
            'RG' => __DIR__.'/../vendor/bundles',
        ));

  3. Add this bundle to your application's kernel:

        // app/AppKernel.php
        public function registerBundles()
        {
            return array(
                // ...
                new RG\OlarkBundle\RGOlarkBundle(),
                // ...
            );
        }

  4. Configure the `rg_olark` service in your config.yml:

        rg_olark:
            id: xxxx-xxx-xx-xxxx


That's  it for basic configuration.

Usage
=====

In your template:

    {% include "OlarkBundle::olark.html.twig" %}


Overriding the template
=======================

You can override the template used by copying the
`Resources/views/olark.html.twig` file out of the bundle and placing it
into `app/Resources/RGOlarkBundle/views`, then customising
as you see fit.
