<?php
namespace Matthitachi\BacsApi\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Matthitachi\BacsApi\Records\ContraRecord;
use Matthitachi\BacsApi\Records\HDR1Record;

class BacsApiController
{
    public function getResponse(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'serial' => 'required|string|max:6',
            'sun' => 'required|string|max:6',
            'gen_no' => 'required|number|max:4',
            'gen_ver_no' => 'required|number|max:2',
            'creation_date' => 'required|string|max:5',
            'expiration_date' => 'required|string|max:5',
            'system_code' => 'required|string|max:13',
            'originating_sort_code' => 'required|string|max:6',
            'originating_account_number' => 'required|string|max:8',
            'transaction_code' => 'required|number|max:2|in:17,99',
            'user_name' => 'required|string|max:18',
            'amount' => 'required|string|max:11',
            'reference' => 'required|string|max:18',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $serial = $request->input('serial');
        $sun = $request->input('sun');
        $genNo = $request->input('gen_no');
        $genVerNo = $request->input('gen_ver_no');
        $creationDate = $request->input('creation_date');
        $expirationDate = $request->input('expiration_date');
        $systemCode = $request->input('system_code');
        $originatingSortCode = $request->input('originating_sort_code');
        $originatingAccountNumber = $request->input('originating_account_number');
        $transactionCode = $request->input('transaction_code');
        $userName = $request->input('user_name');
        $amount = $request->input('amount');
        $reference = $request->input('reference');

        $hdr1 = HDR1Record::generate($sun, $serial, $genNo, $genVerNo, $creationDate, $expirationDate, $systemCode);
        $contra = ContraRecord::generate($originatingSortCode, $originatingAccountNumber, $transactionCode, $amount, $reference, $userName, $systemCode);
        $response = [
            'data' => [
                'hdr1' => $hdr1,
                'contra' => $contra
            ]
        ];

        return response()->json($response);
    }
}
