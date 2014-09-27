<?php

namespace Stc\Bundle\StcContactBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class StcContactBundle extends Bundle
{
    public function getParent()
    {
        return 'OroCRMContactBundle';
    }
}