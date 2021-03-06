<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Dialog;
use App\Http\Requests\DialogRequest;
use App\Http\Controllers\Controller;

class DialogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dialogs = Dialog::all();
        return View('dialog.index')
                    ->with('title',"All Dialogues")
                    ->with('dialogs', $dialogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('dialog.create')
                ->with('title',"Add Dialogue");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DialogRequest $request)
    {
        $data = $request->all();
        $dialog = new Dialog();
        $dialog->dialog = $data['dialog'];
        $dialog->speaker = $data['speaker'];
        $dialog->user_id = \Auth::user()->id;
        $dialog->save();
        return redirect()->route('dialog.index')->with('success','Dialog Successfully Added');
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
        $dialog = Dialogue::findOrFail($id);
        return View('dialog.edit')
                ->with('title',"Edit Dialogue")
                ->with('dialog', $dialog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DialogRequest $request, $id)
    {
        $data = $request->all();
        $dialog = Dialog::find($id);
        $dialog->dialog = $data['dialog'];
        $dialog->speaker = $data['speaker'];
        $dialog->user_id = \Auth::user()->id;
        $dialog->save();
        return redirect()->route('dialog.index')->with('success','Dialog Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Dialog::destroy($id);
            return redirect()->route('dialog.index')->with('success','Dialog Deleted Successfully');
        } catch(Exception $ex) {
            return redirect()->route('dialog.index')->with('error','Something went wrong.Please, try again');
        }
    }
}
