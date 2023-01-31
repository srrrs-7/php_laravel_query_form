<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = "users";

    protected $fillable = [
        "job",
        "name",
        "email",
        "portfolio",
        "query",
        "file1",
        "file2",
        "file3"
    ];
}
