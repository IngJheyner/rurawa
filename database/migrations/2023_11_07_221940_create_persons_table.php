<?php

use App\Enums\OrganizationBelongsEnum;
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
            $table->date('date_of_birth')->nullable();
            $table->string('phone', 20);
            $table->string('address')->unique()->nullable();
            $table->string('company_name')->nullable();
            $table->enum('organization_belongs', OrganizationBelongsEnum::forMigration())->nullable();
            // users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // cities
            $table->foreignId('city_id')->nullable()->constrained('cities')->onDelete('cascade');
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
