<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Role User Pivot Table
     *
     * @var string
     */
    private $table = 'role_user';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->table)) {
            Schema::create($this->table, function (Blueprint $table) {
                $table->increments('id');
                $table->integer('role_id')->unsigned();
                $table->integer('user_id')->unsigned();

                $table->foreign('role_id')
                    ->references('id')->on('roles')
                    ->onDelete('cascade');

                $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');

                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
