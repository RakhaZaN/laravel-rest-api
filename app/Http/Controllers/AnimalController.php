<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    private $animals;

    public function __construct()
    {
        $this->animals = ['Ayam', 'ikan', 'kerbau'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Menampilkan data animal";
        foreach ($this->animals as $index => $animal) {
            echo "<br>|{$index} - {$animal}|";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->new;
        echo "Menambahkan data baru: {$request->new}<br>";
        array_push($this->animals, $request->new);
        $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "Menampilkan data index ke-{$id}: {$this->animals[$id]}";
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
        echo "Mengubah data index ke-{$id}: {$this->animals[$id]} => {$request->animal}<br>";
        $this->animals[$id] = $request->animal;
        $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        array_splice($this->animals, $id);
        $this->index();
    }
}
