<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::latest()->paginate(5);
        return view('user.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $custom_message = [
            'image.required' => 'Foto harus di isi.',
            'title.required' => 'Title harus di isi.',
            'content.required' => 'Content harus di isi.',
            'penulis.required' => 'Penulis harus di isi.',
            'tanggal.required' => 'Tanggal harus di isi.',
            'image.mimes' => 'Foto harus berupa format dalam jpeg,jpg,png'
            
        ];
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'penulis'     => 'required',
            'tanggal' => 'required',
            'content'   => 'required'
        ], $custom_message);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/blogs', $image->hashName());

        $blog = Blog::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'penulis'     => $request->penulis,
            'content'   => $request->content,
            'tanggal' => $request->tanggal
        ]);

        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('blog.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
        return view('user.blog.edit', compact('blog'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
        $custom_message = [
            'title.required' => 'Title harus di isi.',
            'content.required' => 'Content harus di isi.',
            'penulis.required' => 'Penulis harus di isi.',
            'tanggal.required' => 'Tanggal harus di isi.',
        ];
        $this->validate($request, [
            'title'     => 'required',
            'penulis' => 'required',
            'tanggal' => 'required',
            'content'   => 'required'
        ], $custom_message);

        //get data Blog by ID
        $blog = Blog::findOrFail($blog->id);

        if($request->file('image') == "") {

            $blog->update([
                'title'     => $request->title,
                'content'   => $request->content,
                'tanggal' => $request->tanggal,
                'penulis' => $request->penulis,
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/blogs/'.$blog->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/blogs', $image->hashName());

            $blog->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);
            
        }

        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('blog.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function updateprofil(Request $request, User $user)
    {
        //
        $custom_message = [
            'name.required' => 'Title harus di isi.',
            // 'content.required' => 'Content harus di isi.',
            
        ];
        $this->validate($request, [
            'name'     => 'required',
            // 'content'   => 'required'
        ], $custom_message);

        //get data User by ID
        $user = User::findOrFail($user->id);
        $user->update([
            'name'     => $request->name,
            // 'content'   => $request->content
        ]);


        if($user){
            //redirect dengan pesan sukses
            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('user.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }


    public function destroy($id)
    {
        //
        $blog = Blog::findOrFail($id);
        $blog->delete();

        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('blog.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
