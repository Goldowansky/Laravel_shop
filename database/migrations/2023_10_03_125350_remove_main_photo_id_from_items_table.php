<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign('items_main_photo_id_foreign');
        });
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('main_photo_id');
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->unsignedBigInteger('main_photo_id')->nullable();
        });
        Schema::table('items', function (Blueprint $table) {
            $table->foreign('main_photo_id')
                ->references('id')
                ->on('photos');
        });
    }
};
