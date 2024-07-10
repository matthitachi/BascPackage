<?php
namespace Matthitachi\BacsApi\Records;

class ContraRecord{

    public static function generate($originatingSortCode, $originatingAccountNumber, $transactionCode, $amount, $narration, $userName,  $processingDate)
    {
        $space = " ";
        if (strlen($amount) < 11) {
            $amount = str_pad($amount, 11, "0", STR_PAD_LEFT);
        }
        $id = "CONTRA";
        return sprintf(
            "%-6s%-8s0%i%-6s%-8s%-4s%-11s%-18s%-18s%-18s %-5s",
            $originatingSortCode, // Originating sort code (6 characters)
            $originatingAccountNumber, // Originating account number (8 characters)
            $transactionCode, // 17 or 99
            $originatingSortCode,
            $originatingAccountNumber,
            $space,
            $amount,
            $narration,
            $id,
            $userName,
            $processingDate
        );
    }
}
