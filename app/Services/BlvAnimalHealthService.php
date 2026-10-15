<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BlvAnimalHealthService
{
    public const DESCRIPTOR_URL = 'https://www.data.blv.admin.ch/ogd/animal_health_statistics/animal-health-statistics.json';
    public const CSV_FALLBACK_URL = 'https://www.data.blv.admin.ch/ogd/animal_health_statistics/animal-health-statistics.csv';
    public const CACHE_KEY = 'blv_animal_health_rows';
    public const CACHE_TTL = 21600; // 6 ชม.

    /**
     * หา URL ของ CSV จาก descriptor.json (กัน URL เปลี่ยนในอนาคต)
     */
    public function resolveCsvUrl(): string
    {
        try {
            $res = Http::timeout(20)->get(self::DESCRIPTOR_URL);
            if ($res->ok()) {
                $json = $res->json();
                $path = $json['resources'][0]['path'] ?? null;
                if (is_string($path) && $path !== '') {
                    return $path;
                }
            }
        } catch (\Throwable $e) {
            Log::warning('BLV resolveCsvUrl failed: ' . $e->getMessage());
        }

        return self::CSV_FALLBACK_URL;
    }

    /**
     * ดึงแถวทั้งหมด (cache ไว้กันโหลด 600KB ทุกครั้ง)
     * คืน array ของ ['year','canton','diseases_group','diseases','species','count']
     */
    public function fetchRows(bool $useCache = true): array
    {
        if ($useCache && Cache::has(self::CACHE_KEY)) {
            return Cache::get(self::CACHE_KEY, []);
        }

        $rows = $this->fetchFreshRows();

        if (!empty($rows)) {
            Cache::put(self::CACHE_KEY, $rows, self::CACHE_TTL);
        }

        return $rows;
    }

    public function fetchFreshRows(): array
    {
        try {
            $csvUrl = $this->resolveCsvUrl();
            $res = Http::timeout(60)->get($csvUrl);
            if ($res->failed()) {
                return [];
            }

            return $this->parseCsv($res->body());
        } catch (\Throwable $e) {
            Log::warning('BLV fetchFreshRows failed: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * แปลง CSV string -> array
     * header จริง: year,canton,diseasesGroup,diseases,species,count
     */
    public function parseCsv(string $csv): array
    {
        // ตัด BOM กันหัวคอลัมน์เพี้ยน
        $csv = ltrim($csv, "\xEF\xBB\xBF");
        $lines = preg_split("/\r\n|\n|\r/", trim($csv));
        if (empty($lines)) {
            return [];
        }

        $header = str_getcsv(array_shift($lines));
        $header = array_map(fn ($h) => strtolower(trim($h)), $header);

        // map header -> key มาตรฐาน
        $idx = [
            'year'           => array_search('year', $header),
            'canton'         => array_search('canton', $header),
            'diseases_group' => array_search('diseasesgroup', $header),
            'diseases'       => array_search('diseases', $header),
            'species'        => array_search('species', $header),
            'count'          => array_search('count', $header),
        ];

        // ถ้า header ไม่ครบ ถือว่าไฟล์เพี้ยน
        if (in_array(false, $idx, true)) {
            return [];
        }

        $rows = [];
        foreach ($lines as $line) {
            if (trim($line) === '') {
                continue;
            }
            $cols = str_getcsv($line);
            // กันแถวขาด
            if (count($cols) < count($header)) {
                continue;
            }
            $rows[] = [
                'year'           => is_numeric($cols[$idx['year']] ?? null) ? (int) $cols[$idx['year']] : null,
                'canton'         => trim($cols[$idx['canton']] ?? ''),
                'diseases_group' => trim($cols[$idx['diseases_group']] ?? ''),
                'diseases'       => trim($cols[$idx['diseases']] ?? ''),
                'species'        => trim($cols[$idx['species']] ?? ''),
                'count'          => is_numeric($cols[$idx['count']] ?? null) ? (int) $cols[$idx['count']] : 0,
            ];

            // กัน memory บวมตอน import เต็มไฟล์ เอาแค่ 20000 แถวแรกพอสำหรับโครงงาน
            // ถ้าต้องการทั้งหมด ให้ลบ limit นี้ทิ้ง
            if (count($rows) >= 20000) {
                break;
            }
        }

        return $rows;
    }

    /**
     * hash กัน import ซ้ำ (แทน api_id แบบ Dog API)
     */
    public static function apiHash(array $row): string
    {
        return md5(implode('|', [
            $row['year'] ?? '',
            $row['canton'] ?? '',
            $row['diseases'] ?? '',
            $row['species'] ?? '',
            $row['diseases_group'] ?? '',
        ]));
    }

    public function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}
