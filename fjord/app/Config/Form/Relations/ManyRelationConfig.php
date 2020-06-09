<?php

namespace FjordApp\Config\Form\Relations;

use App\Models\Employee;
use Fjord\Crud\CrudForm;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Relations\ManyRelationController;

class ManyRelationConfig extends FormConfig
{

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ManyRelationController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    public $formName = 'many_relation';

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'manyRelation',
        ];
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    public function form(CrudForm $form)
    {
        $form->info('')
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Form/Relations/ManyRelationConfig.php" target="_blank">See the code for this page on github.</a>')
            ->width(12);

        $form->info('')
            ->text(fa('fas', 'info-circle') . ' <a href="https://www.fjord-admin.com/docs/fields/relation/" target="_blank">Read the docs.</a>')
            ->width(12);

        $form->card(function ($form) {
            $form->manyRelation('employees')
                ->title('Employee')
                ->model(Employee::class)
                ->preview(function ($table) {
                    $table->col('{first_name} {last_name}');
                });
        });
    }
}
