<?php
  
namespace App\Enums;

class BookStatusEnum {
    const tersedia = 'Y';
    const tidak_tersedia = 'N';

    /**
     * Status data for book
     */
    public static $status = [
        self::tersedia,
        self::tidak_tersedia
    ];
}