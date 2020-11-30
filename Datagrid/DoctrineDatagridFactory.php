<?php

namespace TweakIt\Bundle\DoctrineDatagridBundle\Datagrid;
use Symfony\Component\DependencyInjection\ContainerInterface;
 
/**
 * @author Maxime CORSON <maxime.corson@spyrit.net>
 */
class DoctrineDatagridFactory
{
    protected $container;
    
    /**
     * Just a simple constructor
     * @param Container $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    
    /**
     * Create an instance of DoctrineDatagrid
     * @param string $name
     * @return \DoctrineDatagridBundle\Datagrid\DoctrineDatagrid
     */
    public function create($name, $params = array())
    {
        return new DoctrineDatagrid($this->container, $name, $params);
    }
}
