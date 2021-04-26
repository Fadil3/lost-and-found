<?php 

namespace CodeIgniter;
namespace App\Controllers;
use App\Models\BarangModel;

/**
 * Class Controller
 */
class Barang extends BaseController
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var HTTP\IncomingRequest
	 */
	protected $barangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Barang',
            'barang' => $this->barangModel->getBarang()
        ];
        // dd($data);
        return view('Pages/lap_kehilangan', $data);
    }
}

?>
