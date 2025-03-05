<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleModel;
use CodeIgniter\HTTP\ResponseInterface;

class ArticleController extends BaseController
{
    protected $articleModel;

    public function __construct()
    {
        $this->articleModel = new ArticleModel();
    }

    public function index()
    {
        $data = [
            'articles' => $this->articleModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('backend/articles/index', $data);
    }

    public function get($id)
    {
        $article = $this->articleModel->find($id);

        if (!$article) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Artikel tidak ditemukan']);
        }

        return $this->response->setJSON($article);
    }

    public function store()
    {
        return $this->saveArticle();
    }

    public function update($id)
    {
        return $this->saveArticle($id);
    }

    private function saveArticle($id = null)
    {
        // Validasi sederhana
        if (!$this->validate([
            'title' => 'required|max_length[255]',
            'content' => 'required',
            'image' => 'is_image[image]|max_size[image,2048]',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Validasi gagal. Periksa form Anda.');
        }

        // Data umum
        $slug = url_title($this->request->getPost('title'), '-', true);
        $data = [
            'title' => $this->request->getPost('title'),
            'slug' => $slug,
            'content' => $this->request->getPost('content'),
            'published_at' => $this->request->getPost('published_at') ?? null,
        ];

        // Handle upload gambar
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('uploads/articles', $newName);
            $data['image'] = $newName;

            // Kalau update, hapus gambar lama
            if ($id) {
                $oldArticle = $this->articleModel->find($id);
                if (!empty($oldArticle['image']) && file_exists('uploads/articles/' . $oldArticle['image'])) {
                    unlink('uploads/articles/' . $oldArticle['image']);
                }
            }
        }

        // Proses simpan/update
        if ($id) {
            $this->articleModel->update($id, $data);
        } else {
            $this->articleModel->save($data);
        }

        return redirect()->to('/articles')->with('success', 'Artikel berhasil disimpan.');
    }

    public function delete($id)
    {
        $article = $this->articleModel->find($id);

        if (!$article) {
            return redirect()->back()->with('error', 'Artikel tidak ditemukan.');
        }

        // Soft delete diaktifkan, jadi data tidak benar-benar hilang
        $this->articleModel->delete($id);

        return redirect()->to('/articles')->with('success', 'Artikel berhasil dihapus.');
    }
    public function detail($slug)
    {
        $article = $this->articleModel->where('slug', $slug)->first();

        if (!$article) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Artikel dengan slug $slug tidak ditemukan.");
        }

        $data = [
            'article' => $article
        ];

        return view('backend/articles/detail', $data);
    }
}
