<?php

namespace FjordApp\Controllers\Form\Fields;

use Fjord\User\Models\FjordUser;
use Fjord\Crud\Controllers\FormController;
use FjordApp\Config\Form\Fields\BooleanConfig;

class BooleanController extends FormController
{
    /**
     * Form config class.
     *
     * @var string
     */
    protected $config = BooleanConfig::class;


    /**
     * Authorize request for permission operation and authenticated fjord-user.
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
