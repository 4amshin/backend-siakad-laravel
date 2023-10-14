<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AbsensiMatkul>
 */
class AbsensiMatkulFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['Hadir', 'Tidak Hadir']);
        $keterangan = $this->faker->randomElement(['Sakit', 'Izin', 'Tanpa Keterangan']);
        $nilai = $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']);
        $kodeAbsensi = $this->faker->regexify('[A-Za-z0-9]{5}');
        $tahunAkademik = $this->generateTahunAkademik();
        $semester = $this->faker->randomElement(['Ganjil', 'Genap']);
        $pertemuan = $this->faker->numberBetween(1, 26);
        $latitude = $this->faker->latitude($min = -90, $max = 90);
        $longitude = $this->faker->longitude($min = -180, $max = 180);

        return [
            'schedule_id' => \App\Models\Schedule::factory(),
            'student_id' => \App\Models\User::factory(),
            'kode_absensi' => $kodeAbsensi,
            'tahun_akademik' => $tahunAkademik,
            'semester' => $semester,
            'pertemuan' => $pertemuan,
            'status' => $status,
            'keterangan' => $keterangan,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'nilai' => $nilai,
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
