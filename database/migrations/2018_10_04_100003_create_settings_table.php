<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('time_zone_interface');
            $table->string('title_app');
            $table->string('settings_logo');
            $table->integer('days_of_incidents');
            $table->integer('bulk_emails');
            $table->integer('bulk_emails_sleep');
            $table->string('queue_name_incidents');
            $table->string('queue_name_maintenance');
            $table->string('from_address');
            $table->string('from_name');
            $table->string('google_analytics_code')->nullable();
            $table->integer('allow_subscribers');
            $table->timestamps();
            $table->softDeletes();
        });

        $array_to_insert = array(
            array('id' => 1, 'time_zone_interface' => "UTC", 'title_app' => 'Cloud VPS Hosting', 'settings_logo' => 'logo.png', 'days_of_incidents' => 7, 'bulk_emails' => 20, 'bulk_emails_sleep' => 10, 'queue_name_incidents' => 'Incidents', 'queue_name_maintenance' => 'Maintenance', 'from_address' => 'demo@example.org', 'from_name' => 'Demo Name', 'allow_subscribers' => 1 )
        );

        foreach ($array_to_insert as $item){
            DB::table('settings')->insert($item);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
