<?php


namespace Stc\Bundle\SalesBundle\Migrations\Schema\v1_99;

use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtension;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtensionAwareInterface;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

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

        $this->extendExtension->addOneToManyRelation(
            $schema,
            $table,
            'leads_bands',
            'stc_bands',
            ['name'],
            ['description','tributeto'],
            ['name'],
            [
                'extend' => ['is_extend' => true]
            ]
        );

        $this->extendExtension->addManyToManyRelation(
            $schema,
            $table,
            'leads_venues',
            'stc_venues',
            ['name'],
            ['description'],
            ['id'],
            [
                'extend' => ['is_extend' => true]
            ]
        );

    }
}