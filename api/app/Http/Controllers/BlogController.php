<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPosts;

/**
 * @OA\Tag(
 *     name="Blog",
 *     description="API para gestionar las entradas del blog"
 * )
 */
class BlogController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/blog",
     *     summary="Obtener todas las entradas del blog",
     *     tags={"Blog"},
     *     @OA\Response(response="200", description="Lista de entradas del blog")
     * )
     */
    public function index()
    {
        $posts = BlogPosts::all();
        return response()->json($posts);
    }

    /**
     * @OA\Get(
     *     path="/api/blog/{id}",
     *     summary="Obtener una entrada del blog por ID",
     *     tags={"Blog"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la entrada del blog",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Entrada del blog encontrada"),
     *     @OA\Response(response="404", description="Entrada del blog no encontrada")
     * )
     */
    public function show($id)
    {
        $post = BlogPosts::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json($post);
    }

    /**
     * @OA\Post(
     *     path="/api/blog",
     *     summary="Crear una nueva entrada del blog",
     *     tags={"Blog"},
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="content", type="string")
     *         )
     *     ),
     *     @OA\Response(response="201", description="Entrada del blog creada exitosamente")
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = BlogPosts::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return response()->json($post, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/blog/{id}",
     *     summary="Actualizar una entrada del blog por ID",
     *     tags={"Blog"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la entrada del blog",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="content", type="string")
     *         )
     *     ),
     *     @OA\Response(response="200", description="Entrada del blog actualizada exitosamente"),
     *     @OA\Response(response="404", description="Entrada del blog no encontrada")
     * )
     */
    public function update(Request $request, $id)
    {
        $post = BlogPosts::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return response()->json($post);
    }

    /**
     * @OA\Delete(
     *     path="/api/blog/{id}",
     *     summary="Eliminar una entrada del blog por ID",
     *     tags={"Blog"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la entrada del blog",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Entrada del blog eliminada exitosamente"),
     *     @OA\Response(response="404", description="Entrada del blog no encontrada")
     * )
     */
    public function destroy($id)
    {
        $post = BlogPosts::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted']);
    }
}
