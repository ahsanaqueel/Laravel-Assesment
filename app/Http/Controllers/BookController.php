<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    
    public function getBooks(){
       return Book::all();
    }

    public function search($name)
    {
        
        return Book::where('name','like','%'.$name.'%')->get();
    }

    public function create()
    {
        return view('book.addBook');
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
           'name'=>'required',
           'author'=>'required',
           'coverImg'=>'required|image|max:3072'
       ]);

       $image = $request->coverImg->getClientOriginalName();                                                                                                                                                                                                                  
       Book::create([
           'name' => $request->name,
           'author'=> $request->author,
           'coverImg'=>$image
           
       ]);
       $imgPath = 'assets/images';
       $request->coverImg->move(public_path($imgPath), $image);
      
       return redirect()->route('books')->with('success','Book Added');
   }

/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $book = Book::find($id);

        return view('book.editBook')->with('book',$book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $image = '';
        $request->validate([
            'name'=>'required',
            'author'=>'required',
            'coverImg'=>'required|image|max:3072'

        ]);
        if($request->coverImg){
            $image = $request->coverImg->getClientOriginalName();
        }
        $book = Book::find($request->id);
            $book->name = $request->name;
            $book->author= $request->author ;
            if($request->coverImg){
            $book->coverImg= $image;
            $imgPath = 'assets/images/';
            $request->coverImg->move(public_path($imgPath), $image);
        }
        $book->save();
        
        return redirect()->route('books')->with('success','Book Edited');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $book = Book::find($request->id);
        if (file_exists('assets/images/' .$book->coverImg)) {
            unlink(public_path('assets/images/') . $book->coverImg);
        }
        $book->delete();
        return redirect()->route('books')->with('success','Book Deleted');
    }

}
