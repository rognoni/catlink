<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Link;

class LinkController extends Controller
{
    public function links(Request $request) {
        $category = $request->input('c', '/');
        $search = $request->input('s');

        $query = Link::query();
        $query->where('category', 'like', $category.'%');

        if (!empty($search)) {
            $query->whereRaw("MATCH(html) AGAINST(? IN BOOLEAN MODE)" , [$search]);
        }

        $links = $query->orderBy('id', 'DESC')->get();

        return view('home', compact('category', 'search', 'links'));
    }

    public function detail($id) {
        $link = Link::findOrFail($id);

        return view('link.detail', compact('link'));
    }
}
