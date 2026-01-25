<?php

namespace App\Support;

class Release
{
    private static ?string $cachedReleaseId = null;

    public static function releaseId(): string
    {
        if (self::$cachedReleaseId !== null) {
            return self::$cachedReleaseId;
        }

        $path = base_path('RELEASE_ID');
        $releaseId = 'dev';

        try {
            if (is_file($path)) {
                $contents = trim((string) file_get_contents($path));
                if ($contents !== '') {
                    $releaseId = $contents;
                }
            }
        } catch (\Throwable $e) {
            $releaseId = 'dev';
        }

        self::$cachedReleaseId = $releaseId;

        return $releaseId;
    }
}
