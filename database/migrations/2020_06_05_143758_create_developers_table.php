<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Fjord\Support\Migration\MigratePermissions;

class CreateDevelopersTable extends Migration
{
    use MigratePermissions;

    /**
     * Permissions that should be created for this crud.
     *
     * @var array
     */
    protected $permissions = [
        'create developers',
        'read developers',
        'update developers',
        'delete developers',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('twitter');
            $table->string('task');

            $table->boolean('active')->default(true);

            $table->timestamps();
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
        Schema::dropIfExists('developers');
        $this->downPermissions();
    }
}
