<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'identity_type_id',
        'id_front',
        'id_back',
        'certificate',
        'profile_photo',
        'user_id'
    ];

    public function identityType(){
        return $this->belongsTo(IdentityType::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getIdFrontAttribute($value){
        if(empty($value)) return $value;
        return 'storage/'.$value;
    }

    public function getIdBackAttribute($value){
        if(empty($value)) return $value;
        return 'storage/'.$value;
    }

    // public function getCertificateAttribute($value){
    //     if(empty($value)) return $value;
    //     return 'storage/'.$value;
    // }

    public function getProfilePhotoAttribute($value){
        if(empty($value)) return $value;
        return 'storage/'.$value;
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable'); // or whatever your related model is
    }

    public function certificates()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
