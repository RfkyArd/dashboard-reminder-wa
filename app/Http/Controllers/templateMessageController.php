<?php

namespace App\Http\Controllers;

use App\Models\TemplateMessage;
use Illuminate\Http\Request;

class TemplateMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $templateMessages = TemplateMessage::where('user_id', auth()->id())->get();
        
        return view('master.templateMessage.index', compact('templateMessages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.templateMessage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        TemplateMessage::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('template.index')->with('success', 'Template message created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $templateMessage = TemplateMessage::findOrFail($id);
        
        return view('template.show', compact('templateMessage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $templateMessage = TemplateMessage::findOrFail($id);
        
        return view('master.templateMessage.edit', compact('templateMessage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $templateMessage = TemplateMessage::findOrFail($id);

        $templateMessage->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return redirect()->route('template.index')->with('success', 'Template message updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $templateMessage = TemplateMessage::findOrFail($id);

        $templateMessage->delete();
        return redirect()->route('template.index')->with('success', 'Template message deleted successfully.');
    }
}