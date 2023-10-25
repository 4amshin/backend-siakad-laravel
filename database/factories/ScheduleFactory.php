<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $status = ['Luring', 'Daring'];
        $ruangan = $this->faker->randomElement(range('A','Z')) . $this->faker->randomDigit(1);
        $kodeAbsensi = $this->faker->regexify('[A-Za-z0-9]{5}');
        $tahunAkademik = $this->generateTahunAkademik();
        return [
            'subject_id' => \App\Models\Subject::factory(),
            // 'student_id' => \App\Models\User::factory(),
            'hari' => $this->faker->randomElement($days),
            // 'status' => $status,
            'jam_mulai' => $this->faker->time('H:i'),
            'jam_selesai' => $this->faker->time('H:i'),
            'ruangan' => $ruangan,
            'kode_absensi' => $kodeAbsensi,
            'tahun_akademik' => $tahunAkademik,
            'semester' => $this->faker->randomDigit(1),
            'created_by' => $this->faker->name(),
            'updated_by' => $this->faker->name(),
            'deleted_by' => $this->faker->name(),
        ];
    }

    protected function generateTahunAkademik()
    {
        $startYear = $this->faker->year();
        $endYear = $startYear + 1;

        return $startYear . '/' . $endYear;
    }
}
