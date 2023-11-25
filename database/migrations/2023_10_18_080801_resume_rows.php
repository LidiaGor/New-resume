<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::table('resume_rows', function (Blueprint $table) {
        $table->datetime('date_start');
        $table->datetime('date_end');
    });

