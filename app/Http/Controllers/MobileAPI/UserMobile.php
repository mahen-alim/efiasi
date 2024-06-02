<?php

namespace App\Http\Controllers\MobileApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Mail\OtpMail;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Models\ModelRiview;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserMobile extends Controller
{
    
    public function signinEmail(Request $request)
    {
        $email = $request->input('username');
        $password = $request->input('password');

        // Pastikan input tidak kosong
        if (empty($email) || empty($password)) {
            return response()->json(['status' => 'error', 'message' => 'Username atau password tidak boleh kosong'], 400);
        }

        // cek email exist atau tidak
        $isExist = json_decode($this->isExistEmail($request)->getContent(), true);

        // jika email tidak exist
        if ($isExist['status'] !== 'success') {
            return response()->json(['status' => 'error', 'message' => 'Username tidak terdaftar'], 400);
        }

        // get password
        $user = User::select('password')->where('username', $email)->first();

        // jika user tidak ditemukan atau password tidak cocok
        if (!$user || !Hash::check($password, $user->password)) {
            return response()->json(['status' => 'error', 'message' => 'Password tidak cocok'], 400);
        }

        return response()->json(['status' => 'success', 'message' => 'Login Berhasil'], 200);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->only('username', 'password'), [
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->first();
            return response()->json(['status' => 'error', 'message' => $errors, 'code' => 400]);
        }

        $usernameOrEmail = $request->input('username');
        $password = $request->input('password');

        // Cek apakah input adalah username atau email
        $user = User::where('username', $usernameOrEmail)
            ->orWhere('email', $usernameOrEmail)
            ->first();

        if (is_null($user)) {
            return response()->json(['status' => 'error', 'message' => 'Username atau email salah'], 400);
        }

        // Verifikasi password
        if (!password_verify($password, $user->password)) {
            return response()->json(['status' => 'error', 'message' => 'Password salah'], 400);
        }

        return response()->json($user);
    }

