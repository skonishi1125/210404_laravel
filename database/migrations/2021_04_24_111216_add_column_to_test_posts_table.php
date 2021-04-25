<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToTestPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_posts', function (Blueprint $table) {
            //
            $table->integer('good')->nullable();
            $table->string('tag',10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test_posts', function (Blueprint $table) {
            //
            $table->dropColumn('good');
            $table->dropColumn('tag');
        });
    }
}
