<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Kampus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DosenSeeder extends Seeder
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
        
        $gelar_akademik = [
            'Dr.', 'Prof. Dr.', 'S.Kom., M.Kom.', 'S.T., M.T.', 'S.E., M.M.',
            'S.H., M.H.', 'S.Sos., M.A.', 'S.Pd., M.Pd.', 'S.Si., M.Si.',
            'S.Psi., M.Psi.', 'dr., Sp.A', 'dr., M.Kes.', 'S.Farm., Apt.',
            'S.Ak., M.Ak.', 'S.IP., M.IP.', 'S.Hum., M.Hum.'
        ];

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

        $jabatan_fungsional = [
            'Asisten Ahli', 'Lektor', 'Lektor Kepala', 'Guru Besar',
            'Tenaga Pengajar', 'Instruktur'
        ];

        $kota_lahir = [
            'Jakarta', 'Surabaya', 'Bandung', 'Medan', 'Bekasi', 'Tangerang',
            'Depok', 'Semarang', 'Palembang', 'Makassar', 'Batam', 'Bogor',
            'Pekanbaru', 'Bandar Lampung', 'Malang', 'Padang', 'Denpasar',
            'Samarinda', 'Tasikmalaya', 'Serang', 'Magelang', 'Cilegon',
            'Balikpapan', 'Jambi', 'Sukabumi', 'Cirebon', 'Mataram', 'Manado'
        ];

        // Generate 60 dosen records
        for ($i = 1; $i <= 60; $i++) {
            $gelar = $faker->randomElement($gelar_akademik);
            $nama = $faker->name();
            
            Dosen::create([
                'kampus_id' => $faker->randomElement($kampusIds),
                'nidn' => $this->generateNIDN($i),
                'nama' => $gelar . ' ' . $nama,
                'gelar_akademik' => $gelar,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tanggal_lahir' => $faker->dateTimeBetween('1960-01-01', '1990-12-31')->format('Y-m-d'),
                'tempat_lahir' => $faker->randomElement($kota_lahir),
                'program_studi' => $faker->randomElement($program_studi),
                'jabatan_fungsional' => $faker->randomElement($jabatan_fungsional),
                'status_dosen' => $faker->randomElement(['Tetap', 'Tidak Tetap']),
            ]);
        }
    }

    private function generateNIDN($urutan)
    {
        // NIDN format: 10 digits (DDMMYYYY + 2 digit urutan)
        $tahun = rand(1960, 1990);
        $bulan = str_pad(rand(1, 12), 2, '0', STR_PAD_LEFT);
        $tanggal = str_pad(rand(1, 28), 2, '0', STR_PAD_LEFT);
        $urutan_str = str_pad($urutan, 2, '0', STR_PAD_LEFT);
        
        return $tanggal . $bulan . $tahun . $urutan_str;
    }
}
