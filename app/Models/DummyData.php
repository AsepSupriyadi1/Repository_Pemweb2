<?php

namespace App\Models;

class DummyData
{
    public static function dosenList()
    {
        return [
            ['nama' => 'ASEP SUPRIYADI', 'kampus' => 'UNIVERSITAS TANJUNGPURA', 'prodi' => 'TEKNIK KELAUTAN'],
            ['nama' => 'WINA RIZKI', 'kampus' => 'UNIVERSITAS NEGERI JAKARTA', 'prodi' => 'TEKNIK INDUSTRI'],
            ['nama' => 'RAHMA DIAN', 'kampus' => 'UNIVERSITAS BRAWIJAYA', 'prodi' => 'ILMU KOMPUTER'],
            ['nama' => 'ANDI HERMAWAN', 'kampus' => 'UNIVERSITAS INDONESIA', 'prodi' => 'HUKUM'],
            ['nama' => 'SITI MARYAM', 'kampus' => 'UNIVERSITAS HASANUDDIN', 'prodi' => 'KEDOKTERAN'],
            ['nama' => 'YOGI PRASETYO', 'kampus' => 'UNIVERSITAS GADJAH MADA', 'prodi' => 'PERTANIAN'],
            ['nama' => 'LINA HERLINAWATI', 'kampus' => 'UNIVERSITAS NEGERI SEMARANG', 'prodi' => 'PSIKOLOGI'],
            ['nama' => 'DEDI RAHMAT', 'kampus' => 'UNIVERSITAS PADJADJARAN', 'prodi' => 'EKONOMI'],
            ['nama' => 'NINA AGUSTINA', 'kampus' => 'UNIVERSITAS DIPONEGORO', 'prodi' => 'TEKNIK SIPIL'],
            ['nama' => 'BUDI GUNAWAN', 'kampus' => 'INSTITUT TEKNOLOGI SEPULUH NOPEMBER', 'prodi' => 'TEKNIK MESIN'],
            ['nama' => 'TRI SAPUTRA', 'kampus' => 'UNIVERSITAS SAM RATULANGI', 'prodi' => 'ILMU HUKUM'],
            ['nama' => 'MAYA SARI', 'kampus' => 'UNIVERSITAS LAMPUNG', 'prodi' => 'ILMU POLITIK'],
            ['nama' => 'FAISAL RAMADHAN', 'kampus' => 'UNIVERSITAS JEMBER', 'prodi' => 'ILMU TANAH'],
            ['nama' => 'NURUL HIDAYAH', 'kampus' => 'UNIVERSITAS MUHAMMADIYAH MALANG', 'prodi' => 'TEKNIK ARSITEKTUR'],
            ['nama' => 'HAFIZ NUGRAHA', 'kampus' => 'INSTITUT PERTANIAN BOGOR', 'prodi' => 'STATISTIKA'],
            ['nama' => 'ZAKIYAH ANNISA', 'kampus' => 'UNIVERSITAS ISLAM INDONESIA', 'prodi' => 'ILMU EKONOMI'],
            ['nama' => 'AGUS SANTOSO', 'kampus' => 'UNIVERSITAS NEGERI YOGYAKARTA', 'prodi' => 'PENDIDIKAN MATEMATIKA'],
            ['nama' => 'FARHAN IMAM', 'kampus' => 'UNIVERSITAS NEGERI MAKASSAR', 'prodi' => 'PENDIDIKAN BAHASA INGGRIS'],
            ['nama' => 'DWI CAHYANI', 'kampus' => 'UNIVERSITAS NEGERI MEDAN', 'prodi' => 'SENI MUSIK'],
            ['nama' => 'REZA MAULANA', 'kampus' => 'UNIVERSITAS TRUNOJOYO MADURA', 'prodi' => 'SISTEM INFORMASI'],
            // Duplikasi data dengan variasi nama
        ] + self::generateDummyData('Dosen', 30);
    }

    public static function mahasiswaList()
    {
        return [
            ['nama' => 'ASEP SUPRIYADI', 'nim' => '12103232', 'kampus' => 'STIE PERDANA MANDIRI', 'prodi' => 'AKUNTANSI'],
            ['nama' => 'DIANA ARYA', 'nim' => '18273645', 'kampus' => 'UNIVERSITAS DIPONEGORO', 'prodi' => 'TEKNIK SIPIL'],
            ['nama' => 'HENDRA PUTRA', 'nim' => '19283746', 'kampus' => 'UNIVERSITAS PADJADJARAN', 'prodi' => 'ILMU GIZI'],
            ['nama' => 'MELISA RANI', 'nim' => '23456789', 'kampus' => 'UNIVERSITAS BENGKULU', 'prodi' => 'ILMU HUKUM'],
            ['nama' => 'RIO ALFIAN', 'nim' => '34567890', 'kampus' => 'UNIVERSITAS NEGERI MANADO', 'prodi' => 'ILMU KOMPUTER'],
            ['nama' => 'AYU WULANDARI', 'nim' => '45678901', 'kampus' => 'UNIVERSITAS AIRLANGGA', 'prodi' => 'FARMASI'],
            ['nama' => 'GERRY FAUZAN', 'nim' => '56789012', 'kampus' => 'UNIVERSITAS JEMBER', 'prodi' => 'TEKNIK INFORMATIKA'],
            ['nama' => 'INTAN SARI', 'nim' => '67890123', 'kampus' => 'UNIVERSITAS ISLAM MALANG', 'prodi' => 'ILMU KOMUNIKASI'],
            ['nama' => 'RAFI PRATAMA', 'nim' => '78901234', 'kampus' => 'UNIVERSITAS PAMULANG', 'prodi' => 'MANAJEMEN'],
            ['nama' => 'NADIA KHAIRUNNISA', 'nim' => '89012345', 'kampus' => 'UNIVERSITAS PAKUAN', 'prodi' => 'BIOLOGI'],
            // Duplikasi data dengan variasi NIM
        ] + self::generateDummyData('Mahasiswa', 40);
    }

    private static function generateDummyData($tipe, $count)
    {
        $list = [];
        for ($i = 1; $i <= $count; $i++) {
            $list[] = $tipe === 'Dosen'
                ? [
                    'nama' => "Dosen $i",
                    'kampus' => "Universitas $i",
                    'prodi' => "Prodi $i"
                ]
                : [
                    'nama' => "Mahasiswa $i",
                    'nim' => str_pad($i + 100000, 8, '0', STR_PAD_LEFT),
                    'kampus' => "Universitas $i",
                    'prodi' => "Prodi $i"
                ];
        }
        return $list;
    }
}
