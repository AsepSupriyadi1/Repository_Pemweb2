<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kampus;
use App\Models\Mahasiswa;
use App\Models\Dosen;

class ReportSampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample kampus (universities)
        $kampuses = [
            [
                'kode_pt' => 'UNV001',
                'nama_kampus' => 'Universitas Indonesia',
                'alamat' => 'Jl. Margonda Raya, Depok',
                'kota' => 'Depok',
                'provinsi' => 'Jawa Barat',
                'telepon' => '021-7863479',
                'email' => 'info@ui.ac.id',
                'website' => 'https://www.ui.ac.id',
            ],
            [
                'kode_pt' => 'UNV002',
                'nama_kampus' => 'Institut Teknologi Bandung',
                'alamat' => 'Jl. Ganesha No. 10, Bandung',
                'kota' => 'Bandung',
                'provinsi' => 'Jawa Barat',
                'telepon' => '022-2500935',
                'email' => 'info@itb.ac.id',
                'website' => 'https://www.itb.ac.id',
            ],
            [
                'kode_pt' => 'UNV003',
                'nama_kampus' => 'Universitas Gadjah Mada',
                'alamat' => 'Bulaksumur, Yogyakarta',
                'kota' => 'Yogyakarta',
                'provinsi' => 'D.I. Yogyakarta',
                'telepon' => '0274-588688',
                'email' => 'info@ugm.ac.id',
                'website' => 'https://www.ugm.ac.id',
            ],
        ];

        foreach ($kampuses as $kampusData) {
            Kampus::create($kampusData);
        }

        // Create sample students
        $mahasiswaData = [
            // UI Students
            [
                'kampus_id' => 1,
                'nim' => '2021001',
                'nama' => 'Ahmad Fadli',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '2003-05-15',
                'tempat_lahir' => 'Jakarta',
                'program_studi' => 'Teknik Informatika',
                'fakultas' => 'Fakultas Ilmu Komputer',
                'angkatan' => '2021',
                'status_mahasiswa' => 'Aktif',
            ],
            [
                'kampus_id' => 1,
                'nim' => '2021002',
                'nama' => 'Siti Nurhaliza',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_lahir' => '2003-08-22',
                'tempat_lahir' => 'Depok',
                'program_studi' => 'Sistem Informasi',
                'fakultas' => 'Fakultas Ilmu Komputer',
                'angkatan' => '2021',
                'status_mahasiswa' => 'Aktif',
            ],
            [
                'kampus_id' => 1,
                'nim' => '2022001',
                'nama' => 'Budi Santoso',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '2004-01-10',
                'tempat_lahir' => 'Bogor',
                'program_studi' => 'Teknik Informatika',
                'fakultas' => 'Fakultas Ilmu Komputer',
                'angkatan' => '2022',
                'status_mahasiswa' => 'Aktif',
            ],
            [
                'kampus_id' => 1,
                'nim' => '2020001',
                'nama' => 'Dewi Sartika',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_lahir' => '2002-12-03',
                'tempat_lahir' => 'Jakarta',
                'program_studi' => 'Manajemen',
                'fakultas' => 'Fakultas Ekonomi',
                'angkatan' => '2020',
                'status_mahasiswa' => 'Lulus',
            ],
            
            // ITB Students
            [
                'kampus_id' => 2,
                'nim' => '13521001',
                'nama' => 'Rizky Pratama',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '2003-07-18',
                'tempat_lahir' => 'Bandung',
                'program_studi' => 'Teknik Elektro',
                'fakultas' => 'Sekolah Teknik Elektro dan Informatika',
                'angkatan' => '2021',
                'status_mahasiswa' => 'Aktif',
            ],
            [
                'kampus_id' => 2,
                'nim' => '13521002',
                'nama' => 'Maya Indira',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_lahir' => '2003-11-25',
                'tempat_lahir' => 'Surabaya',
                'program_studi' => 'Teknik Informatika',
                'fakultas' => 'Sekolah Teknik Elektro dan Informatika',
                'angkatan' => '2021',
                'status_mahasiswa' => 'Aktif',
            ],
            [
                'kampus_id' => 2,
                'nim' => '13522001',
                'nama' => 'Andi Firmansyah',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '2004-03-12',
                'tempat_lahir' => 'Medan',
                'program_studi' => 'Teknik Sipil',
                'fakultas' => 'Fakultas Teknik Sipil dan Lingkungan',
                'angkatan' => '2022',
                'status_mahasiswa' => 'Aktif',
            ],
            
            // UGM Students
            [
                'kampus_id' => 3,
                'nim' => '22/456789/TK/12345',
                'nama' => 'Putri Maharani',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_lahir' => '2004-09-30',
                'tempat_lahir' => 'Yogyakarta',
                'program_studi' => 'Psikologi',
                'fakultas' => 'Fakultas Psikologi',
                'angkatan' => '2022',
                'status_mahasiswa' => 'Aktif',
            ],
            [
                'kampus_id' => 3,
                'nim' => '21/456789/TK/12344',
                'nama' => 'Wahyu Setiawan',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '2003-06-14',
                'tempat_lahir' => 'Solo',
                'program_studi' => 'Kedokteran',
                'fakultas' => 'Fakultas Kedokteran',
                'angkatan' => '2021',
                'status_mahasiswa' => 'Aktif',
            ],
            [
                'kampus_id' => 3,
                'nim' => '20/456789/TK/12343',
                'nama' => 'Laila Nurjanah',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_lahir' => '2002-04-08',
                'tempat_lahir' => 'Semarang',
                'program_studi' => 'Hukum',
                'fakultas' => 'Fakultas Hukum',
                'angkatan' => '2020',
                'status_mahasiswa' => 'Aktif',
            ],
        ];

        foreach ($mahasiswaData as $student) {
            Mahasiswa::create($student);
        }

        // Create sample dosen (faculty)
        $dosenData = [
            [
                'kampus_id' => 1,
                'nidn' => '0015057801',
                'nama' => 'Dr. Bambang Riyanto, M.Kom',
                'gelar_akademik' => 'S3',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '1978-05-15',
                'tempat_lahir' => 'Jakarta',
                'program_studi' => 'Teknik Informatika',
                'jabatan_fungsional' => 'Lektor Kepala',
                'status_dosen' => 'Aktif',
            ],
            [
                'kampus_id' => 2,
                'nidn' => '0020066802',
                'nama' => 'Prof. Dr. Ing. Sari Hartini, M.T',
                'gelar_akademik' => 'S3',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_lahir' => '1968-06-20',
                'tempat_lahir' => 'Bandung',
                'program_studi' => 'Teknik Elektro',
                'jabatan_fungsional' => 'Guru Besar',
                'status_dosen' => 'Aktif',
            ],
            [
                'kampus_id' => 3,
                'nidn' => '0012047503',
                'nama' => 'Dr. Agus Prasetyo, M.Psi',
                'gelar_akademik' => 'S3',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '1975-04-12',
                'tempat_lahir' => 'Yogyakarta',
                'program_studi' => 'Psikologi',
                'jabatan_fungsional' => 'Lektor',
                'status_dosen' => 'Aktif',
            ],
        ];

        foreach ($dosenData as $dosen) {
            Dosen::create($dosen);
        }

        $this->command->info('Sample data for reports has been created successfully!');
        $this->command->info('Created: ' . count($kampuses) . ' Kampuses');
        $this->command->info('Created: ' . count($mahasiswaData) . ' Students');
        $this->command->info('Created: ' . count($dosenData) . ' Faculty Members');
    }
}
