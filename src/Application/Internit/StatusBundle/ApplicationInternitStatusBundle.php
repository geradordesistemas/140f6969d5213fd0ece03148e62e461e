<?php

namespace App\Application\Internit\StatusBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationInternitStatusBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationInternitStatusBundle';
    }
}