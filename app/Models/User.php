<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'image',
        'bio',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('avatar')
            ->width(128)
            ->crop(128, 128);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatars')
            ->singleFile();
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role', 'role');
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function imageUrl()
    {
        $media = $this->getFirstMedia('avatars');
        if(!$media) {
            return null;
        }
        if ($media->hasGeneratedConversion('avatar')) {
            return $media->getUrl('avatar');
        }

        return $media->getUrl();

    }


    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    public function isFollowedBy(?User $user)
    {
        if(!$user) {
            return false;
        }
        return $this->followers()->where('follower_id', $user->id)->exists();
    }

    public function hasLiked(Post $post)
    {
        return $post->likes()->where('user_id', $this->id)->exists();
    }
}
