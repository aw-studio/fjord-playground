<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Fjord\Support\Migration\MigratePermissions;

class CreateTestsTable extends Migration
{
    use MigratePermissions;

    /**
     * Permissions that should be created for this crud.
     *
     * @var array
     */
    protected $permissions = [
        'create tests',
        'read tests',
        'update tests',
        'delete tests',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->bigIncrements('id');

            // enter all non-translated columns here
            // set them to fillable in your model

            // $table->string('title');

            $table->string('slug')->nullable();

            $table->boolean('active')->default(true);

            $table->timestamps();
        });

        Schema::create('test_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('test_id')->unsigned();
            $table->string('locale')->index();

            // set all columns that are translated here
            // set them to fillable in the model
            // as well as in the translation-model
            //
            // $table->string('title')->nullable();
            // $table->text('text')->nullable();

            $table->unique(['test_id', 'locale']);
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
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
        Schema::dropIfExists('tests');

        Schema::dropIfExists('test_translations');

        $this->downPermissions();
    }
}
