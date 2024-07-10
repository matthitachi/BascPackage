<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BacsResponseTest extends TestCase
{
    public function testGetBacsResponse()
    {
        $mockRequestData = [
            'serial' => 'Mk2OPn', // Max 6 characters
            'sun' => '123456', // Max 6 characters
            'gen_no' => 1234, // Number, Max 4 digits
            'gen_ver_no' => 2, // Number, Max 2 digits
            'creation_date' => '22087', // String, Max 5 characters
            'expiration_date' => '23089', // String, Max 5 characters
            'system_code' => 'BACSNOMk2OPn', // String, Max 13 characters
            'originating_sort_code' => '123456', // String, Max 6 characters
            'originating_account_number' => '12345678', // String, Max 8 characters
            'transaction_code' => 17, // Number, Max 2 digits, In: 17, 99
            'user_name' => 'TestUser', // String, Max 18 characters
            'amount' => '100000', // String, Max 11 characters
            'reference' => 'TestReference', // String, Max 18 characters
        ];

        $queryString = http_build_query($mockRequestData);
        $response = $this->getJson('/api/bacs-response?' . $queryString);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'vol',
                'hdr1',
                'hdr2',
                'uhl',
                'standard',
                'eof1',
                'eof2',
                'utl'
            ]
        ]);
    }
}
