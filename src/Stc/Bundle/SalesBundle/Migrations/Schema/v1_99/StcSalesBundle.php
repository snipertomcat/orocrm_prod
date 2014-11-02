<?php


namespace Stc\Bundle\SalesBundle\Migrations\Schema\v1_99;


use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtension;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtensionAwareInterface;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;
use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;

class StcSalesBundle implements Migration, ExtendExtensionAwareInterface
{
    protected $extendExtension;

    public function setExtendExtension(ExtendExtension $extendExtension)
    {
        $this->extendExtension = $extendExtension;
    }

    public function up(Schema $schema, QueryBag $queries)
    {
        $table = $schema->getTable('orocrm_sales_lead');


        /*
        $table->addColumn(
            'reminder',
            'datetime',
            [
                'oro_options' => [
                    'extend' => ['is_extend' => true, 'owner' => ExtendScope::OWNER_CUSTOM],
                    'datagrid' => ['is_visible' => true],
                    'merge' => ['display' => true],
                ]
            ]
        );


        $extTable = $table;

        $extTable->addColumn(
            'venue',
            'string',
            [
                'oro_options' => [
                    'extend' => ['is_extend' => true, 'owner' => ExtendScope::OWNER_CUSTOM],
                    'datagrid' => ['is_visible' => true],
                    'merge' => ['display' => true],
                ]
            ]
        );

        //$extTable->addUniqueIndex(['StcVenueBundle:Venue']);

        $extTable->addColumn(
            'desiredStartAt',
            'datetime',
            [
                'oro_options' => [
                    'extend' => ['is_extend' => true, 'owner' => ExtendScope::OWNER_CUSTOM],
                    'datagrid' => ['is_visible' => true],
                    'merge' => ['display' => true],
                ]
            ]
        );

        $extTable->addColumn(
            'desiredEndAt',
            'datetime',
            [
                'oro_options' => [
			'extend' => ['is_extend' => true, 'owner' => ExtendScope::OWNER_CUSTOM],
                	'datagrid' => ['is_visible' => true],
                	'merge' => ['display' => true],
		]
            ]
        );

        $extTable->addColumn(
            'soundCheckAt',
            'datetime',
            [
                'oro_options' => [
                    'extend' => ['is_extend' => true, 'owner' => ExtendScope::OWNER_CUSTOM],
                    'datagrid' => ['is_visible' => true],
                    'merge' => ['display' => true],
                ]
	     ]
        );

        $extTable->addColumn(
            'loadInAt',
            'datetime',
            [
                'oro_options' => [
                    'extend' => ['is_extend' => true, 'owner' => ExtendScope::OWNER_CUSTOM],
                    'datagrid' => ['is_visible' => true],
                    'merge' => ['display' => true],
                ]	
            ]
        );

        $extTable->addColumn(
            'budgetTotal',
            'text',
            [
                'oro_options' => [
                    'extend' => ['is_extend' => true, 'owner' => ExtendScope::OWNER_CUSTOM],
                    'datagrid' => ['is_visible' => true],
                    'merge' => ['display' => true],
                ]
	    ]
        );

        $extTable->addColumn(
            'budgetMeals',
            'text',
            [
                'oro_options' => [
                    'extend' => ['is_extend' => true, 'owner' => ExtendScope::OWNER_CUSTOM],
                    'datagrid' => ['is_visible' => true],
                    'merge' => ['display' => true],
                ]            
	    ]
        );

        $extTable->addColumn(
            'budgetHotels',
            'text',
            [
                'oro_options' => [
                    'extend' => ['is_extend' => true, 'owner' => ExtendScope::OWNER_CUSTOM],
                    'datagrid' => ['is_visible' => true],
                    'merge' => ['display' => true],
                ]
            ]
        );

        $extTable->addColumn(
            'travelDetails',
            'text',
            [
                'oro_options' => [
                    'extend' => ['is_extend' => true, 'owner' => ExtendScope::OWNER_CUSTOM],
                    'datagrid' => ['is_visible' => true],
                    'merge' => ['display' => true],
                ]            
	    ]
        );

        $extTable->addColumn(
            'backline',
            'text',
            [
                'oro_options' => [
                    'extend' => ['is_extend' => true, 'owner' => ExtendScope::OWNER_CUSTOM],
                    'datagrid' => ['is_visible' => true],
                    'merge' => ['display' => true],
                ]
            ]
        );

        $extTable->addColumn(
            'groundTransportation',
            'text',
            [
                'oro_options' => [
                    'extend' => ['is_extend' => true, 'owner' => ExtendScope::OWNER_CUSTOM],
                    'datagrid' => ['is_visible' => true],
                    'merge' => ['display' => true],
                ]
            ]
        );

        $extTable->addColumn(
            'perDiem',
            'string',
            [
                'oro_options' => [
                    'extend' => ['is_extend' => true, 'owner' => ExtendScope::OWNER_CUSTOM],
                    'datagrid' => ['is_visible' => true],
                    'merge' => ['display' => true],
                ]
            ]
        );

        $extTable->addColumn(
            'deposit',
            'text',
            [
                'oro_options' => [
                    'extend' => ['is_extend' => true, 'owner' => ExtendScope::OWNER_CUSTOM],
                    'datagrid' => ['is_visible' => true],
                    'merge' => ['display' => true],
                ]
            ]
        );

        $this->extendExtension->addManyToOneRelation(
            $schema,
            'bands',
            'Bands',
            $extTable,
            'bands',
            ['extend' => ['without_default' => true, 'is_extend' => true, 'owner' => ExtendScope::OWNER_CUSTOM]]
        );
    */

    }
}
