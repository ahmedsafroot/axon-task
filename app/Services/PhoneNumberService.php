<?php

namespace App\Services;

class PhoneNumberService
{
    /**
     * Create a new class instance.
     */
    private array $countries;

    public function __construct()
    {
        $this->countries = config('countries');
    }

    public function analyze(string $phone): array
    {
        foreach ($this->countries as $country => $data) {
            if (preg_match('/^\(' . substr($data['code'], 1) . '\)/', $phone)) {
                return [
                    'country' => $country,
                    'code' => $data['code'],
                    'valid' => preg_match($data['regex'], $phone) === 1
                ];
            }
        }

        return [
            'country' => 'Unknown',
            'code' => null,
            'valid' => false
        ];
    }

}
