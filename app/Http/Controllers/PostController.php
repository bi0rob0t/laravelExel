<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=DB::table('excel_files')->paginate(5);
        return view('index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $posts = DB::table('excel_files')->where('namerow', 'like', '%'.$search.'%')->paginate(5);
        return view('index', ['posts' => $posts]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = $request->get('date');
        $course = $request->get('course');
        $group = $request->get('group');
        $name = $request->get('name');
        $lectures = $request->get('lectures');
        $posts = DB::insert('INSERT INTO excel_files(daterow, courserow, grouprow, namerow, lectures) VALUES (?,?,?,?,?);', [$date, $course, $group, $name, $lectures]);
        if($posts){
            $red = redirect('posts')->with('success','Data has been added');
        } else{
            $red = redirect('posts/create')->with('danger','Input data failed, please try again');
        }
        return $red;
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
        $posts = DB::select('select * from excel_files where id=?',[$id]);
        return view('edit', ['posts' => $posts]);
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
        $date = $request->get('date');
        $course = $request->get('course');
        $group = $request->get('group');
        $name = $request->get('name');
        $lectures = $request->get('lectures');
        $posts = DB::update('update excel_files set daterow=?, courserow=?, grouprow=?,namerow=?,lectures=? where id=?',[$date, $course, $group, $name, $lectures,$id]);
        if($posts){
            $red = redirect('posts')->with('success','Data has been updated');
        } else{
            $red = redirect('posts/edit/'.$id)->with('danger','Error update please try again');
        }   
        return $red;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= DB::delete('delete from excel_files where id=?',[$id]);
        $red= redirect('posts');
        return $red;
    }
}
