<?php

namespace App\Http\Controllers\Front;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
// Tambahkan ini
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FrontPosController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index() {
        
        $products = []; 
        $kasir_id = Auth::id();
        $apiError = null; // <- Variabel baru untuk menampung error

        try {
            $backendApiUrl = rtrim(env('BACKEND', 'http://127.0.0.1:8000/api'), '/');

            $response = Http::get($backendApiUrl . '/products');
            
            if ($response->successful()) {
                $products = $response->json()['data'] ?? [];
            } else {
                // Jika API-nya error (misal: 404, 500)
                $apiError = "Gagal mengambil data dari API: " . ($response->json()['message'] ?? $response->body());
                Log::error('Gagal mengambil produk dari API', ['status' => $response->status(), 'body' => $response->body()]);
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            // Jika servernya tidak bisa dihubungi (misal: cURL error 7)
            $apiError = "Koneksi ke API Produk gagal: " . $e->getMessage();
            Log::error('Error koneksi API Produk: ' . $apiError);
        } catch (\Exception $e) {
            // Error lainnya
            $apiError = "Terjadi error: " . $e->getMessage();
            Log::error('Error API Produk: ' . $apiError);
        }

        return view("pos.index", [
            'products' => (object) $products, 
            'kasir_id' => $kasir_id,
            'apiError' => $apiError // <- Kirim error ke view
        ]);
    }

    // Fungsi baru untuk process payment
    public function processPayment(Request $request)
    {
        try {
            // 1. Dapatkan data dari frontend (cart, tax_rate)
            $cart = $request->input('cart', []);
            $taxRate = $request->input('tax_rate', 0.11) * 100; // Ubah 0.11 jadi 11

            // 2. Siapkan data untuk dikirim ke API Backend
            $details = [];
            foreach ($cart as $productId => $item) {
                $details[] = [
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                ];
            }

            $payload = [
                'tanggal' => now()->toDateString(), // Tanggal hari ini
                'kasir_id' => Auth::id(), // Ambil ID kasir yang sedang login
                'tax' => $taxRate,
                'details' => $details,
            ];

            // 3. Panggil API Backend (SalesController)
            $backendApiUrl = rtrim(env('BACKEND', 'http://127.0.0.1:8000/api'), '/');
            $response = Http::post($backendApiUrl . '/sales', $payload);

            // 4. Teruskan respon dari API ke frontend
            if ($response->successful()) {
                return $response->json();
            } else {
                // Jika API gagal, kirim error
                return response()->json([
                    'status' => $response->status(),
                    'message' => 'API Error: ' . ($response->json()['message'] ?? 'Failed to process sale'),
                    'errors' => $response->json()['errors'] ?? null
                ], $response->status());
            }

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            // Tangani error koneksi (seperti yang Anda alami)
            Log::error('Koneksi ke API sales gagal: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Error connecting to API service: ' . $e->getMessage()
            ], 500);

        } catch (\Exception $e) {
            // Tangani error umum lainnya
            Log::error('Gagal memproses pembayaran: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'An unexpected error occurred: ' . $e->getMessage()
            ], 500);
        }
    }
}

