<?php

namespace App\Http\Controllers;

use App\Models\BookTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $BookTables = BookTable::paginate(10);
        return view('restaurant-backend.book-table.book-table-main', compact('BookTables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bookTable = BookTable::all();
        return view('restaurant-backend.book-table.book-table-create');
    }

    /**x
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tablename' => 'required',
            'tableprice' => 'required|numeric',
            'description' => 'nullable',
            'category' => 'required',
        ]);
        BookTable::create($request->all());
        notify()->success('Book created successfully');
        return redirect()->route('booktable.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookTable $bookTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookTable $bookTables)
    {
        return view('booktable.edit', compact('bookTables'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bookTables = BookTable::find($id);
        // return $BookTables;

        // Consider adding validation here
        $request->validate([
            'tablename' => 'required',
            'tableprice' => 'required|numeric',
            'description' => 'nullable',
            'category' => 'required',
        ]);

        if ($bookTables->update($request->all())) {
            notify()->success('Book updated successfully.');
            // Redirect to success page or return JSON response (depending on your application)
            return redirect()->route('booktable.index');
        } else {
            notify()->error(' unsuccessfully book update.');
            // Redirect to error page or return error response (with details)
            return redirect()->back();
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookTable $bookTables, string $id)
    {
        $bookTables = BookTable::find($id);
        if (!is_null($bookTables)) {
            $bookTables->delete();
            notify()->success('Book deleted successfully.');
            return redirect()->route('booktable.index');
        }

        notify()->error(' delete failed');
        return redirect()->route('booktable.index');



        //
    }
}
