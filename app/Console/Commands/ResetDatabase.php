<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ResetDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:reset-seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop all tables, run migrations, and seed the database for presentation';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('🚀 Starting database reset and seeding process...');
        
        // Drop all tables and run migrations
        $this->info('📦 Dropping all tables and running migrations...');
        Artisan::call('migrate:fresh');
        $this->info(Artisan::output());
        
        // Seed the database
        $this->info('🌱 Seeding database with sample data...');
        Artisan::call('db:seed');
        $this->info(Artisan::output());
        
        $this->info('✅ Database reset and seeding completed successfully!');
        $this->newLine();
        $this->info('📊 Sample data created:');
        $this->info('   • 50+ Kampus records');
        $this->info('   • 75 Mahasiswa records');
        $this->info('   • 60 Dosen records');
        $this->info('   • 55 User records (including admin and demo users)');
        $this->newLine();
        $this->info('🔑 Default login credentials:');
        $this->info('   Admin: admin@admin.com / password');
        $this->info('   Demo:  demo@demo.com / demo123');
        $this->newLine();
        $this->info('🌐 Access your dashboard at: http://localhost:8000/dashboard');
        
        return Command::SUCCESS;
    }
}
