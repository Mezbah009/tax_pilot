<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Exports\NewsletterExport;
use Maatwebsite\Excel\Facades\Excel;

class NewsletterController extends Controller
{
    public function index()
    {
        // Fetch all subscriptions, latest first, paginated
        $subscriptions = Newsletter::latest()->paginate(20);

        // Return to the admin view
        return view('admin.newsletter.index', compact('subscriptions'));
    }


    public function destroy($id)
    {
        $subscription = Newsletter::findOrFail($id);
        $subscription->delete();

        return redirect()->route('admin.newsletter.index')->with('success', 'Subscription deleted successfully.');
    }



    public function export()
    {
        return Excel::download(new NewsletterExport, 'newsletter_subscribers.xlsx');
    }
}
