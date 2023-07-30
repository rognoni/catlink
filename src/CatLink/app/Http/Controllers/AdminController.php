<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Link;
use App\Models\User;

class AdminController extends Controller
{
    public function home(Request $request) {
        $links = Link::with('user')->where('state', 'to process')->orderBy('id', 'ASC')->get();

        return view('admin.home', compact('links'));
    }

    public function editor() {
        $filename = '.env';
        $filetext = file_get_contents(base_path() . DIRECTORY_SEPARATOR . $filename);

        return view('admin.editor', compact('filename', 'filetext'));
    }

    public function editorSubmit(Request $request) {
        $filename = $request->input('filename');
        $filepath = base_path() . DIRECTORY_SEPARATOR . $filename;
        $message = null;
        $filetext = null;
        
        if ($request->input('execute') == 'open') {
            if (file_exists($filepath)) {
                $filetext = file_get_contents($filepath);
                $message = 'File opened successfully!';    
            }
        } else {
            // save
            $filetext = $request->input('filetext');
            file_put_contents($filepath, $filetext);
            $message = 'File saved successfully!';
        }

        return view('admin.editor', compact('message', 'filename', 'filetext'));
    }

    public function linkUpdate($id) {
        $link = Link::where('id', $id)->firstOrFail();

        return view('admin.link_update', compact('link'));
    }

    public function linkUpdateSubmit($id, Request $request) {
        $message = '';
        $link = Link::where('id', $id)->firstOrFail();

        if ($request->input('execute') == 'update') {
            $link->update($request->all());
            $message = 'Link updated successfully!';

        } else if ($request->input('execute') == 'get_html') {
            $link->url = $request->input('url');
            $link->category = $request->input('category');
            $link->html = file_get_contents($link->url);

        } else if ($request->input('execute') == 'get_meta') {
            $link->url = $request->input('url');
            $link->category = $request->input('category');
            $link->html = $request->input('html');

            preg_match_all('~<\s*meta\s+property="(og:[^"]+)"\s+content="([^"]*)~i', $link->html, $matches);

            if ($matches !== false) {
                $link->title       = $this->getMetaKey('og:title', $matches);
                $link->description = $this->getMetaKey('og:description', $matches);
                $link->og_image    = $this->getMetaKey('og:image', $matches);
            }
        }

        return view('admin.link_update', compact('link', 'message'));
    }

    private function getMetaKey($key, $matches)  {
        $index = array_search($key, $matches[1]);
        if ($index !== false) {
            return $matches[2][$index];
        }
        return '';
    }

    public function registerLink(Request $request) {
        return view('admin.register_link');
    }

    public function registerLinkSubmit(Request $request) {
        $message = 'Register link generated!';

        $uuid = (string) Str::uuid();
        User::create(['token' => $uuid, 'state' => 'register']);
        
        $register_link = route('register', ['token' => $uuid]);

        return view('admin.register_link', compact('message', 'register_link'));
    }
}
