<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Khs>
 */
class KhsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nilai = $this->faker->randomElement(['4', '3', '2', '1', '0']);
        $grade = $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']);
        $keterangan = $this->faker->randomElement(['Lulus', 'Tidak Lulus']);
        $tahunAkademik = $this->generateTahunAkademik();
        $semester = $this->faker->randomElement(['Ganjil', 'Genap']);

        return [
            'subject_id' => \App\Models\Subject::factory(),
            'student_id' => \App\Models\User::factory(),
            'nilai' => $nilai,
            'grade' => $grade,
            'keterangan' => $keterangan,
            'tahun_akademik' => $tahunAkademik,
            'semester' => $semester,
            'created_by' => $this->faker->name(),
            'updated_by' => $this->faker->name(),
            'deleted_by' => $this->faker->name(),
        ];
    }

    protected function generateTahunAkademik()
    {
        $startYear = $this->faker->numberBetween(2018, date('Y'));
        $endYear = $startYear + 1;

        return $startYear . '/' . $endYear;
    }
}
