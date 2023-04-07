<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use Carbon\Carbon;
use DateTime;

//model
use App\Models\User;
use App\Models\ForgotPassword;
//repo

use Exception;
class UtilService
{
    public function generateName()
    {
        $now = DateTime::createFromFormat('U.u', number_format(microtime(true), 6, '.', ''), new \DateTimeZone('UTC'));
        $string = (int)$now->format("Uu");
        return $string;
    }

    public function removeAttachmentInStorageByUrl($folderName, $url){
        $filename = basename($url);
        Storage::delete('public/'.$folderName.'/' . $filename);
    }


}
