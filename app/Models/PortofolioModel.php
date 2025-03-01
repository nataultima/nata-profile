<?

namespace App\Models;

use CodeIgniter\Model;

class PortfoliosModel extends Model
{
    protected $table = 'portfolios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'category', 'image', 'link', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
