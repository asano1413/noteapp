<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PersonalNote extends Model
{
  protected $fillable = [
    'title',
    'content',
    'user_id'
  ];
  public function up()
{
    Schema::create('personal_notes', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('content');
        $table->unsignedBigInteger('user_id');
        $table->timestamps();
    });
}
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
