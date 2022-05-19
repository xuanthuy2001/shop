<?php


namespace App\Http\Services;


class UploadService
{
      public function store($request)
      {

            if ($request->hasFile('file')) {
                  try {
                        $extension = $request->file('file')->extension();
                        $image_name =  time() . '.' . $extension;
                        $path_full = 'uploads/' . date("Y/m/d");
                        $request->file('file')->storeAs(
                              'public/' . $path_full,
                              $image_name
                        );
                        return '/storage/' . $path_full . '/' . $image_name;
                  } catch (\Exception $th) {
                        return false;
                  }
            }
      }
}