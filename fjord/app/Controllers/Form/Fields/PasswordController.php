<?php

namespace FjordApp\Controllers\Form\Fields;

use Fjord\User\Models\FjordUser;
use Fjord\Crud\Controllers\FormController;
use FjordApp\Config\Form\Fields\PasswordConfig;

class PasswordController extends FormController
{
    /**
     * Form config class.
     *
     * @var string
     */
    protected $config = PasswordConfig::class;


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
