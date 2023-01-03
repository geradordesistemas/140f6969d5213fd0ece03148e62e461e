<?php

namespace App\Application\Internit\TagBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationInternitTagBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationInternitTagBundle';
    }
}