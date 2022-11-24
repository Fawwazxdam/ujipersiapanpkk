<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
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
        //MEGHITUNG BMI
        $data1 = new konsul($request->tahun, $request->bb, $request->tb);
        $data = [
            'nama' => $request-> nama,
            'bmi' => $data1->bmi(),
            'status' => $data1->statu(),
            'umur' => $data1->hitungumur(),
            'hobi' => $request-> hobi3,
            'konsultasi' => $data1->consult()
        ];
        return view('dashboard',compact('data'));
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

class hitung {
    public function __construct($tahun, $bb, $tb)
    {
        $this->tahun = $tahun;
        $this->bb = $bb;
        $this->tb = $tb/100;
    }
    public function hitungumur()
    {
        return 2022 - $this->tahun;
    }
    public function bmi()
    {
        return $this->bb / ($this->tb * $this->tb);
    }
        public function statu()
    {
        if ($this->bmi() < 18.5) {
            return 'Kurus';
        } else if ($this->bmi() <= 22.9) {
            return 'Normal';
        } else if ($this->bmi() <= 29.9) {
            return 'Gendut';
        } else if ($this->bmi() > 30) {
            return 'Obesitas';
        } else {
            return 'Masukkan data dengan benar !!';
        }
        
    }
}

class konsul extends hitung {

    public function statu()
    {
        if ($this->bmi() < 18.5) {
            return 'Kurus';
        } else if ($this->bmi() <= 22.9) {
            return 'Normal';
        } else if ($this->bmi() <= 29.9) {
            return 'Gendut';
        } else if ($this->bmi() > 30) {
            return 'Obesitas';
        } else {
            return 'Masukkan data dengan benar !!';
        }
        
    }
    public function dewasa()
    {
        if ($this->hitungumur() >=17) {
            return 'Dewasa';
        } else {
            return 'Bocil Dek..';
        }
        
    }
    public function consult()
    {
        if ($this->dewasa() == "Dewasa" && $this->statu() == "Obesitas") {
            return 'Anda Mendapatkan Konsul Gratis';
        } else {
            return 'Anda Tidak Mendapatkan Konsul Gratis';
        }
        
    }
}
