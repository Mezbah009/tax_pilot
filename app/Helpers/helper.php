<?php

use App\Models\Contact;
use App\Models\Number;
use App\Models\Category;
use App\Models\SiteSetting;

function footer()
{
    return [
        'contacts' => Contact::all(),
        'numbers' => Number::all(),
    ];
}

function headerData()
{
    return [
        'categories' => Category::orderBy('id', 'asc')->get(),
    ];
}

// ✅ Move this outside of headerData
function siteSetting()
{
    return SiteSetting::latest()->first();
}


function numbers()
{
    return \App\Models\Number::latest()->take(5)->get(); // adjust limit as needed
}
