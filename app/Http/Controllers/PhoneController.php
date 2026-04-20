<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\PhoneNumberService;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function index(Request $request, PhoneNumberService $service)
    {
        $query = Customer::query();

        if ($request->filled('country')) {
            $countryConfig = config('countries')[$request->country] ?? null;

            if ($countryConfig) {
                $dialCode = substr($countryConfig['code'], 1);
                $query->where('phone', 'like', "({$dialCode})%");
            }
        }

        $customers = $query->paginate(15)->withQueryString();

        $items = $customers->map(function ($customer) use ($service, $request) {
            $analysis = $service->analyze($customer->phone);

            return [
                'name'    => $customer->name,
                'phone'   => $customer->phone,
                'country' => $analysis['country'],
                'code'    => $analysis['code'],
                'valid'   => $analysis['valid'],
            ];
        });

        if ($request->filled('state')) {
            $items = $items->filter(fn ($item) =>
                $item['valid'] === ($request->state === 'valid')
            );
        }

        return view('phones.index', compact(
                'items',
                'customers'
            ) + [
                'countries' => array_keys(config('countries'))
            ]);
    }
}
