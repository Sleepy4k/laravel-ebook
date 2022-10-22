<?php
  
namespace App\Enums;
 
class BookStatusEnum {
    const tersedia = 'Y';
    const tidak_tersedia = 'N';

    public static $status = [
        self::tersedia,
        self::tidak_tersedia
    ];
}