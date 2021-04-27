<?php 

namespace CodeIgniter;
namespace App\Controllers;
use App\Models\BarangModel;
use App\Models\StatusBarangModel;

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
    //attribut
	protected $barangModel;

    //method
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

    public function add()
    {   
        //include helper form
        helper(['form']);
        
        $rules = [
            'name'          => 'required',
            'status'        => 'required',
            'kategori'      => 'required',
            'time'          => 'required',
            'location'      => 'required',
            'description'   => 'required'
        ];
         
        if($this->validate($rules)){

            $data = [
                'nama_barang'      => $this->request->getVar('name'),
                'kategori_barang'  => $this->request->getVar('kategori'),
                'waktu_barang'     => $this->request->getVar('time'),
                'lokasi_barang'    => $this->request->getVar('location'),
                'deskripsi_barang' => $this->request->getVar('description'),
                'foto_barang'      => 'default.jpg'
            ];

            $this->barangModel->save($data);
            $barang_id = $this->barangModel->getInsertID();

            $data = [
                'id_barang' => $barang_id,
                'status'    => $this->request->getVar('status')
            ];

            $status_model = new StatusBarangModel();
            $status_model->save($data);

            $data = [
                'title' => 'Laporan Kehilangan',
                'barang' => $this->barangModel->getBarang()
            ];

            return view('Pages/lap_kehilangan', $data);
            
        }else{

            $data['validation'] = $this->validator;
            echo view('/pages/buat_laporan', $data);
        }
    }
}

?>
