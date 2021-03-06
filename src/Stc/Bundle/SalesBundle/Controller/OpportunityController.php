<?php

namespace Stc\Bundle\SalesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;

use OroCRM\Bundle\AccountBundle\Entity\Account;
use OroCRM\Bundle\SalesBundle\Entity\Opportunity;

/**
 * @Route("/opportunity")
 */
class OpportunityController extends Controller
{
    /**
     * @Route("/view/{id}", name="orocrm_sales_opportunity_view", requirements={"id"="\d+"})
     * @Template
     * @Acl(
     *      id="orocrm_sales_opportunity_view",
     *      type="entity",
     *      permission="VIEW",
     *      class="OroCRMSalesBundle:Opportunity"
     * )
     */
    public function viewAction(Opportunity $entity)
    {
        return array(
            'entity' => $entity,
        );
    }

    /**
     * @Route("/info/{id}", name="orocrm_sales_opportunity_info", requirements={"id"="\d+"})
     * @Template
     * @AclAncestor("orocrm_sales_opportunity_view")
     */
    public function infoAction(Opportunity $entity)
    {
        return array(
            'entity'  => $entity
        );
    }

    /**
     * @Route("/create", name="orocrm_sales_opportunity_create")
     * @Template("OroCRMSalesBundle:Opportunity:update.html.twig")
     * @Acl(
     *      id="orocrm_sales_opportunity_create",
     *      type="entity",
     *      permission="CREATE",
     *      class="OroCRMSalesBundle:Opportunity"
     * )
     */
    public function createAction()
    {
        $entity = new Opportunity();
        $accountId = $this->getRequest()->get('account');
        if ($accountId) {
            $repository = $this->getDoctrine()->getRepository('OroCRMAccountBundle:Account');
            /** @var Account $account */
            $account = $repository->find($accountId);
            if ($account) {
                /** @var Opportunity $entity */
                $entity->setAccount($account);
            } else {
                throw new NotFoundHttpException(sprintf('Account with ID %s is not found', $accountId));
            }
        }

        return $this->update($entity);
    }

    /**
     * @Route("/update/{id}", name="orocrm_sales_opportunity_update", requirements={"id"="\d+"}, defaults={"id"=0})
     * @Template
     * @Acl(
     *      id="orocrm_sales_opportunity_update",
     *      type="entity",
     *      permission="EDIT",
     *      class="OroCRMSalesBundle:Opportunity"
     * )
     */
    public function updateAction(Opportunity $entity)
    {
        return $this->update($entity);
    }

    /**
     * @Route(
     *      "/{_format}",
     *      name="orocrm_sales_opportunity_index",
     *      requirements={"_format"="html|json"},
     *      defaults={"_format" = "html"}
     * )
     * @Template
     * @AclAncestor("orocrm_sales_opportunity_view")
     */
    public function indexAction()
    {
        return [
            'entity_class' => $this->container->getParameter('orocrm_sales.opportunity.class')
        ];
    }

    /**
     * @param Opportunity $entity
     * @return array
     */
    protected function update(Opportunity $entity)
    {
        return $this->get('oro_form.model.update_handler')->handleUpdate(
            $entity,
            $this->get('orocrm_sales.opportunity.form'),
            function (Opportunity $entity) {
                return array(
                    'route' => 'orocrm_sales_opportunity_update',
                    'parameters' => array('id' => $entity->getId())
                );
            },
            function (Opportunity $entity) {
                return array(
                    'route' => 'orocrm_sales_opportunity_view',
                    'parameters' => array('id' => $entity->getId())
                );
            },
            $this->get('translator')->trans('orocrm.sales.controller.opportunity.saved.message'),
            $this->get('orocrm_sales.opportunity.form.handler')
        );
    }

    /**
     * @Route(
     *        "/widget/account-opportunities/{id}",
     *        name="orocrm_sales_widget_account_opportunities",
     *        requirements={"id"="\d+"}
     * )
     * @AclAncestor("orocrm_sales_opportunity_view")
     * @Template()
     */
    public function accountOpportunitiesAction(Account $account)
    {
        return array('entity' => $account);
    }
}
