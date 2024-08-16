<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        Schema::table('employees', function (Blueprint $table) {
            // Ajouter la colonne `user_id` si elle n'existe pas
            if (!Schema::hasColumn('employees', 'user_id')) {
                $table->foreignId('user_id')->nullable();  // Ajout de la colonne user_id si nécessaire
            }
        
            // Ajouter une clé étrangère pour `user_id`
            $table->foreign('user_id')
                  ->references('id')  // Référence à la clé primaire `id` dans `users`
                  ->on('users')
                  ->onDelete('set null');
        });
        
        // Ajouter les clés étrangères à la table `employees`
        Schema::table('employees', function (Blueprint $table) {
            // Assurez-vous que la clé étrangère `department_id` est correctement définie
            if (!Schema::hasColumn('employees', 'department_id')) {
                $table->foreignId('department_id')->nullable();
            }
            $table->foreign('department_id')
                  ->references('id')
                  ->on('departments')
                  ->onDelete('set null');
        });

        // Ajouter les clés étrangères à la table `candidates`
        Schema::table('candidates', function (Blueprint $table) {
            // Ajoutez la colonne `job_offer_id` si elle n'existe pas
            if (!Schema::hasColumn('candidates', 'job_offer_id')) {
                $table->foreignId('job_offer_id')->nullable();
            }

            // Ajoutez la colonne `employee_id` si elle n'existe pas
            if (!Schema::hasColumn('candidates', 'employee_id')) {
                $table->foreignId('employee_id')->nullable();
            }

            // Ajouter les clés étrangères
            $table->foreign('job_offer_id')
                  ->references('id')
                  ->on('job_offers')
                  ->onDelete('set null');

            $table->foreign('employee_id')
                  ->references('employee_id')  // Utiliser la clé primaire définie dans `employees`
                  ->on('employees')
                  ->onDelete('set null');
        });

        // Ajouter les clés étrangères à la table `employee_documents`
        Schema::table('employee_documents', function (Blueprint $table) {
            if (!Schema::hasColumn('employee_documents', 'employee_id')) {
                $table->foreignId('employee_id');
            }
            $table->foreign('employee_id')
                  ->references('employee_id')  // Utiliser la clé primaire définie dans `employees`
                  ->on('employees')
                  ->onDelete('cascade');
        });

        // Ajouter les clés étrangères à la table `absences`
        Schema::table('absences', function (Blueprint $table) {
            if (!Schema::hasColumn('absences', 'employee_id')) {
                $table->foreignId('employee_id');
            }
            $table->foreign('employee_id')
                  ->references('employee_id')  // Utiliser la clé primaire définie dans `employees`
                  ->on('employees')
                  ->onDelete('cascade');
        });

        // Ajouter les clés étrangères à la table `leave_requests`
        Schema::table('leave_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('leave_requests', 'employee_id')) {
                $table->foreignId('employee_id');
            }
            $table->foreign('employee_id')
                  ->references('employee_id')  // Utiliser la clé primaire définie dans `employees`
                  ->on('employees')
                  ->onDelete('cascade');
        });

        // Ajouter les clés étrangères à la table `performance_reviews`
        Schema::table('performance_reviews', function (Blueprint $table) {
            if (!Schema::hasColumn('performance_reviews', 'employee_id')) {
                $table->foreignId('employee_id');
            }
            $table->foreign('employee_id')
                  ->references('employee_id')  // Utiliser la clé primaire définie dans `employees`
                  ->on('employees')
                  ->onDelete('cascade');
        });

        // Ajouter les clés étrangères à la table `review_reports`
        Schema::table('review_reports', function (Blueprint $table) {
            if (!Schema::hasColumn('review_reports', 'review_id')) {
                $table->foreignId('review_id');
            }
            $table->foreign('review_id')
                  ->references('id')
                  ->on('performance_reviews')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        // Supprimer les clés étrangères de la table `employees`
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
            $table->dropColumn('department_id');
        });

        // Supprimer les clés étrangères de la table `candidates`
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropForeign(['job_offer_id']);
            $table->dropForeign(['employee_id']);
            $table->dropColumn(['job_offer_id', 'employee_id']);
        });

        // Supprimer les clés étrangères de la table `employee_documents`
        Schema::table('employee_documents', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
            $table->dropColumn('employee_id');
        });

        // Supprimer les clés étrangères de la table `absences`
        Schema::table('absences', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
            $table->dropColumn('employee_id');
        });

        // Supprimer les clés étrangères de la table `leave_requests`
        Schema::table('leave_requests', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
            $table->dropColumn('employee_id');
        });

        // Supprimer les clés étrangères de la table `performance_reviews`
        Schema::table('performance_reviews', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
            $table->dropColumn('employee_id');
        });

        // Supprimer les clés étrangères de la table `review_reports`
        Schema::table('review_reports', function (Blueprint $table) {
            $table->dropForeign(['review_id']);
            $table->dropColumn('review_id');
        });
    }
};
