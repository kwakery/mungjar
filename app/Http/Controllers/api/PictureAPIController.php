<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PictureAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fullPath = './images/portfolio/';

        $files = array();
        $directories = getFolderContents($fullPath);

        foreach ($directories as $directory) {
          $contents = getFolderContents($fullPath.$directory);
          $files[$directory] = $contents;
        }

        return $files;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if (!$request->file('file')->isValid())
        return ['response' => "File upload failed. Try again.", 'success' => false];

      $category = $request->input('type');
      $ext = $request->file('file')->extension();
      $count = count(glob('./images/portfolio/'.$request->input('type').'/*'));
      $filename = ($count+1).'.'.$ext;

      $request->file->storeAs($category, $filename, 'portfolio'); // TODO: Storing in storage may be better

      return $this->show($category.':'.$filename);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($data)
    {
        $splitPos = strpos($data, ':');
        $folder = substr($data, 0, $splitPos);
        $filename = substr($data, $splitPos+1);

        return [
          "success" => true,
          "filename" => $filename,
          "folder" => $folder,
          "fullPath" => config('app.url').'images/portfolio/'.$folder.'/'.$filename
        ];

        // return response()->file('./images/portfolio/'.$folder.'/'.$filename);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $data)
    {
      $splitPos = strpos($data, ':');
      $folder = substr($data, 0, $splitPos);
      $filename = substr($data, $splitPos+1);
      $oldPath = './images/portfolio/'.$folder.'/';

      if ($request->input('filename')) {
        rename($oldPath.$filename, $oldPath.$request->input('filename'));
        $filename = $request->input('filename');
      }

      if ($request->input('folder')) {
        $folder = $request->input('folder');
        $newPath = './images/portfolio/'.$folder.'/';
        rename($oldPath.$filename, $newPath.$filename);
      }

      return $this->show($folder.':'.$filename);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($data)
    {
      $splitPos = strpos($data, ':');
      $folder = substr($data, 0, $splitPos);
      $filename = substr($data, $splitPos+1);
      $file = './images/portfolio/'.$folder.'/'.$filename;

      if (!file_exists($file))
        return ['success' => false, 'response' => 'File does not exist.'];

      $success = unlink($file);
      return ['success' => $success];
    }
}
