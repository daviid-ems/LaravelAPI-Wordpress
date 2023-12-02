<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class PostController extends Controller
{
    protected string $url = 'http://wordpress.localhost/wp-json/wp/v2/posts';

    protected string $username = 'admin';
    protected string $password = 'Ryyu Gjss L9jB Ge69 SLos zRbL';
    protected array $auth;

    public function __construct()
    {
        $this->auth = [
            $this->username,
            $this->password,
        ];
    }

    public function index()
    {
        $params = array(
            'per_page' => 100,
        );
        $client = new Client();
        $response = $client->request('GET', $this->url, [
            RequestOptions::JSON => $params
        ]);
        $posts = json_decode($response->getBody()->getContents());
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.store');
    }

    public function store(Request $request)
    {
        $params = array(
            'title' => $request['titulo'],
            'content' => $request['contenido'],
            'status' => 'publish'
        );
        $client = new Client([
            'auth'  => $this->auth,
        ]);

        $response = $client->post($this->url, [
            RequestOptions::JSON => $params
        ]);
        if ($response->getStatusCode() == 201) {
            return redirect()->route('posts.index');
        }
    }

    public function show(string $id)
    {
        $client = new Client();
        $response = $client->get($this->url . '/' . $id);
        $post = json_decode($response->getBody());
        return view('posts.show', compact('post'));
    }

    public function edit(string $id)
    {
        $client = new Client();
        $response = $client->get($this->url . '/' . $id);
        $post = json_decode($response->getBody());
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, string $id)
    {
        $params = array(
            'title' => $request['title'],
            'content' => $request['content'],
            'status' => $request['status']
        );
        $client = new Client([
            'auth'  => $this->auth,
        ]);
        $response = $client->put($this->url . '/' . $id, [
            RequestOptions::JSON => $params
        ]);
        if ($response->getStatusCode() == 200) {
            return redirect()->route('posts.index');
        }
    }

    public function destroy(string $id)
    {
        $client = new Client([
            'auth'  =>  $this->auth,
        ]);

        $response = $client->delete($this->url . '/' . $id);
        if ($response->getStatusCode() == 200) {
            return redirect()->route('posts.index');
        }
    }
}
