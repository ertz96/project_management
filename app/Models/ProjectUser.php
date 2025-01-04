<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUser  extends Model
{
    use HasFactory;

    // Specify the table if it's not the plural form of the model name
    protected $table = 'project_user'; // Adjust this if your table name is different

    // Fillable properties
    protected $fillable = [
        'user_id',
        'project_id',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}