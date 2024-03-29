<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use File;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Upload an image
     *
     * @param Request $request
     * @param string $inputName
     * @param string $path
     * @return string
     */
    public function uploadImage(Request $request, $inputName, $path)
    {
        if ($request->hasFile($inputName)) {

            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = $path . '__' . time() . '_'  . uniqid() . '.' . $ext;

            $image->move(public_path($path), $imageName);

            return $path . '/' . $imageName;
        }
    }

    /**
     * Update an image
     *
     * @param Request $request
     * @param string $inputName
     * @param string $path
     * @param string|null $oldPath
     * @return string
     */
    public function updateImage(Request $request, string $inputName, string $path, ?string $oldPath = null): string
    {
        if ($request->hasFile($inputName)) {
            if (File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();

            $imageName = $path . '__' . time() . '_'  . uniqid() . '.' . $ext;

            $image->move(public_path($path), $imageName);

            return $path . '/' . $imageName;
        }
    }
    /**
     * Deletes an image from the server
     *
     * @param string $path the path to the image on the server
     */
    public function deleteImage(string $path)
    {
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
