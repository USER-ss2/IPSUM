<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('incidents', function (Blueprint $table) {

        $table->string('num')->primary();
		$table->integer('WFID')->nullable();
		$table->string("date_ouverture",16);
		$table->string('date_cloture',16);
		$table->string('date_resolution',16);
		$table->string('phase',18);
		$table->string('etat',7);
		$table->string('categorie_reclamation',16);
		$table->string('region',9);
	    $table->string('solution',432);
		$table->string('domaine',28);
		$table->string('sous_domaine',36);
		$table->string('groupe_resolu',29);
		$table->string('incident_Src',28);
		$table->string('lhType',27);
		$table->string("groupe_affectation",22);
		$table->string('csc',17);
		$table->string('zone',23);
		$table->string('groupe_cloture',29);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
