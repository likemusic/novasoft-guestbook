<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_responses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('guestbook_entry_id')->constrained('guestbook_entries');
            $table->foreignId('user_id')->constrained('users');

            $table->mediumText('content');

            $table->unique('guestbook_entry_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_responses');
    }
};
