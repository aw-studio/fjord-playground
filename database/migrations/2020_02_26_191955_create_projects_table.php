<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Fjord\Support\Migration\MigratePermissions;

class CreateProjectsTable extends Migration
{
    use MigratePermissions;

    /**
     * Permissions that should be created for this crud.
     *
     * @var array
     */
    protected $permissions = [
        'create projects',
        'read projects',
        'update projects',
        'delete projects',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('employee_id');
            $table->date('completion_date');
            $table->float('budget');
            $table->unsignedBigInteger('project_states_id');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('project_states_id')->references('id')->on('project_states');
            $table->boolean('active')->default(true);

            $table->timestamps();
        });

        Schema::create('project_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('slug')->nullable();

            $table->unique(['project_id', 'locale']);
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });

        $this->upPermissions();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
        Schema::dropIfExists('project_translations');

        $this->downPermissions();
    }
}
