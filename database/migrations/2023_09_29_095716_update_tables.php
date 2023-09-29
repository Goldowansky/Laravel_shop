<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->unsignedBigInteger('main_photo_id')->nullable()->after('description');
            $table->foreign('main_photo_id')->references('id')->on('photos')->onDelete('set null');
        });

        Schema::table('photos', function (Blueprint $table) {
            $table->dropColumn('main');
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign(['main_photo_id']);
            $table->dropColumn('main_photo_id');
        });

        Schema::table('photos', function (Blueprint $table) {
            $table->boolean('main')->default(false)->after('src');
        });
    }
};
