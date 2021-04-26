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
            'title' => 'Laporan Kehilangan',
            'barang' => $this->barangModel->getBarang()
        ];
        // dd($data);
        return view('Pages/lap_kehilangan', $data);
    }

    public function detail($id)
    {

        $data = [
            'title' => 'Detail Barang ',
            'barang' => $this->barangModel->getBarang($id)
        ];
        
        //jika barang tidak ada

        if (empty($data['barang'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Barang tidak ditemukan');
        }
        // dd($data);
        return view('Pages/detail_lap_kehilangan', $data);
    }
}

?>
