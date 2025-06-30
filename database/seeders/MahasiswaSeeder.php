<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Kampus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $kampusIds = Kampus::pluck('id')->toArray();
        
        $program_studi = [
            'Teknik Informatika', 'Sistem Informasi', 'Teknik Komputer', 'Ilmu Komputer',
            'Teknik Elektro', 'Teknik Mesin', 'Teknik Sipil', 'Teknik Kimia',
            'Manajemen', 'Akuntansi', 'Ekonomi Pembangunan', 'Ekonomi Islam',
            'Hukum', 'Ilmu Politik', 'Hubungan Internasional', 'Administrasi Publik',
            'Kedokteran', 'Keperawatan', 'Farmasi', 'Kesehatan Masyarakat',
            'Psikologi', 'Sosiologi', 'Komunikasi', 'Jurnalistik',
            'Pendidikan Matematika', 'Pendidikan Bahasa Indonesia', 'Pendidikan Bahasa Inggris',
            'Arsitektur', 'Desain Grafis', 'Seni Rupa', 'Musik'
        ];

        $fakultas = [
            'Fakultas Teknik', 'Fakultas Ekonomi dan Bisnis', 'Fakultas Hukum',
            'Fakultas Kedokteran', 'Fakultas Ilmu Sosial dan Politik',
            'Fakultas Pendidikan', 'Fakultas Seni dan Desain', 'Fakultas Psikologi',
            'Fakultas Pertanian', 'Fakultas Perikanan dan Kelautan'
        ];

        $kota_lahir = [
            'Jakarta', 'Surabaya', 'Bandung', 'Medan', 'Bekasi', 'Tangerang',
            'Depok', 'Semarang', 'Palembang', 'Makassar', 'Batam', 'Bogor',
            'Pekanbaru', 'Bandar Lampung', 'Malang', 'Padang', 'Denpasar',
            'Samarinda', 'Tasikmalaya', 'Serang', 'Magelang', 'Cilegon',
            'Balikpapan', 'Jambi', 'Sukabumi', 'Cirebon', 'Mataram', 'Manado'
        ];

        // Generate 75 mahasiswa records
        for ($i = 1; $i <= 75; $i++) {
            $tahun_masuk = $faker->numberBetween(2018, 2024);
            $program = $faker->randomElement($program_studi);
            
            Mahasiswa::create([
                'kampus_id' => $faker->randomElement($kampusIds),
                'nim' => $this->generateNIM($tahun_masuk, $i),
                'nama' => $faker->name(),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'tanggal_lahir' => $faker->dateTimeBetween('1999-01-01', '2005-12-31')->format('Y-m-d'),
                'tempat_lahir' => $faker->randomElement($kota_lahir),
                'program_studi' => $program,
                'fakultas' => $this->getFakultasFromProdi($program),
                'angkatan' => $tahun_masuk,
                'status_mahasiswa' => $faker->randomElement(['Aktif', 'Cuti', 'Lulus', 'DO']),
            ]);
        }
    }

    private function generateNIM($tahun, $urutan)
    {
        return $tahun . str_pad($urutan, 4, '0', STR_PAD_LEFT);
    }

    private function getFakultasFromProdi($prodi)
    {
        $mapping = [
            'Teknik Informatika' => 'Fakultas Teknik',
            'Sistem Informasi' => 'Fakultas Teknik',
            'Teknik Komputer' => 'Fakultas Teknik',
            'Ilmu Komputer' => 'Fakultas Teknik',
            'Teknik Elektro' => 'Fakultas Teknik',
            'Teknik Mesin' => 'Fakultas Teknik',
            'Teknik Sipil' => 'Fakultas Teknik',
            'Teknik Kimia' => 'Fakultas Teknik',
            'Manajemen' => 'Fakultas Ekonomi dan Bisnis',
            'Akuntansi' => 'Fakultas Ekonomi dan Bisnis',
            'Ekonomi Pembangunan' => 'Fakultas Ekonomi dan Bisnis',
            'Ekonomi Islam' => 'Fakultas Ekonomi dan Bisnis',
            'Hukum' => 'Fakultas Hukum',
            'Ilmu Politik' => 'Fakultas Ilmu Sosial dan Politik',
            'Hubungan Internasional' => 'Fakultas Ilmu Sosial dan Politik',
            'Administrasi Publik' => 'Fakultas Ilmu Sosial dan Politik',
            'Kedokteran' => 'Fakultas Kedokteran',
            'Keperawatan' => 'Fakultas Kedokteran',
            'Farmasi' => 'Fakultas Kedokteran',
            'Kesehatan Masyarakat' => 'Fakultas Kedokteran',
            'Psikologi' => 'Fakultas Psikologi',
            'Sosiologi' => 'Fakultas Ilmu Sosial dan Politik',
            'Komunikasi' => 'Fakultas Ilmu Sosial dan Politik',
            'Jurnalistik' => 'Fakultas Ilmu Sosial dan Politik',
            'Pendidikan Matematika' => 'Fakultas Pendidikan',
            'Pendidikan Bahasa Indonesia' => 'Fakultas Pendidikan',
            'Pendidikan Bahasa Inggris' => 'Fakultas Pendidikan',
            'Arsitektur' => 'Fakultas Seni dan Desain',
            'Desain Grafis' => 'Fakultas Seni dan Desain',
            'Seni Rupa' => 'Fakultas Seni dan Desain',
            'Musik' => 'Fakultas Seni dan Desain'
        ];

        return $mapping[$prodi] ?? 'Fakultas Umum';
    }
}
