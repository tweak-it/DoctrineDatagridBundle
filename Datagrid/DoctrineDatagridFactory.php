<?php

namespace TweakIt\Bundle\DoctrineDatagridBundle\Datagrid;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\RouterInterface;
/**
 * @author Maxime CORSON <maxime.corson@spyrit.net>
 */
class DoctrineDatagridFactory
{
    
    public function __construct(ManagerRegistry $doctrine,RequestStack $requestStack,SessionInterface $session,FormFactoryInterface $formFactory,RouterInterface $router)
    {
        $this->doctrine=$doctrine;
        $this->requestStack=$requestStack;
        $this->session=$session;
        $this->formFactory= $formFactory;
        $this->router=$router;
    }
    
    /**
     * Create an instance of DoctrineDatagrid
     * @param string $name
     * @return \DoctrineDatagridBundle\Datagrid\DoctrineDatagrid
     */
    public function create($name, $params = array())
    {
        return new DoctrineDatagrid($name, $params,$this->doctrine, $this->requestStack, $this->session, $this->formFactory, $this->router);
    }
}
