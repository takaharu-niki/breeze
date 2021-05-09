<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'folder_id',
        'title',
        'status_id',
        'expire',
    ];

    /**
     * 
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * 
     */
    public function formatExpireForList()
    {
        $convertExpire = strtotime($this->expire);
        
        return date('Y/m/d H:i:s', $convertExpire);
    }

    /**
     * 
     */
    public function formatExpireForDateType()
    {
        $convertExpire = strtotime($this->expire);
        
        return date('Y-m-d', $convertExpire);
    }
}
