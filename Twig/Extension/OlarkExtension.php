<?php

namespace RG\OlarkBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides an extension for Twig to get the Olark log_id
 */
class OlarkExtension extends \Twig_Extension
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
            "rg_olark_id"  => new \Twig_Function_Method($this, "getOlarkId", array("is_safe" => array("html"))),
        );
    }

    /**
     * Returns the Olark id
     *
     * @return string
     */
    public function getOlarkId()
    {
        return $this->container->getParameter('rg_olark.id');
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return "olark";
    }
}
