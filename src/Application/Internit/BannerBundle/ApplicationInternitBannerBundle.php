<?php

namespace App\Application\Internit\BannerBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationInternitBannerBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationInternitBannerBundle';
    }
}