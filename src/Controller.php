<?php


namespace Walthere\CKEditor;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{

    public function upload(Request $request)
    {

        $config = config('CK');
        $data = [];
        try {
            $file = $request->file("upload");
            $folder = $config['img_foler'];
            if ($config['date_folder']) {
                $folder = $folder."/".date("Ymd", time());
                if (!file_exists(public_path('uploads/' . $folder))) {
                    mkdir(public_path('uploads/' . $folder));
                }
            }
            $path = $file->store('/' . $folder, 'md');
            $data['uploaded'] = 1;
            $data['fileName'] = 'image';
            $data['url'] = "/uploads/" . $path;
        } catch (\Exception $e) {
            $data['uploaded'] = 0;

            $data['error']['message'] = $e->getMessage();
        }

        return $data;
    }



}