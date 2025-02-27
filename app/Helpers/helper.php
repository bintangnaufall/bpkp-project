<?php

namespace App\Helpers;

use App\Models\Surat;

class Helper {
    public static function jumlahSurat($month, $year) {
        return Surat::whereMonth('created_at', $month)
                    ->whereYear('created_at', $year)
                    ->count();
    }
}
