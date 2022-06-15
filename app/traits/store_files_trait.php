<?php 
namespace App\Traits;
 
trait store_files_trait {
 
    public function upload_multible_files($request, $path)
    {
        $files_paths = [];
        if($request->hasFile('file_input')) 
        {
            $files       = $request->File($request->input('file_input'));
            foreach($files['file_input'] as $file)
            {
                $name       =  time().'_'.$file->getClientOriginalName();
                $extension  = $file->getClientOriginalExtension();
                $size       = $file->getSize();
                $mime       = $file->getmimeType();
                $file->move(public_path($path), $name);
                $files_paths[] = "$name";
            }
        }
        
		
        return $files_paths;
    }
 
}

?>