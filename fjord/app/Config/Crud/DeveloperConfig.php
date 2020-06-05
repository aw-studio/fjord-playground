<?php

namespace FjordApp\Config\Crud;

use Fjord\Crud\CrudForm;
use Fjord\Vue\Crud\CrudTable;
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
     * Index table search keys.
     *
     * @var array
     */
    public $search = ['title'];

    /**
     * Index table sort by default.
     *
     * @var string
     */
    public $sortByDefault = 'id.desc';

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
     * Sort by keys.
     *
     * @return array
     */
    public function sortBy()
    {
        return [
            'id.desc' => __f('fj.sort_new_to_old'),
            'id.asc' => __f('fj.sort_old_to_new'),
        ];
    }

    /**
     * Initialize index query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder $query
     */
    public function indexQuery(Builder $query)
    {
        // $query->with('relation');

        return $query;
    }

    /**
     * Index table filter groups.
     *
     * @return array
     */
    public function filter()
    {
        return [
            'Task' => [
                'design' => 'Design',
                'development' => 'Development',
            ]
        ];
    }

    /**
     * Build index table.
     *
     * @param \Fjord\Vue\Crud\CrudTable $table
     * @return void
     */
    public function index(CrudTable $table)
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
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    public function form(CrudForm $form)
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
