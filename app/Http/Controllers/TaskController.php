<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\User;
use mikehaertl\pdftk\Pdf;

class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->roles->pluck('name');

//        dd($role);

        if($role[0] == 'admin'){
            $tasks = Task::with('users')->get();
//            dd($tasks->toArray());
            return view('admin.tasks.index', compact('tasks'));
        }
        else{
            $tasks = Task::where('user_id', Auth::user()->id)->get();
            return view('admin.tasks.index', compact('tasks'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.tasks.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'user_id' => 'required',
            'file' => 'required|mimes:pdf',
        ]);

        $user = User::where('id', $request->user_id)->first();

        $fileName = time().'.'.$request->file->extension();

        $request->file->move(public_path('uploads'), $fileName);

        $zip = new \ZipArchive();

        $zipname = 'uploads/'.md5(time()).'.zip';
        $path = public_path($zipname);

        if (file_exists($path)) {
            unlink($path);
        }

        $zipStatus = $zip->open($path, \ZipArchive::CREATE);
        if ($zipStatus !== true) {
            throw new \RuntimeException(sprintf('Failed to create zip archive. (Status code: %s)', $zipStatus));
        }

        $password = $user->mobile_no;
        if (!$zip->setPassword($password)) {
            throw new \RuntimeException('Set password failed');
        }

        $baseName = basename('uploads/'.$fileName);
        if (!$zip->addFile(public_path('uploads/').$fileName, $baseName))
        {
            throw new \RuntimeException(sprintf('Add file failed: %s', $fileName));
        }

        if (!$zip->setEncryptionName($baseName, \ZipArchive::EM_AES_256)) {
            throw new \RuntimeException(sprintf('Set encryption failed: %s', $baseName));
        }

        $zip->close();

        if (file_exists('uploads/'.$fileName)) {
            unlink('uploads/'.$fileName);
        }
//        $password_pdf = new Pdf();
//        $password_pdf->addFile('uploads/'.$fileName)->allow(0)->setPassword(123);

        $tasks = new Task();
        $tasks->description = $request->description;
        $tasks->user_id = $request->user_id;
        $tasks->file_name = $zipname;
        $tasks->save();


        return back()
            ->with('success','You have successfully upload file.')
            ->with('file',$fileName);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
