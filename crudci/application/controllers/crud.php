<?php 
 
 
class Crud extends CI_Controller{
 
	function __construct(){ 
        /**
         * Pada controller ini, hal pertama yang dibuka yaitu model m_data
         */
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->helper('url');
 
	}
 
	function index(){
        $data['user'] = $this->m_data->tampil_data()->result(); //Menampilkan data dari database dengan function tampil_data
		$this->load->view('v_tampil',$data); // hasil dari function tampil_data diparingkan ke v_tampil
	}
 
	function tambah(){
		$this->load->view('v_input'); // menampilkan v_input. v_input adalah form inputan yang nantinya akan masuk ke database.
	}
    function tambah_aksi(){ //menjalankan aksi jika menambahkan data dari v_input
		$nama = $this->input->post('nama'); // menangkap hasil inputan dari form
		$alamat = $this->input->post('alamat');// menangkap hasil inputan dari form
		$pekerjaan = $this->input->post('pekerjaan');// menangkap hasil inputan dari form
 
		$data = array( // setelah menangkap data dari inputan, kemudian dijadika array
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
		$this->m_data->input_data($data,'user'); //memasukkan data ke database dari hasil array sebelumnya
		redirect('crud/index'); // mengalihkan ke method index
    }
    function hapus($id){ //method untuk menghapus data
		$where = array('id' => $id); // menangkap data berdasarkan id yang dikirim dari link hapus pada v_tampil crud/hapus kemudian dijadikan array
		$this->m_data->hapus_data($where,'user'); // kemudian akan dikirimkan ke m_data dengan array $where
		redirect('crud/index');// mengalihkan ke method index
    }
    function edit($id){ // method untuk mengedit data
        $where = array('id' => $id); // menangkap data berdasarkan id yang dikirim dari link edit pada v_tampil crud/edit kemudian dijadikan array
        $data['user'] = $this->m_data->edit_data($where,'user')->result(); //function edit_data digunakan untuk menangkap data dari m_data. result() untuk me-regenerate hasil query menjadi array
        $this->load->view('v_edit',$data);// hasilnya akan ditampilkan pada v_edit
    }
    function update(){ //method untuk mengedit data
        $id = $this->input->post('id'); // menangkap data dari form edit
        $nama = $this->input->post('nama'); // menangkap data dari form edit
        $alamat = $this->input->post('alamat'); // menangkap data dari form edit
        $pekerjaan = $this->input->post('pekerjaan'); // menangkap data dari form edit
     
        $data = array( //memasukan data yang ditangkap sebelumnya kedalam variabel data
            'nama' => $nama,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan
        );
     
        $where = array( //menentukan data mana yang akan diupdate berdasarkan id nya
            'id' => $id
        );
     
        $this->m_data->update_data($where,$data,'user'); // menghendel perubahan data yang dilakukan pada database dengan function update_data
        redirect('crud/index');// mengalihkan ke method index
    }
 
}
