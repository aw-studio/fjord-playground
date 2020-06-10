<?php

namespace FjordApp\Config\Crud;

use Fjord\Crud\CrudShow;
use Fjord\Crud\CrudIndex;
use Fjord\Crud\Config\CrudConfig;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Developer;
use FjordApp\Controllers\Crud\DeveloperController;

class DeveloperConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Developer::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = DeveloperController::class;

    /**
     * Model singular and plural name.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => ucfirst(__f_choice('models.developer', 1)),
            'plural' => ucfirst(__f_choice('models.developer', 2)),
        ];
    }

    /**
     * Route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fjord-dev';
    }

    /**
     * Build index table.
     *
     * @param \Fjord\Crud\CrudIndex $table
     * @return void
     */
    public function index(CrudIndex $container)
    {
        $container->table(fn ($table) => $this->indexTable($table))
            ->filter([
                'Task' => [
                    'design' => 'Design',
                    'development' => 'Development',
                ]
            ])
            ->search('title');
    }

    /**
     * Index table
     *
     * @param CrudIndexTable $table
     * @return void
     */
    public function indexTable($table)
    {
        $table->image('Image')
            ->src('{image.conversion_urls.sm}')
            ->maxWidth('50px')
            ->small();

        $table->col('Name')
            ->value('{name}')
            ->sortBy('name');

        $table->col('Task')
            ->value('{task}')
            ->sortBy('task');
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
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Crud/DeveloperConfig.php" target="_blank">See the code for this page on github.</a>')
            ->width(12);

        $form->card(function ($form) {
            $form->group(function ($form) {
                $form->image('image')
                    ->firstBig()
                    ->title('Developers')
                    ->maxFiles(1)
                    ->crop(1 / 1);
            })->width(4);

            $form->group(function ($form) {

                $form->input('name')
                    ->title('Name');
                $form->input('task')
                    ->title('Task');

                $form->component('dev-twitter');
            })->width(8);
        });
    }
}
