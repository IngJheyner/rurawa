<?php

use App\Enums\TypeOfDocumentEnum;
use App\Enums\TypeOfPersonEnum;
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
        Schema::create('persons', function (Blueprint $table) {

            $table->id();
            $table->enum('type_person', TypeOfPersonEnum::forMigration())->default(TypeOfPersonEnum::PERSON_NATURAL->value);
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('document_type', TypeOfDocumentEnum::forMigration())->default(TypeOfDocumentEnum::ID_IDENTITY->value);
            $table->string('document_number');
            $table->string('phone', 20);
            $table->string('company_name')->nullable();
            $table->string('organization_belongs')->nullable();
            // users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
