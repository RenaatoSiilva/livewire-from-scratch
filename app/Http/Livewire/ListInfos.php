<?php

namespace App\Http\Livewire;

use App\Models\Info;
use Livewire\Component;

class ListInfos extends Component
{
    public $name;
    public $surname;
    public $editMode = false;
    public $ids;

    public function render()
    {

        $infos = Info::all();

        return view('livewire.list-infos', compact('infos'));
    }

    protected function rules(){
        return [ 
            'name'      =>      'required',
            'surname'   =>      'required',
        ];
    }


    public function edit($id){

        $this->editMode = true;

        $info = Info::where('id', $id)->first();

        $this->ids = $id;
        $this->name = $info->name;
        $this->surname = $info->surname;

    }

    public function show($id){

        $info = Info::where('id', $id)->first();

        session()->flash('message', 'This If The Info Of ' . $info->name . ' ' . $info->surname);

    }

    public function store(){

        $this->validate();

        Info::create([
            'name'      => $this->name,
            'surname'   => $this->surname,
        ]);

        $this->clear();
        
        session()->flash('message','Info Created Successful');

    }


    public function update(){

        $this->validate();

        Info::where('id', $this->ids)->update([
            'name' => $this->name,
            'surname' => $this->surname
        ]);

        $this->clear();

        session()->flash('message','Info Updated Successful');

    }

    public function delete($id){

        Info::where('id',$id)->delete();

        session()->flash('message','Info Deleted Successful');

    }


    public function clear(){
        $this->name = null;
        $this->surname = null;
    }


}
