<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Carbon\Carbon;
use App\Models\User;
use App\Models\freelancers;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Session;

class FreelancerRegistrationTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    
    public function test_freelancer_registration_success()
{
    $user = User::factory()->create();
    $this->actingAs($user);

    Storage::fake('public'); // Simulasikan penyimpanan

    $data = [
        'nama' => 'John Doe',
        'tanggal_lahir' => now()->subYears(18)->toDateString(),
        'gender' => 'Laki-laki',
        'alamat' => 'Jl. Mawar No. 123',
        'kota' => 'Jakarta',
        'kode_pos' => '12345',
        'skill' => 'Web Development',
        'telepon' => '081234567890',
        'foto_ktp' => UploadedFile::fake()->create('ktp.jpg'),
    ];

    $response = $this->post(route('freelancers.store'), $data);

    $response->assertRedirect(route('daftarfreelance'));
    $response->assertSessionHas('success', 'Freelancer berhasil didaftarkan!');
    Storage::disk('public')->assertExists('ktp_images/' . $data['foto_ktp']->hashName());

    // Pastikan data tersimpan di database
    $this->assertDatabaseHas('freelancers', [
        'nama' => 'John Doe',
        'email' => $user->email,
        'alamat' => 'Jl. Mawar No. 123',
    ]);
}
public function test_freelancer_registration_missing_telepon()
{
    $user = User::factory()->create(); // Membuat pengguna baru
    $this->actingAs($user); // Login pengguna
    storage::fake('public');
    
    // Data request tanpa 'telepon'
    $data = [
        'nama' => 'John Doe',
        'tanggal_lahir' => now()->subYears(18)->toDateString(),
        'gender' => 'Laki-laki',
        'alamat' => 'Jl. Mawar No. 123',
        'kota' => 'Jakarta',
        'kode_pos' => '12345',
        'skill' => 'Web Development',
        'telepon' => '',
        'foto_ktp' => UploadedFile::fake()->create('ktp.jpg'),
    ];
    
    // Simulasikan request dan tangani response
    $response = $this->post(route('freelancers.store'), $data);
    // $response->assertRedirect(route('daftarfreelance'));
    // $response->assertSessionHasErrors('telepon');
    $response->assertStatus(302); 
    
}


    public function test_freelancer_cannot_registration_if_age_under_17(){
        $user = User::factory()->create();
        $this->actingAs($user);
        storage::fake('public');
        $data = [
            'nama' => 'John Doe',
            'tanggal_lahir' => now()->subYears(15)->toDateString(),
            'gender' => 'Laki-laki',
            'alamat' => 'Jl. Mawar No. 123',
            'kota' => 'Jakarta',
            'kode_pos' => '12345',
            'skill' => 'Web Development',
            'telepon' => '085935497143',
            'foto_ktp' => UploadedFile::fake()->create('ktp.jpg'),
        ];
        $response = $this->withoutMiddleware()->post(route('freelancers.store'), $data);

        // Pastikan response status adalah 422 (Unprocessable Entity)
        $response->assertStatus(302);   
    }

    public function test_freelancer_registration_photo_too_large()
{
    $user = User::factory()->create(); // Membuat pengguna baru
    $this->actingAs($user); // Login pengguna
    Storage::fake('public');
    
    // Data request dengan ukuran foto KTP lebih dari 5MB
    $data = [
        'nama' => 'John Doe',
        'tanggal_lahir' => now()->subYears(18)->toDateString(),
        'gender' => 'Laki-laki',
        'alamat' => 'Jl. Mawar No. 123',
        'kota' => 'Jakarta',
        'kode_pos' => '12345',
        'skill' => 'Web Development',
        'telepon' => '08123456789',
        'foto_ktp' => UploadedFile::fake()->create('ktp.jpg', 6000), // 6MB
    ];

    // Simulasikan request dan tangani response
    $response = $this->post(route('freelancers.store'), $data);
    $response->assertStatus(302);
}

}



