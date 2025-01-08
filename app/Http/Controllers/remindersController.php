<?php

namespace App\Http\Controllers;

use App\Models\Reminders;
use App\Models\TemplateMessage;
use Illuminate\Http\Request;

class remindersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reminders = Reminders::all();
        return view('master.reminders.index',compact('reminders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $templates = TemplateMessage::where('user_id', auth()->id())->get();
        return view('master.reminders.create',compact('templates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Debugging data request untuk memastikan apa yang dikirim
        // dd($request->all());

        // Aturan validasi dasar
        $rules = [
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'counter' => 'required|integer',
        ];

        if ($request->has('use_template') && $request->use_template === 'on') {
            $rules['template_message_id'] = 'required|exists:template_message,id';
        } else {
            $rules['title'] = 'required|string|max:255';
            $rules['message'] = 'required|string';
        }

        $validated = $request->validate($rules);

        $reminder = new Reminders();
        $reminder->user_id = auth()->id();

        if ($request->has('use_template') && $request->use_template === 'on') {
            $reminder->template_message_id = $request->template_message_id;
            $reminder->title = null;
            $reminder->message = null;
        } else {
            $reminder->title = $request->title;
            $reminder->message = $request->message;
        }

        $reminder->start_date = $request->start_date;
        $reminder->end_date = $request->end_date;
        $reminder->counter = $request->counter;
        $reminder->status = 'pending';
        $reminder->save();

        return redirect()->route('reminders.index')->with('success', 'Reminder created successfully.');
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reminder = Reminders::find($id);
        $templates = TemplateMessage::where('user_id', auth()->id())->get(); 
        return view('master.reminders.edit', compact('reminder','templates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reminder = Reminders::findOrFail($id);

        $rules = [
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'counter' => 'required|integer',
        ];
        if ($request->has('use_template') && $request->use_template === 'on') {
            $rules['template_message_id'] = 'required|exists:template_message,id';
        } else {
            $rules['title'] = 'required|string|max:255';
            $rules['message'] = 'required|string';
        }

        $validated = $request->validate($rules);

        $reminder->user_id = auth()->id();

        if ($request->has('use_template') && $request->use_template === 'on') {
            $reminder->template_message_id = $request->template_message_id;
            $reminder->title = null;
            $reminder->message = null;
        } else {
            $reminder->title = $request->title;
            $reminder->message = $request->message;
        }

        $reminder->start_date = $request->start_date;
        $reminder->end_date = $request->end_date;
        $reminder->counter = $request->counter;
        $reminder->status = 'pending';

        // Simpan perubahan
        $reminder->save();

        // Redirect dengan pesan sukses
        return redirect()->route('reminders.index')->with('success', 'Reminder updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Reminders::find($id)->delete();
        return redirect()->route('reminders.index')->with('success', 'Reminder removed successfully.');
    }
}
