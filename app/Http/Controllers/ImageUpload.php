<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait ImageUpload
{
    public $maxSizeInKB = 500; // Max image size

    public function uploadImage($request, $fileName, $folder)
        {
            if ($request->hasFile($fileName)) {
                $uploadedFile = $request->file($fileName);

                // Boyut kontrolü
                $maxSizeInBytes = $this->maxSizeInKB * 1024; // KB cinsinden maksimum boyutu bayta çevirme
                $fileSize = $uploadedFile->getSize(); // Dosyanın boyutunu bayt cinsinden al

                if ($fileSize > $maxSizeInBytes) {
                    return 'imagesizeerror';
                }

                // Diğer işlemler devam eder
                $originalName = $uploadedFile->getClientOriginalName();
                $fileNameWithoutExtension = Str::slug(pathinfo($originalName, PATHINFO_FILENAME));
                $extension = $uploadedFile->getClientOriginalExtension();
                $allowedExtensions = ['jpg', 'png', 'jpeg', 'webp'];

                if (!in_array($extension, $allowedExtensions)) {
                    return 'imagetypeerror';
                }

                $timeBasedNumber = time() . '_' . random_int(1000, 9999);
                $newFileName = $timeBasedNumber . "_" . date("Y-m-d") . "." . $extension;
                $filePath = $folder . "/" . $newFileName;

                try {
                    Storage::disk('public')->put($filePath, \Illuminate\Support\Facades\File::get($uploadedFile));
                } catch (\Exception $e) {
                    return 'error';
                }

                return $filePath;
            } else {
                return '';
            }
        }
}
