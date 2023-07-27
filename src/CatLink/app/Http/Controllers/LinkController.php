<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        if (Str::startsWith($category, '/')) {
            $query->where('category', 'like', $category.'%'); // absolute path
        } else {
            $query->where('category', 'like', '%'.$category.'%'); // relative path
        }

        if (!empty($search)) {
            $query->whereRaw("MATCH(html) AGAINST(? IN BOOLEAN MODE)" , [$search]);
        }

        $query->where('state', 'active');

        $links = $query->orderBy('id', 'DESC')->paginate(10);

        return view('home', compact('category', 'search', 'links'));
    }

    public function detail($id) {
        $link = Link::where('id', $id)->where('state', 'active')->firstOrFail();
        $link->views += 1;
        $link->save();

        return view('link.detail', compact('link'));
    }
    
    public function categories(Request $request) {
        $search = $request->input('search');

        $query = Link::query();
        $query->where('state', 'active');
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
        $link = Link::where('id', $id)->where('state', 'active')->firstOrFail();

        return view('link.html', compact('link'));
    }

    public function add(Request $request) {
        return view('link.add');
    }

    public function addSubmit(Request $request) {
        $request->validate([
            'url' => 'required|max:2000',
            'category' => 'required|max:100',
        ]);

        $url = $request->input('url');
        $category = $request->input('category'); // TODO normalize category
        $user_id = auth()->user()->id;
        Link::create(['url' => $url, 'category' => $category, 'user_id' => $user_id]);

        return redirect()->route('user');
    }

    public function user(Request $request) {
        $links = Link::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();

        return view('user', compact('links'));
    }
}
