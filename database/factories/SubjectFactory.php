<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tahunAkademik = $this->generateTahunAkademik();
        $semester = $this->faker->randomElement(['Ganjil', 'Genap']);
        $matkul = $this->faker->randomElement([
            'Website Berbasis CMS',
            'Analisa & Desain Web',
            'Sistem Berkas',
            'Rekayasa Website',
            'Web Mobile',
        ]);
        $sks = $this->faker->randomElement([1, 2, 3]);


        return [
            'dosen_id' => \App\Models\User::factory(),
            'title' => $matkul,
            'semester' => $semester,
            'tahun_akademik' => $tahunAkademik,
            'sks' => $sks,
            'kode_matkul' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'deskripsi' => $this->faker->paragraph(1),
        ];
    }

    protected function generateTahunAkademik()
    {
        $startYear = $this->faker->numberBetween(2018, date('Y'));
        $endYear = $startYear + 1;

        return $startYear . '/' . $endYear;
    }
}
