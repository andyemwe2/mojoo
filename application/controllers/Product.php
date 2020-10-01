<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_product');
    }
    public function index()
    {
        if(!$this->session->userdata('username') || $this->session->userdata('role') != '01'){
        redirect('welcome');
        }else{
        $this->data['title']   = 'Majoo Teknologi Indonesia';
        $this->data['isi']     = 'Product_v';
        $this->data['products'] = $this->M_product->all();
        $this->load->view('Layout/tema', $this->data);
        }
    }
    
    public function create(){
        //form validation sebelum mengeksekusi QUERY INSERT
        $this->form_validation->set_rules('name', 'Product Name', 'callback_name_check');
        // $this->form_validation->set_rules('name', 'Product Name', 'required');
        $this->form_validation->set_rules('description', 'Product Description', 'required');
        $this->form_validation->set_rules('price', 'Product Price', 'required|integer');
        if (empty($_FILES['userfile']['name']))
        {
            $this->form_validation->set_rules('userfile', 'Product Image', 'required');
        }

        if ($this->form_validation->run() == FALSE)
        {
            $this->data['title']   = 'Majoo Teknologi Indonesia';
            $this->data['isi']     = 'Create_v';
            $this->load->view('Layout/tema', $this->data);
        } else {
            //load uploading file library
            $config['upload_path'] = './assets/produk/10/01/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '300'; //KB
            $config['max_width']  = '2000'; //pixels
            $config['max_height']  = '2000'; //pixels

            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload())
            {
                //file gagal diupload -> kembali ke form tambah
                $this->data['title']   = 'Majoo Teknologi Indonesia';
                $this->data['isi']     = 'Create_v';
                $this->load->view('Layout/tema', $this->data);
            } else {
                //file berhasil diupload -> lanjutkan ke query INSERT
                // eksekusi query INSERT
                $gambar = $this->upload->data();
                $data_product = array(
                    'name'          => set_value('name'),
                    'description'   => set_value('description'),
                    'price'         => set_value('price'),
                    'image'         => $config['upload_path'].$gambar['file_name']
                );
                $this->M_product->create($data_product);
                redirect('portal');
            }
            
        }
    }

    public function name_check($str)
        {
            $cek = $this->M_product->cek_name($str);
                if ($cek > 0)
                {
                        $this->form_validation->set_message('name_check', 'The product name already exists');
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
        }

    public function update($id){
        $this->form_validation->set_rules('name', 'Product Name', 'required');
        $this->form_validation->set_rules('description', 'Product Description', 'required');
        $this->form_validation->set_rules('price', 'Product Price', 'required|integer');
        if (empty($_FILES['userfile']['name']))
        {
            $this->form_validation->set_rules('userfile', 'Product Image', 'required');
        }

        if ($this->form_validation->run() == FALSE)
        {
            $this->data['title']   = 'Majoo Teknologi Indonesia';
            $this->data['isi']     = 'Edit_v';
            $this->data['product'] = $this->M_product->find($id);
            $this->load->view('Layout/tema', $this->data);
        } else {
            if($_FILES['userfile']['name'] != ''){
                //form submit dengan gambar diisi
                //load uploading file library
                $config['upload_path'] = './assets/produk/10/01/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '300'; //KB
                $config['max_width']  = '2000'; //pixels
                $config['max_height']  = '2000'; //pixels

                $this->load->library('upload', $config);
            
            
                if ( ! $this->upload->do_upload())
                {
                    $this->data['title']   = 'Majoo Teknologi Indonesia';
                    $this->data['isi']     = 'Edit_v';
                    $this->data['product'] = $this->M_product->find($id);
                    $this->load->view('Layout/tema', $this->data);
                } else {
                    $gambar = $this->upload->data();
                    $data_product = array(
                        'name'          => set_value('name'),
                        'description'   => set_value('description'),
                        'price'         => set_value('price'),
                        'image'         => $config['upload_path'].$gambar['file_name']
                    );
                    $this->M_product->update($id, $data_product);
                    redirect('portal');
                }
            } else {
                //form submit dengan gambar dikosongkan
                $data_product = array(
                    'name'          => set_value('name'),
                    'description'   => set_value('description'),
                    'price'         => set_value('price')
                );
                $this->M_product->update($id, $data_product);
                redirect('portal');
            }
        }
    }
    
    public function delete($id){
        $this->M_product->delete($id);
        redirect('portal');
    }
}