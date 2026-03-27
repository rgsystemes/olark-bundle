<?php

namespace RG\OlarkBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Provides an extension for Twig to get the Olark log_id
 */
class OlarkExtension extends AbstractExtension
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return array(
            new TwigFunction('rg_olark_id', array($this, 'getOlarkId'), array('is_safe' => array('html'))),
            new TwigFunction('rg_olark_option', array($this, 'getOlarkOption'), array('is_safe' => array('html')))
        );
    }

    /**
     * Returns the Olark id
     *
     * @return string
     */
    public function getOlarkId()
    {
        // If a branded id is defined
        $brandedId = $this->getOlarkOption('branded_id');
        if (!is_null($brandedId)) {
            // If the defined branded id is an empty string, it means
            // we don't wanna use the one given in the configuration file
            if (strlen($brandedId) == 0)
                return null;

            // But if it's not an empty string, it means we want to overload the
            // given one in the configuration file
            return $brandedId;
        }

        // If there's no support for branded olark id, we simply use the configuration file
        if ($this->container->hasParameter('rg_olark.id'))
            return $this->container->getParameter('rg_olark.id');

        // There's no support for olark detected !
        return null;
    }

    /**
     * Returns an Olark option
     *
     * @return string
     */
    public function getOlarkOption($key)
    {
        $olarkOptions = $this->container->get('rg_olark_options');
        if (!isset($olarkOptions[$key]))
            return null;

        return $olarkOptions[$key];
    }
}