    public function isExistEmail(Request $request)
    {
        $email = $request->input("email");

        $isExist = User::select("email")->where('email', '=', $email)->limit(1)->exists();

        if ($isExist) {
            return response()->json(['status' => 'success'], 200);
        } else {
            return response()->json(['status' => 'error'], 400);
        }
    }
    public function isExistPhone(Request $request) // Added method
    {
        $phone = $request->input("no_hp"); // Assuming "no_hp" is the phone number field

        $isExist = User::where('no_hp', '=', $phone)->limit(1)->exists();

        if ($isExist) {
            return response()->json(['status' => 'success'], 200);
        } else {
            return response()->json(['status' => 'error'], 400);
        }
    }
    public function register(Request $request)
    {
        // Validasi input pengguna
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:30',
                'regex:/[^\w\s]/', // Setidaknya satu karakter spesial
            ],
            'no_hp' => 'required|string|max:15|unique:users,no_hp',
            'alamat' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ], 400);
        }

        // Buat akun baru
        $user = User::create([
            'name' => $request->input('nama_lengkap'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'no_hp' => $request->input('no_hp'),
            'alamat' => $request->input('alamat'),
            'level' => 'END USER'
        ]);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal membuat akun'
            ], 500);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Register berhasil'
        ], 200);
    }

    public function createUser(Request $request, User $user)
    {

        // mendapatkan data

        $user->no_hp = $request->input('no_hp');
        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->password = $request->input('password');
        $user->alamat = $request->input('alamat');
        $user->username = $request->input('username');
        // menyimpan data
        if ($user->save()) {
            return ['status' => 'success', 'message' => 'Akun berhasil dibuat'];
        } else {
            return ['status' => 'error', 'message' => 'Akun gagal dibuat'];
        }
    }

    public function signinGoogle(Request $request)
    {
        $email = $request->input('email');

        // cek email exist atau tidak
        $isExist = User::select("email", "id")->where('email', '=', $email)->limit(1)->exists();
        $users = User::where('email', $email)
            ->first();
        // jika email tidak exist
        if ($isExist) {
            return response()->json(['status' => 'success', 'message' => 'Login Berhasil', 'id' => $users->id], 200);
        }

        return response()->json(['status' => 'success', 'message' => 'Email belum terdaftar'], 400);
    }
    public function profile()
    {
        // Mendapatkan pengguna berdasarkan ID tertentu, misalnya ID 1
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        } else {
            return response()->json(['error' => 'Missing id_user parameter'], 400);
        }

        $user = DB::table('users')->where('id', $id)->first();

        // Memeriksa apakah pengguna ditemukan
        if ($user) {
            // Mendapatkan data password dan role
            return response()->json($user);
        } else {
            // Mengembalikan response kosong jika user tidak ditemukan
            return response()->json([]);
        }
    }

    public function pemesanan(Request $request)
    {
        // Validasi input pengguna
        $validator = Validator::make($request->all(), [
            'jenis_mobil' => 'required|string',
            'tanggal_pemesanan' => 'required|date_format:Y-m-d',
            'keluhan' => 'required|string',
            'harga' => 'required|string',
            'gambar' => 'required|file|image',
            'detailing_dan_variasi' => 'required|string',
            'user_id' => 'required|String|exists:users,id', // Validasi user_id
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()], 400);
        }

        // Mulai transaksi
        try {
            $photo = $request->file('gambar');

            // Mengecek apakah file foto shop valid
            if ($photo && $photo->isValid()) {
                // Mendapatkan format gambar
                $extension = $photo->getClientOriginalExtension();
                // Mengubah nama foto shop
                $fotoShop = time() . '.' . $extension;
                // Menyimpan foto shop
                $photo->move(public_path('uploads/reservations'), $fotoShop);
                // Jika foto shop berhasil disimpan
                $filenamePhoto = $fotoShop;

                DB::beginTransaction();


                $service = new Service();
                $service->tipe_service = $request->detailing_dan_variasi;
                $service->user_id = $request->user_id;
                $service->price = $request->harga;
                $service->benefit = '';
                $service->description = $request->keluhan;
                $service->duration = '0';
                $service->file = $filenamePhoto;
                $service->save();

                $serviceId = $service->id;

                DB::commit();

                DB::beginTransaction();
                // Create a new reservation
                $reservation = new Reservation();
                $reservation->service_id = $serviceId;
                $reservation->jenis_mobil = $request->jenis_mobil;
                $reservation->tanggal_pemesanan = $request->tanggal_pemesanan;
                $reservation->keluhan = $request->keluhan;
                $reservation->harga = $request->harga;
                $reservation->gambar = $filenamePhoto;
                $reservation->save();

                // Commit the transaction
                DB::commit();


                return response()->json(['status' => 'success', 'message' => 'Pemesanan berhasil dibuat'], 201);
            } else {
                // Jika $photo bukan file yang valid
                return response()->json(['status' => 'error', 'message' => 'The photo is not valid.']);
            }
        } catch (\Exception $e) {
            // Batalkan transaksi jika terjadi kesalahan
            DB::rollBack();

            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }


    public function sendOtp(Request $request)
    {
        // Generate OTP (contoh sederhana, ganti dengan logika OTP yang sesuai)
        $otp = rand(1000, 9999);

        // Kirim OTP melalui email
        Mail::to($request->user()->email)->send(new OtpMail($otp));

        return response()->json(['message' => 'OTP telah dikirim ke email Anda']);
    }
    public function editProfile(Request $request)
    {
        $input = $request->all();
        $data = [
            'name' => $input['nama'],
            'email' => $input['email'],
            'no_hp' => $input['no_hp'],
            'alamat' => $input['alamat'],
        ];
        try {
            User::where('id', $input['id'])->update($data);
            return response()->json(["message" => "Data berhasil diperbarui"]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat memperbarui data pengguna', 'error' => $e->getMessage()], 500);
        }
    }
    public function kirimUlasan(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
            'ulasan' => 'nullable|string',
        ]);

        // Prepare the data manually
        $reviewData = [
            'id' => $request->input('id'),
            'ulasan' => $request->input('ulasan'),
            // Add other necessary fields here
        ];

        $review = ModelRiview::create($reviewData);

        return response()->json(['message' => 'Review created successfully', 'review' => $review], 201);
    }


    public function resetpassword(Request $request,)
    {
        // validasi data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:30',
                'regex:/[^\w\s]/',
            ],
        ]);

        // custom message
        $customMsg = [
            'email' => 'Email tidak valid',
            'password' => 'Password tidak valid.',
        ];
        $validator->setCustomMessages($customMsg);

        // cek validasi
        if ($validator->fails()) {
            return ['status' => 'error', 'message' => $validator->errors()->first()];
        }

        // get data
        $email = $request->input('email');
        $newPass = $request->input('password');
        $passHash = Hash::make($newPass);

        // cek email exist atau tidak
        $isExistEmail = json_decode($this->isExistEmail($request)->getContent(), true);

        // jika email tidak exist
        if ($isExistEmail['status'] !== 'success') {
            return response()->json(['status' => 'success', 'message' => 'Email tidak terdaftar'], 400);
        } else {
            // mengupdate password
            $update = User::select('email')->where('email', '=', $email)->update(['password' => $passHash]);
            if ($update) {
                // return response()->json(['status' => 'success', 'message' => 'Password berhasil diedit'], 200);


                return response()->json(['status' => 'success', 'message' => 'change success'], 200);
            }
        }
    }
    public function history(Request $request)
    {
        // Mengambil user yang sedang login
        $userId = $request->id;

        if (!$userId) {
            return response()->json(['status' => 'error', 'message' => 'User not authenticated'], 401);
        }

        try {
            // Mengambil data reservasi dan service yang terkait berdasarkan user_id
            $user = User::with('services')
                ->where('id', $userId)
                ->first();

            // dd($user);

            if (!$user) {
                return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
            }

            // Mengubah data menjadi bentuk yang diinginkan untuk response
            $historyData = $user->services->map(function ($service) {
                return [
                    'nama_lengkap' => $service->user->name, // Pastikan user relationship ada di Service model
                    'tipe_service' => $service->tipe_service,
                    'harga' => $service->price,
                ];
            });
            return response()->json(['status' => 'success', 'data' => $historyData], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
