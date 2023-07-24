<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Link;

class LinkController extends Controller
{
    public function links(Request $request) {
        $category = $request->input('c', '/');
        $search = $request->input('s');

        if (empty($category)) {
            $category = '/';
        }

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
        $link->views += 1;
        $link->save();

        return view('link.detail', compact('link'));
    }
    
    public function categories(Request $request) {
        $search = $request->input('search');

        $query = Link::query();
        $query->select('category')->distinct()->get();

        if (!empty($search)) {
            $query->where('category', 'like', '%'.$search.'%');
        }

        $links = $query->orderBy('category', 'ASC')->get();

        return view('link.categories', compact('search', 'links'));
    }

    public function search(Request $request) {
        $category = $request->input('c', '/');
        $search = $request->input('s');

        return view('link.search', compact('category', 'search'));
    }

    public function html($id) {
        $link = Link::findOrFail($id);

        return view('link.html', compact('link'));
    }
}
