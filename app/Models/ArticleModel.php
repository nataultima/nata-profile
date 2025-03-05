<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'title',
        'slug',
        'image',
        'content',
        'published_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getArticleBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }
}
