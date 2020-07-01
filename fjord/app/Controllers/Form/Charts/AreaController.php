<?php

namespace FjordApp\Controllers\Form\Charts;

use Fjord\User\Models\FjordUser;
use Fjord\Crud\Controllers\FormController;
use FjordApp\Config\Form\Charts\AreaConfig;

class AreaController extends FormController
{
    /**
     * Form config class.
     *
     * @var string
     */
    protected $config = AreaConfig::class;

    /**
     * Authorize request for authenticated fjord-user and permission operation.
     * Operations: read, update
     *
     * @param FjordUser $user
     * @param string $operation
     * @return boolean
     */
    public function authorize(FjordUser $user, string $operation): bool
    {
        return true;
    }
}