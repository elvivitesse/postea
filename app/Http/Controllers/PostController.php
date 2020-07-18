<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
//se usa el Hash para luego poder sifrar la contraseña al actualizar
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    
	public function	__construct()
	{
	$this->middleware('auth')->except(['index', 'show']);
	}

	public function index()
	{
        //$publicaciones = Post::all();
    //$publicaciones = Post::all()->paginate(10);
    $publicaciones = Post::paginate(10);
	return view('posts.index', compact('publicaciones'));
	}

	public function create()
	{
	return view('posts.create');
    }
 	public function show($id)	
	{	
	return view('posts.postUnico', ['post'	=> Post::find($id)]);
	}	
		
	public function store(Request $request)	
	{	
	$request->validate([	
	'title' => 'required:max:120',	
	'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
	'content' => 'required:max:2200',	
    ]);	
    
    $imageName = $request->file('image')->store('posts/' . Auth::id(), 'public');
    $title = $request->get('title');
    $content = $request->get('content');
    $post = $request->user()->posts()->create([
    'title' => $title,
    'image' => $imageName,
    'content' => $content,
    ]);
	/*	
	$image = $request->file('image');	
	$imageName = time().$image->getClientOriginalName();
	$title = $request->get('title');	
	$content = $request->get('content');	
		
	$post = $request->user()->posts()->create([
	'title' => $title,	
	'image' => 'img/' . $imageName,	
	'content' => $content,	
	]);	
		
	$request->image->move(public_path('img'), $imageName); */
		
	return redirect()->route('post', ['id'	=> $post->id]);
	}	
		
	public function userPosts()	
	{	
    $user_id = Auth::id();	
	$publicaciones = Post::where('user_id',	'=', $user_id)->get();
	return view('posts.index', compact('publicaciones'));
    }	
    public function dropPost($id)	
	{	
        $note = Post::find($id);
        $note->delete();

	return redirect('posts/myPosts');
	}
    public function update(Request $request )	
	{	
        $request->validate([	
            'name' => ['required', 'string', 'max:255'],	
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],	
        ]);	

        $user_id = Auth::id();	
        
        $affected = DB::table('users')
              ->where('_id',	'=', $user_id)
              ->update(['name' => $request['name'], 'email'=>$request['email'], 
              'password'=> Hash::make($request['password'])]);

        return redirect('posts'); 
        
	}
    public function config($id)
    {
        return view('posts.config', ['user'	=> User::find($id)]);
    }
    public function dropUser($id)
    {
        $user_id = Auth::id();	
        $publicaciones = Post::where('user_id',	'=', $user_id)->delete();
        $note = User::find($id);
        $note->delete();
        
	    return redirect('posts');
    }

   /* public function index(){
        $publicaciones = Post::all();
        return view('index', compact('publicaciones'));
    }
    public function show($id){
        $resultado = Post::find($id);
        return view('postUnico',['post' => $resultado]);
    }
    public function create(Request $request){
    $request->validate([
        'title' => 'required:max:120',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'content' => 'required:max:2200',
    ]);
        $image = $request->file('image');
        $imageName = time().$image->getClientOriginalName(); 
        $title = $request->get('title');
        $content = $request->get('content');
        $post = new Post();
        $post->title = $title;
        $post->image = 'img/' . $imageName;
        $post->content = $content;
        $post->save();

        $request->image->move(public_path('img'), $imageName); 
        
        return redirect()->route('post', ['id' => $post->id]);
    }
    public function showd($id){
        $resultado = Post::find($id);
        return view('postUnico',['post' => $resultado]);
    }
    public function indexd(){
        $hora = time() - (24 * 60 * 60);/*=> todo esto igual a 86400 segundos == a 24 horas */
        /*hora actual  menos  (horas * minutos * segundos) */
    //    $publicaciones = Post::where('image', '>=' , 'img/'.$hora)-> get();
        /* todo este dato so sacamos de las imagenes que al momento de guardar su nombre 
        anteponemos la hora para poderlo comparar */
    //    return view('today', compact('publicaciones'));
       
  //  }
}
