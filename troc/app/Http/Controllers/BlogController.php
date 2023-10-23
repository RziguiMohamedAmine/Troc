<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $selectedCategory = $request->query('category');
        $selectedSubcategory = $request->query('subcategory');

        
        $categories = Category::with('subcategories.blogs')->get();
        $subcategories = Subcategory::all();

        // Fetch blogs based on the selected category and subcategory
        if ($selectedSubcategory !== null) {
            $blogs = Blog::where('subcategory_id', $selectedSubcategory)->get();
        } elseif ($selectedCategory !== null) {
            // Fetch blogs based on the selected category
            $blogs = Blog::whereHas('subcategory', function ($query) use ($selectedCategory) {
                $query->where('category_id', $selectedCategory);
            })->get();
        } else {
            // No category or subcategory selected, show all blogs
            $blogs = Blog::all();
        }

        return view('backoffice.blogs.index', compact('categories', 'subcategories', 'blogs', 'selectedCategory', 'selectedSubcategory'));
    }
    public function indexFront(Request $request)
    {
        $selectedCategory = $request->query('category');
        $selectedSubcategory = $request->query('subcategory');

        
        $categories = Category::with('subcategories.blogs')->get();
        $subcategories = Subcategory::all();

        // Fetch blogs based on the selected category and subcategory
        if ($selectedSubcategory !== null) {
            $blogs = Blog::where('subcategory_id', $selectedSubcategory)->get();
        } elseif ($selectedCategory !== null) {
            // Fetch blogs based on the selected category
            $blogs = Blog::whereHas('subcategory', function ($query) use ($selectedCategory) {
                $query->where('category_id', $selectedCategory);
            })->get();
        } else {
            // No category or subcategory selected, show all blogs
            $blogs = Blog::all();
        }

        return view('frontoffice.blogs.index', compact('categories', 'subcategories', 'blogs', 'selectedCategory', 'selectedSubcategory'));
    }
   /*  public function index()
    {
        return view('backoffice.blogs',['blogs'=>Blog::all()]);
    } */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::with('subcategories')->get();
        return view('backoffice.blogs.create', compact('categories'));
    }
    public function createfront()
    {
        $categories = Category::with('subcategories')->get();
        return view('frontoffice.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
   /*  public function store(Request $request)
    {
        // Validez les données du formulaire, y compris le téléchargement de l'image
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Exemple : Taille maximale de l'image de 2 Mo
        ]);
    
        // Vérifiez si un fichier image a été téléchargé
        if ($request->hasFile('image')) {
            // Stockez l'image et récupérez son chemin
            $imagePath = $request->file('image')->store('public/images');
        }
    
        // Créez un nouvel article de blog avec les données valides
        $blog = new Blog;
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->author_id = auth()->user()->id; // L'ID de l'auteur actuellement authentifié
    
        // Assurez-vous que l'image a été téléchargée avant de l'associer à l'article
        if (isset($imagePath)) {
            $blog->image = $imagePath;
        }
    
        $blog->save();
    
        // Redirigez l'utilisateur vers la page de détail de l'article de blog, etc.
        return redirect()->route('frontoffice.blog.show', ['blog' => $blog->id]);
    } */
    public function storeBack(Request $request)
    {
        $request->validate([
            'blog-title' => 'required|string|max:255',
            'blog-content' => 'required|string',
            'blog-subcategory_id' => 'required|exists:subcategories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        


        // Create a new blog
        $blog = new Blog();
        $blog->title = $request->input('blog-title');
        $blog->content = $request->input('blog-content');
        $blog->subcategory_id = $request->input('blog-subcategory_id'); // Utilisez le nom correct du champ
        $blog->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $blog->image = $imageName;
        }

        $blog->save();
        return redirect()->route('blogs.index');

        //return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');

    }
    public function store(Request $request)
    {
        $request->validate([
            'blog-title' => 'required|string|max:255',
            'blog-content' => 'required|string',
            'blog-subcategory_id' => 'required|exists:subcategories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
        


        // Create a new blog
        $blog = new Blog();
        $blog->title = $request->input('blog-title');
        $blog->content = $request->input('blog-content');
        $blog->subcategory_id = $request->input('blog-subcategory_id'); // Utilisez le nom correct du champ
        $blog->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $blog->image = $imageName;
        }

        $blog->save();
        return redirect()->route('all.blogs');

        //return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');

    }
    /**
     * Display the specified resource.
     */
    public function show($blog)
    {
       $index = Blog::findOrFail($blog);
    
         return view('frontoffice.blogs.show',['blog' => $index]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($blog)
    {
        $blogs = Blog::all();

        return view('backoffice.blogs.edit',[
            'blog' => Blog::findOrFail($blog),
            'blogs'
        ]);
    }
    public function editfront($blog)
    {
        $blog = Blog::findOrFail($blog);
        $categories = Category::with('subcategories')->get();
        $subcategories = Subcategory::all();
    
        return view('frontoffice.blogs.edit', [
            'blog' => $blog,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function updateback(Request $request, $blog)
    {
       
            $request->validate([
                'blog-title'=>'required',
                'blog-content'=>'required',
            ]);
            $updated = Blog::findOrFail($blog);
            $updated->title = strip_tags($request->input('blog-title'));
            $updated->content = strip_tags($request->input('blog-content'));
    
            $updated->save();
            return redirect()->route('blogs.index',$blog);
    
   
    }
    public function update(Request $request, $blog)
    {
       
            $request->validate([
                'blog-title'=>'required|string|max:255',
                'blog-content'=>'required|string',
                'blog-subcategory_id'=> 'required|exists:subcategories,id',
            ]);
            $updated = Blog::findOrFail($blog);
            $updated->title = strip_tags($request->input('blog-title'));
            $updated->content = strip_tags($request->input('blog-content'));
            $updated->subcategory_id = $request->input('blog-subcategory_id');
    
            $updated->save();
            return redirect()->route('all.blogs',$blog);
    
   
    }

    /**
     * Remove the specified resource from storage.
     */
 
    public function destroyfront($blog)
    {
        $delete=Blog::findOrFail($blog);
        $delete->delete();
        return back();
    }




    public function allBlogs()
    {
// Fetch all blogs, without any user-specific filtering
$blogs = Blog::all();
return view('frontoffice.blogs.all_blogs', compact('blogs'));
 }

 
    public function userBlogs()
    {
     // Get the currently authenticated user
      $user = Auth::user();
    
     // Fetch the blogs added by the user
     $blogs = $user->blogs;
     return view('frontoffice.blogs.user_blogs', compact('blogs'));
    }
   

}
