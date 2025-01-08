<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Freelancer;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DaftarFreelanceControllerTest extends TestCase
{
    use WithFaker;
        public function test_user_can_register_as_freelancer()
{
    // Ambil pengguna yang sudah ada dari database
    $user = User::where('email', 'tegarfajar2234@gmail.com')->first();
    // Pastikan pengguna ada
    $this->assertNotNull($user, 'Pengguna tidak ditemukan!');
    // Simulasikan login
    $this->actingAs($user);
    // Simulasi penyimpanan file
    Storage::disk('public');
    // Gunakan gambar yang ada di tests/Feature/images
    $filePath = base_path('tests/Feature/images/dummy_ktp.jpg'); 
    // Pastikan file ada
    $this->assertFileExists($filePath);
    // Gunakan UploadedFile dengan file yang ada
    $file = new UploadedFile(
        $filePath,
        'dummy_ktp.jpg',
        null,
        null,
        true // Setujui untuk menandakan bahwa ini adalah file asli
    );
    // Data yang akan dikirim
    $data = [
        'nama' => 'Tegar Setio Nugroho',
        'tanggal_lahir' => '2003-07-02',
        'gender' => 'Laki-Laki',
        'alamat' => 'Jl Sultan Agung, RT 01/RW 15, Desa Tembokrejo, Kecamatan Muncar',
        'kota' => 'Banyuwangi',
        'kode_pos' => 12345,
        'skill' => 'web Developer',
        'telepon' => '085935497143',
        'foto_ktp' => $file, // Ini file yang digunakan
        'email' => $user->email, // Ambil email dari pengguna yang login
    ];
    try {
        // Mengirim request untuk menyimpan freelancer
        $response = $this->withoutMiddleware()->post(route('freelancers.store'), $data);
        // Assert response dan database
        $response->assertRedirect(route('daftarfreelance'));
        $response->assertSessionHas('success', 'Freelancer berhasil didaftarkan!');
        // Pastikan data disimpan di tabel freelancers
        $this->assertDatabaseHas('freelancers', [
            'nama' => 'Tegar Setio Nugroho',
            'email' => $user->email, // Mengambil email dari pengguna yang login
            'tanggal_lahir' => '2003-07-02',
            'gender' => 'Laki-Laki',
            'alamat' => 'Jl Sultan Agung, RT 01/RW 15, Desa Tembokrejo, Kecamatan Muncar',
            'kota' => 'Banyuwangi',
            'kode_pos' => 12345,
            'skill' => 'web Developer',
            'telepon' => '085935497143',
            'status' => 'pengajuan',
        ]);
    } catch (\Exception $e) {
        $this->fail('Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
    }
}
/** @test */

public function Freelancertest()
{
$data = [
    'nama' => 'Tegar Setio Nugroho',
    'tanggal_lahir' => '2003-07-02',
    'gender' => 'Laki-Laki',
    'email' => 'email',
    'alamat' => 'Jl Sultan Agung, RT 01/RW 15, Desa Tembokrejo, Kecamatan Muncar',
    'kota' => 'Banyuwangi',
    'skill' => 'Web Developer',
    'telepon' => '085935497143',
    'kode_pos' => '68472',
    'foto_ktp' => UploadedFile::fake()->create('ktp.jpg', 100), // Ganti image dengan file biasa
    'status' => 'pengajuan',
];


    // Mengirim request POST ke endpoint penyimpanan
    $response = $this->post('/freelancers', $data);

    // Assert response status
    $response->assertStatus(201);

    // Assert data tersimpan di database
    $this->assertDatabaseHas('freelancers', [
     'nama' => 'Tegar Setio Nugroho',
    'tanggal_lahir' => '2003-07-02',
    'gender' => 'Laki-Laki',
    'email' => 'email',
    'alamat' => 'Jl Sultan Agung, RT 01/RW 15, Desa Tembokrejo, Kecamatan Muncar',
    'kota' => 'Banyuwangi',
    'skill' => 'Web Developer',
    'telepon' => '085935497143',
    'kode_pos' => '68472',
    'foto_ktp' => UploadedFile::fake()->create('ktp.jpg', 100), // Ganti image dengan file biasa
    'status' => 'pengajuan',
    ]);
}
public function test_user_cannot_register_as_freelancer_without_phone()
{
    // Ambil pengguna yang sudah ada dari database
    $user = User::where('email', 'yoloclub@gmail.com')->first();
    // Pastikan pengguna ada
    $this->assertNotNull($user, 'Pengguna tidak ditemukan!');
    // Simulasikan login
    $this->actingAs($user);
    // Simulasi penyimpanan file
    Storage::disk('public');
    // Gunakan gambar yang ada di tests/Feature/images
    $filePath = base_path('tests/Feature/images/dummy_ktp.jpg'); 
    // Pastikan file ada
    $this->assertFileExists($filePath);
    // Gunakan UploadedFile dengan file yang ada
    $file = new UploadedFile(
        $filePath,
        'dummy_ktp.jpg',
        null,
        null,
        true // Setujui untuk menandakan bahwa ini adalah file asli
    );
    // Data yang akan dikirim, tanpa telepon
    $data = [
        'nama' => 'Tegar Setio Nugroho',
        'tanggal_lahir' => '2003-07-02',
        'gender' => 'Laki-Laki',
        'alamat' => 'Jl Sultan Agung, RT 01/RW 15, Desa Tembokrejo, Kecamatan Muncar',
        'kota' => 'Banyuwangi',
        'kode_pos' => 12345,
        'skill' => 'web Developer',
        'foto_ktp' => $file, // Ini file yang digunakan
        'email' => $user->email, // Ambil email dari pengguna yang login
        // 'telepon' => '', // Uncomment if you want to explicitly show it's not present
    ];
    // Mengirim request untuk menyimpan freelancer
    $response = $this->withoutMiddleware()->post(route('freelancers.store'), $data);
    // Assert response and validation error
    $response->assertSessionHasErrors(['telepon' => 'Telepon wajib diisi.']);
}

public function test_user_cannot_register_below_minimum_age()
{
    // Ambil pengguna yang sudah ada dari database
    $user = User::where('email', 'yoloclub@gmail.com')->first();
    // Pastikan pengguna ada
    $this->assertNotNull($user, 'Pengguna tidak ditemukan!');
    // Simulasikan login
    $this->actingAs($user);
    // Simulasi penyimpanan file
    Storage::disk('public');
    // Gunakan gambar yang ada di tests/Feature/images
    $filePath = base_path('tests/Feature/images/dummy_ktp.jpg'); 
    // Pastikan file ada
    $this->assertFileExists($filePath);
    // Gunakan UploadedFile dengan file yang ada
    $file = new UploadedFile(
        $filePath,
        'dummy_ktp.jpg',
        null,
        null,
        true // Setujui untuk menandakan bahwa ini adalah file asli
    );
    // Data yang akan dikirim dengan tanggal lahir yang tidak valid
    $data = [
        'nama' => 'Tegar Setio Nugroho',
        'tanggal_lahir' => '2010-07-02', // Tanggal lahir tidak valid (umur dibawah 17 tahun)
        'gender' => 'Laki-Laki',
        'alamat' => 'Jl Sultan Agung, RT 01/RW 15, Desa Tembokrejo, Kecamatan Muncar',
        'kota' => 'Banyuwangi',
        'kode_pos' => 12345,
        'skill' => 'web Developer',
        'foto_ktp' => $file, // Ini file yang digunakan
        'email' => $user->email, // Ambil email dari pengguna yang login
        'telepon' => '08123456789', // Mengisi telepon yang valid
    ];
    
    // Mengirim request untuk menyimpan freelancer
    $response = $this->withoutMiddleware()->post(route('freelancers.store'), $data);
    
    // Assert response and validation error
    $response->assertSessionHasErrors(['tanggal_lahir' => 'Minimal usia 17.']);
}



    public function test_user_cannot_register_max_size()
    {
    // Ambil pengguna yang sudah ada dari database
    $user = User::where('email', 'yoloclub@gmail.com')->first();
    // Pastikan pengguna ada
    $this->assertNotNull($user, 'Pengguna tidak ditemukan!');
    // Simulasikan login
    $this->actingAs($user);
    // Simulasi penyimpanan file
    Storage::disk('public');
    // Gunakan gambar yang ada di tests/Feature/images
    $filePath = base_path('tests/Feature/images/6mb.png'); 
    // Pastikan file ada
    $this->assertFileExists($filePath);
    // Gunakan UploadedFile dengan file yang ada
    $file = new UploadedFile(
        $filePath,
        '6mb.png',
        null,
        null,
        true // Setujui untuk menandakan bahwa ini adalah file asli
    );
    // Data yang akan dikirim dengan tanggal lahir yang tidak valid
    $data = [
        'nama' => 'Tegar Setio Nugroho',
        'tanggal_lahir' => '2000-07-02', // Tanggal lahir tidak valid (umur dibawah 17 tahun)
        'gender' => 'Laki-Laki',
        'alamat' => 'Jl Sultan Agung, RT 01/RW 15, Desa Tembokrejo, Kecamatan Muncar',
        'kota' => 'Banyuwangi',
        'kode_pos' => 12345,
        'skill' => 'web Developer',
        'foto_ktp' => $file, // Ini file yang digunakan
        'email' => $user->email, // Ambil email dari pengguna yang login
        'telepon' => '08123456789', // Mengisi telepon yang valid
    ];
    
    // Mengirim request untuk menyimpan freelancer
    $response = $this->withoutMiddleware()->post(route('freelancers.store'), $data);
    
    // Assert response and validation error
    $response->assertSessionHasErrors(['foto_ktp' => 'Maksimal file gambar adalah 5 mb.']);
}

    public function test_user_cannot_register_pending()
    {
            // Ambil pengguna yang sudah ada dari database
            $user = User::where('email', 'tegarfajar224@gmail.com')->first();
            // Pastikan pengguna ada
            $this->assertNotNull($user, 'Pengguna tidak ditemukan!');
            // Simulasikan login
            $this->actingAs($user);
            // Simulasi penyimpanan file
            Storage::disk('public');
            // Gunakan gambar yang ada di tests/Feature/images
            $filePath = base_path('tests/Feature/images/dummy_ktp.jpg'); 
            // Pastikan file ada
            $this->assertFileExists($filePath);
            // Gunakan UploadedFile dengan file yang ada
            $file = new UploadedFile(
                $filePath,
                'dummy_ktp.jpg',
                null,
                null,
                true // Setujui untuk menandakan bahwa ini adalah file asli
            );
            // Data yang akan dikirim dengan tanggal lahir yang tidak valid
            $data = [
                'nama' => 'Tegar Setio Nugroho',
                'tanggal_lahir' => '2000-07-02', // Tanggal lahir tidak valid (umur dibawah 17 tahun)
                'gender' => 'Laki-Laki',
                'alamat' => 'Jl Sultan Agung, RT 01/RW 15, Desa Tembokrejo, Kecamatan Muncar',
                'kota' => 'Banyuwangi',
                'kode_pos' => 12345,
                'skill' => 'web Developer',
                'foto_ktp' => $file, // Ini file yang digunakan
                'email' => $user->email, // Ambil email dari pengguna yang login
                'telepon' => '08123456789', // Mengisi telepon yang valid
            ];
            // Mengirim request untuk menyimpan freelancer
            $response = $this->withoutMiddleware()->post(route('freelancers.store'), $data);
            // Assert response and validation error
            $response->assertSessionHasErrors(['email' => 'Permintaan anda sebelumya masih diproses']);
            }


   
    


}
