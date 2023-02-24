<?php

namespace App\Services;

use App\Models\Teg;
use Illuminate\Http\Request;

class TegService
{
    public function show()
    {
        $tags = Teg::all();

        return ['tags' => $tags];
    }

    public function create($name)
    {
        $teg = new Teg();
        $teg->name = $name;
        $teg->save();
        session()->flash('successMessage', "Successfully create");
    }

    public function updateShow(Teg $teg)
    {

        return ['teg' => $teg];
    }

    public function update(Teg $teg, Request $request)
    {
        $teg->name = $request->name;
        $teg->save();
        session()->flash('successMessage', "Successfully update id: $teg->id");
    }

    public function delete(Teg $teg)
    {
        $errors = 'Тег пов`язана з постами: ';
        $isError = false;
        foreach ($teg->post()->get() as $el) {
            $isError = true;
            $errors .= "{$el->id}, ";
        }
        if ($isError) {
            Session()->flash('errorMessage', $errors);
        } else {
            $teg->delete();
            session()->flash('successMessage', "Successfully delete");
        }
    }
}
