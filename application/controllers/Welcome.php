<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_welcome');
    }
    public function index()
    {
        $this->data['title']   = 'Majoo Teknologi Indonesia';
        $this->data['isi']     = 'welcome_v';
        $this->data['products'] = $this->M_welcome->all();
        $this->load->view('Layout/tema', $this->data);
    }
    
    // public function add_to_cart($product_id)
    // {
    //     $product = $this->model_products->find($product_id);
    //     $data = array(
    //                    'id'      => $product->id,
    //                    'qty'     => 1,
    //                    'price'   => $product->price,
    //                    'name'    => $product->name
    //                 );
    //     $this->cart->insert($data);
    //     redirect(base_url());
    // }
    
    // public function cart(){
    //     $this->load->view('show_cart');
    // }
    
    // public function clear_cart()
    // {
    //     $this->cart->destroy();
    //     redirect(base_url());
    // }
}
/* Yunan Helmi Al Anbarry */
/* Toko Online*/