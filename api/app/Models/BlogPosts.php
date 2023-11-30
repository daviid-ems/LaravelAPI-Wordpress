<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="BlogPosts",
 *     description="Modelo de entradas de blog",
 *     @OA\Xml(
 *         name="BlogPosts"
 *     )
 * )
 */
class BlogPosts extends Model
{
    use HasFactory;

    /**
     * @OA\Property(
     *     property="id",
     *     type="integer",
     *     format="int64",
     *     description="ID de la entrada del blog"
     * )
     */
    public $id;

    /**
     * @OA\Property(
     *     property="title",
     *     type="string",
     *     description="Título de la entrada del blog"
     * )
     */
    public $title;

    /**
     * @OA\Property(
     *     property="content",
     *     type="string",
     *     description="Contenido de la entrada del blog"
     * )
     */
    public $content;

    /**
     * @OA\Property(
     *     property="created_at",
     *     type="string",
     *     format="date-time",
     *     description="Fecha de creación de la entrada del blog"
     * )
     */
    public $created_at;

    /**
     * @OA\Property(
     *     property="updated_at",
     *     type="string",
     *     format="date-time",
     *     description="Fecha de actualización de la entrada del blog"
     * )
     */
    public $updated_at;

    // Otras propiedades si las tienes

    protected $fillable = ['title', 'content'];
}
