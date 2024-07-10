<?php
namespace Matthitachi\BacsApi\Records;

class HDR1Record{

    public static function generate($sun, $serial, $genNo, $genVerNo, $creationDate, $expirationDate, $systemCode)
    {
        $space = " ";
        $fileIdentifier = sprintf(
            "A%-6sS%-2s1%-6s",
            $sun, // Serial number (6 characters)
            $space,
            $sun
        );
        return sprintf(
            "HDR1%-17s%-6s00010001%4i%2i %-5s %-5s 000000%-13s%-7s",
            $fileIdentifier,
            $serial,
            $genNo,
            $genVerNo,
            $creationDate,
            $expirationDate,
            $systemCode,
            $space
        );
    }
}
