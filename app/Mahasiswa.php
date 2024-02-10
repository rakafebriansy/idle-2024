<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $nim
 * @property string $nama
 * @property string $email
 * @property string $no_hp
 * @property string $created_at
 * @property string $updated_at
 * @property Peserta[] $pesertas
 * @property Tim[] $tims
 */
class Mahasiswa extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'nim';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['nim', 'nama', 'email', 'no_hp', 'created_at', 'updated_at'];

    public static function createMahasiswa($nim, $nama, $email, $no_hp){
        $mahasiswa = Mahasiswa::find($nim);
        if($mahasiswa != null){
            return $mahasiswa;
        }

        $mahasiswa = Mahasiswa::create([
            'nim' => $nim,
            'nama' => $nama,
            'email' => $email,
            'no_hp' => $no_hp
        ]);

        return $mahasiswa;
    }

    public static function updateMahasiswa($nim, $nama, $email, $no_hp){
        $mahasiswa = Mahasiswa::findOrFail($nim);
        if($mahasiswa->update([
            'nama' => $nama,
            'email' => $email,
            'no_hp' => $no_hp
        ])){
            return true;
        }
        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesertas()
    {
        return $this->hasMany('App\Peserta', 'nim', 'nim');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tims()
    {
        return $this->hasMany('App\Tim', 'ketua_tim', 'nim');
    }
}
