<?php

namespace TweakIt\Bundle\DoctrineDatagridBundle\Datagrid;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * @author Maxime CORSON <maxime.corson@spyrit.net>
 */
class DoctrineDatagridFactory
{

    /**
     * ManagerRegistry instance
     *
     * @var ManagerRegistry
     */
    public $doctrine;

    /**
     * RequestStack instance
     *
     * @var RequestStack
     */
    public $requestStack;

    /**
     * SessionInterface instance
     *
     * @var SessionInterface
     */
    public $session;

    /**
     * FormFactoryInterface instance
     *
     * @var FormFactoryInterface
     */
    public $formFactory;

    /**
     * RouterInterface instance
     *
     * @var RouterInterface
     */
    public $router;

    /**
     * TokenStorageInterface instance
     *
     * @var TokenStorageInterface
     */
    public $tokenStorage;


    /**
     * DoctrineDatagridFactory constructor
     *
     * @param ManagerRegistry $doctrine
     * @param RequestStack $requestStack
     * @param SessionInterface $session
     * @param FormFactoryInterface $formFactory
     * @param RouterInterface $router
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(ManagerRegistry $doctrine, RequestStack $requestStack, SessionInterface $session, FormFactoryInterface $formFactory, RouterInterface $router, TokenStorageInterface $tokenStorage)
    {
        $this->doctrine = $doctrine;
        $this->requestStack = $requestStack;
        $this->session = $session;
        $this->formFactory = $formFactory;
        $this->router = $router;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * Create an instance of DoctrineDatagrid
     *
     * @param string $name
     * @param array $params
     * @return DoctrineDatagrid
     */
    public function create($name, $params = array())
    {
        return new DoctrineDatagrid($name, $params, $this->doctrine, $this->requestStack, $this->session, $this->formFactory, $this->router, $this->tokenStorage);
    }
}
