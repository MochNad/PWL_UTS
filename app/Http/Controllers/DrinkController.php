<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\Food;
use Illuminate\Http\Request;

class drinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drink = Drink::paginate(10);
        $countFood = Food::count();
        $countDrink = Drink::count();
        return view('drink.drink', ['drink' => $drink])
                ->with('drink', $drink)
                ->with('countFood', $countFood)
                ->with('countDrink', $countDrink);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countFood = Food::count();
        $countDrink = Drink::count();
        return view('drink.create_drink')
                ->with('url_form', url('/drink'))
                ->with('countFood', $countFood)
                ->with('countDrink', $countDrink);
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
        'nama' => 'required|string|max:50',
        'harga' => 'required|numeric',
    ]);

    $lastId = Drink::latest()->first() ? Drink::latest()->first()->id : 0;

    $kode = 'DRINK-' . ($lastId + 1);

    Drink::create([
        'kode' => $kode,
        'nama' => $request->input('nama'),
        'harga' => $request->input('harga'),
    ]);

    return redirect('drink')->with('success', 'Drink Berhasil Ditambahkan');
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
        $drink = Drink::find($id);
        $countFood = Food::count();
        $countDrink = Drink::count();
        return view('drink.create_drink')
                ->with('drink', $drink)
                ->with('url_form', url('/drink/'. $id))
                ->with('countFood', $countFood)
                ->with('countDrink', $countDrink);
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
        $request->validate([
            'nama' => 'required|string|max:50'.$id,
            'harga' => 'required|numeric',
        ]);

        Drink::where('id','=', $id)->update($request->except(['_token', '_method']));

        return redirect('drink')
                ->with('success', 'Drink Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        drink::where('id', '=', $id)->delete();

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $countFood = Food::count();
        $countDrink = Drink::count();

        $keyword = $request->input('keyword');
        $column = $request->input('column');

        $query = Drink::query();

        if ($column == 'Kode') {
            $query->where('kode', 'LIKE', "%$keyword%");
        } elseif ($column == 'Nama') {
            $query->where('nama', 'LIKE', "%$keyword%");
        } elseif ($column == 'Harga') {
            $query->where('harga', 'LIKE', "$keyword");
        }

        $results = $query->paginate(10);
    $results->appends(request()->query());

        return view('drink.search_drink', ['results' => $results])
            ->with('countFood', $countFood)
            ->with('countDrink', $countDrink);
    }

}
