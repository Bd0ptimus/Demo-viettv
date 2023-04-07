<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Str;
use Carbon\Carbon;
use DateTime;

//model
use App\Models\User;
use App\Models\ForgotPassword;
use App\Models\InvoiceAttachment;

//service
use App\Services\UtilService;

use Exception;
class AttachmentService
{

    protected $utilService;
    public function __construct(UtilService $utilService){
        $this->utilService = $utilService;
    }

    public function saveNewBackground($request){
        // dd($request->hasFile('imgPicker'));
        $name = $this->utilService->generateName() . '.jpg' ;
        $request->imgPicker->move(storage_path('/app/public/background'), $name);
        return '/storage/background/'.$name;
    }


    public function addNewInvoiceAttachment($userId,$request){
        $data['desPhoto'] = [];
        if (isset($request->desPhotoUpload)) {
            // dd($request);
            foreach ($request->desPhotoUpload as $desPhoto) {
                $desPhotoName = $this->utilService->generateName() . '.jpg';
                $desPhoto->move(storage_path('app/public/invoice_attachments'), $desPhotoName);
                array_push($data['desPhoto'], asset('storage/invoice_attachments/' . $desPhotoName));
                InvoiceAttachment::create([
                    'url' => asset('storage/invoice_attachments/' . $desPhotoName),
                    'user_id' => $userId,
                ]);
            }
        }
        return $data['desPhoto'];
    }


    public function removeInvoiceAttachmentByUserId($userId){
        $attachments = InvoiceAttachment::where('user_id', $userId)->get();
        foreach ($attachments as $attachment) {
            $this->utilService->removeAttachmentInStorageByUrl('invoice_attachments', $attachment->url);
        }
        $attachments->each(function ($attachment) {
            $attachment->delete();
        });
        // $attachments->delete();
    }


}
