<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $packages = config('paket');

        $data = $request->validate([
            'package_id' => ['required', 'string', 'in:'.implode(',', array_keys($packages))],
            'sub_index' => ['required', 'integer', 'min:0'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'qty' => ['required', 'integer', 'min:1', 'max:1000'],
        ]);

        $package = $packages[$data['package_id']];
        $sub = $package['subPackages'][$data['sub_index']] ?? null;

        if (! $sub) {
            return response()->json(['message' => 'Paket tidak ditemukan.'], 422);
        }

        // Harga selalu diambil dari server, bukan dari browser.
        $booking = Booking::create([
            'user_id' => $request->user()?->id,
            'package_id' => $data['package_id'],
            'package_title' => $package['title'],
            'sub_package' => $sub['name'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'travel_date' => $data['date'],
            'qty' => $data['qty'],
            'unit_price' => $sub['price'],
            'total' => $sub['price'] * $data['qty'],
        ]);

        return response()->json([
            'id' => $booking->id,
            'sub_package' => $booking->sub_package,
            'total' => $booking->total,
        ], 201);
    }
}
