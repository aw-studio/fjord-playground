<?php

namespace FjordApp\Config\Form\Relations;

use App\Models\Employee;
use Fjord\Crud\CrudShow;
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
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/many-relation';
    }

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
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    public function show(CrudShow $form)
    {
        $form->info('')
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Form/Relations/ManyRelationConfig.php" target="_blank">See the code for this page on github.</a>')
            ->width(12);

        $form->info('')
            ->text(fa('fas', 'info-circle') . ' <a href="https://www.fjord-admin.com/docs/fields/relation/" target="_blank">Read the docs.</a>')
            ->width(12);

        $form->card(function ($form) {
            $form->manyRelation('employees')
                ->title('Relation displayed as table')
                ->model(Employee::class)
                ->showTableHead()
                ->preview(function ($table) {
                    $table->col('Name')->value('{first_name} {last_name}');
                });

            $form->manyRelation('employees_tags')
                ->title('Relation as tag preview')
                ->type('tags')
                ->model(Employee::class)
                ->tagValue('{first_name}');
        });
    }
}
