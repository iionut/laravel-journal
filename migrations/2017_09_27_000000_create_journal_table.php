<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 15:14
 */

class CreateJournalTable extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        \Illuminate\Support\Facades\Schema::create('journal', function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->increments('id');
            $table->string('action');
            $table->string('data')->nullable();
            $table->timestamp('create_at')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    public function down()
    {
        \Illuminate\Support\Facades\Schema::dropIfExists('journal');
    }
}
