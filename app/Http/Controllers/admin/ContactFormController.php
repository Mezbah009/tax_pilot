<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use App\Exports\ContactFormExport;
use Maatwebsite\Excel\Facades\Excel;

class ContactFormController extends Controller
{
    public function index()
    {
        // Fetch all contact messages, optionally paginate
        $messages = ContactForm::orderBy('created_at', 'desc')->paginate(10);

        // Return to a Blade view, passing the messages
        return view('admin.contact.index', compact('messages'));
    }

    public function destroy($id)
    {
        $message = ContactForm::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.contact.index')
            ->with('success', 'Message deleted successfully.');
    }


    public function export()
    {
        return Excel::download(new ContactFormExport, 'contact_forms.xlsx');
    }
}
