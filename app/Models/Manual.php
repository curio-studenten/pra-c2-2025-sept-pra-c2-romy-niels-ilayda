<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manual extends Model
{
    use HasFactory;

    // Voeg deze relatie toe
   public function brand()
{
    return $this->belongsTo(Brand::class);
}
    // Je bestaande methods blijven hetzelfde...
    public function getFilesizeHumanReadableAttribute(){
        $size = $this->filesize;
        $unit = "";

        if( (!$unit && $size >= 1<<30) || $unit == "GB")
            $value = number_format($size/(1<<30),2)."GB";
        elseif( (!$unit && $size >= 1<<20) || $unit == "MB")
            $value = number_format($size/(1<<20),2)."MB";
        elseif( (!$unit && $size >= 1<<10) || $unit == "KB")
            $value = number_format($size/(1<<10),2)."KB";
        else
            $value = number_format($size)." bytes";

        return $value;
    }

    public function getLocallyAvailableAttribute()
    {
        return false;
    }

    public function getUrlAttribute()
    {
        return $this->originUrl;
    }
}
